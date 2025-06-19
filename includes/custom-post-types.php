<?php
function fooz_register_books_cpt_and_taxonomy() {
    register_post_type('books', array(
        'labels' => array(
            'name'          => __('Books', 'fooz'),
            'singular_name' => __('Book', 'fooz'),
            'add_new_item'  => __('Add New Book', 'fooz'),
            'edit_item'     => __('Edit Book', 'fooz'),
            'all_items'     => __('All Books', 'fooz'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'library'),
        'show_in_rest' => true,
        'supports'     => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-book'
    ));

    register_taxonomy('book-genre', array('books'), array(
        'labels' => array(
            'name'          => __('Genres', 'fooz'),
            'singular_name' => __('Genre', 'fooz'),
            'add_new_item'  => __('Add New Genre', 'fooz'),
            'edit_item'     => __('Edit Genre', 'fooz'),
            'all_items'     => __('All Genres', 'fooz'),
        ),
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'book-genre'),
    ));
}
add_action('init', 'fooz_register_books_cpt_and_taxonomy');
