<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>

<div class="col-md-4 col-sm-6 grid-item">
    <div class="ct-masonry">
        <div class="featured-image">
            <?php
                if ( has_post_thumbnail() ):
                    the_post_thumbnail( 'dreamer-blog-400-1x1' );
                endif;
            ?>
        </div><!-- .featured-image -->
        <div class="post-content">
            <div class="post-meta">
                <div class="ct-categories">
                    <?php dreamer_blog_the_category_colors(); ?>
                </div><!-- .ct-categories -->
            </div><!-- .post-meta -->
            <h2 class="ct-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="ct-excerpt-meta">
                <div class="author-info">
                    <div class="author-image"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"></a><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?></div>
                    <a href="#"><span class="author-name"><?php the_author(); ?></span></a>
                </div>
                <span class="ct-date-time"><?php echo esc_html( get_the_date() ); ?></span>
            </div>
            <?php the_excerpt(); ?>
            <div class="ct-read-more clearfix">
                <span class="read-more"><a href="<?php the_permalink(); ?>"><?php echo esc_html( 'Continue Reading', 'dreamer-blog' ) ?></a></span>
                <span class="no-comments"><a href="<?php the_permalink(); ?>"><span class="comment-number"><?php echo esc_html( get_comments_number() ); ?></span></a></span>
            </div><!-- .ct-ream-more -->
        </div><!-- .post-content -->
    </div>
</div><!-- .col-md-4 -->
