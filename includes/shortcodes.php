<?php 
// Genres of book
function fooz_book_genres_shortcode() {
    $genres = get_the_terms( get_the_ID(), 'book-genre' );

    ob_start();
    ?>
    <div class="book-genres">
        <strong><?php esc_html_e( 'Genres:', 'fooz' ); ?></strong>
        <?php
        if ( $genres && ! is_wp_error( $genres ) ) {
            $genre_links = array();
            foreach ( $genres as $genre ) {
                $genre_links[] = '<a href="' . esc_url( get_term_link( $genre ) ) . '">' . esc_html( $genre->name ) . '</a>';
            }
            echo implode( ', ', $genre_links );
        } else {
            esc_html_e( 'No genres assigned.', 'fooz' );
        }
        ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'book_genres', 'fooz_book_genres_shortcode' );

// The most recent book
function fooz_most_recent_book_title_shortcode() {
    $recent_book = get_posts( array(
        'post_type'      => 'books',
        'posts_per_page' => 1,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'fields'         => 'ids',
    ) );

    if ( ! empty( $recent_book ) ) {
        $post_id = $recent_book[0];
        $title = get_the_title( $post_id );
        $permalink = get_permalink( $post_id );
        return '<div class="recent-book-title"><a href="' . esc_url( $permalink ) . '">' . esc_html( $title ) . '</a></div>';
    }

    return '<div class="recent-book-title">No books found.</div>';
}
add_shortcode( 'most_recent_book_title', 'fooz_most_recent_book_title_shortcode' );


// Books by genre
function fooz_books_by_genre_shortcode($atts) {
    $atts = shortcode_atts(array(
        'term_id' => 0,
    ), $atts, 'books_by_genre');

    $term_id = intval($atts['term_id']);
    if (!$term_id) {
        return 'Invalid genre ID.';
    }

    $args = array(
        'post_type'      => 'books',
        'posts_per_page' => 5,
        'orderby'        => 'title',
        'order'          => 'ASC',
        'tax_query'      => array(
            array(
                'taxonomy' => 'book-genre',
                'field'    => 'term_id',
                'terms'    => $term_id,
            ),
        ),
    );

    $query = new WP_Query($args);

    ob_start();

    if (!$query->have_posts()) {
        echo 'No books found in this genre.';
    } else {
        ?>
        <ul class="books-by-genre">
        <?php
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <li><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></li>
            <?php
        }
        ?>
        </ul>
        <?php
        wp_reset_postdata();
    }

    return ob_get_clean();
}
add_shortcode('books_by_genre', 'fooz_books_by_genre_shortcode');
