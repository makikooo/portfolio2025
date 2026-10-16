<?php
// ============================================
// お問い合わせフォーム共通のセキュリティ処理
// contact.php / confirm.php / thanks.php から読み込む
// ============================================

// 直接アクセスされた場合は何もしない
if (basename($_SERVER['SCRIPT_FILENAME'] ?? '') === basename(__FILE__)) {
    http_response_code(404);
    exit();
}

// メール送信元に使うドメイン（Hostヘッダーは偽装できるので許可リストで判定）
const FORM_ALLOWED_HOSTS = ['happy-smile-design.info', 'happy-smile.design'];
const FORM_DEFAULT_HOST = 'happy-smile-design.info';

// 入力値の文字数上限
const FORM_MAX_LENGTH = [
    'name' => 50,
    'email' => 254,
    'tel' => 20,
    'message' => 3000,
];

// 送信回数の制限（同じIPから RATE_LIMIT_WINDOW 秒間に RATE_LIMIT_MAX 回まで）
const RATE_LIMIT_MAX = 3;
const RATE_LIMIT_WINDOW = 600;

// HTTPS接続かどうか
function form_is_https()
{
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (($_SERVER['SERVER_PORT'] ?? '') === '443');
}

// セキュリティヘッダーを送信
function form_send_security_headers($nonce)
{
    header_remove('X-Powered-By');
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: DENY');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: camera=(), microphone=(), geolocation=(), payment=(), usb=()');
    header('Cross-Origin-Opener-Policy: same-origin');
    // 入力内容がブラウザやプロキシに残らないようにする
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Pragma: no-cache');
    if (form_is_https()) {
        header('Strict-Transport-Security: max-age=31536000');
    }
    header(
        "Content-Security-Policy: default-src 'self'; "
        . "script-src 'self' 'nonce-{$nonce}' https://www.google.com/recaptcha/ https://www.gstatic.com/recaptcha/; "
        . "frame-src https://www.google.com/recaptcha/ https://recaptcha.google.com/recaptcha/; "
        . "connect-src 'self' https://www.google.com/recaptcha/; "
        . "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; "
        . "font-src 'self' https://fonts.gstatic.com; "
        . "img-src 'self' data: https://www.gstatic.com; "
        . "object-src 'none'; base-uri 'self'; form-action 'self'; frame-ancestors 'none'"
    );
}

// 安全な設定でセッションを開始し、ヘッダーを送信する。戻り値はCSP用のnonce
function form_bootstrap()
{
    ini_set('session.use_strict_mode', '1');
    ini_set('session.use_only_cookies', '1');
    ini_set('session.use_trans_sid', '0');
    session_name('contact_sid');
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => form_is_https(),
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();

    $nonce = base64_encode(random_bytes(16));
    form_send_security_headers($nonce);
    return $nonce;
}

// HTMLエスケープ
function h($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// ---------- CSRF対策 ----------
function csrf_token()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_verify()
{
    $token = $_POST['csrf_token'] ?? '';
    return is_string($token)
        && !empty($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $token);
}

// ---------- 入力値の取得 ----------
// 配列などの不正な型を弾き、制御文字を取り除く（改行はお問い合わせ内容のみ許可）
function form_input($key, $allow_newline = false)
{
    $value = $_POST[$key] ?? '';
    if (!is_string($value) || !mb_check_encoding($value, 'UTF-8')) {
        return '';
    }
    $value = str_replace(["\r\n", "\r"], "\n", $value);
    $pattern = $allow_newline ? '/[^\P{C}\n]/u' : '/\p{C}/u';
    $value = preg_replace($pattern, '', $value);
    return trim($value);
}

// メールヘッダーに入れる値から改行を完全に除去（ヘッダーインジェクション対策）
function form_header_safe($value)
{
    return str_replace(["\r", "\n", "%0a", "%0d"], '', (string) $value);
}

// 送信元ドメイン
function form_mail_domain()
{
    $host = strtolower(preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? ''));
    $host = preg_replace('/^www\./', '', $host);
    return in_array($host, FORM_ALLOWED_HOSTS, true) ? $host : FORM_DEFAULT_HOST;
}

// ---------- reCAPTCHA v3 検証 ----------
function verify_recaptcha($token, $expected_action)
{
    if (!is_string($token) || $token === '' || strlen($token) > 4000 || !defined('RECAPTCHA_SECRET_KEY')) {
        return false;
    }

    $data = http_build_query([
        'secret' => RECAPTCHA_SECRET_KEY,
        'response' => $token,
        'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
    ]);
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $result = false;

    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
        ]);
        $result = curl_exec($ch);
        curl_close($ch);
    } else {
        $context = stream_context_create([
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => $data,
                'timeout' => 10,
            ],
        ]);
        $result = @file_get_contents($url, false, $context);
    }

    if ($result === false) {
        return false;
    }
    $json = json_decode($result, true);
    if (!is_array($json) || empty($json['success'])) {
        return false;
    }
    if (($json['action'] ?? '') !== $expected_action) {
        return false;
    }
    if (($json['score'] ?? 0) < RECAPTCHA_THRESHOLD) {
        return false;
    }
    // 他サイトで取得したトークンの使い回しを防ぐ
    $hostname = $json['hostname'] ?? '';
    $current = strtolower(preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? ''));
    if ($hostname !== $current) {
        return false;
    }
    return true;
}

// ---------- 送信回数制限（IP単位） ----------
function rate_limit_file()
{
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $dir = sys_get_temp_dir() . '/contact_rate_limit';
    if (!is_dir($dir)) {
        @mkdir($dir, 0700, true);
    }
    return $dir . '/' . hash('sha256', $ip . (defined('RECAPTCHA_SECRET_KEY') ? RECAPTCHA_SECRET_KEY : ''));
}

function rate_limit_get_hits()
{
    $file = rate_limit_file();
    $hits = is_file($file) ? json_decode((string) @file_get_contents($file), true) : [];
    $now = time();
    return array_values(array_filter(is_array($hits) ? $hits : [], function ($t) use ($now) {
        return is_int($t) && $t > $now - RATE_LIMIT_WINDOW;
    }));
}

function rate_limit_exceeded()
{
    return count(rate_limit_get_hits()) >= RATE_LIMIT_MAX;
}

function rate_limit_record()
{
    $hits = rate_limit_get_hits();
    $hits[] = time();
    @file_put_contents(rate_limit_file(), json_encode($hits), LOCK_EX);
}
