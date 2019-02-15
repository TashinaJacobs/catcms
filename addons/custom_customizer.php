<?php
// Customizer
function custom_theme_customizer($wp_customize) {

  // Colors

  $wp_customize->add_section('colors', array(
    'title' => __('Colors', 'catcms'),
    'priority' => 20
  ));

  // Text colors

  // Primary text color

  $wp_customize->add_setting('primary_text_color_setting', array(
      'default' => '#2ea9ac',
      'transport' => 'refresh'
  ));

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'primary_text_color_setting',
          array(
              'label' => __('Primary Text Color', 'catcms'),
              'section' => 'colors',
              'settings' => 'primary_text_color_setting'
          )
      )
  );

  // Secondary text color

  $wp_customize->add_setting('secondary_text_color_setting', array(
      'default' => '#000000',
      'transport' => 'refresh'
  ));

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'secondary_text_color_setting',
          array(
              'label' => __('Secondary Text Color', 'catcms'),
              'section' => 'colors',
              'settings' => 'secondary_text_color_setting'
          )
      )
  );

  // Background color
  $wp_customize->add_setting('background_color_setting', array(
      'default' => '#ffffff',
      'transport' => 'refresh'
  ));

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'background_color_setting',
          array(
              'label' => __('Background Color', 'catcms'),
              'section' => 'colors',
              'settings' => 'background_color_setting'
          )
      )
  );

  // Header color
  $wp_customize->add_setting('header_navbar_color_setting', array(
      'default' => '#ffffff',
      'transport' => 'refresh'
  ));

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'header_navbar_color_setting',
          array(
              'label' => __('Header Navbar Color', 'catcms'),
              'section' => 'colors',
              'settings' => 'header_navbar_color_setting'
          )
      )
  );



  // Footer background color
  $wp_customize->add_setting('footer_background_color_setting', array(
      'default' => '#696665',
      'transport' => 'refresh'
  ));

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'footer_background_color_setting',
          array(
              'label' => __('Footer Background Color', 'catcms'),
              'section' => 'colors',
              'settings' => 'footer_background_color_setting'
          )
      )
  );

  // Footer text color
  $wp_customize->add_setting('footer_text_color_setting', array(
      'default' => '#ffffff',
      'transport' => 'refresh'
  ));

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'footer_text_color_setting',
          array(
              'label' => __('Footer Text Color', 'catcms'),
              'section' => 'colors',
              'settings' => 'footer_text_color_setting'
          )
      )
  );


  // First landing page text input control
  $wp_customize->add_section('front_page_section', array(
    'title' => __('Front Page', 'catcms'),
    'priority' => 30
  ));

  $wp_customize->add_setting('front_page_text', array(
    'default' => 'Text here',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'front_page_text_control',
      array (
        'label' => __('Front Page Text', 'catcms'),
        'section' => 'front_page_section',
        'settings' => 'front_page_text',
        'type' => 'text'
      )
    )
  );

// Second landing page text input control
  $wp_customize->add_setting('front_page_text_two', array(
    'default' => 'Text here',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'front_page_text_control_2',
      array (
        'label' => __('Front Page Text Two', 'catcms'),
        'section' => 'front_page_section',
        'settings' => 'front_page_text_two',
        'type' => 'text'
      )
    )
  );

// Footer input and default control
  $wp_customize->add_section('footer_section', array(
    'title' => __('Footer Text', 'catcms'),
    'priority' => 40
  ));

  $wp_customize->add_setting('footer_text', array(
    'default' => '© Cats Protection League 2019',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'footer_text_control',
      array (
        'label' => __('Footer Text', 'catcms'),
        'section' => 'footer_section',
        'settings' => 'footer_text',
        'type' => 'text'
      )
    )
  );


} // customize_function CLOSES
add_action('customize_register', 'custom_theme_customizer');

// Adding style changes from customizer

function custom_theme_customizer_styles(){
  ?>
    <style type="text/css">
    body, html {
      background-color: <?php echo get_theme_mod('background_color_setting', '#ffffff'); ?> !important;
    }

    .page-title {
      border-bottom: solid 5px <?php echo get_theme_mod('footer_background_color_setting', '#696665'); ?> !important;
    }

    .primary-color {
      color: <?php echo get_theme_mod('primary_text_color_setting', '#2ea9ac'); ?> !important;
    }

    .secondary-color {
      color: <?php echo get_theme_mod('secondary_text_color_setting', '#000000'); ?> !important;
    }

    .navbar-nav {
      background-color: <?php echo get_theme_mod('header_navbar_color_setting', '#ffffff'); ?> !important;
    }

    footer {
      background-color: <?php echo get_theme_mod('footer_background_color_setting', '#696665') ?> !important;
      color: <?php echo get_theme_mod('footer_text_color_setting', '#ffffff'); ?> !important;
    }
    </style>
  <?php
}

add_action('wp_head', 'custom_theme_customizer_styles');

?>
