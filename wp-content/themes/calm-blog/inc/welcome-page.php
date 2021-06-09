<?php
/*******************************************************************************
 *  Add a Custom CSS file to Admin Area
 *******************************************************************************/
function calm_blog_admin_theme_stylesheet() {
   wp_enqueue_style( 'custom-admin-style', get_template_directory_uri() .'/assets/css/admin-css.css' );
}
add_action( 'admin_enqueue_scripts', 'calm_blog_admin_theme_stylesheet' );

/*******************************************************************************
 *  Adds theme page of ( About Theme )
 *******************************************************************************/

function calm_blog_admin_menu() {
   $menus = $GLOBALS[ 'menu' ];
   $priority = array_filter( $menus, function( $item ) {
      return 'themes.php' === $item[2];
   } );
   $priority = ! empty( $priority ) && 1 === count( $priority ) ? key( $priority ) - 1 : null;

   add_menu_page(
      __( 'Calm Blog', 'calm-blog' ),
      __( 'Calm Blog', 'calm-blog' ),

      'edit_theme_options',
      'theme-info.php',
      'calm_blog_about',
      'dashicons-admin-customizer',
      $priority
   );
}
add_action( 'admin_menu', 'calm_blog_admin_menu' );

function calm_blog_about() {

    $theme = wp_get_theme();
    $theme_name = esc_html( $theme->get( 'Name' ) );
    $theme_description = $theme->get( 'Description' );
    $theme_user = wp_get_current_user();
    $theme_slug = basename( get_stylesheet_directory() );
    $premium_url = "https://www.crafthemes.com/theme/calm-blog-pro/";
?>

<div class="container about-theme">
    <div class="row apex-screenshot">
      <div class="twelve columns clearfix">
          <div class="ct-welcome-area">
             <h1><?php printf( esc_html__( 'Welcome to Calm Blog', 'calm-blog' ) ); ?></h1>
              <p><?php echo esc_html( $theme_description ); ?></p>
          </div>
      </div><!-- /.apex-desh-hl -->
    </div><!-- /.row -->
</div>

<div class="container about-theme">
    <div class="row apex-screenshot">
      <div class="row">
        <div class="twelve columns about-title">
          <h1><?php printf( esc_html__( 'Import Pre Built Theme Demos!', 'calm-blog' ) ); ?></h1>
        </div>
      </div>

      <div class="row">
         <div class="four columns ct-img-col">
            <img class="ct-bordered" src="<?php echo esc_url( "https://www.crafthemes.com/wp-content/uploads/2021/06/calm-blog-screenshot.png" ); ?>" alt="Demo Image">
            <div class="ct-theme-options">
              <p class="ct-demo-text"><?php esc_html_e( 'Default Demo', 'calm-blog' ); ?></p>
              <div class="ct-theme-actions">
                 <a class="button ct-btn-preview" href="<?php echo esc_url( "https://crafthemes-demo.com/calm-blog/" ); ?>" target="_blank"><?php esc_html_e( 'Live Preview', 'calm-blog' ); ?></a>
                 <a class="jquery-btn-get-started jquery-btn-import button button-primary" href="#" data-name="" data-slug=""><?php esc_html_e( 'Import Demo', 'calm-blog' ); ?></a>
              </div>
            </div>
         </div>
         <div class="four columns ct-img-col">
           <img class="ct-bordered" src="<?php echo esc_url( "https://www.crafthemes.com/wp-content/uploads/2021/06/calm-blog-pro-banner.png" ); ?>" alt="Demo Image">
           <div class="ct-theme-options">
               <p class="ct-demo-text"><?php esc_html_e( 'Banner Demo', 'calm-blog' ); ?></p>
               <div class="ct-theme-actions">
                  <a class="button ct-btn-preview" href="<?php echo esc_url( "https://crafthemes-demo.com/calm-blog-pro-three/" ); ?>" target="_blank"><?php esc_html_e( 'Live Preview', 'calm-blog' ); ?></a>
                  <a class="button button-primary" href="<?php echo esc_url( $premium_url ); ?>" data-name="" data-slug=""><?php esc_html_e( 'Buy Premium', 'calm-blog' ); ?></a>
               </div>
           </div>
         </div>
         <div class="four columns ct-img-col">
              <img class="ct-bordered" src="<?php echo esc_url( "https://www.crafthemes.com/wp-content/uploads/2021/06/calm-blog-violet.png" ); ?>" alt="Demo Image">
              <div class="ct-theme-options">
                 <p class="ct-demo-text"><?php esc_html_e( 'Slider Demo', 'calm-blog' ); ?></p>
                 <div class="ct-theme-actions">
                    <a class="button ct-btn-preview" href="<?php echo esc_url( "https://crafthemes-demo.com/calm-blog-pro-two/" ); ?>" target="_blank"><?php esc_html_e( 'Live Preview', 'calm-blog' ); ?></a>
                    <a class="button button-primary" href="<?php echo esc_url( $premium_url ); ?>" data-name="" data-slug=""><?php esc_html_e( 'Buy Premium', 'calm-blog' ); ?></a>
                 </div>
              </div>
         </div>
      </div>
    </div>
</div>


<div class="container about-theme">
   <div class="row apex-screenshot">
       <div class="twelve columns clearfix">
           <div class="ct-welcome-area about-title">
              <h1><?php printf( esc_html__( 'Comparison between Free and Pro Version', 'calm-blog' ) ); ?></h1>
                  <p><?php esc_html_e( 'All our themes are search engine optimized & have an unmatchable page speed.
              Amazing customer support is our number one priority.', 'calm-blog' ); ?></p>
              </div>
        </div><!-- /.apex-desh-hl -->

      <div class="twelve columns">
        <div class="eae-ct-container">
           <table class="comparison-table">
              <tbody>
                 <tr>
                    <th class="empty-cell comparison-table-tfeatures"></th>
                    <th class="comparison-table-free eae-center-td"><?php esc_html_e( 'FREE', 'calm-blog' ); ?></th>
                    <th class="comparison-table-pro eae-center-td"><?php esc_html_e( 'PREMIUM', 'calm-blog' ); ?></th>
                 </tr>
                 <tr class="comparison-table-row">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Logo Upload', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Color Changes', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Footer Widgets', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Ads Integration', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Dark Mode', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Author Introduction Section', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Slider Section', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Customized Banner Section', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Newsletter Section', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Instagram Feed Section', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Typography', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Easy Google Fonts (650+)', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Social Share Buttons', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Sortable Option For Home Page Sections', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Remove Author info &amp; Post date', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Remove Footer Credits', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Footer Menu', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Post Sidebar Options', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Premium Support', 'calm-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-footer">
                    <td></td>
                    <td class="comparison-table-free"></td>
                    <td class="comparison-table-pro"> <a href="<?php echo esc_url( $premium_url ); ?>" class="eae-ct-buy-link"><?php esc_html_e( 'BUY NOW', 'calm-blog' ); ?></a></td>
                 </tr>
              </tbody>
           </table>
          </div>
        </div>
      </div>
</div><!-- /.container about-writer -->

<?php
}
