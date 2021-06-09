<?php

/***************************************************************************************************
 * Enqueue all CSS and JS
 ***************************************************************************************************/

if ( ! function_exists( 'calm_blog_enqueue_cs_js' ) ) :

function calm_blog_enqueue_cs_js() {

    $calm_blog_primary_color  = esc_attr( get_theme_mod( 'calm_blog_primary_color_setting' ) ); //E.g. #FF0000
    $calm_blog_fancy_underline_color = esc_attr( get_theme_mod( 'fancy_underline_color_setting' ) );
    $calm_blog_custom_css     = "

        .display-tag a,
        .ct-social li a:hover,
        .main-nav > li a:hover,
        a:hover,
        .ct-masonry .post-content .ct-read-more a:hover,
        .site-navigation .main-nav .menu-item-has-children > a:after,
        .dark-mode span:hover::before,
        .site-navigation .main-nav .menu-item-has-children > a::after {
            color: {$calm_blog_primary_color};
        }
        .post-slide-hor-arrow div, .post-slide-hor-2-arrow div,
        .link-pages .current .page-numbers,
        .post-content a.post-page-numbers:hover span,
        .post-slide-hor-arrow div,
        .post-slide-hor-2-arrow div,
        .post-slide-main-arrow div {
            background: {$calm_blog_primary_color};
        }
        .prr-title,
        .reply a {
            background-image: linear-gradient(180deg, transparent 65%, $calm_blog_primary_color 0);
        }

        .post-content a {
            background-image: linear-gradient(180deg, transparent 65%, $calm_blog_fancy_underline_color 0);
        }

        .animated-underline {
            background-image: linear-gradient(180deg, transparent 90%, $calm_blog_fancy_underline_color 0);
        }

        blockquote {
            border-left: 10px solid $calm_blog_primary_color;
        }

        .main-nav>.menu-item-has-children:hover>ul,
        .main-nav>.has-children:hover>ul,
        .mobile-nav>li,
        .site-navigation .main-nav .menu-item-has-children > .sub-menu {
            border-bottom: 1px solid $calm_blog_primary_color;
        }
        .main-nav .menu-item-has-children .menu-item-has-children>ul,
        .site-navigation .main-nav .menu-item-has-children .sub-menu .menu-item-has-children .sub-menu,
        .main-nav .has-sub-children>ul,
        .nav-parent{
            border-left: 1px solid $calm_blog_primary_color;
        }

        .newsletter-area .newsletter-form input[type=\"submit\"]{
            background-color: {$calm_blog_primary_color};
            border: 1px solid {$calm_blog_primary_color};

            box-shadow: 0px 3px 12px {$calm_blog_primary_color};
        }
        .prr-instagram-feed .sbi_follow_btn:before {
            border: 1px solid $calm_blog_primary_color;
        }
        .prr-instagram-feed #sb_instagram svg:not(:root).svg-inline--fa {
            color:{$calm_blog_primary_color};
        }
        footer.prr-footer {
            border-top: 2px solid $calm_blog_primary_color;
        }
        .footer-site-info{
            border-top: 1px solid $calm_blog_primary_color;
        }
        input:hover, input[type=\"text\"]:hover,
        input[type=\"email\"]:hover,
        input[type=\"url\"]:hover,
        textarea:hover,
        .form-submit #submit {
            border-bottom-color: $calm_blog_primary_color;
        }
        .prr-cat-tag {
            background: $calm_blog_primary_color;
            box-shadow: 0px 3px 12px {$calm_blog_primary_color};
        }

        blockquote{
            border-left: 10px solid {$calm_blog_primary_color};
        }
        .next-post-wrap:before, .previous-post-wrap:before {
            color: {$calm_blog_primary_color};
        }";

    $theme          = wp_get_theme();
    $theme_version  = $theme->get( 'Version' );

    wp_enqueue_style( 'calm-blog-gfonts', calm_blog_fonts_url(), array(), '1.0.0' );
    wp_enqueue_style( 'calm-blog-normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'calm-blog-icofont', get_template_directory_uri() . '/assets/css/icofont.min.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'calm-blog-bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'calm-blog-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'calm-blog-slick', get_template_directory_uri() . '/assets/css/slick.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'calm-blog-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'calm-blog-style-css', get_template_directory_uri() . '/style.css', array(), $theme_version, 'all' );

    $calm_blog_check_color = get_theme_mod( 'calm_blog_primary_color_setting' );
    if ( !empty( $calm_blog_check_color ) ) {
        wp_add_inline_style( 'calm-blog-style-css', $calm_blog_custom_css );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
  		wp_enqueue_script( 'comment-reply' );
  	}
    wp_enqueue_script( 'calm-blog-jquery-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), $theme_version, true );
    wp_enqueue_script( 'calm-blog-jquery-custom', get_template_directory_uri() . '/assets/js/jquery-custom.js', array( 'jquery' ), $theme_version, true );
}

endif;

add_action( 'wp_enqueue_scripts', 'calm_blog_enqueue_cs_js' );

// Admin Scripts
if ( ! function_exists( 'calm_blog_admin_scripts' ) ) :
function calm_blog_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script( 'calm-blog-jquery-admin-notice-script', get_template_directory_uri() . '/assets/js/jquery-admin.js', array( 'jquery' ), '', true );
    wp_localize_script( 'calm-blog-jquery-admin-notice-script', 'ct_ajax_objects',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
endif;
add_action( 'admin_enqueue_scripts', 'calm_blog_admin_scripts' );
add_action( 'customize_controls_enqueue_scripts', 'calm_blog_admin_scripts' );












