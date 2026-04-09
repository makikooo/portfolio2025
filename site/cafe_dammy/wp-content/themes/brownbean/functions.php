<?php
function add_files() {
  // sanitize.css
  wp_enqueue_style('reset-style', "https://unpkg.com/ress/dist/ress.min.css");
  wp_enqueue_style('aos-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
  wp_enqueue_style('theme-style', get_theme_file_uri('/assets/css/theme-style.css'));
  wp_enqueue_style('main-style', get_theme_file_uri('/assets/css/styles.css'));
  wp_enqueue_script('main-script', get_template_directory_uri().'/assets/js/script.js', array(), '1.0.0', true);
  wp_enqueue_script( 'luxy-script', get_template_directory_uri() . '/assets/js/luxy.js', array(), '1.0.0', true);
  wp_enqueue_script( 'aos-script', "https://unpkg.com/aos@2.3.1/dist/aos.js", array(), '1.0.0', true);
  wp_enqueue_script( 'aos-script', "https://unpkg.com/aos@2.3.1/dist/aos.js", array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'add_files');


function theme_setup() {
  // tilteタグ
  add_theme_support('title-tag');

  // ナビゲーションメニュー
  register_nav_menus(
    array(
      'main-menu' => 'メインメニュー',
    )
  );
}
add_action('after_setup_theme', 'theme_setup');

function haramitan_block_setup () {
  add_theme_support( 'wp-block-style' );
  add_theme_support( 'responsive-embeds' );
  
  //ダッシュボードの中の画像を幅広に 
  add_theme_support( 'align-wide' );
}
add_action('after_setup_theme', 'haramitan_block_setup');
