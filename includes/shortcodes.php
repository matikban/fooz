<!-- Genres of book -->
<?php function fooz_book_genres_shortcode() {
    // if ( ! is_singular( 'books' ) ) {
    //     return ''; 
    // }

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