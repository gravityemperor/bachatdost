<?php
/**
 * Template part for displaying full container blog section in homepage
 */

$calm_blog_cat_id = intval( get_theme_mod( 'calm_blog_bottom_section_category_setting', 1 ) );

    $calm_blog_block_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  6,
        'cat'               =>  $calm_blog_cat_id,
        'order'             =>  'DESC',
    );
    $calm_blog_block_item  = new WP_Query( $calm_blog_block_args );

    $calm_blog_allowed_html = array(
        'a' => array(
            'href' => array(),
            'title' => array()
        ),
        'span' => array(),
    );
?>
<div class="container prr-spacing">

    <div class="prr-section-intro">
        <h1><span class="prr-title"><?php echo esc_html( get_cat_name( $calm_blog_cat_id ) ); ?></span></h1>
        <p><?php echo wp_kses( category_description( $calm_blog_cat_id ), $calm_blog_allowed_html );?></p>
    </div><!-- .prr-section-intro -->
    <div class="row">
        <?php
            if ( $calm_blog_block_item->have_posts() ) :
                while ( $calm_blog_block_item->have_posts() ) : $calm_blog_block_item->the_post();

        ?>
        <div class="col-md-4">
            <div class="prr-post-excerpt">
                <?php if ( has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail('calm-blog-600-3x2'); ?>
                    </a>
                <?php endif; ?>

                <div class="prr-block-post-meta clearfix">
                    <p class="prr-category">
                        <?php the_category( ' ' ); ?>
                    </p><!-- .prr-category -->
                    <div class="prr-times-read-area">
                        <span class="icofont-clock-time"></span>
                        <span class="prr-times-read"><?php echo esc_html( get_the_date() ); ?></span>
                    </div><!-- .prr-times-read-area -->
                </div>
                <a href="<?php the_permalink(); ?>"><h3><span class="animated-underline"><?php the_title(); ?></span></h3></a>
            </div><!-- .prr-post-excerpt -->
        </div><!-- .col-md-4 -->
        <?php
            endwhile;
                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;

            wp_reset_postdata();
        ?>
    </div><!-- .row -->
</div><!-- .container -->
