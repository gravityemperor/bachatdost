<?php

function calm_blog_blog_section_setup( $wp_customize ) {

  $wp_customize->add_section( 'calm_blog_options',
   array(
      'title'       => __( 'Homepage Setup', 'calm-blog' ), //Visible title of section
      'priority'    => 20, //Determines what order this appears in
      'capability'  => 'edit_theme_options', //Capability needed to tweak
   )
  );

  $wp_customize->add_section( 'calm_blog_single_options',
   array(
      'title'       => __( 'Single Page Settings', 'calm-blog' ), //Visible title of section
      'priority'    => 20, //Determines what order this appears in
      'capability'  => 'edit_theme_options', //Capability needed to tweak
   )
  );

  $wp_customize->add_section( 'calm_blog_footer_options',
   array(
      'title'       => __( 'Footer', 'calm-blog' ), //Visible title of section
      'priority'    => 20, //Determines what order this appears in
      'capability'  => 'edit_theme_options', //Capability needed to tweak
   )
  );
  /******************************** Big Category *****************************/
  // Credits: https://blog.josemcastaneda.com/2015/05/13/customizer-dropdown-category-selection/
  // create an empty array
  $cats = array();

  // we loop over the categories and set the names and
  // labels we need
  foreach ( get_categories() as $categories => $category ){
    $cats[$category->term_id] = $category->name;
  }

    $wp_customize->add_setting( 'calm_blog_grid_section_category_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => '1', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'absint',
     )
    );
    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'calm_blog_grid_section_category_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Grid Section Category', 'calm-blog' ), //Admin-visible name of the control
        'settings'   => 'calm_blog_grid_section_category_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'calm_blog_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => $cats,
    )
    ) );

    $wp_customize->add_setting( 'calm_blog_scroll_section_category_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => '1', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'absint',
     )
    );
    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'calm_blog_scroll_section_category_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Vertical Slider Section Category', 'calm-blog' ), //Admin-visible name of the control
        'settings'   => 'calm_blog_scroll_section_category_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'calm_blog_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => $cats,
    )
    ) );

    $wp_customize->add_setting( 'calm_blog_bottom_section_category_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => '1', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'absint',
     )
    );
    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'calm_blog_bottom_section_category_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Bottom Section Category', 'calm-blog' ), //Admin-visible name of the control
        'settings'   => 'calm_blog_bottom_section_category_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'calm_blog_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => $cats,
    )
    ) );

    $wp_customize->add_setting( 'calm_blog_single_page_image_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => 'container', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'calm_blog_sanitize_select',
     )
    );

    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'calm_blog_single_page_image_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Single Post Featured Image', 'calm-blog' ), //Admin-visible name of the control
        'settings'   => 'calm_blog_single_page_image_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'calm_blog_single_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => array(
            'container' => 'In container',
            'full-width' => 'Full Width',
        ),
    )
    ) );
}

add_action( 'customize_register', 'calm_blog_blog_section_setup');

function calm_blog_accent_color_setup( $wp_customize ) {

  /******************************** Primary Color *****************************/
    $wp_customize->add_setting( 'calm_blog_primary_color_setting', array(
      'default'   => '#DD3333',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'calm_blog_primary_color_control', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Primary color', 'calm-blog' ),
      'settings'      =>  'calm_blog_primary_color_setting',
    ) ) );

    // Fancy Underline Color
    $wp_customize->add_setting(
        'fancy_underline_color_setting',
        array(
            'default'     => '#DD3333',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'calm_blog_sanitize_alpha_color',
        )
    );

    $wp_customize->add_control(
        new calm_blog_Customizer_Alpha_Color_Control(
            $wp_customize,
            'fancy_underline_color_control',
            array(
                'label'         => __( 'Fancy Underline Color', 'calm-blog' ),
                'section'       => 'colors',
                'settings'      => 'fancy_underline_color_setting',
                'show_opacity'  => true, // Optional.
            )
        )
    );

  // Display bottom bar copyright text
  $wp_customize->add_setting( 'calm_blog_home_copyright_desc_free_setting', array(
    'default' =>  esc_html__( 'Copyright. All Rights Reserved.', 'calm-blog' ),
    'sanitize_callback' => 'calm_blog_sanitize_text',
  ) );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'calm-blog-blog-copyright-text-control', array(
    'label'   =>  __( 'Bottom bar copyright text', 'calm-blog' ),
    'type'    =>  'textarea',
    'section' =>  'calm_blog_footer_options',
    'settings'  =>  'calm_blog_home_copyright_desc_free_setting',
  ) ) );
}

add_action( 'customize_register', 'calm_blog_accent_color_setup');
