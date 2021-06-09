<?php
/**
 * All theme custom functions are delared here
 */

/****************************************************************************
 * Loads google fonts to the theme
 * Thanks to themeshaper.com
 ****************************************************************************/

if ( ! function_exists( 'dreamer_blog_fonts_url' ) ) :

function dreamer_blog_fonts_url() {
  $dreamer_fonts_url  = '';
  $dreamer_merri   = _x( 'on', 'Merriweather font: on or off', 'dreamer-blog' );
  $dreamer_open = _x( 'on', 'Open Sans font: on or off', 'dreamer-blog' );

  if ( 'off' !== $dreamer_merri || 'off' !== $dreamer_open ) {
    $dreamer_font_families = array();

    if ( 'off' !== $dreamer_merri ) {
      $dreamer_font_families[] = 'Merriweather:wght@300,400,700';
    }

    if ( 'off' !== $dreamer_open ) {
      $dreamer_font_families[] = 'Open Sans:wght@300;400;600;700';
    }
  }

  $dreamer_query_args = array(
    'family' => urlencode( implode( '|', $dreamer_font_families ) ),
    'subset' => urlencode( 'cyrillic-ext,cyrillic,vietnamese,latin-ext,latin' )
  );

  $dreamer_fonts_url = add_query_arg( $dreamer_query_args, 'https://fonts.googleapis.com/css' );

  return esc_url_raw( $dreamer_fonts_url );
}

endif;

/****************************************************************************
 * Set the content width
 ****************************************************************************/

if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

/****************************************************************************
 *  Adds a span tag with dropdown icon after the unordered list
 *  that has a sub menu on the mobile menu.
 ****************************************************************************/

class dreamer_Dropdown_Toggle_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$dreamer_output, $dreamer_depth = 0, $dreamer_args = array() ) {
        $dreamer_indent = str_repeat( "\t", $dreamer_depth );
        if( 'mobile_menu' == $dreamer_args->theme_location ) {
            $dreamer_output .='<a href="#" class="toggle-sub-menu js-toggle-class"><span class="icofont-caret-down"></span></a>';
        }
        $dreamer_output .= "\n$dreamer_indent<ul class=\"sub-menu\">\n";
    }
}

/****************************************************************************
 *  Adds Category Color Picker Field
 ****************************************************************************/
/* Add new colorpicker field to "Add new Category" screen */
function dreamer_blog_colorpicker_field_add_new_category( $taxonomy ) {
  ?>
    <div class="form-field term-colorpicker-wrap">
        <label for="term-colorpicker"><?php echo esc_html_e( 'Select Color', 'dreamer-blog' ); ?></label>
        <input name="_category_color" value="#ffffff" class="colorpicker" id="term-colorpicker" />
        <p><?php esc_html_e( 'Select Specific color for this category','dreamer-blog' ); ?></p>
    </div>
  <?php
}
add_action( 'category_add_form_fields', 'dreamer_blog_colorpicker_field_add_new_category' );

/* Add new colopicker field to "Edit Category" screen */
function dreamer_blog_colorpicker_field_edit_category( $term ) {
    $color = get_term_meta( $term->term_id, '_category_color', true );
    $color = ( ! empty( $color ) ) ? "#{$color}" : '#f6727f';
  ?>
    <tr class="form-field term-colorpicker-wrap">
        <th scope="row"><label for="term-colorpicker"><?php echo esc_html_e( 'Select Color', 'dreamer-blog' ); ?></label></th>
        <td>
            <input name="_category_color" value="<?php echo esc_attr( $color ); ?>" class="colorpicker" id="term-colorpicker" />
            <p class="description"><?php esc_html_e( 'Select Specific color for this category','dreamer-blog' ); ?></p>
        </td>
    </tr>
  <?php
}
add_action( 'category_edit_form_fields', 'dreamer_blog_colorpicker_field_edit_category' );   // Variable Hook Name

