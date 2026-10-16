<?php
function add_files() {
    wp_enqueue_script( 'common_script', get_template_directory_uri().'/assets/js/main.js', array());

    wp_enqueue_style( 'reset-style', get_theme_file_uri( '/assets/css/reset.css' ),array(), '1.0.0');
    wp_enqueue_style( 'common-style', get_theme_file_uri( '/assets/css/common.css' ),array(), '1.0.0');
    // 更新日時をバージョンにして、CSSを変更したらブラウザのキャッシュが確実に切り替わるようにする
    wp_enqueue_style( 'main-style', get_theme_file_uri( '/assets/css/style.css' ),array(), filemtime( get_theme_file_path( '/assets/css/style.css' ) ));
}
add_action('wp_enqueue_scripts', 'add_files');


// ============================================
// セキュリティ対策
// ============================================

// WordPressのバージョン情報を出力しない
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');

// 不要なヘッダー出力を削除
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('template_redirect', 'wp_shortlink_header', 11);

// XML-RPC（ブルートフォース攻撃・DDoSの踏み台に使われやすい）を無効化
add_filter('xmlrpc_enabled', '__return_false');
add_filter('xmlrpc_methods', '__return_empty_array');
add_filter('wp_headers', function ($headers) {
    unset($headers['X-Pingback']);
    return $headers;
});
add_filter('pings_open', '__return_false', 9999);

// ユーザー名の漏えい対策：未ログイン時は REST API のユーザー一覧を無効化
add_filter('rest_endpoints', function ($endpoints) {
    if (!is_user_logged_in()) {
        foreach (array_keys($endpoints) as $route) {
            if (preg_match('#^/wp/v2/users#', $route)) {
                unset($endpoints[$route]);
            }
        }
    }
    return $endpoints;
});

// ユーザー名の漏えい対策：?author=1 や著者アーカイブを無効化
add_action('template_redirect', function () {
    if (is_author() || (isset($_GET['author']) && !is_admin())) {
        wp_safe_redirect(home_url('/'), 301);
        exit;
    }
});

// ユーザー名の漏えい対策：サイトマップからユーザーを除外
add_filter('wp_sitemaps_add_provider', function ($provider, $name) {
    return $name === 'users' ? false : $provider;
}, 10, 2);

// ログイン失敗時に「ユーザー名が違う」「パスワードが違う」を区別しない
add_filter('login_errors', function () {
    return 'ユーザー名またはパスワードが正しくありません。';
});

// ログインのブルートフォース対策：同じIPから15分間に5回失敗したらロック
define('PORTFOLIO_LOGIN_MAX_FAILS', 5);
define('PORTFOLIO_LOGIN_LOCK_SECONDS', 15 * MINUTE_IN_SECONDS);

function portfolio_login_lock_key() {
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    return 'login_fail_' . md5($ip);
}

add_filter('authenticate', function ($user) {
    $fails = (int) get_transient(portfolio_login_lock_key());
    if ($fails >= PORTFOLIO_LOGIN_MAX_FAILS) {
        return new WP_Error('too_many_attempts', 'ログインの試行回数が上限を超えました。しばらく時間をおいてお試しください。');
    }
    return $user;
}, 30);

add_action('wp_login_failed', function () {
    $key = portfolio_login_lock_key();
    set_transient($key, (int) get_transient($key) + 1, PORTFOLIO_LOGIN_LOCK_SECONDS);
});

add_action('wp_login', function () {
    delete_transient(portfolio_login_lock_key());
});

// セキュリティヘッダー（.htaccessが使えない環境でも効くようにPHPからも送信）
add_action('send_headers', function () {
    header_remove('X-Powered-By');
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: camera=(), microphone=(), geolocation=(), payment=(), usb=()');
    if (is_ssl()) {
        header('Strict-Transport-Security: max-age=31536000');
    }
    // 公開ページのみCSPを付与（管理画面は対象外）
    if (!is_admin()) {
        header(
            "Content-Security-Policy: default-src 'self'; "
            . "script-src 'self' 'unsafe-inline'; "
            . "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; "
            . "font-src 'self' data: https://fonts.gstatic.com; "
            . "img-src 'self' data: https:; "
            . "frame-src 'self' https://www.youtube.com https://www.youtube-nocookie.com; "
            . "object-src 'none'; base-uri 'self'; form-action 'self'; frame-ancestors 'self'"
        );
    }
});
