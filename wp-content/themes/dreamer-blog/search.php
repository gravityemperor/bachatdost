<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 */

get_header();

if ( have_posts() ) :
?>
<div class="container search-title">
    <div class="row">
        <div class="col-md-8 drm-spacing">
            <h1><?php esc_html_e( 'Search results for: ', 'dreamer-blog' ); ?><?php echo get_search_query(); ?></h1>
        </div>
    </div> <!-- /.row -->
</div> <!-- /.container -->
<?php endif; ?>

    <?php if ( have_posts() ) : ?>
    <div class="container">
        <div class="row grid">

            <?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content/content', 'search' );

                endwhile; // End of the loop.
            ?>

        </div><!-- /.row -->
    </div><!-- /.container -->

    <?php
        else :

            get_template_part( 'template-parts/content/content', 'none' );

        endif;
    ?>
<?php
    // Pagination
    get_template_part( 'template-parts/pagination/pagination', get_post_format() );

get_footer();