/* Term Metadata - Save Created and Edited Term Metadata */
function dreamer_blog_save_termmeta( $term_id ) {

    // Save term color if possible
    if( isset( $_POST['_category_color'] ) && ! empty( $_POST['_category_color'] ) ) {
        $cat_color = sanitize_text_field( wp_unslash( $_POST['_category_color'] ) );
        update_term_meta( $term_id, '_category_color', sanitize_hex_color_no_hash( $cat_color ) );
    } else {
        delete_term_meta( $term_id, '_category_color' );
    }

}
add_action( 'created_category', 'dreamer_blog_save_termmeta' );  // Variable Hook Name
add_action( 'edited_category',  'dreamer_blog_save_termmeta' );  // Variable Hook Name


/* Enqueue wp-color-picker */
function dreamer_blog_category_colorpicker_enqueue( $taxonomy ) {
    // Colorpicker Scripts
    wp_enqueue_script( 'wp-color-picker' );

    // Colorpicker Styles
    wp_enqueue_style( 'wp-color-picker' );

}
add_action( 'admin_enqueue_scripts', 'dreamer_blog_category_colorpicker_enqueue' );

/* Add Display Color Picker */
function dreamer_blog_the_category_colors() {

  $categories = get_the_category();

  $separator = '';
  $output = '';
  if($categories){
  ?>
  <div class="ct-categories">
  <?php
      foreach( $categories as $category ) {
          $color = get_term_meta( $category->term_id, '_category_color', true );
          $color = ( ! empty( $color ) ) ? "#{$color}" : '#f6727f';

          /* translators: %s: Category name */
          $output .= '<span class="ct-category" style="background-color: '.  $color . '; "><a href="'.esc_url( get_category_link($category->term_id ) ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'dreamer-blog' ), $category->name ) ) . '">'.$category->cat_name.'</a></span>'.$separator;
      }
      echo trim( $output, $separator );
  ?>
  </div>
  <?php
  }
}

/*************************************************************************************************************************
 *  RELATED POSTS
 ************************************************************************************************************************/

if ( ! function_exists( 'dreamer_blog_related_posts' ) ) :

  function dreamer_blog_related_posts() {
    global $post;
    $categories = get_the_category( $post->ID );
    $catidlist = '';
    foreach( $categories as $category) {
        $catidlist .= $category->cat_ID . ",";
    }
    // Build our category based custom query arguments
    $custom_query_args = array(
      'posts_per_page' => 3, // Number of related posts to display
      'post__not_in' => array($post->ID), // Ensure that the current post is not displayed
      'orderby' => 'rand', // Randomize the results
      'cat' => $catidlist, // Select posts in the same categories as the current post
    );
    // Initiate the custom query
    $custom_query = new WP_Query( $custom_query_args );

    if ( $custom_query->have_posts() ) :
    ?>
    <div class="container related-container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="related-posts-heading"><?php esc_html_e( 'Related Posts', 'dreamer-blog' ); ?></h3>
        </div><!-- /.twelve columns -->
      </div><!-- /.row -->
      <div class="row">
        <?php
          while ( $custom_query->have_posts() ) : $custom_query->the_post();
        ?>
            <div class="col-md-4 col-sm-6 grid-item">

              <div class="related white">
                <?php if ( has_post_thumbnail() ): ?>
                  <div class="featured-single-image image-container">
                   <?php the_post_thumbnail( 'dreamer-blog-400-1x1' ) ?>
                  </div><!-- /.image-container -->
                <?php endif; ?>

                <div class="related-excerpt-details">
                  <a href="<?php the_permalink(); ?>"><h3 class="ct-title"><?php the_title(); ?></h3></a>

                  <div class="related-excerpt">
                    <?php
                      echo wp_trim_words( get_the_content(), 40, '...' );
                    ?>
                  </div><!-- /.related-excerpt -->
                </div><!-- /.related-excerpt-details -->

              </div><!-- /.related -->

            </div><!-- /.three columns -->
        <?php
          endwhile; // End of the loop.
        ?>
      </div><!-- /.row -->
    </div><!-- /.container related-container -->
    <?php
    else :
      echo 0;
    endif;

    wp_reset_postdata();
  }

endif;

/****************************************************************************
 *  Excerpt Dots change
 ****************************************************************************/
function dreamer_blog_excerpt_more( $more ) {
  return '...';
}

add_filter( 'excerpt_more', 'dreamer_blog_excerpt_more' );