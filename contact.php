<!DOCTYPE html>
<?php 
session_start();
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 個別にサニタイズして取得
    $post = [
        'name' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '',
        'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '',
        'tel' => filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '',
        'message' => filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '',
        'agreement' => filter_input(INPUT_POST, 'agreement', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? ''
    ];

    // フォームの送信時にエラーをチェックする
    if ($post['name'] === '') {
        $error['name'] = 'blank';
    }
    if ($post['email'] === '') {
        $error['email'] = 'blank';
    } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'email';
    }
    if ($post['message'] === '') {
        $error['message'] = 'blank';
    }
    if ($post['agreement'] === '') {
        $error['agreement'] = 'blank';
    }

    if (count($error) === 0) {
        // エラーがないので確認画面に移動
        $_SESSION['form'] = $post;
        // デバッグ用（後で削除）
        // var_dump($post);
        // var_dump($_SESSION['form']);
        header('Location: confirm.php');
        exit();
    }
} else {
    if (isset($_SESSION['form'])) {
        $post = $_SESSION['form'];
    }
}
?>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="ポートフォリオサイト。Web制作・WordPress制作をしています。">
    <meta name="keywords" content="ポートフォリオ,Web制作,WordPress">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>唐澤真希子 Web制作・Webデザイン</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon.ico" /> -->
