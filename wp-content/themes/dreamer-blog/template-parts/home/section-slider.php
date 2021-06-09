<?php
/**
 * Template part for displaying full container blog section in homepage
 */

$dreamer_blog_cat_id = intval( get_theme_mod( 'dreamer_slider_section_category_setting', 1 ) );

    $dreamer_blog_block_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  3,
        'cat'               =>  $dreamer_blog_cat_id,
        'order'             =>  'DESC',
    );
    $dreamer_blog_block_item  = new WP_Query( $dreamer_blog_block_args );
?>
<div class="container ct-slider clearfix" id="content" data-play-duration="5000" data-dots="true" autoplay="true">
    <?php
        if ( $dreamer_blog_block_item->have_posts() ) :
            while ( $dreamer_blog_block_item->have_posts() ) : $dreamer_blog_block_item->the_post();

    ?>
        <div class="ct-slide clearfix">
            <div class="ct-col-left">
                <a href="<?php the_permalink(); ?>"><h1 class="ct-title"><?php the_title(); ?></h1></a>
                <?php the_excerpt(); ?>
                <div class="entry-meta post-meta clearfix">
                        <?php dreamer_blog_the_category_colors(); ?>
                    <span class="ct-read-time"><?php echo esc_html( get_the_date() ); ?></span>
                </div><!-- .entry-meta .post-meta -->
            </div><!-- .ct-col-left -->
            <div class="ct-col-right">
                <div class="slider-featured-image">
                    <?php
                        if ( has_post_thumbnail() ):
                            the_post_thumbnail( 'dreamer-blog-400-5x4' );
                        endif;
                    ?>

                </div>
            </div><!-- .ct-col-right -->
        </div><!-- .ct-slide -->
    <?php
        endwhile;

        else :
            get_template_part( 'template-parts/post/content', 'none' );
        endif;

        wp_reset_postdata();
    ?>
</div><!-- .ct-slider -->
