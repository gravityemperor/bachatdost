<?php

function dreamer_blog_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'dreamer-blog' ),
        'id'            => 'dreamer_blog-main-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in your single post sidebar area.', 'dreamer-blog' ),
        'before_widget' => '<div id="%1$s" class="%2$s sidebar-widgetarea widgetarea">',
        'after_widget'  => '</div><!-- /.sidebar-widgetarea -->',
        'before_title'  => '<h3 class="widget-title ct-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Left', 'dreamer-blog' ),
        'id'            => 'dreamer_blog-footer-left',
        'description'   => esc_html__( 'Add widgets here to appear on your left footer section.', 'dreamer-blog' ),
        'before_widget' => '<div id="%1$s" class="%2$s widgetarea">',
        'after_widget'  => '</div><!-- /.widgetarea -->',
        'before_title'  => '<h2 class="ct-header ct-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Middle', 'dreamer-blog' ),
        'id'            => 'dreamer_blog-footer-middle',
        'description'   => esc_html__( 'Add widgets here to appear on your middle footer section.', 'dreamer-blog' ),
        'before_widget' => '<div id="%1$s" class="%2$s widgetarea">',
        'after_widget'  => '</div><!-- /.widgetarea -->',
        'before_title'  => '<h2 class="ct-header ct-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Right', 'dreamer-blog' ),
        'id'            => 'dreamer_blog-footer-right',
        'description'   => esc_html__( 'Add widgets here to appear on your right footer section.', 'dreamer-blog' ),
        'before_widget' => '<div id="%1$s" class="%2$s widgetarea">',
        'after_widget'  => '</div><!-- /.widgetarea -->',
        'before_title'  => '<h2 class="ct-header ct-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Top Articles', 'dreamer-blog' ),
        'id'            => 'dreamer_blog_home_page_grid_widget_setting',
        'description'   => esc_html__( 'Add widgets here to appear on your right footer section.', 'dreamer-blog' ),
        'before_widget' => '<div id="%1$s" class="%2$s widgetarea">',
        'after_widget'  => '</div><!-- /.widgetarea -->',
        'before_title'  => '<div class="ct-list-heading"><h2 class="ct-heading">',
        'after_title'   => '</h2></div>',
    ) );
}


add_action( 'widgets_init', 'dreamer_blog_widgets_init' );
