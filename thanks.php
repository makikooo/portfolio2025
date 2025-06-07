<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="お問い合わせありがとうございました">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>お問い合わせ完了 - 唐澤真希子 Web制作・Webデザイン</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main id="thanks">
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
        <section class="thanks_section">
            <div class="thanks_content">
                <h2 class="thanks_title">お問い合わせありがとうございました</h2>
                <div class="thanks_message">
                    <p>この度は、お問い合わせいただきありがとうございます。</p>
                    <p>送信いただいた内容を確認の上、2日以内にご返信させていただきます。</p>
                    <p>なお、内容によっては返信にお時間をいただく場合がございますので、予めご了承ください。</p>
                </div>
                
                <div class="contact_info">
                    <h3>緊急のお問い合わせについて</h3>
                    <p>お急ぎの場合は、以下の方法でもお問い合わせいただけます：</p>
                    <ul>
                        <li>メール: truehope320@gmail.com</li>
                    </ul>
                </div>
                
                <div class="thanks_buttons">
                    <a href="index.html" class="home_button">トップページに戻る</a>
                    <a href="contact.php" class="contact_again_button">再度お問い合わせ</a>
                </div>
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
    .thanks_section {
        padding: 80px 20px;
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }
    
    .thanks_title {
        font-size: 2rem;
        color: #333;
        margin-bottom: 30px;
        font-family: 'Zen Maru Gothic', sans-serif;
    }
    
    .thanks_message {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 8px;
        margin-bottom: 40px;
        text-align: left;
    }
    
    .thanks_message p {
        margin-bottom: 15px;
        line-height: 1.6;
        color: #555;
    }
    
    .contact_info {
        background: #fff;
        border: 1px solid #e0e0e0;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 40px;
        text-align: left;
    }
    
    .contact_info h3 {
        color: #333;
        margin-bottom: 15px;
        font-size: 1.2rem;
    }
    
    .contact_info ul {
        margin-top: 15px;
        padding-left: 20px;
    }
    
    .contact_info li {
        margin-bottom: 8px;
        color: #555;
        font-family: serif;
    }
    
    .thanks_buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .home_button,
    .contact_again_button {
        display: inline-block;
        padding: 12px 30px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    
    .home_button {
        background: #007bff;
        color: white;
    }
    
    .home_button:hover {
        background: #0056b3;
        color: white;
        text-decoration: none;
    }
    
    .contact_again_button {
        background: #6c757d;
        color: white;
    }
    
    .contact_again_button:hover {
        background: #545b62;
        color: white;
        text-decoration: none;
    }
    
    @media (max-width: 768px) {
        .thanks_title {
            font-size: 1.5rem;
        }
        
        .thanks_buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .home_button,
        .contact_again_button {
            width: 100%;
            max-width: 300px;
        }
    }
    </style>
</body>
</html>