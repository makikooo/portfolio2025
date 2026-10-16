<?php
require_once __DIR__ . '/secret.php';
require_once __DIR__ . '/inc/form-security.php';

form_bootstrap();

// セッションにフォームデータがない場合は入力画面に戻す
if (!isset($_SESSION['form']) || !is_array($_SESSION['form'])) {
    header('Location: contact.php', true, 303);
    exit();
}

$form_data = $_SESSION['form'];

// 送信処理
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if (!csrf_verify()) {
        $error_message = "セキュリティチェックに失敗しました。\nお手数ですが入力画面からやり直してください。";
    } elseif (rate_limit_exceeded()) {
        $error_message = "短時間に送信が繰り返されたため、受付を一時停止しています。\nしばらく時間をおいて再度お試しください。";
    } else {
        // 二重送信を防ぐため、送信前にセッションから取り出す
        unset($_SESSION['form']);
        rate_limit_record();

        $to = "truehope320@gmail.com";
        $domain = form_mail_domain();
        $from = "noreply@" . $domain;
        $name = form_header_safe($form_data['name']);
        $email = form_header_safe($form_data['email']);

        mb_language('uni');
        mb_internal_encoding('UTF-8');

        $subject = mb_encode_mimeheader("【お問い合わせ】" . $name . "様より", 'UTF-8');

        // メール本文を作成
        $message = "お問い合わせが届きました。\n\n";
        $message .= "■お名前\n";
        $message .= $form_data['name'] . "\n\n";
        $message .= "■メールアドレス\n";
        $message .= $form_data['email'] . "\n\n";

        if (!empty($form_data['tel'])) {
            $message .= "■電話番号\n";
            $message .= $form_data['tel'] . "\n\n";
        }

        $message .= "■お問い合わせ内容\n";
        $message .= $form_data['message'] . "\n\n";
        $message .= "---\n";
        $message .= "送信日時: " . date('Y年m月d日 H:i:s') . "\n";
        $message .= "送信者IP: " . ($_SERVER['REMOTE_ADDR'] ?? '') . "\n";

        // ヘッダー（改行を除去した値とホワイトリストのドメインのみ使用）
        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers .= "Content-Transfer-Encoding: 8bit\r\n";

        $mail_sent = mail($to, $subject, $message, $headers);

        if ($mail_sent) {
            // 送信者への自動返信メール
            // 第三者宛てのスパム送信に悪用されないよう、入力内容は本文に含めない
            $auto_reply_subject = mb_encode_mimeheader("【自動返信】お問い合わせありがとうございます", 'UTF-8');
            $auto_reply_message = "この度は、お問い合わせいただきありがとうございます。\n";
            $auto_reply_message .= "お問い合わせを受け付けいたしました。\n\n";
            $auto_reply_message .= "内容を確認の上、2日以内(土日祝日以外)にご返信させていただきます。\n";
            $auto_reply_message .= "しばらくお待ちください。\n\n";
            $auto_reply_message .= "※このメールは送信専用アドレスから自動送信しています。\n";
            $auto_reply_message .= "※お心当たりのない場合は、お手数ですが本メールを破棄してください。\n\n";
            $auto_reply_message .= "唐澤真希子 Web制作・Webデザイン\n";

            $auto_reply_headers = "From: " . $from . "\r\n";
            $auto_reply_headers .= "MIME-Version: 1.0\r\n";
            $auto_reply_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            $auto_reply_headers .= "Content-Transfer-Encoding: 8bit\r\n";
            $auto_reply_headers .= "Auto-Submitted: auto-replied\r\n";

            mail($email, $auto_reply_subject, $auto_reply_message, $auto_reply_headers);

            // 送信完了後、CSRFトークンを作り直してサンクスページへ
            unset($_SESSION['csrf_token']);
            session_regenerate_id(true);
            header('Location: thanks.php', true, 303);
            exit();
        }

        // メール送信失敗時：入力内容を戻して再送信できるようにする
        $_SESSION['form'] = $form_data;
        error_log('Contact form: mail() failed');
        $error_message = "メールの送信に失敗しました。\nしばらく時間をおいて再度お試しください。";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="お問い合わせ確認画面">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ確認 - 唐澤真希子 Web制作・Webデザイン</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo filemtime(__DIR__ . '/assets/css/style.css'); ?>">
</head>

<body>
    <main id="confirm">
        <header class="header">
            <div class="header_content">
                <a class="logo_link" href="/">
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
        <section class="confirm_section">
            <div class="confirm_content">
                <h2 class="confirm_title">お問い合わせ内容の確認</h2>

                <?php if (isset($error_message)): ?>
                    <div class="error_message">
                        <?php echo nl2br(h($error_message)); ?>
                    </div>
                <?php endif; ?>

                <div class="confirm_description">
                    <p>以下の内容でお問い合わせを送信いたします。内容をご確認ください。</p>
                </div>

                <form action="confirm.php" method="POST">
                    <div class="confirm_data_container">
                        <div class="confirm_item">
                            <h3>お名前</h3>
                            <p class="confirm_data"><?php echo h($form_data['name']); ?></p>
                        </div>

                        <div class="confirm_item">
                            <h3>メールアドレス</h3>
                            <p class="confirm_data"><?php echo h($form_data['email']); ?></p>
                        </div>

                        <?php if (!empty($form_data['tel'])): ?>
                            <div class="confirm_item">
                                <h3>電話番号</h3>
                                <p class="confirm_data"><?php echo h($form_data['tel']); ?></p>
                            </div>
                        <?php endif; ?>

                        <div class="confirm_item">
                            <h3>お問い合わせ内容</h3>
                            <p class="confirm_data message_content"><?php echo nl2br(h($form_data['message'])); ?></p>
                        </div>
                    </div>

                    <div class="confirm_buttons">
                        <a href="contact.php" class="back_button">戻る</a>
                        <input type="hidden" name="csrf_token" value="<?php echo h(csrf_token()); ?>">
                        <button type="submit" name="submit" class="send_button">送信する</button>
                    </div>
                </form>
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
                    <li><a href="contact.php">contact</a></li>
                </ul>
            </nav>
        </div>
        <small class="footer_copy">&copy karasawamakiko portfolio</small>
    </footer>
    <script src="assets/js/main.js" defer></script>

    <style>
        .confirm_section {
            padding: 80px 20px;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .confirm_title {
            font-size: 2rem;
            color: #333;
            margin-bottom: 30px;
            font-family: 'Zen Maru Gothic', sans-serif;
        }

        .confirm_description {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 40px;
            text-align: left;
        }

        .confirm_description p {
            margin-bottom: 0;
            line-height: 1.6;
            color: #555;
        }

        .error_message {
            background: #ffe6e6;
            border: 1px solid #ff0000;
            color: #d8000c;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: left;
            line-height: 1.6;
        }

        .confirm_data_container {
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            margin-bottom: 40px;
            text-align: left;
        }

        .confirm_data {
            font-family: serif;
        }

        .confirm_item {
            padding: 25px;
            border-bottom: 1px solid #f0f0f0;
        }

        .confirm_item:last-child {
            border-bottom: none;
        }

        .confirm_item h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .confirm_data {
            color: #555;
            line-height: 1.6;
            margin: 0;
        }

        .message_content {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            min-height: 60px;
        }

        .confirm_buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .back_button,
        .send_button {
            display: inline-block;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .back_button {
            background: #6c757d;
            color: white;
        }

        .back_button:hover {
            background: #545b62;
            color: white;
            text-decoration: none;
        }

        .send_button {
            background: #D3B63B;
            color: white;
        }

        .send_button:hover {
            background: #917d22;
            color: white;
        }

        @media (max-width: 768px) {
            .confirm_title {
                font-size: 1.5rem;
            }

            .confirm_buttons {
                flex-direction: column;
                align-items: center;
            }

            .back_button,
            .send_button {
                width: 100%;
                max-width: 300px;
            }

            .confirm_item {
                padding: 20px;
            }
        }
    </style>
</body>

</html>