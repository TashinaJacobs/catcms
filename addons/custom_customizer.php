<?php
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

?>
