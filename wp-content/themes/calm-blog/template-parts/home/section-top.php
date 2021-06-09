<?php
/**
 * Template part for displaying Top section in homepage
 */

  $calm_blog_args = array(
    'post_type'         =>  'post',
    'posts_per_page'    =>  4,
  );
  $calm_blog_item  = new WP_Query( $calm_blog_args );
?>

<div id="content" class="container prr-spacing ct-main-slider">
    <div class="row">
        <div class="col-md-12 ct-slide-sbs">
            <div class="ct-slider-main">
            <?php
            if ( $calm_blog_item->have_posts() ) :
                while ( $calm_blog_item->have_posts() ) : $calm_blog_item->the_post();
                ?>
                <div class="ct-slide-container">
                    <div class="ct-slide-bg-inner" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat scroll center center / cover;">
                    </div>

                    <div class="ct-slide-content">
                        <p><?php the_category( ); ?></p>
                        <h2><span class="animated-underline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h2>

                        <div class="ct-post-meta">
                            <div class="ct-post-author">
                                <span class="icofont-pen-alt-1"></span>
                                <span class="ct-author"><?php the_author(); ?></span>
                            </div><!-- /.ct-post-author -->

                            <div class="ct-times-read">
                                <span class="icofont-clock-time"></span>
                                <span class="ct-times-read"><?php echo esc_html( get_the_date() ); ?></span>
                            </div><!-- /.ct-times-read -->
                        </div><!-- /.ct-post-meta` -->
                    </div><!-- /.ct-slide-content -->
                </div><!-- /.ct-slide-container -->
                <?php endwhile ?>
            <?php endif ?>
            <?php wp_reset_postdata(); ?>
            </div><!-- /.ct-slider-main -->
            <div class="post-slide-main-arrow">
                <div class="prev">
                    <span class="icofont-swoosh-left"></span>
                </div><!-- .prev -->
                <div class="next">
                    <span class="icofont-swoosh-right"></span>
                </div><!-- .next -->
            </div><!-- .post-slide-hor-arrow -->
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
</div><!-- /.container -->
