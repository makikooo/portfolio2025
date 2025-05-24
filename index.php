<?php
    session_start();
    // セッションとはサーバーにデータを保存する(ブラウザごとに) セッションスタートの関数
    // 処理の先頭にセッションの宣言をする
    $errmessage = array();
    // エラーメッセージの初期化
    $mode ='input';
    if( isset($_POST['back']) && $_POST['back']){ // 戻るボタン押した時
        // 何もしない 
        // backがあり、backの中身がある時
    } else if( isset($_POST['confirm']) && $_POST['confirm'] ){ // 確認ボタンクリックの時

        if(!$_POST['fullname']){ // 名前欄がからだった時
            $errmessage[] = "名前を入力してください";
        } else if (mb_strlen($_POST['fullname']) > 100 ){ // 文字数が100文字以上のときは
            $errmessage[] = "名前は100文字以内にしてください";
        }
        $_SESSION['fullname'] = htmlspecialchars($_POST['fullname'], ENT_QUOTES); //セッションに保存している htmlspecialchars関数でプログラムコードを無害化（サニタイズ）する処理



        if(!$_POST['email']){ // メールアドレス欄がからだった時
            $errmessage[] = "メールアドレスを入力してください";
        } else if (mb_strlen($_POST['email']) > 200 ){ // 文字数が200文字以上のときは
            $errmessage[] = "メールアドレスは200文字以内にしてください";
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // Eメール形式ではないときに
            $errmessage[] = "メールアドレスが不正です";
        }
        $_SESSION['email']    = htmlspecialchars($_POST['email'], ENT_QUOTES); //セッションに保存している

        if(!$_POST['message']){ // お問い合わせ欄がからだった時
            $errmessage[] = "お問い合わせ内容を入力してください";
        } else if (mb_strlen($_POST['message']) > 500 ){ // 文字数が500文字以上のときは
            $errmessage[] = "お問い合わせは500文字以内にしてください";
        } 
        $_SESSION['message']  = htmlspecialchars($_POST['message'], ENT_QUOTES); //セッションに保存している
        // modeの前に書くことで3つの値のセッションが保存している

        if($errmessage) {
            $mode = 'input';
        } else {
            $mode ='confirm';
        }
        
    } else if ( isset($_POST['send']) && $_POST['send']){ // 送信ボタン押した時
        $message =  "お問い合わせを受けつけました。\r\n"
                    ."名前:".$_SESSION['fullname']."\r\n"
                    ."email:".$_SESSION['email']."\r\n"
                    ."お問い合わせ内容：\r\n"
                    .preg_replace("/\r\n|\r|\n/","\r\n",$_SESSION['message']);
                    // \r\nと\rと\n/を\r\nに変換する関数(preg_replace)
                    // ピリオドで文字列を結合

        mb_language("ja");
        mb_internal_encoding("UTF-8");
        mb_send_mail($_SESSION['email'],'お問い合わせありがとうございます',$message);
        // 記入者へ確認メール
        mb_send_mail('truehope320@gmail.com','ポートフォリオサイトからお問い合わせいただきました',$message);
        // 管理者宛にメール

        $_SESSION = array();
        // セッションを初期化
        $mode = 'send';
        
    } else { // GETできた時
        $_SESSION['fullname'] = "";
        $_SESSION['email']    = "";
        $_SESSION['message']  = "";
        // から文字の方が親切
        // もしくは
        // $_SESSION = array();
        // セッションを空にする（クリア＝初期化にする）  
    }
