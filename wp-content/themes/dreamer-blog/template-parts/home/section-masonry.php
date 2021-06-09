<?php
/**
 * Template part for displaying full container blog section in homepage
 */
    $dreamer_blog_post_num = get_theme_mod ( 'dreamer_masonry_section_category_setting', 9 );
    $dreamer_blog_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $dreamer_blog_grid_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  $dreamer_blog_post_num,
        'order'             =>  'DESC',
        'paged'             =>  $dreamer_blog_paged
    );
    $dreamer_blog_wp_query  = new WP_Query( $dreamer_blog_grid_args );
?>
        <div class="container">
            <div class="row grid">
                <?php
                    if ( $dreamer_blog_wp_query->have_posts() ) :
                       $dreamer_blog_count = 0;
                        while ( $dreamer_blog_wp_query->have_posts() ) : $dreamer_blog_wp_query->the_post();
                            if( $dreamer_blog_count ==  7 ) {
                                ?>
                                <?php if( is_active_sidebar( 'dreamer_blog_home_page_grid_widget_setting' ) ) { ?>
                                <div class="col-lg-4 col-sm-6 grid-item">
                                    <div class="ct-masonry ct-list">
                                        <div class="ct-list">
                                            <?php
                                                dynamic_sidebar( 'dreamer_blog_home_page_grid_widget_setting' );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } // endif: sidebar
                            } // endif: count

                            $dreamer_blog_featured = false;
                            if( $dreamer_blog_count ==  1 && has_post_thumbnail() ) {
                                $dreamer_blog_featured = true;
                            ?>
                            <div class="col-lg-4 col-sm-6 grid-item">
                                <div class="ct-masonry">
                                    <div class="block-content">
                                        <?php if ( has_post_thumbnail() ): ?>
                                        <div class="featured-image">
                                                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('dreamer-blog-400-1x1') ?></a>
                                            <span class="ct-overlay"></span>
                                        </div><!-- .featured-image -->
                                        <?php else: ?>
                                            <div class="x-image">
                                                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a>
                                            <span class="ct-overlay"></span>
                                        </div><!-- .featured-image -->
                                        <?php endif; ?>

                                        <div class="post-content">
                                            <div class="post-meta clearfix">
                                                <?php dreamer_blog_the_category_colors(); ?>
                                                <span class="ct-read-time"><?php echo esc_html( get_the_date() ); ?></span>
                                            </div><!-- .post-meta -->
                                            <a href="<?php the_permalink() ?>"><h2 class="ct-title"><?php the_title() ?></h2></a>
                                        </div><!-- .post-content -->
                                    </div><!-- .block-content -->
                                </div>
                                <?php
                                wp_reset_postdata();
                                ?>
                            </div><!-- .col-md-4 -->
                            <?php
                            }

                if( $dreamer_blog_featured == false ) :
                ?>
                <div class="col-lg-4 col-sm-6 grid-item">
                    <div class="ct-masonry">
                        <?php
                        $dreamer_blog_cats='';
                            if ( $dreamer_blog_cats=has_post_thumbnail() ): ?>
                                <div class="featured-image">
                                    <?php the_post_thumbnail( 'dreamer-blog-400-1x1' ); ?>
                                </div><!-- .featured-image -->
                            <?php endif ?>
                        <div class="post-content">
                            <?php if ($dreamer_blog_cats=has_post_thumbnail()) { ?>
                                <div class="post-meta">
                                    <?php dreamer_blog_the_category_colors(); ?>
                                </div><!-- .post-meta -->
                            <?php } ?>
                            <a href="<?php the_permalink(); ?>"><h2 class="ct-title"><?php the_title(); ?></h2></a>
                            <?php if ($dreamer_blog_cats=!has_post_thumbnail()) { ?>
                                <div class="ct-bottom-cat">
                                    <?php dreamer_blog_the_category_colors(); ?>
                                </div>
                            <?php } ?>
                            <div class="ct-excerpt-meta">
                                <div class="author-info">
                                    <div class="author-image"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"></a><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?></div>
                                    <a href="#"><span class="author-name"><?php the_author(); ?></span></a>
                                </div>
                                <span class="ct-date-time"><?php echo esc_html( get_the_date() ); ?></span>
                            </div><!-- /.ct-excerpt-meta -->
                            <?php the_excerpt(); ?>
                            <div class="ct-read-more clearfix">
                                <span class="read-more"><a href="<?php the_permalink(); ?>"><?php echo esc_html( 'Continue Reading', 'dreamer-blog' ) ?></a></span>
                                <span class="no-comments"><a href="<?php the_permalink(); ?>"><span class="comment-number"><?php echo esc_html( get_comments_number() ); ?> </span></a></span>
                            </div><!-- .ct-ream-more -->
                        </div><!-- .post-content -->
                    </div><!-- /.ct-masonry -->
                </div><!-- .col-md-4 -->
                <?php
                endif;
                    $dreamer_blog_count++;
                    endwhile;
                    else :
                        get_template_part( 'template-parts/post/content', 'none' );
                    endif;
                    wp_reset_postdata();
                ?>
            </div><!-- .row -->
        </div><!-- .container -->
        <?php
        // Pagination
        get_template_part( 'template-parts/pagination/pagination', get_post_format() );

