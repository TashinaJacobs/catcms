<?php
/*
    This file holds all the functionality of our theme.
    It will be different on every theme you create.
*/
/*
    What we are doing bellow is adding our bootstrap styles into our theme.
    We can't do it the normal way which we have done in the past, but rather add it into the wp_head or wp_footer sections
    Whenever we work in the functions.php file, we need to create a function to tell it what to do
    and then tell wordpress what loading que do you want that function to be a part of.
    This one bellow is adding in our css and js into the scripts que which gets loaded when the page loads
    https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
*/

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
  add_theme_support('post-formats', array('aside', 'gallery', 'image', 'video', 'link'));
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
// Custom logo support end


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


//Customizer
function custom_theme_customizer($wp_customize) {
  $wp_customize->add_section('front_page_section', array(
    'title' => __('Front Page', 'catcms'),
    'priority' => 20
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

  $wp_customize->add_setting('front_page_text_two', array(
    'default' => 'Text here',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'front_page_text_control_two',
      array (
        'label' => __('Front Page Text Two', 'catcms'),
        'section' => 'front_page_section',
        'settings' => 'front_page_text_two',
        'type' => 'text'
      )
      )
  );
}

add_action('customize_register', 'custom_theme_customizer');



// Include custom navwalker
require_once('bs4navwalker.php');

// Register WordPress nav menu
register_nav_menu('top', 'Top menu');