?>
<?php get_header();?>
    <main id="home">
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
                        <li class="nav_item"><a class="nav_link" href="">blog</a></li>
                        <li class="nav_item"><a class="nav_link" href="#contact">contact</a></li>
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
                        <li class="nav_item"><a class="nav_link" href="">blog</a></li>
                        <li class="nav_item"><a class="nav_link" href="#contact">contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <section class="mv loading">
            <div class="mv_wrapper">
                <h2 class="mv_title hidden">
                    welcome to<br>
                    my portfolio
                </h2>
                <p class="mv_subtitle hidden">
                    &lt;html&gt;想いをカタチに&lt;&frasl;html&gt;
                </p>
            </div>
        </section>
        <section class="sec01">
            <h3 class="section_title">SKILLS  <span>出来ること</span></h3>
            <div class="section_wrapper">

                <h4 class="sec01_title">01 Web development</h4>
                <p class="sec01_text">
                    HTML・CSSを用いてデザインを忠実に再現し、JavaScriptを活用してサイトに動きを付けることが可能です。アニメーションを取り入れることで世界観を表現し、Webデザインの魅力を一層引き立てることを目指しています。コーディングにおいては、読みやすさを重視し、誰が見ても理解しやすいコードを書くよう心掛けています。 
                </p>
                <h4 class="sec01_title">02 Web Design</h4>
                <p class="sec01_text">
                    Webサイトやバナーなどのグラフィックデザイン制作を手掛けており、細部までこだわって最高のクオリティを追求しています。視覚的な美しさだけでなく、情報設計や機能性にも十分に配慮し、使いやすさを重視したデザインを提供します。見た目が優れているだけでなく、実際に役立ち、さらに人々の心を動かすようなデザインを目指して取り組んでいます。 
                </p>
            </div>
        </section>
        <section class="sec02" id="works">
            <h3 class="section_title">works  <span>制作</span></h3>
            <ul class="works_list">
                <li class="works_link_item">
                    <a class="works_link category_link active" href="#all">ALL</a>
                </li>
                <li class="works_link_item">
                    <a class="works_link category_link" href="#website">Webサイト</a>
                </li>
                <li class="works_link_item">
                    <a class="works_link category_link" href="#webdesign">Webデザイン</a>
                </li>
                <li class="works_link_item">
                    <a class="works_link category_link" href="#webapp">Webアプリ</a>
                </li>
                <li class="works_link_item">
                    <a class="works_link category_link" href="#wordpress">WordPress</a>
                </li>
                <!-- <li class="works_link_item">
                    <a class="works_link category_link" href="#ecsite">ECサイト</a>
                </li> -->
                <li class="works_link_item">
                    <a class="works_link category_link" href="#banner">バナー作成</a>
                </li>
            </ul>
        </section>

        <section class="sec03">
            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="wordpress">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work31.png" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                Web development                            
                            </h5>
                            <div>WordPress</div>
                            <ul>
                                <li>クライアントワーク：SMILE-OOH様</li>
                                <li>個人活動</li>
                                <li>制作日 2025年3月</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <a class="work_button detail_button" href="detail/smile-ooh.html">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                        <a class="work_button site_button" target="_blank" href="https://smile-ooh.com/">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->
            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="wordpress">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work32.png" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                Web development                            
                            </h5>
                            <div>WordPress・LP</div>
                            <ul>
                                <li>クライアントワーク：<br>シンスティー体質改善研究所様</li>
                                <li>個人活動</li>
                                <li>制作日 2025年3月</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <!-- <a class="work_button detail_button" href="">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a> -->
                        <a class="work_button site_button" target="_blank" href="https://shinsulity.idms.or.jp/">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->
            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="webdesign website">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work01.jpg" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                Web Design<br>
                                web development
                            </h5>
                            <div>Webサイト・Webデザイン</div>
                            <ul>
                                <li>自主制作</li>
                                <li>グループ活動</li>
                                <li>制作日 2021年から</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <a class="work_button detail_button" href="https://happy-smile-design.info/site/portfolio2024/page/about_sle.html">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                        <a class="work_button site_button" target="_blank" href="https://our-sle.info/">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->

            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="website">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work02.jpg" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                web development
                            </h5>
                            <div>Webサイト</div>
                            <ul>
                                <li>クライアントワーク：デザインスクール大津様</li>
                                <li>個人活動</li>
                                <li>制作日 2024年2月</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <a class="work_button detail_button" href="https://happy-smile-design.info/site/portfolio2024/page/about_onof.html">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                        <a class="work_button site_button" target="_blank" href="https://onof-design.com/">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->


            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="webdesign website">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work03.jpg" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                Web Design<br>
                                web development
                            </h5>
                            <div>Webサイト・Webデザイン</div>
                            <ul>
                                <li>クライアントワーク：イラストレーションスクール様</li>
                                <li>グループ活動</li>
                                <li>制作日 2024年4月</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <!-- <a class="work_button detail_button" href="">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a> -->
                        <a class="work_button site_button" target="_blank" href="https://illust-school.com/">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->

            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="webdesign website">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work33.png" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                Web Design<br>
                                web development
                            </h5>
                            <div>Webサイト・Webデザイン</div>
                            <ul>
                                <li>2024年ポートフォリオ</li>
                                <li>個人活動</li>
                                <li>制作日 2024年</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <!-- <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a> -->
                        <a class="work_button site_button" target="_blank" href="site/portfolio2024/index.html">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->
            
            
            <div class="center_wrapper">
                <button class="continuation_button">
                    <span>つづきを見る</span>
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon03.png" alt="下へのボタン">
                </button>
            </div>
        </section>

        <section class="work_continuation last_wrapper">
            
            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="webdesign website">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work34.png" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                Web Design<br>
                                web development
                            </h5>
                            <div>Webサイト・Webデザイン</div>
                            <ul>
                                <li>ポートフォリオ2023</li>
                                <li>個人活動</li>
                                <li>制作日 2023年</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <!-- <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a> -->
                        <a class="work_button site_button" target="_blank" href="site/portfolio2023/index.html">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->
            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="webapp">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work05.png" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                Web development                            
                            </h5>
                            <div>Webアプリ</div>
                            <ul>
                                <li>自主制作</li>
                                <li class="zenmaru">VanillaJavaScriptで実装</li>
                                <li>制作日 2025年1月</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <!-- <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a> -->
                        <a class="work_button site_button" target="_blank" href="/site/250111_slider/index.html">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->
            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="webapp">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work06.png" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                Web development                            
                            </h5>
                            <div>Webアプリ</div>
                            <ul>
                                <li>自主制作</li>
                                <li class="zenmaru">VanillaJavaScriptで実装</li>
                                <li>制作日 2024年11月</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <!-- <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a> -->
                        <a class="work_button site_button" target="_blank" href="/site/241120_modal/index.html">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->
            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="webapp">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work07.png" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                Web development                            
                            </h5>
                            <div>Webアプリ</div>
                            <ul>
                                <li>自主制作</li>
                                <li class="zenmaru">VanillaJavaScriptで実装</li>
                                <li>制作日 2024年11月</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <!-- <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a> -->
                        <a class="work_button site_button" target="_blank" href="/site/241116_seito_tabmenu/index.html">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->
            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="banner">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work08.jpg" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                Web design                            
                            </h5>
                            <div>バナー制作</div>
                            <ul>
                                <li>自主制作</li>
                                <li class="zenmaru">Illustratorで作成</li>
                                <li>制作日 2024年9月</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <!-- <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a> -->
                        <!-- <a class="work_button site_button">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a> -->
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->
            
            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="webapp">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work09.png" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                Web development                            
                            </h5>
                            <div>Webアプリ</div>
                            <ul>
                                <li>タイピングアプリ</li>
                                <li class="zenmaru">JavaScript</li>
                                <li>制作日 2024年9月</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <!-- <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a> -->
                        <a class="work_button site_button" target="_blank" href="/site/240914_WebGod_typingGame/index.html">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->
            
            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="webapp">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work10.png" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                Web development                            
                            </h5>
                            <div>Webアプリ</div>
                            <ul>
                                <li>スライダー</li>
                                <li class="zenmaru">JavaScript</li>
                                <li>制作日 2024年9月</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <!-- <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a> -->
                        <a class="work_button site_button" target="_blank" href="/site/240913_frontendch_slider/index.html">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->
            
            <!-- ここから１サイト紹介始まり -->
            <div class="work_link_wrapper" data-category="webapp">
                <div class="link_flex">
                    <div class="work_wrapper">
                        <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work11.png" alt="制作内容のイメージ画像">
                        <div class="work_box">
                            <h5 class="work_title">
                                Web development                            
                            </h5>
                            <div>Webアプリ</div>
                            <ul>
                                <li>天気予報</li>
                                <li class="zenmaru">JavaScript</li>
                                <li>制作日 2024年8月</li>
                            </ul>
                        </div>
                    </div>
                    <div class="button_wrapper">
                        <!-- <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a> -->
                        <a class="work_button site_button" target="_blank" href="/site/240826_Ajax_weather/index.html">
                            <div class="button_flex">
                                <span>TO SITe</span>
                                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり -->

            <div class="center_wrapper center_wrapper02">
                <button class="continuation_button02" id="btnContinuation02">
                    <span>つづきを見る</span>
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon03.png" alt="下へのボタン">
                </button>
            </div>

            <div class="works_wrapper" id="workBox">
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden work_link_wrapper02" data-category="webapp">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work12.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webアプリ</div>
                                <ul>
                                    <li>3問クイズ</li>
                                    <li class="zenmaru">JavaScript</li>
                                    <li>制作日 2024年8月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/240808_seito_app/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="webapp">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work13.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webアプリ</div>
                                <ul>
                                    <li>カレンダー</li>
                                    <li class="zenmaru">JavaScript</li>
                                    <li>制作日 2024年6月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/240626_calender/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="webapp">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work14.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webアプリ</div>
                                <ul>
                                    <li>ボケモン図鑑</li>
                                    <li class="zenmaru">JavaScript</li>
                                    <li>制作日 2023年6月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/230621 _pokemon/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="website">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work15.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webサイト</div>
                                <ul>
                                    <li>自主制作</li>
                                    <li class="zenmaru">JavaScript</li>
                                    <li>制作日 2023年6月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/230602_blog/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="webapp">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work16.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webアプリ</div>
                                <ul>
                                    <li>文字数カウント</li>
                                    <li class="zenmaru">JavaScript</li>
                                    <li>制作日 2023年6月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/230601_count/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="webapp">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work17.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webアプリ</div>
                                <ul>
                                    <li>ローディング</li>
                                    <li class="zenmaru">JavaScript</li>
                                    <li>制作日 2023年5月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/230502_mana_loading/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="webapp">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work18.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webアプリ</div>
                                <ul>
                                    <li>ダークモード変換</li>
                                    <li class="zenmaru">JavaScript</li>
                                    <li>制作日 2023年4月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/230411_darkmode/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="website">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work19.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webサイト</div>
                                <ul>
                                    <li>自主学習</li>
                                    <li>個人活動</li>
                                    <li>制作日 2023年1月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/230111_Training/Fluid_image.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="website">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work20.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webサイト</div>
                                <ul>
                                    <li>自主学習</li>
                                    <li>個人活動</li>
                                    <li>制作日 2022年12月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/221229_hamburger_menu/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="website">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work21.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webサイト</div>
                                <ul>
                                    <li>自主学習</li>
                                    <li>個人活動</li>
                                    <li>制作日 2022年12月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank"  href="/site/221221_nyuumon/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="website">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work22.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webサイト</div>
                                <ul>
                                    <li>自主学習</li>
                                    <li>個人活動</li>
                                    <li>制作日 2022年12月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/221117_iSARA/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="website">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work23.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webサイト</div>
                                <ul>
                                    <li>自主学習</li>
                                    <li>個人活動</li>
                                    <li>制作日 2022年12月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/221215_WCBCafe/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="website">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work24.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webサイト</div>
                                <ul>
                                    <li>自主学習</li>
                                    <li>個人活動</li>
                                    <li>制作日 2022年11月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/221110_ayumi_makitown/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="website">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work25.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webサイト</div>
                                <ul>
                                    <li>自主学習</li>
                                    <li>個人活動</li>
                                    <li>制作日 2022年11月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/221109_PHOTO_BOOK/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="website">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work26.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webサイト</div>
                                <ul>
                                    <li>自主学習</li>
                                    <li>個人活動</li>
                                    <li>制作日 2022年11月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/221107_ayumi2/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="website">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work27.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webサイト</div>
                                <ul>
                                    <li>自主学習</li>
                                    <li>個人活動</li>
                                    <li>制作日 2022年11月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/221104_ayumi1/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="website">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work28.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webサイト</div>
                                <ul>
                                    <li>自主学習</li>
                                    <li>個人活動</li>
                                    <li>制作日 2022年11月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/221101_ayumi/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper hidden" data-category="website">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work29.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webサイト</div>
                                <ul>
                                    <li>自主学習</li>
                                    <li>個人活動</li>
                                    <li>制作日 2022年10月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/221031_website_seto/">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ここまで１サイト紹介終わり -->
                
                <!-- ここから１サイト紹介始まり -->
                <div class="work_link_wrapper last_wrapper hidden" data-category="website">
                    <div class="link_flex">
                        <div class="work_wrapper">
                            <img class="work_image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work30.png" alt="制作内容のイメージ画像">
                            <div class="work_box">
                                <h5 class="work_title">
                                    Web development                            
                                </h5>
                                <div>Webサイト</div>
                                <ul>
                                    <li>自主学習</li>
                                    <li>個人活動</li>
                                    <li>制作日 2022年10月</li>
                                </ul>
                            </div>
                        </div>
                        <div class="button_wrapper">
                            <!-- <a class="work_button detail_button" href="http://">
                                <div class="button_flex">
                                    <span>detail</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a> -->
                            <a class="work_button site_button" target="_blank" href="/site/221031_wagasi/index.html">
                                <div class="button_flex">
                                    <span>TO SITe</span>
                                    <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon02.png" alt="リンクのアイコン"></span>
                                </div>
                                <div class="border"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ここまで１サイト紹介終わり --> 
        </section>
        <section class="about_me" id="about">
            <h3 class="section_title">about me  <span>わたしについて</span></h3>

            <div class="image_flex">

                <div class="about_image_box">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/karasawa.JPG" alt="">
                </div>
                <div class="about_text_box">
                    <h5 class="about_title">
                        PROFILE
                    </h5>
                    <p>自然の瞬間を捉える写真撮影の趣味を持ち、HTMLとCSSでデザインカンプ通りのサイト構築に取り組むWebクリエイター。JavaScriptとWordPressのスキルアップに意欲的で、日々技術向上に励んでいます。</p>
                    <!-- <p>
                        私は1977年に大阪府八尾市で生まれ、東海美容学校を卒業後、美容師としてキャリアを積み美容師として働く中で、人の美しさを引き出す喜びを感じる一方で、以前から興味を持っていたクリエイティブな業界への挑戦を強く意識するようになり
                        思い切って新しい分野への転職を決意し、現在は就労継続支援の企業で働いています。
                    </p>
                    <p>
                        現在、HTMLとCSSを使ったWeb制作に携わり、特にデザインカンプ通りに忠実なサイトを構築していくことがとても楽しく出来上がると達成感と嬉しさでいっぱいになります。
                    </p>
                    <p>
                        同時に常に成長を目指しJavaScriptやWordPress（PHP）の技術習得にも意欲的に取り組んでいます。
                    </p>
                    <p>
                        また、サブリーダーとしてプロジェクトの進行管理やメンバーひとりひとりとのコミュニケーションを大切にし、チーム全体の士気を高めながら業務効率化にも取り組んできた経験があります。
                    </p>
                    <p>
                        iPhoneでの写真撮影が趣味で、特に自然や日常の風景を捉えることが好きです。光や影の変化、瞬間の美しさを見つけて写真に収めることで、日々の中にある特別な瞬間を残すことに楽しみを感じています。
                    </p> -->
                    <h5 class="web_site_title">
                        運営サイト
                    </h5>
                    <table class="site_table">
                        <tr>
                            <th>
                                <a href="https://our-sle.info/">私たちのSLE</a>
                            </th>
                            <td>
                                <a href="https://our-sle.info/">https://our-sle.info </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                当サイト：ポートフォリオサイト
                            </th>
                            <td>
                                https://happy-smile-design.info/
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- <a href="about.html">詳しくはこちら<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon01.png"></a> -->
        </section>

        <?php if( $mode == 'input') { ?>
            <!-- 入力画面  POSTではない（GETということ）　-->
            <section class="contact" id="contact">
            <h3 class="section_title">contact  <span>お問い合わせ</span></h3>
            <p>ご依頼・ご相談や、ホームページのご感想などお気軽にお問い合わせくださいませ。<br>※は必須項目になります</p>
            <?php
                if( $errmessage ){
                    echo '<div style="color:red;">';
                    echo implode('<br>', $errmessage );
                    echo '</div>';
                }
            ?>
            <form action="./index.php" method="post">  <!-- actionは次のファイル名　methodは情報が入っているのでpost -->
                <table class="contact_table">
                    <tr>
                        <th>※お名前</th>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <th>※メールアドレス</th>
                        <td>
                            <input type="email" name="" id="">
                        </td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>
                            <input type="tel" name="" id="">
                        </td>
                    </tr>
                    <tr>
                        <th>※お問い合わせ内容</th>
                        <td>
                            <textarea name="" id=""></textarea>
                        </td>
                    </tr>
                </table>
                <!-- <div class="checkbox_box">
                    <input type="checkbox" id="check"><label for="check"><a href="privacy.html">個人情報保護方針</a>に同意する</label>
                </div> -->
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
                        class="check"
                    >
                    <label for="agreement" class="agreement">
                        上記のプライバシーポリシーに同意します
                    </label>
                </div>
                <button
                    name="confirm"
                    type="submit"
                    class="contact_button"    
                >送信する</button>                
                
                <div class="send_text">
                    お問い合わせのご返信は2日以内(土日祝日以外)を心がけております。お客様のご利用環境、また迷惑メール対策等の設定により、お返事が届かない場合があります。5日経過しても返信のない場合、大変お手数をおかけしますが再度お送りいただくよう、お願い申し上げます。
                </div> 
            </form>    
        
            <?php } else if ( $mode == 'confirm') { ?>
            <!-- 確認画面 -->
                
                <form action="./index.php" method="post" class="confirm_form">
                    <h3 class="confirm_title">
                        入力の確認の上、送信を押してください。
                    </h3>
                    <table class="confirm_table">
                        <tr>
                            <th>名前  </th>
                            <td><?php echo $_SESSION['fullname'] ?></td>
                        </tr>
                        <tr>
                            <th>Eメール </th>
                            <td><?php echo $_SESSION['email'] ?></td>
                        </tr>
                        <tr>
                            <th cols="2">お問い合わせ内容</th>
                        </tr>
                        <tr>
                            <td colspan="2"><?php echo nl2br($_SESSION['message']) ?></td> <!-- nl2brは改行が入っているので改行マークに変換するための関数 -->
                        </tr>
                    </table>
                    <div class="button_wrapper">
                        <input type="submit" name="back" class="back to_about_me_button" value="戻る" />
                        <input type="submit" name="send" class="send to_about_me_button" value="送信" />
                        <!-- 戻る、送信、どっちもPOSTにする -->
                    </div>               
                </form>

                <?php } else { ?>  <!-- 完了画面 -->
                    <h3 class="completion_title">
                    送信しました。ありがとうございました。
                    </h3>
                    <p class="completion_text">
                        お問い合わせのご返信は2日以内を心がけております。(土日祝日以外)お客様のご利用環境、また迷惑メール対策等の設定により、お返事が届かない場合があります。5日経過しても返信のない場合、大変お手数をおかけしますが再度お送りいただくよう、お願い申し上げます。
                    </p>
                    <a href="./index.php" class="to_top to_about_me_button">TOPへ戻る</a>
                <?php } ?>
        </section>
    </main>
<?php get_footer(); ?>   