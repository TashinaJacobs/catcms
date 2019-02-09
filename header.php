<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-faded">
      <?php
        $custom_logo = get_theme_mod('custom_logo');
        $logo_url = wp_get_attachment_image_url($custom_logo, 'medium');
      ?>
      <?php if($custom_logo): ?>
          <a href="<?= bloginfo('home');?>" class="navbar-brand">
            <img src="<?= $logo_url ?>" alt="Company Logo" height="80">
          </a>
        <?php else:?>
        <a href="<?= bloginfo('home'); ?>" class="navbar-brand"><?= bloginfo('name'); ?></a>
        <?php endif; ?>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <?php
         wp_nav_menu([
           'menu'            => 'top',
           'theme_location'  => 'top',
           'container'       => 'div',
           'container_id'    => 'bs4navbar',
           'container_class' => 'collapse navbar-collapse',
           'menu_id'         => false,
           'menu_class'      => 'navbar-nav mr-auto',
           'depth'           => 2,
           'fallback_cb'     => 'bs4navwalker::fallback',
           'walker'          => new bs4navwalker()
         ]);
       ?>
    </nav>

  <!-- Header image -->
  <?php
      if(get_header_image() == false){
          $bannerImage = get_template_directory_uri() . '/assets/images/default.jpeg';
      } else {
          $bannerImage = get_header_image();
      }
   ?>

   <?php if(get_header_image()): ?>
    <div class="custom-background-img" style="background-image: url(<?= $bannerImage; ?>);">

    </div>
  <?php endif; ?>

  <div class="container">
    <div class="row">
      <div class="col">
