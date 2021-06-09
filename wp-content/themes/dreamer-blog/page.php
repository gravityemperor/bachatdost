<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header();
?>

<div class="ct-content-area body-container">

        <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content/content', 'page' );

                echo "<div class=\"container\"><div class=\"row\"><div class=\"col-md-8 offset-md-2\">";
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                echo "</div><!-- /.col-md-8 --></div><!-- /.row --></div><!-- /.container -->";

                endwhile; // End of the loop.
            else :

                get_template_part( 'template-parts/content/content', 'none' );

            endif;
        ?>

</div><!-- /.body-container -->

<?php
get_footer();
