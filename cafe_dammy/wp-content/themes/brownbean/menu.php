<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>珈琲館ぶらうんびーん</title>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
        <script src="./js/script.js" defer></script>
        <link
            rel="stylesheet"
            href="https://unpkg.com/ress/dist/ress.min.css"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Kaisei+Tokumin:wght@400;500;700;800&family=Lobster&family=Noto+Sans+JP&display=swap"
            rel="stylesheet"
        />
        <link
            href="https://unpkg.com/aos@2.3.1/dist/aos.css"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="./css/menu.css" />
    </head>
    <body>
        <header id="top_element">
            <!-- navバー -->
            <nav>
                <div class="left_nav_contents">
                    <a href="index.html#top_element">
                        <img
                            class="nav_bar_logo"
                            src="img/brownbean_title_logo.png"
                            alt="タイトルロゴ"
                        />
                        <div class="title_and_since">
                            <h1>珈琲館 ぶらうんびーん</h1>
                            <p>SINCE 2014 OSAKA</p>
                        </div>
                    </a>
                </div>
                <div class="right_nav_contents">
                    <ul>
                        <li>
                            <a href="index.html#commitment">当店のこだわり</a>
                        </li>
                        <li class="line"></li>
                        <li>
                            <a href="#general_menu">MENU</a>
                        </li>
                        <li class="line"></li>
                        <li>
                            <a href="index.html#shop_info_and_access"
                                >アクセス・店舗情報</a
                            >
                        </li>
                        <li class="line"></li>
                        <li class="sns">
                            <a href="">
                                <img src="img/mdi_instagram.svg" alt="" />
                            </a>
                            <a href="">
                                <img src="img/ri_facebook-fill.svg" alt="" />
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- モーニングセットの画像 -->
        <div class="morning_set_img">
            <img src="img/morning_set.png" alt="" />
        </div>

        <main>
            <!-- トップへ戻るボタン -->
            <button id="scrollTopBtn" style="display: block">
                <img src="img/back_to_top_button.svg" alt="" />
            </button>

            <!-- メニューの紹介 -->
            <section class="morning_set_menu wrapper">
                <div id="general_menu" class="item_signage">
                    <img src="img/Item signage.png" alt="" />
                    <h2>MENU</h2>
                </div>
                <div class="background">
                    <p>※価格はすべて税込みの価格となっております。</p>
                    <!-- 各メニューのリンク -->
                    <div class="menu_link">
                        <a href="#morning_menu"
                            ><p>MORNING SET<br />モーニング セット</p>
                            <img
                                class="arrow_down_small"
                                src="img/arrow_down_small.png"
                                alt=""
                        /></a>
                        <a href="#gr_menu"
                            ><p>FOOD<br />フード</p>
                            <img
                                class="arrow_down_small"
                                src="img/arrow_down_small.png"
                                alt=""
                        /></a>
                        <a href="#cfe_menu"
                            ><p>COFFE・TEA<br />コーヒー・紅茶</p>
                            <img
                                class="arrow_down_small"
                                src="img/arrow_down_small.png"
                                alt=""
                        /></a>
                        <a href="#dst_menu"
                            ><p>DESSERT<br />デザート</p>
                            <img
                                class="arrow_down_small"
                                src="img/arrow_down_small.png"
                                alt=""
                        /></a>
                    </div>
                    <!-- モーニングメニュータイトル -->
                    <div id="morning_menu" class="title_and_desc">
                        <div class="titles">
                            <div class="title">
                                <div class="vertical_bar"></div>
                                <div class="title_name_and_time">
                                    <p class="desc_1">
                                        MORNING<span> - モーニングセット</span>
                                    </p>
                                    <p class="desc_2">
                                        [ 月～金 ]&nbsp;&nbsp;&nbsp;&nbsp;8：00
                                        ～10：30<br />[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;土&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;
                                        8：00 ～10：30
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- 説明 -->
                        <div class="description">
                            <p class="desc_1">
                                ご希望の場合はトーストに、<br />
                                シナモン or
                                ココアパウダーもお付けいたします。<br />
                                芳醇なコーヒーの香りと共に朝食を<br />
                                お楽しみ下さい。
                            </p>
                        </div>
                    </div>
                    <!-- Aセット -->
                    <div class="morning_set_wrapper">
                        <div class="title_and_price">
                            <div class="title">
                                <div class="vertical_bar"></div>
                                <div class="title_name_and_time">
                                    <p class="desc_1">A SET- エーセット</p>
                                </div>
                            </div>
                            <p class="price">450円</p>
                        </div>
                        <div class="morning_set_img_and_desc">
                            <div class="morning_set">
                                <img src="img/morning_set_a.png" alt="" />
                            </div>
                            <p class="set_contents">
                                ● ハーフトースト<br />
                                ● ゆで玉子<br />● コーヒー or 紅茶
                            </p>
                        </div>
                    </div>
                    <div class="morning_set_wrapper second">
                        <div class="title_and_price">
                            <div class="title">
                                <div class="vertical_bar"></div>
                                <div class="title_name_and_time">
                                    <p class="desc_1">B SET- ビーセット</p>
                                </div>
                            </div>
                            <p class="price">550円</p>
                        </div>
                        <div class="morning_set_img_and_desc">
                            <div class="morning_set">
                                <img src="img/morning_set_b.png" alt="" />
                            </div>
                            <p class="set_contents">
                                ● ハーフトースト<br />● ココット（洋風
                                茶わん蒸し）<br />● ヨーグルト<br />● コーヒー
                                or 紅茶
                            </p>
                        </div>
                    </div>

                    <div class="morning_other_menu">
                        <div class="title">
                            <div class="vertical_bar"></div>
                            <p class="title_name">モーニングその他</p>
                        </div>
                        <div class="ohter_menus">
                            <div class="other_menu">
                                <p class="name">トースト</p>
                                <p class="price">200円</p>
                            </div>
                            <div class="other_menu">
                                <p class="name">チーズトースト</p>
                                <p class="price">250円</p>
                            </div>
                            <div class="other_menu">
                                <p class="name">ピザトースト</p>
                                <p class="price">300円</p>
                            </div>
                            <div class="other_menu">
                                <p class="name">ホットサンド</p>
                                <p class="price">400円</p>
                            </div>
                            <div class="other_menu">
                                <p class="name">あったかミニ野菜スープ</p>
                                <p class="price">100円</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- オムレツ写真 -->
            <div class="omelette_img">
                <img src="img/translucent_omelette.png" alt="" />
            </div>

            <!-- グランドメニュー -->
            <section class="grand_menu wrapper">
                <div class="background">
                    <div id="gr_menu" class="title_and_desc">
                        <div class="titles">
                            <div class="title">
                                <div class="vertical_bar"></div>
                                <div class="title_name_and_time">
                                    <p class="desc_1">
                                        GRAND MENU
                                        <span> - グランドメニュー</span>
                                    </p>
                                    <p class="desc_2">
                                        [ 月～金 ]&nbsp;&nbsp;&nbsp;&nbsp;8：00
                                        ～10：30<br />[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;土&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;
                                        8：00 ～10：30
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- 説明 -->
                        <div class="description">
                            <p class="desc_1">
                                オムライスやカレー、ドリアなど、<br />
                                人気のランチメニューを提供しています。<br />
                                特に人気なのはオムカレーで当店名物の<br />
                                カレーとオムライスが一度に味わえます。<br />
                            </p>
                        </div>
                    </div>
                    <!-- オムライス -->
                    <div class="kind_of_menus">
                        <div class="title_wrapper">
                            <div class="vertical_bar"></div>
                            <h2 class="title">
                                OMELETTE RICE <span> - オムライス</span>
                            </h2>
                        </div>
                        <div class="omelettes_wrapper">
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/omelettes_1.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        ふわとろオムライス<br />600円（セット850円）
                                    </p>
                                </div>
                            </div>
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/omelettes_2.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        ふわトロオムカレー<br />
                                        650円（セット900円）
                                    </p>
                                </div>
                            </div>
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/omelettes_3.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        オムライス<span
                                            >（デミグラス or
                                            ホワイトソース）</span
                                        ><br />700円（セット950円）
                                    </p>
                                </div>
                            </div>
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/omelettes_4.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        スープオムライス ><br />650円（セット900円）
                                    </p>
                                </div>
                            </div>
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/omelettes_5.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        和風オムライス ><br />650円（セット900円）
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- カレー -->
                    <div class="kind_of_menus">
                        <div class="title_wrapper">
                            <div class="vertical_bar"></div>
                            <h2 class="title">CURRY<span> - カレー</span></h2>
                        </div>
                        <div class="omelettes_wrapper">
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/curry.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        旬野菜カレー<br />600円（セット850円）
                                    </p>
                                </div>
                            </div>
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/curry.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        シンプルカレー<br />
                                        550円（セット800円）
                                    </p>
                                </div>
                            </div>
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/curry.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        B・Bカレー ><br />650円（セット900円）
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 丼 -->
                    <div class="kind_of_menus">
                        <div class="title_wrapper">
                            <div class="vertical_bar"></div>
                            <h2 class="title">BOWL<span> - 丼</span></h2>
                        </div>
                        <div class="omelettes_wrapper">
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/bowl_1.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        豚バラ炙り焼き丼<span
                                            >（スープ付き）</span
                                        ><br />600円（セット850円）
                                    </p>
                                </div>
                            </div>
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/bowl_2.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        ドリア<span
                                            >（ホワイトソース・焼きカレー）</span
                                        ><br />
                                        550円（セット800円）
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex_wrapper">
                        <!-- パスタ -->
                        <div class="kind_of_menus">
                            <div class="title_wrapper">
                                <div class="vertical_bar"></div>
                                <h2 class="title">
                                    PASTA<span> - パスタ</span>
                                </h2>
                            </div>
                            <div class="omelettes_wrapper">
                                <div class="food_img_and_desc">
                                    <div class="image">
                                        <img src="img/pasta_1.png" alt="" />
                                    </div>
                                    <div class="desc">
                                        <p>
                                            <span class="small"
                                                >カレー・ミート・明太子・カルボナーラ</span
                                            ><br />600円（セット850円）
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- スープ -->
                        <div class="kind_of_menus">
                            <div class="title_wrapper">
                                <div class="vertical_bar"></div>
                                <h2 class="title">
                                    SOUP <span>- スープ</span>
                                </h2>
                            </div>
                            <div class="omelettes_wrapper">
                                <div class="food_img_and_desc">
                                    <div class="image">
                                        <img src="img/soup.png" alt="" />
                                    </div>
                                    <div class="desc">
                                        <p>
                                            <span class="small"
                                                >あったか野菜スープ</span
                                            ><span>
                                                (コンソメしみこみ野菜) </span
                                            ><br />600円（セット850円）
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- コーヒー写真 -->
            <div class="coffee_background">
                <img src="img/coffee_background.png" alt="" />
            </div>

            <!-- コーヒー・紅茶 -->
            <section class="coffee_menu wrapper">
                <div class="background">
                    <div id="cfe_menu" class="title_and_desc">
                        <div class="titles">
                            <div class="title">
                                <div class="vertical_bar"></div>
                                <div class="title_name_and_time">
                                    <p class="desc_1">
                                        COFFE・TEA <br />
                                        <span>コーヒー・紅茶</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- 説明 -->
                        <div class="description">
                            <p class="desc_1">
                                ごだわりの100%オーガニックコーヒーの<br />
                                芳醇な香りを是非、お楽しみ下さい。
                            </p>
                        </div>
                    </div>
                    <div class="drink_menu_wrapper">
                        <div class="menu">
                            <div class="title">
                                <div class="vertical_bar"></div>
                                <p class="title_name">COFFEE</p>
                            </div>
                            <div class="ohter_menus">
                                <div class="other_menu">
                                    <p class="name">ブレンド</p>
                                    <p class="price">450円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">オーガニックエクセル</p>
                                    <p class="price">500円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">アイスコーヒー</p>
                                    <p class="price">450円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">アメリカン</p>
                                    <p class="price">450円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">
                                        カフェオレ（ホット・アイス）
                                    </p>
                                    <p class="price">500円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">ウインナーコーヒー</p>
                                    <p class="price">550円</p>
                                </div>
                            </div>
                        </div>
                        <div class="menu">
                            <div class="title">
                                <div class="vertical_bar"></div>
                                <p class="title_name">TEA</p>
                            </div>
                            <div class="ohter_menus">
                                <div class="other_menu">
                                    <p class="name">オーガニックダージリン</p>
                                    <p class="price">500円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">オーガニックアールグレイ</p>
                                    <p class="price">500円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">ピーチ</p>
                                    <p class="price">550円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">シンフォニー</p>
                                    <p class="price">650円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">アイスティー</p>
                                    <p class="price">500円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">本日のハーブティー</p>
                                    <p class="price">550円</p>
                                </div>
                            </div>
                        </div>
                        <div class="menu">
                            <div class="title">
                                <div class="vertical_bar"></div>
                                <p class="title_name">OTHER</p>
                            </div>
                            <div class="ohter_menus">
                                <div class="other_menu">
                                    <p class="name">ミックスジュース</p>
                                    <p class="price">650円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">オレンジジュース</p>
                                    <p class="price">450円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">ココア（ホット・アイス）</p>
                                    <p class="price">550円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">ゆず茶（冬期のみ）</p>
                                    <p class="price">450円</p>
                                </div>
                                <div class="other_menu">
                                    <p class="name">バナナジュース</p>
                                    <p class="price">550円</p>
                                </div>
                            </div>
                        </div>
                        <div class="decoration_coffee_img">
                            <img src="img/coffee_2.png" alt="" />
                        </div>
                    </div>
                </div>
            </section>

            <!-- デザート写真 -->
            <div class="dessert_background">
                <img src="img/dessert.png" alt="" />
            </div>

            <!-- デザートメニュー -->
            <section class="dessert_menu wrapper">
                <div class="background">
                    <div id="dst_menu" class="title_and_desc">
                        <div class="titles">
                            <div class="title">
                                <div class="vertical_bar"></div>
                                <div class="title_name_and_time">
                                    <p class="desc_1">
                                        CAKE<span> - ケーキ</span>
                                    </p>
                                    <p class="desc_2">
                                        ※セットにはコーヒー or 紅茶が付きます。
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- 説明 -->
                        <div class="description">
                            <p class="desc_1">
                                当店自慢のスイーツもございます。<br />
                                食後の後のコーヒーのお供や、<br />
                                午後の昼下がりにスイーツと<br />
                                コーヒーのセットはいかがでしょうか。<br />
                            </p>
                        </div>
                    </div>
                    <!-- ケーキ -->
                    <div class="kind_of_menus">
                        <div class="omelettes_wrapper">
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/dessert_1.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        クレームブリュレ<br />350円　(セット
                                        650円)
                                    </p>
                                </div>
                            </div>
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/dessert_2.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        ショコラムース<span class="small"
                                            >（カカオバター31%）</span
                                        ><br />
                                        350円　(セット 650円)
                                    </p>
                                </div>
                            </div>
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/dessert_3.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        レアチーズケーキ<br />350円　(セット
                                        650円)
                                    </p>
                                </div>
                            </div>
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/dessert_4.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        ふわふわスフレロール<br />350円　(セット
                                        650円)
                                    </p>
                                </div>
                            </div>
                            <div class="food_img_and_desc">
                                <div class="image">
                                    <img src="img/dessert_5.png" alt="" />
                                </div>
                                <div class="desc">
                                    <p>
                                        紫いもタルト<br />500円　(セット 800円)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="menu_link">
                <a href="#morning_menu"
                    ><p>MORNING SET<br />モーニング セット</p>
                    <img
                        class="arrow_down_small"
                        src="img/arrow_down_small.png"
                        alt=""
                /></a>
                <a href="#gr_menu"
                    ><p>FOOD<br />フード</p>
                    <img
                        class="arrow_down_small"
                        src="img/arrow_down_small.png"
                        alt=""
                /></a>
                <a href="#cfe_menu"
                    ><p>COFFE・TEA<br />コーヒー・紅茶</p>
                    <img
                        class="arrow_down_small"
                        src="img/arrow_down_small.png"
                        alt=""
                /></a>
                <a href="#dst_menu"
                    ><p>DESSERT<br />デザート</p>
                    <img
                        class="arrow_down_small"
                        src="img/arrow_down_small.png"
                        alt=""
                /></a>
            </div>

            <div class="info_shop_below">
                <div class="shop_information">
                    <div class="shop_description">
                        <div class="logo_and_shop_title">
                            <div class="logo">
                                <img src="img/logo_big.png" alt="" />
                            </div>
                            <div class="shop_name">
                                <p class="main">珈琲館ぶらうんびーん</p>
                                <p class="sub">SINCE 2014 OSAKA</p>
                            </div>
                        </div>
                        <div class="flex_wrapper">
                            <div class="description_wrapper">
                                <div class="vertical_bar"></div>
                                <div class="descriptins">
                                    <div class="shop_name">
                                        <p>店舗名</p>
                                        <p>珈琲館ぶらうんびーん</p>
                                    </div>
                                    <div class="address">
                                        <p>住所</p>
                                        <p>
                                            大阪府大阪市中央区<br />
                                            常盤町1-1-7 岡田第2ビル 1F
                                        </p>
                                    </div>
                                    <div class="tel">
                                        <p>TEL</p>
                                        <p>06-6809-5561</p>
                                    </div>
                                    <div class="opening_hours">
                                        <p>営業時間</p>
                                        <p>
                                            平日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8:00～19:00&nbsp;&nbsp;(
                                            L.O. 19:00 )
                                            <br />
                                            土曜日&nbsp;&nbsp;8:00～16:00&nbsp;&nbsp;(
                                            L.O. 16:00 )
                                        </p>
                                    </div>
                                    <div class="closing_day">
                                        <p>定休日</p>
                                        <p>
                                            日曜日・祝日・年末年始（12/31～1/4）
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.902134447936!2d135.51358247574365!3d34.682419372926205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e72ffc427681%3A0x5c98cc971a693585!2z44G244KJ44GG44KT44Gz44O844KT!5e0!3m2!1sja!2sjp!4v1699900969059!5m2!1sja!2sjp"
                                width="600"
                                height="450"
                                style="border: 0"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="under_menu">
                <div class="under_nav_contents">
                    <ul>
                        <li>
                            <a href="index.html#commitment">当店のこだわり</a>
                        </li>
                        <li class="line"></li>
                        <li>
                            <a href="#general_menu">MENU</a>
                        </li>
                        <li class="line"></li>
                        <li>
                            <a href="index.html#shop_info_and_access"
                                >アクセス・店舗情報</a
                            >
                        </li>
                        <li class="line"></li>
                        <li class="sns">
                            <a href="#">
                                <img src="img/insta_brown.png" alt="" />
                            </a>
                            <a href="#">
                                <img src="img/facebook_brown.png" alt="" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
        <footer>
            <p>Copyright 珈琲館 ぶらうんびーん All Right Reserved.</p>
        </footer>
    </body>
</html>
