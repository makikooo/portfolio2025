<?php 
session_start();

// セッションにフォームデータがない場合は入力画面に戻す
if (!isset($_SESSION['form'])) {
    header('Location: contact.php');
    exit();
}

$form_data = $_SESSION['form'];

// 送信処理
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // メール送信処理
    $to = "truehope320@gmail.com";
    $subject = "【お問い合わせ】" . $form_data['name'] . "様より";
    
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
    $message .= "送信者IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
    
    // 改善されたヘッダー設定
    $headers = "From: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
    $headers .= "Reply-To: " . $form_data['email'] . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "Return-Path: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
    
    // メール送信をデバッグモードで実行
    $mail_sent = false;
    
    // ini_set でメール送信のログを有効にする（デバッグ用）
    ini_set('log_errors', 1);
    ini_set('error_log', 'mail_errors.log');
    
    try {
        $mail_sent = mail($to, $subject, $message, $headers);
        
        // メール送信のログを記録
        error_log("Mail送信試行: " . ($mail_sent ? "成功" : "失敗") . " - 宛先: $to");
        
    } catch (Exception $e) {
        error_log("Mail送信エラー: " . $e->getMessage());
        $error_message = "メール送信中にエラーが発生しました: " . $e->getMessage();
    }
    
    if ($mail_sent) {
        // 送信者への自動返信メール
        $auto_reply_subject = "【自動返信】お問い合わせありがとうございます";
        $auto_reply_message = $form_data['name'] . " 様\n\n";
        $auto_reply_message .= "この度は、お問い合わせいただきありがとうございます。\n";
        $auto_reply_message .= "以下の内容でお問い合わせを受け付けいたしました。\n\n";
        $auto_reply_message .= "■お名前\n";
        $auto_reply_message .= $form_data['name'] . "\n\n";
        $auto_reply_message .= "■メールアドレス\n";
        $auto_reply_message .= $form_data['email'] . "\n\n";
        
        if (!empty($form_data['tel'])) {
            $auto_reply_message .= "■電話番号\n";
            $auto_reply_message .= $form_data['tel'] . "\n\n";
        }
        
        $auto_reply_message .= "■お問い合わせ内容\n";
        $auto_reply_message .= $form_data['message'] . "\n\n";
        $auto_reply_message .= "---\n";
        $auto_reply_message .= "後日、担当者よりご連絡させていただきます。\n";
        $auto_reply_message .= "しばらくお待ちください。\n\n";
        $auto_reply_message .= "唐澤真希子 Web制作・Webデザイン\n";
        
        $auto_reply_headers = "From: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
        $auto_reply_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $auto_reply_headers .= "Content-Transfer-Encoding: 8bit\r\n";
        $auto_reply_headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        
        mail($form_data['email'], $auto_reply_subject, $auto_reply_message, $auto_reply_headers);
        
        // 送信完了後、セッションをクリア
        unset($_SESSION['form']);
        
        // サンクスページにリダイレクト
        header('Location: thanks.php');
        exit();
    } else {
        // メール送信失敗時の処理
        $error_message = "メールの送信に失敗しました。以下をご確認ください：\n";
        $error_message .= "- サーバーのメール設定\n";
        $error_message .= "- PHPのmail()関数の動作状況\n";
        $error_message .= "- 迷惑メールフィルターの設定\n";
        $error_message .= "しばらく時間をおいて再度お試しください。";
        
        // エラーログに記録
        error_log("Mail送信失敗 - 宛先: $to, 件名: $subject");
    }
}

// SMTPサーバー設定の確認
if (ini_get('SMTP')) {
    $debug_info[] = "SMTP Server: " . ini_get('SMTP');
}
if (ini_get('smtp_port')) {
    $debug_info[] = "SMTP Port: " . ini_get('smtp_port');
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
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main id="confirm">
    <header class="header">
            <div class="header_content">
                <a class="logo_link" href="/" >
                    <h1 class="title_name">KARASAWA MAKIKO</h1>
                    <p class="sub_title">Web制作・Webデザイン</p>
                </a>
                <nav class="pc_only">
                    <ul class="nav_list">
                        <li class="nav_item"><a class="nav_link" href="#works">works</a></li>
                        <li class="nav_item"><a class="nav_link" href="#about">about</a></li>
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
                        <li class="nav_item"><a class="nav_link" href="#works">works</a></li>
                        <li class="nav_item"><a class="nav_link" href="#about">about</a></li>
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
                        <?php echo nl2br(htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8')); ?>
                    </div>
                <?php endif; ?>
                
                <div class="confirm_description">
                    <p>以下の内容でお問い合わせを送信いたします。内容をご確認ください。</p>
                </div>

                <form action="confirm.php" method="POST">
                    <div class="confirm_data_container">
                        <div class="confirm_item">
                            <h3>お名前</h3>
                            <p class="confirm_data"><?php echo htmlspecialchars($form_data['name'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                        
                        <div class="confirm_item">
                            <h3>メールアドレス</h3>
                            <p class="confirm_data"><?php echo htmlspecialchars($form_data['email'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                        
                        <?php if (!empty($form_data['tel'])): ?>
                        <div class="confirm_item">
                            <h3>電話番号</h3>
                            <p class="confirm_data"><?php echo htmlspecialchars($form_data['tel'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                        <?php endif; ?>
                        
                        <div class="confirm_item">
                            <h3>お問い合わせ内容</h3>
                            <p class="confirm_data message_content"><?php echo nl2br(htmlspecialchars($form_data['message'], ENT_QUOTES, 'UTF-8')); ?></p>
                        </div>
                    </div>
                    
                    <div class="confirm_buttons">
                        <a href="contact.php" class="back_button">戻る</a>
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
                    <li><a href="#works">works</a></li>
                    <li><a href="#about">about</a></li>
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
        background: #007bff;
        color: white;
    }
    
    .send_button:hover {
        background: #0056b3;
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