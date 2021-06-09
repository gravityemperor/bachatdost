      <footer class="footer">
            <?php if( is_active_sidebar( 'dreamer_blog-footer-left' ) ||
                is_active_sidebar( 'dreamer_blog-footer-middle' ) ||
                is_active_sidebar( 'dreamer_blog-footer-right' ) ) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php
                            if( is_active_sidebar( 'dreamer_blog-footer-left' ) ) {
                                dynamic_sidebar( 'dreamer_blog-footer-left' );
                            }
                        ?>
                    </div><!-- .col-md-3 -->
                    <div class="col-md-4">
                        <?php
                            if( is_active_sidebar( 'dreamer_blog-footer-middle' ) ) {
                                dynamic_sidebar( 'dreamer_blog-footer-middle' );
                            }
                        ?>
                    </div><!-- .col-md-3 -->
                    <div class="col-md-4">
                        <?php
                            if( is_active_sidebar( 'dreamer_blog-footer-middle' ) ) {
                                dynamic_sidebar( 'dreamer_blog-footer-middle' );
                            }
                        ?>
                    </div><!-- .col-md-3 -->
                </div>
            </div><!-- .container -->
            <?php endif; ?>

            <div class="ct-credits">
                  <p><?php esc_html_e( 'Copyright', 'dreamer-blog' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><?php esc_html_e( '. All rights reserved.', 'dreamer-blog' ); ?>
                  <span class="footer-info-right">
                    <?php echo esc_html__(' | Designed by', 'dreamer-blog') ?> <a href="<?php echo esc_url('https://www.crafthemes.com/', 'dreamer-blog'); ?>"><?php echo esc_html__(' Crafthemes.com', 'dreamer-blog') ?></a>
                  </span></p>
            </div>
        </footer>
    <?php wp_footer(); ?>
  </body>
</html>
