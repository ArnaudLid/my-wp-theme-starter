<?php


/**
 * Template functions and definitions
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$template_includes = [
    '/acf.php',                                                     // ACF configuration
    '/config.php',                                                  // Configuration
    '/cpt.php',                                                     // CPT configuration
    '/enqueue.php',                                                 // Scripts & Styles
];

foreach ($template_includes as $file) {
    require_once get_template_directory() . '/inc' . $file;
}



