<?php
function add_files() {
    wp_enqueue_style( 'reset-style', get_theme_file_uri( '/assets/css/reset.css' ));
    wp_enqueue_style( 'main-style', get_theme_file_uri( '/assets/css/style.css' ));
    wp_enqueue_script( 'main-script', get_theme_file_uri( '/assets/js/main.js' ));
}
add_action('wp_enqueue_scripts', 'add_files');
