<?php if( is_active_sidebar( 'calm_blog-footer-left' ) ||
			is_active_sidebar( 'calm_blog-footer-middle' ) ||
			is_active_sidebar( 'calm_blog-footer-right' ) ) : ?>
		<footer class="prr-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
							<?php
								if( is_active_sidebar( 'calm_blog-footer-left' ) ) {
									dynamic_sidebar( 'calm_blog-footer-left' );
								}
							?>
					</div>
					<div class="col-md-4">
						<?php
							if( is_active_sidebar( 'calm_blog-footer-middle' ) ) {
								dynamic_sidebar( 'calm_blog-footer-middle' );
							}
						?>
					</div>
					<div class="col-md-4">
						<?php
							if( is_active_sidebar( 'calm_blog-footer-right' ) ) {
								dynamic_sidebar( 'calm_blog-footer-right' );
							}
						?>
					</div>
				</div>
			</div>
		</footer>
<?php endif; ?>
		<div class="container">
			<div class="footer-site-info">
				<?php
					$calm_blog_footer_text = get_theme_mod( 'calm_blog_home_copyright_desc_free_setting', 'Copyright. All Rights Reserved.' );
					printf(  esc_html( '%1$s' ), $calm_blog_footer_text );
				?>
				<span class="footer-info-right">
				<?php echo esc_html__(' | Designed by', 'calm-blog') ?> <a href="<?php echo esc_url('https://www.crafthemes.com/', 'calm-blog'); ?>"><?php echo esc_html__(' Crafthemes.com', 'calm-blog') ?></a>
				</span>
			</div><!-- /.footer-site-info -->
		</div>
    <?php wp_footer(); ?>
  </body>
</html>
