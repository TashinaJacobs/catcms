<?php
// Custom theme styles start
function add_custom_theme_styles(){
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.3', 'all');
  wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme-style.css', array(), '0.0.1', 'all');

  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '4.1.3', true);
  wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array(), '0.0.1', 'all');
}
add_action('wp_enqueue_scripts', 'add_custom_theme_styles');
// Custom theme styles end

// Custom logo and thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size('icon', 50, 50, true);

function add_custom_theme_supports(){
  add_theme_support('post-formats', array('gallery', 'image', 'link'));
}
add_action('wp_enqueue_scripts', 'add_custom_theme_supports');
function add_custom_logo(){
  add_theme_support('custom-logo', array(
    'height' => 100,
    'width'  => 300,
    'flex-width' => true,
    'flex-height' => true
  ));
}
add_action('init', 'add_custom_logo');

// Default header image
register_default_headers( array(
    'defaultImage' => array(
        'url'           => get_template_directory_uri() . '/assets/images/default.jpg',
        'thumbnail_url' => get_template_directory_uri() . '/assets/images/default.jpg',
        'description'   => __( 'defaultImage', 'catcms' )
    )
) );
$defaultImage = array(
  'default-image'          => get_template_directory_uri() . '/assets/images/default.jpg',
  'width'                  => 1280,
  'height'                 => 600,
    'header-text'            => false
);
add_theme_support( 'custom-header', $defaultImage );


// Customizer
function custom_theme_customizer($wp_customize) {

  // Colors

  $wp_customize->add_section('colors', array(
    'title' => __('Colors', 'catcms'),
    'priority' => 20
  ));

  // Body font colors
  $wp_customize->add_setting('body_font_color_setting', array(
      'default' => '#000000',
      'transport' => 'refresh'
  ));

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'body_font_color_setting',
          array(
              'label' => __('Body Font Color', 'catcms'),
              'section' => 'colors',
              'settings' => 'body_font_color_setting'
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
      'default' => '#696665',
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



  // Footer color

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
      color: <?php echo get_theme_mod('body_font_color_setting', '#000000'); ?> !important;
    }

    .navbar-nav {
      background-color: <?php echo get_theme_mod('background_color_setting', '#696665'); ?> !important;
    }
    </style>
  <?php
}

add_action('wp_head', 'custom_theme_customizer_styles');


// Include custom post types


// Include customizer
// require get_parent_theme_file_path('./addons/custom_customizer.php');

// Include custom navwalker
require_once get_template_directory() . '/addons/bs4navwalker.php';

// Register WordPress nav menu
register_nav_menu('top', 'Top menu');
