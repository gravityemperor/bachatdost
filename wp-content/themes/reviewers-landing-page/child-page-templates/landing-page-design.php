<?php
/* Template Name: Review page */ 
get_header();
?>

</div>
</div>
</div>

<div class="landingpage-section-wrapper">

	<!-- Pagebuilder section -->
	<?php
	while ( have_posts() ) :
		the_post();
	?>
	<div class="sitebuilder-section reviewpage-custom" style="background-image:url(<?php echo esc_url( get_theme_mod( 'pagebuilder_bg_img' ) ); ?>)">
		<div class="site grid-container">
			<div id="content" class="site-content grid-x grid-padding-x">
				<main id="main" class="site-main large-12 cell">

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<?php
							the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'superb-landingpage' ),
								'after'  => '</div>',
								) );
								?>
							</div><!-- .entry-content -->
						</article><!-- #post-<?php the_ID(); ?> -->
					</main>
				</div>
			</div>
		</div>
	<?php endwhile; 
	?> 
	<!-- / Pagebuilder section -->

	<!-- Blog section -->
	<?php if ( get_theme_mod( 'hide_blogposts' ) == '' ) : ?>
		<div class="blog" style="background-image:url(<?php echo esc_url( get_theme_mod( 'blog_section_bg_img' ) ); ?>)">
			<div class="site grid-container">
				<div id="content" class="site-content grid-x grid-padding-x">
					<div id="primary" class="large-12 medium-12 small-12 cell">
						<main id="main" class="site-main">
							<div class="landing-page-description">
								<?php if (get_theme_mod('blogposts_section_headline') ) : ?><h2><?php echo wp_kses_post(get_theme_mod('blogposts_section_headline')) ?></h2><?php endif; ?>
								<?php if (get_theme_mod('blogposts_section_tagline') ) : ?><p><?php echo wp_kses_post(get_theme_mod('blogposts_section_tagline')) ?></p><?php endif; ?>
							</div>
							<?php $myposts = get_posts( 'numberposts=3&offset' );
							foreach( $myposts as $post) : setup_postdata( $post ) ?>
							<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>
						<?php endforeach; ?>
					</main>
					<?php if (get_theme_mod('blog_posts_button_text') ) : ?>
						<div class="landingpage-post-button-wrapper">
						<a href="<?php echo esc_url(get_theme_mod('blog_posts_button_url')) ?>" class="landingpage-button"><?php echo esc_html('Read More') ?>qwe</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<!-- / Blog section -->
</div>



<?php
get_footer();
