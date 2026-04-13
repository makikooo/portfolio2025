<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="" keywords="" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <title>唐澤真希子 Web制作・Webデザイン</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon.ico" /> -->
    <?php wp_head();?>
</head>

<body>
          <header class="header">
            <div class="header_content">
                <a class="logo_link" href="/" >
                    <h1 class="title_name">KARASAWA MAKIKO</h1>
                    <p class="sub_title">Web制作・Webデザイン</p>
                </a>
                <nav class="pc_only">
                    <ul class="nav_list">
                        <li class="nav_item"><a class="nav_link" href="/index.php#works">works</a></li>
                        <li class="nav_item"><a class="nav_link" href="/about-me/">about</a></li>
                        <!-- <li class="nav_item"><a class="nav_link" href="<?php echo get_template_directory_uri(); ?>/blog.html">blog</a></li> -->
                        <li class="nav_item"><a class="nav_link" href="<?php echo get_template_directory_uri(); ?>/contact.php">contact</a></li>
                    </ul>
                </nav>
                <nav class="nav_sp_only sp_only">
                    <div class="humbergur_box">
                        <span></span><span></span><span></span>
                    </div>
                    <ul class="sp_nav_list">
                        <li class="nav_item"><a class="nav_link" href="/">home</a></li>
                        <li class="nav_item"><a class="nav_link" href="#works">works</a></li>
                        <li class="nav_item"><a class="nav_link" href="/about-me/">about</a></li>
                        <!-- <li class="nav_item"><a class="nav_link" href="blog.html">blog</a></li> -->
                        <li class="nav_item"><a class="nav_link" href="<?php echo get_template_directory_uri(); ?>/contact.php">contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>