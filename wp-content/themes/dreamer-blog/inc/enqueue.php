<?php

/***************************************************************************************************
 * Enqueue all CSS and JS
 ***************************************************************************************************/

if ( ! function_exists( 'dreamer_blog_enqueue_cs_js' ) ) :

function dreamer_blog_enqueue_cs_js() {

    $dreamer_blog_primary_color  = esc_attr( get_theme_mod( 'dreamer_blog_primary_color_setting' ) ); //E.g. #FF0000
    $dreamer_blog_custom_css     = "
        .prr-category a,
        .display-tag a,
        .main-nav > li a:hover,
        a:hover,
        .prr-iconset a:hover::before,
        .site-navigation .main-nav .menu-item-has-children > a::after {
            color: {$dreamer_blog_primary_color};
        }
        .post-slide-hor-arrow div, .post-slide-hor-2-arrow div,
        .link-pages .current .page-numbers,
        .post-content a.post-page-numbers:hover span,
        .pagination .nav-links .page-numbers {
            background: {$dreamer_blog_primary_color};
        }
        .ct-content-area .entry-content a,
        .ct-content-area .single-post-content a
        {
            color: {$dreamer_blog_primary_color};
            border-bottom: 1px solid $dreamer_blog_primary_color;
        }
        .ct-content-area .entry-content a:hover{
            background-color: $dreamer_blog_primary_color;
            border-bottom: 1px solid $dreamer_blog_primary_color;
        }
        .ct-masonry .ct-list-heading .ct-heading,
        .ct-sidebar-widget .ct-title {
            border-bottom: 2px solid $dreamer_blog_primary_color;
        }
        .ct-scroll-bar,
        .ct-content-area .single-post-content a:hover {
            background-color: $dreamer_blog_primary_color;
        }

        .animated-underline {
            background-image: linear-gradient(180deg, transparent 90%, $dreamer_blog_primary_color 0);
        }

        blockquote {
            border-left: 10px solid $dreamer_blog_primary_color;
        }

        .main-nav>.menu-item-has-children:hover>ul,
        .main-nav>.has-children:hover>ul,
        .mobile-nav>li,
        .site-navigation .main-nav .menu-item-has-children > .sub-menu {
            border-bottom: 1px solid $dreamer_blog_primary_color;
        }
        .main-nav .menu-item-has-children .menu-item-has-children>ul,
        .main-nav .has-sub-children>ul,
        .nav-parent{
            border-left: 1px solid $dreamer_blog_primary_color;
        }

        .newsletter-area .newsletter-form input[type=\"submit\"]{
            background-color: {$dreamer_blog_primary_color};
            border: 1px solid {$dreamer_blog_primary_color};

            box-shadow: 0px 3px 12px {$dreamer_blog_primary_color};
        }
        .prr-instagram-feed .sbi_follow_btn:before {
            border: 1px solid $dreamer_blog_primary_color;
        }
        .prr-instagram-feed #sb_instagram svg:not(:root).svg-inline--fa {
            color:{$dreamer_blog_primary_color};
        }
        .footer {
            border-top: 2px solid $dreamer_blog_primary_color;
        }
        .footer-site-info{
            border-top: 1px solid $dreamer_blog_primary_color;
        }
        input:hover, input[type=\"text\"]:hover,
        input[type=\"email\"]:hover,
        input[type=\"url\"]:hover,
        textarea:hover,
        .form-submit #submit {
            border-bottom-color: $dreamer_blog_primary_color;
        }
        .prr-cat-tag {
            background: $dreamer_blog_primary_color;
            box-shadow: 0px 3px 12px {$dreamer_blog_primary_color};
        }
        .next-post-wrap:before, .previous-post-wrap:before {
            color: {$dreamer_blog_primary_color};
        }
        .slick-slider .slick-dots,
        .ct-content-area .ct-content .post-tags a:hover,
        .link-pages .page-numbers:hover {
            background-color: {$dreamer_blog_primary_color};
        }

        .read-more:hover::after {
            color: {$dreamer_blog_primary_color};
        }
        ";

    wp_enqueue_style( 'dreamer-blog-gfonts', dreamer_blog_fonts_url(), array(), '1.0.0' );
    wp_enqueue_style( 'dreamer-blog-normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'dreamer-blog-icofont', get_template_directory_uri() . '/assets/css/icofont.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'dreamer-blog-bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'dreamer-blog-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'dreamer-blog-slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'dreamer-blog-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'dreamer-blog-style-css', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all' );

    $dreamer_blog_check_color = get_theme_mod( 'dreamer_blog_primary_color_setting' );
    if ( !empty( $dreamer_blog_check_color ) ) {
        wp_add_inline_style( 'dreamer-blog-style-css', $dreamer_blog_custom_css );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_enqueue_script( 'dreamer-blog-jquery-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'masonry' );
    wp_enqueue_script( 'dreamer-blog-jquery-custom', get_template_directory_uri() . '/assets/js/jquery-custom.js', array( 'jquery' ), '1.0.0', true );
}

endif;

add_action( 'wp_enqueue_scripts', 'dreamer_blog_enqueue_cs_js' );

// Admin Scripts
if ( ! function_exists( 'dreamer_blog_admin_scripts' ) ) :
function dreamer_blog_admin_scripts() {
    // For categories
    if( null !== ( $screen = get_current_screen() ) && 'edit-category' !== $screen->id ) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script( 'dreamer-blog-jquery-admin-notice-script', get_template_directory_uri() . '/assets/js/jquery-admin.js', array( 'jquery' ), '', true );
}
endif;
add_action( 'admin_enqueue_scripts', 'dreamer_blog_admin_scripts' );













