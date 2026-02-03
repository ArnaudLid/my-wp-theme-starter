<?php
/**
 * Vite Assets Management
 */

function get_vite_asset_url($entry) {
    $dist_path = get_template_directory() . '/assets/dist';
    $manifest_path = $dist_path . '/.vite/manifest.json';

    // Mode développement
    if (defined('WP_DEBUG') && WP_DEBUG && !file_exists($manifest_path)) {
        return 'http://localhost:3000/assets/src/' . $entry;
    }

    // Mode production
    if (!file_exists($manifest_path)) {
        return '';
    }

    $manifest = json_decode(file_get_contents($manifest_path), true);

    if (isset($manifest[$entry]['file'])) {
        return get_template_directory_uri() . '/assets/dist/' . $manifest[$entry]['file'];
    }

    return '';
}

function is_vite_dev_mode() {
    return defined('WP_DEBUG') && WP_DEBUG &&
        @file_get_contents('http://localhost:3000') !== false;
}

function enqueue_vite_assets() {
    $is_dev = is_vite_dev_mode();

    if ($is_dev) {
        // Mode développement - Vite HMR
        wp_enqueue_script(
            'vite-client',
            'http://localhost:3000/@vite/client',
            array(),
            null,
            false
        );
        wp_script_add_data('vite-client', 'type', 'module');

        wp_enqueue_script(
            'vite-main',
            'http://localhost:3000/assets/src/js/main.js',
            array('vite-client'),
            null,
            true
        );
        wp_script_add_data('vite-main', 'type', 'module');

    } else {
        // Mode production
        $main_css = get_vite_asset_url('assets/src/scss/main.scss');
        if ($main_css) {
            wp_enqueue_style(
                'theme-styles',
                $main_css,
                array(),
                null
            );
        }

        $main_js = get_vite_asset_url('assets/src/js/main.js');
        if ($main_js) {
            wp_enqueue_script(
                'theme-scripts',
                $main_js,
                array(),
                null,
                true
            );
            wp_script_add_data('theme-scripts', 'type', 'module');
        }
    }

    // Localisation WordPress
    wp_localize_script(
        $is_dev ? 'vite-main' : 'theme-scripts',
        'themeData',
        array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('theme-nonce'),
            'homeUrl' => home_url(),
        )
    );
}
add_action('wp_enqueue_scripts', 'enqueue_vite_assets');
