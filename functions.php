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

// Custom thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size('icon', 50, 50, true);

// Custom theme supports
function add_custom_theme_supports(){
  add_theme_support('post-formats', array('gallery', 'image', 'link'));
}

add_action('wp_enqueue_scripts', 'add_custom_theme_supports');

// Custom logo
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

// Include custom post types
require get_parent_theme_file_path('./addons/custom_post_types.php');

// Include customizer
require get_parent_theme_file_path('./addons/custom_customizer.php');

// Include custom navwalker
require_once get_template_directory() . '/addons/bs4navwalker.php';

// Register WordPress nav menu
register_nav_menu('top', 'Top menu');

// Disable WP editor in contact form
add_filter( 'user_can_richedit' , '__return_false', 50 );
