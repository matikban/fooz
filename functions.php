<?php
require_once get_stylesheet_directory() . '/includes/custom-post-types.php';
require_once get_stylesheet_directory() . '/includes/shortcodes.php';


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


function limit_book_genre_archive_to_five( $query ) {
	if ( $query->is_main_query() && ! is_admin() && is_tax( 'book-genre' ) ) {
		$query->set( 'posts_per_page', 5 );
	}
}
add_action( 'pre_get_posts', 'limit_book_genre_archive_to_five' );
