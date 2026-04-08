<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="<?php bloginfo('description'); ?>">
      <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <body>
          <div class="hamburger_menu_mask"></div>
          <header id="top_element">
              <!-- navバー -->
              <!-- <?php
                wp_nav_menu(
                  array(
                    'theme_location' => 'main-menu',
                    'container' => '',
                    'container_class' => 'nav_pc_header',
                    'menu_class' => 'nav_list pc_only_nav',
                    'add_li_class' => 'nav_item', // liタグへclass追加
                    'add_a_class' => 'nav_link' // aタグへclass追加
                  )
                );
              ?> -->
              <nav>
                  <div class="left_nav_contents">
                      <a href="<?php echo esc_url(home_url('/')); ?>">
                          <img
                              class="nav_bar_logo"
                              src="<?php echo esc_url(get_theme_file_uri('assets/img/300x300.png')); ?>"
                              alt="タイトルロゴ"
                          />
                          <div class="title_and_since">
                              <h1>喫茶店ダミー</h1>
                              <p>SINCE 2014</p>
                          </div>
                      </a>
                  </div>
                  <div class="right_nav_contents">
                      <ul>
                          <li>
                              <a href="<?php echo esc_url(home_url('/#kodawari')); ?>">当店のこだわり</a>
                          </li>
                          <li class="line"></li>
                          <li>
                              <a href="<?php echo esc_url(home_url( '/menu' )); ?>">MENU</a>
                          </li>
                          <li class="line"></li>
                          <li>
                              <a href="<?php echo esc_url(home_url( '/#shop_info_and_access' )); ?>"
                                  >アクセス・店舗情報</a
                              >
                          </li>
                          <li class="line"></li>
                          <li class="sns">
                              <a href="https://www.instagram.com/">
                                  <img src="<?php echo esc_url(get_theme_file_uri('assets/img/mdi_instagram.svg')); ?>" alt="" />
                              </a>
                              <a href="">
                                  <img src="<?php echo esc_url(get_theme_file_uri('assets/img/ri_facebook-fill.svg')); ?>" alt="" />
                              </a>
                          </li>
                      </ul>
                      <!-- 低解像度用ハンバーガーメニュー -->
                      <div class="hamburger_menu_button">
                          <span class="line"></span>
                          <span class="line"></span>
                          <span class="line"></span>
                      </div>
                  </div>
              </nav>
          </header>

          <main>
              <!-- ハンバーガーメニュー -->
              <nav class="hamburger_menu">
                  <div class="hamburger_menu_wrapper">
                        <a class="nav_flex" href="<?php echo esc_url(home_url('/')); ?>">
                          <img
                              class="humbarger_logo"
                              src="<?php echo esc_url(get_theme_file_uri('assets/img/300x300.png')); ?>"
                              alt="タイトルロゴ"
                          />
                          <div class="title_and_since">
                              <h1>喫茶店ダミー</h1>
                              <p>SINCE 2014</p>
                          </div>
                      </a>
                        <a href="<?php echo esc_url(home_url('/')); ?>"
                          ><h2 class="nav_title">当店のこだわり</h2></a
                        >
                        <a href="<?php echo esc_url(home_url( '/menu' )); ?>"
                          ><h2 class="nav_title">MENU</h2></a
                        >
                        <a href="<?php echo esc_url(home_url( '/#shop_info_and_access' )); ?>"
                          ><h2 class="nav_title">アクセス・店舗情報</h2></a
                        >
                      
                        <a class="nav_sns_box" href="https://www.instagram.com/">
                            <img class="nav_sns" src="<?php echo esc_url(get_theme_file_uri('assets/img/mdi_instagram.svg')); ?>" alt="" />
                        </a>
                        <a href="">
                            <img class="nav_sns" src="<?php echo esc_url(get_theme_file_uri('assets/img/ri_facebook-fill.svg')); ?>" alt="" />
                        </a>
                  </div>
              </nav>

              <!-- トップへ戻るボタン -->
              <button id="scrollTopBtn" style="display: block">
                  <img src="<?php echo esc_url(get_theme_file_uri('assets/img/back_to_top_button.svg')); ?>" alt="" />
              </button>