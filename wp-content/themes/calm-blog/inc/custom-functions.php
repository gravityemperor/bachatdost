<?php

/**
 * All theme custom functions are delared here
 */

/*************************************************************************************************************************
 * Loads google fonts to the theme
 * Thanks to themeshaper.com
 ************************************************************************************************************************/

if ( ! function_exists( 'calm_blog_fonts_url' ) ) :

function calm_blog_fonts_url() {
  $calm_blog_fonts_url  = '';
  $calm_blog_merri   = _x( 'on', 'Merriweather font: on or off', 'calm-blog' );
  $calm_blog_open = _x( 'on', 'Open Sans font: on or off', 'calm-blog' );

  if ( 'off' !== $calm_blog_merri || 'off' !== $calm_blog_open ) {
    $calm_blog_font_families = array();

    if ( 'off' !== $calm_blog_merri ) {
      $calm_blog_font_families[] = 'Merriweather:wght@300,400,700';
    }

    if ( 'off' !== $calm_blog_open ) {
      $calm_blog_font_families[] = 'Open Sans:wght@300;400;600;700';
    }
  }

  $calm_blog_query_args = array(
    'family' => urlencode( implode( '|', $calm_blog_font_families ) ),
    'subset' => urlencode( 'cyrillic-ext,cyrillic,vietnamese,latin-ext,latin' )
  );

  $calm_blog_fonts_url = add_query_arg( $calm_blog_query_args, 'https://fonts.googleapis.com/css' );

  return esc_url_raw( $calm_blog_fonts_url );
}

endif;

/*************************************************************************************************************************
 * Set the content width
 ************************************************************************************************************************/

if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

/*************************************************************************************************************************
 *  Adds a span tag with dropdown icon after the unordered list
 *  that has a sub menu on the mobile menu.
 ************************************************************************************************************************/

class calm_blog_Dropdown_Toggle_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$calm_blog_output, $calm_blog_depth = 0, $calm_blog_args = array() ) {
        $calm_blog_indent = str_repeat( "\t", $calm_blog_depth );
        if( 'mobile_menu' == $calm_blog_args->theme_location ) {
            $calm_blog_output .='<a href="#" class="dropdown-toggle"><i class="icofont-caret-down"></i></a>';
        }
        $calm_blog_output .= "\n$calm_blog_indent<ul class=\"sub-menu\">\n";
    }
}

/*************************************************************************************************************************
 * Estimated reading time
 ************************************************************************************************************************/

/* Word read count */
function calm_blog_post_read_time( $post_id ) {

      // get the post content
      $content = get_post_field( 'post_content', $post_id );

      // count the words
      $word_count = str_word_count( strip_tags( $content ) );

      // reading time itself
      $readingtime = ceil($word_count / 200);

      if ($readingtime == 1) {
       $timer = " Minute read";
      } else {
       $timer = " Minutes read"; // or your version :) I use the same wordings for 1 minute of reading or more
      }

      // I'm going to print 'X minute read' above my post
      $totalreadingtime = $readingtime . $timer;
      echo esc_html( $totalreadingtime, 'calm-blog' );

}

/****************************************************************************
 *  Custom Excerpt Length
 ****************************************************************************/

function calm_blog_excerpt( $limit ) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

/****************************************************************************
 *  Excerpt Dots change
 ****************************************************************************/
function calm_blog_excerpt_more( $more ) {
  return '...';
}

add_filter('excerpt_more', 'calm_blog_excerpt_more');


/****************************************************************************
 *  Adds Class to the_category function
 ****************************************************************************/
function calm_blog_category_class( $the_list ){
  $categories = get_the_category();

  if ( !$categories || is_wp_error($categories) ) {
    return $the_list;
  }

  $output = '';
  foreach ( $categories as $category ) {
    $output .= '<span class="prr-title"><a href="' . esc_url(get_category_link($category->term_id)) . '">' . $category->name . '</a></span>';
  }

  return $output;
}
add_filter( 'the_category', 'calm_blog_category_class');










