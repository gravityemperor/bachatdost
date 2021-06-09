<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();
?>
<?php
    $args = array( 'slider', 'masonry' );
    // Get the parts.
    $template_parts = get_theme_mod( 'dreamer_sortable_homepage_setting', $args );

    // Loop parts.
    foreach ( $template_parts as $template_part ) {
        get_template_part( 'template-parts/home/section', $template_part );
    }
?>
<?php
get_footer();
