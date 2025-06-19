<?php
require_once get_stylesheet_directory() . '/includes/custom-post-types.php';

function fooz_enqueue_assets() {
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_script(
        'fooz-scripts',
        get_stylesheet_directory_uri() . '/assets/js/scripts.js',
        array('jquery'),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'fooz_enqueue_assets');
