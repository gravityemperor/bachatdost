<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blogling
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-entry fbox blogposts-list'); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-img-box">
			<a href="<?php the_permalink() ?>" class="featured-thumbnail" rel="bookmark">
				<div class="featured-thumbnail-inner" style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"> 
				</div>
			</a>
			<?php else : ?>
				<div class="no-featured-img-box">
				<?php endif; ?>
				<div class="content-wrapper">
					<header class="entry-header">
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;

						if ( 'post' === get_post_type() ) : ?>
							<?php if ( get_theme_mod( 'show_post_page_byline' ) == '' ) : ?>
								<div class="entry-meta">
									<div class="blog-data-wrapper">
										<div class="post-data-divider"></div>
										<div class="post-data-positioning">
											<div class="post-data-text">
												<?php bloggist_posted_on(); ?>
											</div>
										</div>
									</div>
								</div><!-- .entry-meta -->
								<?php else: ?>
									<div class="blogling-spacer"></div>
								<?php endif; ?>

								<?php
							endif; ?>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php
							the_excerpt( sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'blogling' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							) );


							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blogling' ),
								'after'  => '</div>',
							) );
							?>
							<div class="text-center">
								<a href="<?php the_permalink() ?>" class="blogpost-button"><?php echo __('+', 'blogling') ?></a>
							</div>
							<?php if ( get_theme_mod( 'show_post_categories' ) == '' ) : ?>
								<div class="post-category">
									<img src="<?php echo get_stylesheet_directory_uri().'/img/category.png'; ?>">
									<?php the_category(', '); ?>
								</div>
								<?php else: ?>
								<?php endif; ?>

							</div><!-- .entry-content -->

						</div>
					</div>
				</article><!-- #post-<?php the_ID(); ?> -->
