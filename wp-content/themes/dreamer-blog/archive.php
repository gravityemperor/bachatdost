<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header();

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if ( have_posts() ) :?>
            <div class="prr-archive-title drm-spacing">
                <?php the_archive_title( '<h1>', '</h1>' ); ?>
                <?php the_archive_description(); ?>
            </div><!-- .prr-section-intro -->
            <?php endif; ?>
        </div>
    </div><!-- .row -->
</div><!-- .container -->
<div class="container">
    <div class="row grid ct-archive-masonry">
        <?php if ( have_posts() ) :?>
        <?php
            while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content/content', 'excerpt' );
            endwhile; // End of the loop.
        ?>
        <?php endif; ?>
    </div>
</div><!-- .container -->
<?php
// Pagination
get_template_part( 'template-parts/pagination/pagination', get_post_format() );

get_footer();
