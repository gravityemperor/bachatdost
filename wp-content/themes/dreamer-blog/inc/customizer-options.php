<?php
function dreamer_blog_section_setup( $wp_customize ) {

  $wp_customize->add_section( 'dreamer_options',
   array(
      'title'       => __( 'Home Page Setup', 'dreamer-blog' ), //Visible title of section
      'priority'    => 20, //Determines what order this appears in
      'capability'  => 'edit_theme_options', //Capability needed to tweak
      'panel'       => 'dreamer_homepage_panel_id',
   )
  );

  $wp_customize->add_section( 'dreamer_banner_options',
   array(
      'title'       => __( 'Home Banner Settings', 'dreamer-blog' ), //Visible title of section
      'priority'    => 20, //Determines what order this appears in
      'capability'  => 'edit_theme_options', //Capability needed to tweak
      'panel'       => 'dreamer_homepage_panel_id',
   )
  );

  $wp_customize->add_panel( 'dreamer_homepage_panel_id', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Homepage',
    'description'    => '',
  ) );
  /******************************** Big Category *****************************/
  // Credits: https://blog.josemcastaneda.com/2015/05/13/customizer-dropdown-category-selection/
  // create an empty array
  $cats = array();

  // we loop over the categories and set the names and
  // labels we need
  foreach ( get_categories() as $categories => $category ){
    $cats[$category->term_id] = $category->name;
  }

    $wp_customize->add_setting( 'dreamer_slider_section_category_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => '1', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'absint',

     )
    );
    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'dreamer_slider_section_category_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Slider Section Category', 'dreamer-blog' ), //Admin-visible name of the control
        'settings'   => 'dreamer_slider_section_category_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'dreamer_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => $cats,
    )
    ) );

  $wp_customize->add_setting( 'dreamer_masonry_section_category_setting', array(
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
      'default'           => 9,
  ) );

  $wp_customize->add_control(
      new WP_Customize_Control(
          $wp_customize, 'dreamer_masonry_section_category_control',
          array(
              'label'           => __( 'Number of post in masonary section', 'dreamer-blog' ),
              'section'         => 'dreamer_options',
              'settings'        => 'dreamer_masonry_section_category_setting',
              'type'            => 'number',
          )
      )
  );

}

add_action( 'customize_register', 'dreamer_blog_section_setup');

function dreamer_blog_accent_color_setup( $wp_customize ) {

  /******************************** Primary Color *****************************/
    $wp_customize->add_setting( 'dreamer_blog_primary_color_setting', array(
      'default'   => '#f6727f',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dreamer_blog_primary_color_control', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Primary color', 'dreamer-blog' ),
      'settings'      =>  'dreamer_blog_primary_color_setting',
    ) ) );
}

add_action( 'customize_register', 'dreamer_blog_accent_color_setup');
