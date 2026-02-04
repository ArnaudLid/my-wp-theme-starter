<?php
/**
 * Enqueue des styles et scripts
 */
function theme_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');

    // CSS
    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/assets/dist/css/style.css',
        array(),
        $theme_version
    );

    // JavaScript
    wp_enqueue_script(
        'theme-script',
        get_template_directory_uri() . '/assets/dist/js/main.js',
        array(),
        $theme_version,
        true
    );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');
