<?php
$calm_blog_cat_id = intval( get_theme_mod( 'calm_blog_scroll_section_category_setting', 1 ) );

    $calm_blog_list_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  4,
        'offset'            =>  1,
        'cat'               =>  $calm_blog_cat_id,
        'order'             =>  'DESC',
    );

    $calm_blog_list_item  = new WP_Query( $calm_blog_list_args );

    $calm_blog_block_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  1,
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
    <div class="row">
        <div class="col-md-6">
            <?php
                if ( $calm_blog_block_item->have_posts() ) :
                    while ( $calm_blog_block_item->have_posts() ) : $calm_blog_block_item->the_post();
            ?>
            <div class="prr-massive-blog-excerpt">
                <?php if ( has_post_thumbnail() ):
                ?>
                <a href="<?php the_permalink(); ?>"><img src="" alt="" /><?php the_post_thumbnail( 'calm-blog-600-3x2' ); ?></a>
                <?php
                    endif;
                ?>
                <div class="prr-block-post-meta clearfix">
                    <p class="prr-category">
                        <?php the_category( ' ' ); ?>
                    </p><!-- .prr-category -->
                    <div class="prr-times-read-area">
                        <span class="icofont-clock-time"></span>
                        <span class="prr-times-read"><?php echo esc_html( get_the_date() ); ?></span>
                    </div><!-- .prr-times-read-area -->
                </div>
                <a href="<?php the_permalink(); ?>"><h2><span class="animated-underline"><?php the_title(); ?></span></h2></a>
                <div class="prr-excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </div><!-- .prr-massive-blog-excerpt -->
            <?php
                endwhile;
                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;

                wp_reset_postdata();
            ?>
        </div><!-- .col-md-6 -->
        <div class="col-md-6">
            <h2><span class="prr-title"><?php echo esc_html( get_cat_name( $calm_blog_cat_id ) ); ?></span></h2>
            <div class="post-side">
                <?php
                    if ( $calm_blog_list_item->have_posts() ) :
                        while ( $calm_blog_list_item->have_posts() ) : $calm_blog_list_item->the_post();
                ?>
                <div class="prr-sbs-post-excerpt clearfix prr-excerpt-slide">
                    <?php if ( has_post_thumbnail() ): ?>
                    <div class="content-left">
                        <?php if ( has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('calm-blog-1200-3x2'); ?>
                            </a>
                        <?php endif; ?>
                    </div><!-- .content-left -->
                    <div class="content-right">
                    <?php endif; ?>
                        <div class="prr-block-post-meta clearfix">
                            <p class="prr-category">
                                <?php the_category( ' ' ); ?>
                            </p><!-- .prr-category -->
                        </div>
                        <a href="<?php the_permalink(); ?>"><h3><span class="animated-underline"><?php the_title(); ?></span></h3></a>
                        <div class="prr-times-read-area clearfix">
                            <span class="icofont-clock-time"></span>
                            <span class="prr-times-read"><?php echo esc_html( get_the_date() ); ?></span>
                        </div><!-- .prr-times-read-area -->
                    <?php if ( has_post_thumbnail() ): ?>
                    </div><!-- .content-right -->
                    <?php endif; ?>
                </div><!-- .prr-sbs-post-excerpt -->
                <?php
                    endwhile;

                    else :
                        get_template_part( 'template-parts/post/content', 'none' );
                    endif;

                    wp_reset_postdata();
                ?>
            </div><!-- .post-slide-hor -->
        </div><!-- .col-md-6 -->
    </div><!-- .row -->
</div><!-- .container -->