</head>
<body>
    <main id="home">
    <header class="header">
            <div class="header_content">
                <a class="logo_link" href="/" >
                    <h1 class="title_name">KARASAWA MAKIKO</h1>
                    <p class="sub_title">Web制作・Webデザイン</p>
                </a>
                <nav class="pc_only">
                    <ul class="nav_list">
                        <li class="nav_item"><a class="nav_link" href="index.html#works">works</a></li>
                        <li class="nav_item"><a class="nav_link" href="index.html#about">about</a></li>
                        <!-- <li class="nav_item"><a class="nav_link" href="blog.html">blog</a></li> -->
                        <li class="nav_item"><a class="nav_link" href="contact.php">contact</a></li>
                    </ul>
                </nav>
                <nav class="nav_sp_only sp_only">
                    <div class="humbergur_box">
                        <span></span><span></span><span></span>
                    </div>
                    <ul class="sp_nav_list">
                        <li class="nav_item"><a class="nav_link" href="index.html">home</a></li>
                        <li class="nav_item"><a class="nav_link" href="index.html#works">works</a></li>
                        <li class="nav_item"><a class="nav_link" href="index.html#about">about</a></li>
                        <!-- <li class="nav_item"><a class="nav_link" href="blog.html">blog</a></li> -->
                        <li class="nav_item"><a class="nav_link" href="contact.php">contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    <section class="contact" id="contact">
            <h3 class="section_title">contact  <span>お問い合わせ</span></h3>
            <p>ご依頼・ご相談や、ホームページのご感想などお気軽にお問い合わせくださいませ。<br>※は必須項目になります</p>

            <form action="contact.php" method="POST" novalidate>
                <!-- デバッグ用（後で削除） -->
                <?php if (!empty($error)): ?>
                    <div style="color: red; background: #ffe6e6; padding: 10px; margin: 10px 0;">
                        <strong>エラーが発生しています：</strong>
                        <?php foreach ($error as $key => $value): ?>
                            <br><?php echo htmlspecialchars($key . ': ' . $value, ENT_QUOTES, 'UTF-8'); ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <table class="contact_table">
                    <tr>
                        <th><label for="name">※お名前</label></th>
                        <td>
                            <input type="text" id="name" name="name" value="<?php echo isset($post['name']) ? htmlspecialchars($post['name'], ENT_QUOTES, 'UTF-8') : ''; ?>" required>
                            <?php if (isset($error['name']) && $error['name'] === 'blank'): ?>
                                <p class="error_msg">※お名前をご記入下さい</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="email">※メールアドレス</label></th>
                        <td>
                            <input type="email" name="email" id="email" class="serif" value="<?php echo isset($post['email']) ? htmlspecialchars($post['email'], ENT_QUOTES, 'UTF-8') : ''; ?>" required>
                            <?php if (isset($error['email']) && $error['email'] === 'blank'): ?>
                                <p class="error_msg">※メールアドレスをご記入下さい</p>
                            <?php elseif (isset($error['email']) && $error['email'] === 'email'): ?>
                                <p class="error_msg">※正しいメールアドレスをご記入下さい</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="tel">電話番号</label></th>
                        <td>
                            <input type="tel" name="tel" id="tel" value="<?php echo isset($post['tel']) ? htmlspecialchars($post['tel'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <th><label for="massage">※お問い合わせ内容</label></th>
                        <td>
                            <textarea name="message" id="massage" required><?php echo isset($post['message']) ? htmlspecialchars($post['message'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                            <?php if (isset($error['message']) && $error['message'] === 'blank'): ?>
                                <p class="error_msg">※お問い合わせ内容をご記入下さい</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
                <div class="box">
                    <h3 class="privecy">
                        プライバシーポリシー
                    </h3>
                    <p>最終更新日：2025年4月3日</p>
                    <h4 class="privecy_title">1.はじめに</h4>
                    <p>私、唐澤真希子はお客様の個人情報保護の重要性を認識し、個人情報の保護に関する法律、その他の関係法令を遵守するとともに、本プライバシーポリシーに従い、適切な取り扱いおよび保護に努めます。</p>
                    <h4 class="privecy_title">2. 収集する情報</h4>
                    <p>私が収集する情報には、以下のようなものが含まれます：</p>
                    <h5 class="privecy_subtitle">2.1 お客様から直接収集する情報</h5>
                    <ul>
                        <li>氏名</li>
                        <li>メールアドレス</li>
                        <li>電話番号</li>
                        <li>その他私のサービス利用時にお客様が提供する情報</li>
                    </ul>
                    <h5 class="privecy_subtitle">2.2 自動的に収集される情報</h5>
                    <ul>
                        <li>IPアドレス</li>
                        <li>クッキー情報</li>
                        <li>位置情報</li>
                        <li>デバイス情報（ブラウザの種類、OS情報など</li>
                        <li>サービスの利用状況に関する情報</li>
                    </ul>
                    <h4 class="privecy_title">3. 情報の利用目的</h4>
                    <p>収集した情報を以下の目的で利用します：</p>
                    <ul>
                        <li>お客様へのサービス提供のため</li>
                        <li>お客様からのお問い合わせへの対応のため</li>
                        <li>サービスの品質向上、新機能開発のため</li>
                        <li>お客様に有用と思われる情報・サービスの提供のため</li>
                        <li>不正アクセス、不正利用の防止のため</li>
                        <li>当社規約や法令に違反する行為への対処のため</li>
                    </ul>
                    <h4 class="privecy_title">4. 情報の共有・第三者提供</h4>
                    <p>以下の場合を除き、お客様の個人情報を第三者に開示または提供いたしません：</p>
                    <ul>
                        <li>お客様の同意がある場合</li>
                        <li>法令に基づく場合</li>
                        <li>人の生命、身体または財産の保護のために必要がある場合</li>
                        <li>公衆衛生の向上または児童の健全な育成の推進のために特に必要がある場合</li>
                        <li>国の機関もしくは地方公共団体またはその委託を受けた者が法令の定める事務を遂行することに対して協力する必要がある場合</li>
                        <li>業務委託先に対して、業務の遂行に必要な範囲内で個人情報を提供する場合</li>
                        <li>事業譲渡その他の事由によって事業の承継が行われる場合</li>
                    </ul>
                    <h4 class="privecy_title">5. 情報の保護</h4>
                    <p>お客様の個人情報の安全管理のために、適切な安全対策を講じます。また、個人情報を取り扱う従業者や委託先に対して、個人情報の適切な取り扱いを徹底します。</p>
                    <h4 class="privecy_title">6. クッキーの使用</h4>
                    <p>ウェブサイトでは、クッキーを使用しています。クッキーとは、ウェブサイトがお客様のコンピュータやモバイルデバイスに保存する小さなテキストファイルです。お客様のウェブサイト体験を向上させるため、および分析目的のためにクッキーを使用します。ほとんどのブラウザではクッキーを無効にすることができますが、その場合、サービスの一部の機能が正常に動作しない可能性があります。</p>
                    <h4 class="privecy_title">7. お客様の権利</h4>
                    <p>お客様は、当社が保有するお客様の個人情報について、開示、訂正、追加または削除、利用停止または消去を請求することができます。これらの請求を行う場合は、お問い合わせフォームでお問い合わせください。</p>
                    <h4 class="privecy_title">8. 子どものプライバシー</h4>
                    <p>13歳未満の子どもを対象としていません。当社は、13歳未満の子どもから故意に個人情報を収集することはありません。13歳未満の子どもの個人情報を当社が保有していることが判明した場合、速やかに削除いたします。</p>
                    <h4 class="privecy_title">9. プライバシーポリシーの変更</h4>
                    <p>必要に応じて本プライバシーポリシーを変更することがあります。重要な変更がある場合は、当社のウェブサイト上で通知を行います。</p>
                </div>
                <div class="agreement_flex">
                    <input 
                        type="checkbox"
                        id="agreement"
                        name="agreement"
                        value="1"
                        class="check"
                        <?php echo (isset($post['agreement']) && $post['agreement'] === '1') ? 'checked' : ''; ?>
                    >
                    <label for="agreement" class="agreement">
                        上記のプライバシーポリシーに同意します
                    </label>
                    <?php if (isset($error['agreement']) && $error['agreement'] === 'blank'): ?>
                        <p class="error_msg">※プライバシーポリシーへの同意が必要です</p>
                    <?php endif; ?>
                </div>
                <button
                    type="submit"
                    class="contact_button"    
                >送信する</button>
            </form>
            <p class="send_text">
                お問い合わせのご返信は2日以内(土日祝日以外)を心がけております。ご利用環境、また迷惑メール対策等の設定により、お返事が届かない場合があります。5日経過しても返信のない場合、大変お手数をおかけしますが再度お送りいただくよう、お願い申し上げます。
            </p>
            
        </section>
        <section class="github_links_section">
            <h4 class="section_title">CODE <span>このサイトのコード</span></h4>
            <div class="github_links">
                <a href="https://github.com/makikooo/portfolio2025" target="_blank">GitHub</a>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="go_to_top">上に戻る</div>
        <div class="footer_flex">
            <a href="/">
                <h6 class="footer_name">KARASAWA <br class="sp_only">MAKIKO</h6>
            </a>
            <nav>
                <ul>
                    <li><a href="index.html#works">works</a></li>
                    <li><a href="index.html#about">about</a></li>
                    <!-- <li><a href="blog">blog</a></li> -->
                    <li><a href="contact.php">contact</a></li>
                </ul>
            </nav>
        </div>
        <small class="footer_copy">&copy karasawamakiko portfolio</small>
    </footer>
    <script src="assets/js/main.js" defer></script>
</body>
</html>