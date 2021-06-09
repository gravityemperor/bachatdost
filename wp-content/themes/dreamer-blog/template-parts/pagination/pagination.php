<?php
    /**
     * Pagination for blog.
     */

    global $wp_query;
    $dreamer_blog = 999999999; // need an unlikely integer

    if ( $wp_query->max_num_pages <= 1 ) {
        return;
    }
?>
    <div class="navigation pagination" role="navigation">

        <div class="nav-links left">
            <?php
                the_posts_pagination( array(
                    'base' => str_replace( $dreamer_blog, '%#%', esc_url(get_pagenum_link( $dreamer_blog ) ) ),
                    'format' => '?paged=%#%',
                    'add_args' => false,
                    'current' => max( 1, get_query_var( 'paged' ) ),
                    'total' => $wp_query->max_num_pages,
                    'mid_size' => 4,
                    'prev_text' => esc_html__( 'Prev', 'dreamer-blog' ),
                    'next_text' => esc_html__( 'Next', 'dreamer-blog' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'dreamer-blog' ) . ' </span>',
                    'prev_text' => esc_html__( 'Prev', 'dreamer-blog' ),
                    'next_text' => esc_html__( 'Next', 'dreamer-blog' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'dreamer-blog' ) . ' </span>',
                ) );
            ?>
        </div>
    </div>
