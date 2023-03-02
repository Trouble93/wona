<?php
function child_theme_custom_styles()
{
    wp_enqueue_script('child-script', get_stylesheet_directory_uri() . '/assets/js/script.js', ['jquery'], time(), true);
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/dest/app.css');
    wp_enqueue_style('owl-style', get_stylesheet_directory_uri() . '/assets/owl-carousel/owl.carousel.min.css');
    wp_enqueue_style('owl-style-def', get_stylesheet_directory_uri() . '/assets/owl-carousel/owl.theme.default.min.css');
    wp_enqueue_script('owl-script', get_stylesheet_directory_uri() . '/assets/owl-carousel/owl.carousel.min.js', [], time(), true);
}

add_action('wp_enqueue_scripts', 'child_theme_custom_styles');
function init_menu()
{
    register_nav_menu('init_menu', __('Header Menu'));
}

add_action('init', 'init_menu');