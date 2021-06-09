<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything upto navigation menu.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!DOCTYPE html>
<html>
    <head <?php language_attributes(); ?>>
        <meta charset="<?php bloginfo( 'charset' ); ?>">

        <!-- Mobile Specific Data -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php wp_head(); ?>
    </head>
    <?php
        $dreamer_sidebar = get_theme_mod( 'dreamer_sidebar_setting', 'right-sidebar' );
    ?>
    <body <?php body_class( $dreamer_sidebar ); ?>>
        <?php
            if ( function_exists( 'wp_body_open' ) ) {
                wp_body_open();
            }
        ?>
        <a class="skip-link" href="#content">
        <?php esc_html_e( 'Skip to content', 'dreamer-blog' ); ?></a>
        <div class="mobile-menu-overlay"></div>
        <header class="site-header">
            <div class="container">
                <div class="row vertical-align">
                    <div class="col-md-12 header-left clearfix">
                        <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
                        <nav class="site-navigation">
                            <?php
                                if ( has_nav_menu( 'header_menu' ) ) :

                                    wp_nav_menu( array(
                                        'theme_location' => 'header_menu',
                                        'container' => 'ul',
                                        'menu_class' => 'main-nav',
                                    ) );

                                endif;
                            ?>
                        </nav>

                        <div class="prr-iconset clearfix">
                            <div class="prr-iconset desktop clearfix">
                                <div class="prr-social">
                                    <?php
                                        if ( has_nav_menu( 'social_menu' ) ) {
                                            wp_nav_menu(
                                                array(
                                                    'theme_location'    => 'social_menu',
                                                    'container'         => 'li',
                                                    'menu_id'           => 'menu-social-items',
                                                    'menu_class'        => 'menu-items menu-social',
                                                    'depth'             => 1,
                                                    'link_before'       => '<span class="screen-reader-text">',
                                                    'link_after'        => '</span>',
                                                    'fallback_cb'       => '',
                                                )
                                            );
                                        }
                                    ?>
                                </div><!-- .prr-social <--></-->
                            </div><!-- .prr-iconset -->
                            <div class="prr-useful">
                                <?php if ( true == get_theme_mod( 'dreamer_search_switch_setting', true ) ) : ?>
                                    <a href="#" class="js-search-icon"><span class="search-icon"><span class="icon icofont-search-2"></span></span></a>

                                    <div class="header-search-form clearfix">
                                        <?php get_search_form( $echo = true ); ?>
                                        <a href="#" id="close">
                                            <span class="icofont-close-line"></span>
                                        </a>
                                        <p><?php echo esc_html__( 'Hit enter to search or ESC to close', 'dreamer-blog' ); ?></p>
                                    </div><!-- /.search-form -->
                                    <span class="search-overlay"></span>
                                <?php endif; ?>
                                <a href="#" class="js-mobile-close-icon mobile-close-icon"><span class="icofont-plus js-mobile-icon mobile-icon"></span></a>
                            </div><!-- .prr-useful -->
                        </div><!-- .prr-iconset -->
                    </div><!-- .col-md-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </header>
        <nav class="mobile-navigation">
            <?php
                if ( has_nav_menu( 'mobile_menu' ) ) :
                    wp_nav_menu( array(
                        'theme_location'    => 'mobile_menu',
                        'container'         => false,
                        'menu_class'        => 'main-nav',
                        'depth'             => '4',
                        'walker'            => new Dreamer_Dropdown_Toggle_Walker_Nav_Menu()
                    ) );
                elseif ( has_nav_menu( 'header_menu' ) ) :
                    wp_nav_menu( array(
                        'theme_location' => 'header_menu',
                        'container'         => false,
                        'menu_class'        => 'main-nav',
                        'depth'             => '4',
                        'walker'            => new Dreamer_Dropdown_Toggle_Walker_Nav_Menu()
                    ) );
                endif;
            ?>

            <div class="prr-iconset ct-mobile-social clearfix">
                <div class="prr-social">
                    <?php
                        if ( has_nav_menu( 'social_menu' ) ) {
                            wp_nav_menu(
                                array(
                                    'theme_location'    => 'social_menu',
                                    'container'         => 'li',
                                    'menu_id'           => 'menu-social-items',
                                    'menu_class'        => 'menu-items menu-social',
                                    'depth'             => 1,
                                    'link_before'       => '<span class="screen-reader-text">',
                                    'link_after'        => '</span>',
                                    'fallback_cb'       => '',
                                )
                            );
                        }
                    ?>
                </div><!-- .prr-social <--></-->
            </div><!-- .prr-iconset -->

            <a href="#" class="inside-mobile-close-button js-mobile-close-icon"><span class="icofont-plus js-mobile-icon mobile-icon"></span></a>
        </nav>

