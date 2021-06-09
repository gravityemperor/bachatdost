<div class="container">
    <div class="row">
        <div class="col-md-8 ct-content" id="content">
            <?php dreamer_blog_the_category_colors(); ?>
            <div class="entry-title">
                <h1 class="ct-title ct-no-link"><?php the_title(); ?></h1>
                <div class="prr-post-meta">
                    <span class="icofont-user-alt-3"></span>
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="prr-author"><?php the_author(); ?></span><!-- .prr-author --></a>
                    <span class="icofont-comment"></span>
                    <span class="prr-times-read"><?php echo esc_html( get_comments_number() ); ?> <?php echo esc_html( 'Comments', 'dreamer-blog' ); ?></span>
                    <span class="icofont-clock-time"></span>
                    <span class="prr-times-read"><?php echo esc_html( get_the_date() ); ?></span>
                </div><!-- .prr-post-meta -->
            </div><!-- .entry-title -->
            <div class="entry-content">
                <?php the_content(); ?>
                <div class="post-tags">
                    <?php
                    if( $dreamer_tags = get_the_tags() ) {
                            foreach( $dreamer_tags as $dreamer_tags ) {
                                $dreamer_sep = ( $dreamer_tags === end( $dreamer_tags ) ) ? '' : ' ';
                                echo '<a href="' . esc_url( get_term_link( $dreamer_tags, $dreamer_tags->taxonomy ) ) . '">#' . esc_html( $dreamer_tags->name ) . '</a>' . esc_html( $dreamer_sep );
                            }
                        }
                    ?>
                </div><!-- .post-tags -->
            </div><!-- .entry-content -->
        </div><!-- .col-md-8 .ct-content -->
        <div class="col-md-4 ct-sidebar-widget"><?php get_sidebar(); ?></div><!-- .col-md-4 -->
    </div><!-- .row -->
</div><!-- /.container -->

<div class="container">
    <div class="pagination-single">
        <div class="pagination-nav clearfix">
            <?php $dreamer_prev_post = get_adjacent_post( false, '', false ); ?>
            <?php if ( is_a( $dreamer_prev_post, 'WP_Post' ) ) { ?>
            <div class="previous-post-wrap">
                <div class="previous-post"><a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', false )->ID ) ); ?>"><?php esc_html_e( 'Previous Post', 'dreamer-blog' ); ?></a></div><!-- /.previous-post -->
                <a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', false)->ID ) ); ?>" class="prev"><?php echo esc_html( get_the_title( $dreamer_prev_post->ID ) ); ?></a>
            </div><!-- /.previous-post-wrap -->
            <?php } ?>

            <?php $dreamer_next_post = get_adjacent_post( false, '', true ); ?>
            <?php if ( is_a( $dreamer_next_post, 'WP_Post' ) ) { ?>
            <div class="next-post-wrap">
                <div class="next-post"><a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', true)->ID ) ); ?>"><?php esc_html_e( 'Next Post', 'dreamer-blog' ); ?></a></div><!-- /.next-post -->
                <a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', true)->ID ) ); ?>" class="next"><?php echo esc_html( get_the_title( $dreamer_next_post->ID ) ); ?></a>
            </div><!-- /.next-post-wrap -->
            <?php } ?>
        </div><!-- /.pagination-nav -->
    </div><!-- /.pagination-single-->
</div><!-- /.container -->
