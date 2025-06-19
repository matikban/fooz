<?php
add_action('wp_ajax_get_books', 'fooz_get_books_callback');
add_action('wp_ajax_nopriv_get_books', 'fooz_get_books_callback');

function fooz_get_books_callback() {
    $args = array(
        'post_type'      => 'books',
        'posts_per_page' => 20,
        'post_status'    => 'publish',
    );

    $query = new WP_Query($args);

    $books = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $genres = wp_get_post_terms(get_the_ID(), 'book-genre', array('fields' => 'names'));
            $genre_names = !empty($genres) ? implode(', ', $genres) : '';

            $books[] = array(
                'name'    => get_the_title(),
                'date'    => get_the_date('Y-m-d'),
                'genre'   => $genre_names,
                'excerpt' => get_the_excerpt(),
            );
        }
        wp_reset_postdata();
    }

    wp_send_json_success($books);
}
