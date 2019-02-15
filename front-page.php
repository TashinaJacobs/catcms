<?php
/* Template Name: Home Page */
get_header(); ?>

<div class="page-content">
  <div class="front-page-title primary-color">
    <h2><?php echo get_theme_mod('front_page_text'); ?></h2>
  </div>
  <div class="front-page-body secondary-color">
    <p><?php echo get_theme_mod('front_page_text_two'); ?></p>
  </div>
</div>
<?php get_footer(); ?>
