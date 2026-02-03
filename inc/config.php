<?php
/**
 * Default configuration
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Custom image sizes
function new_image_size() {
//    add_image_size();
}

add_action('after_setup_theme', 'new_image_size');


/**
 * Support thème
 */
function theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    register_nav_menus(array(
        'primary' => __('Menu Principal', 'mon-theme'),
        'footer' => __('Menu Footer', 'mon-theme'),
    ));
}
add_action('after_setup_theme', 'theme_setup');