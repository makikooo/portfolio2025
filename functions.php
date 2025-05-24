<?php
function add_files() {
    wp_enqueue_script( 'common_script', get_template_directory_uri().'/assets/js/main.js', array());

    wp_enqueue_style( 'reset-style', get_theme_file_uri( '/assets/css/reset.css' ),array(), '1.0.0');
    wp_enqueue_style( 'common-style', get_theme_file_uri( '/assets/css/common.css' ),array(), '1.0.0');
    wp_enqueue_style( 'main-style', get_theme_file_uri( '/assets/css/style.css' ),array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'add_files');


