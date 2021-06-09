<?php
/**
 * Pagination for blog.
 */

global $wp_query;
$calm_blog_blog = 999999999; // need an unlikely integer

if ( $wp_query->max_num_pages <= 1 ) {
    return;
}
?>
<div class="nav-links">
    <?php
        the_posts_pagination( array(
            'base' => str_replace( $calm_blog_blog, '%#%', esc_url(get_pagenum_link( $calm_blog_blog ) ) ),
            'format' => '?paged=%#%',
            'add_args' => false,
            'current' => max( 1, get_query_var( 'paged' ) ),
            'total' => $wp_query->max_num_pages,
            'mid_size' => 4,
            'prev_text' => esc_html__( 'Prev', 'calm-blog' ),
            'next_text' => esc_html__( 'Next', 'calm-blog' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'calm-blog' ) . ' </span>',
            'prev_text' => esc_html__( 'Prev', 'calm-blog' ),
            'next_text' => esc_html__( 'Next', 'calm-blog' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'calm-blog' ) . ' </span>',
        ) );
    ?>
</div>
