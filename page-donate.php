<?php
/* Template Name: Donate Page */
 ?>

<?php get_header(); ?>

<?php if(have_posts()): ?>
  <?php while(have_posts()): the_post();?>
    <div class="page-title primary-color">
      <h1><?php the_title(); ?></h1>
    </div>
    <?php
    // $donate = new WP_Query('post_type=staff&order=ASC&orderby=title');
    $args = array(
        'post_type' => 'donate',
        'order' => 'DESC',
        'orderby' => 'title',
        'posts_per_page' => -1
    );
    $donate = new WP_Query($args);
 ?>
   <?php if( $donate->have_posts() ): ?>
     <?php while($donate->have_posts()): $donate->the_post();?>
       <div class="donate-intro">
         <?php the_title(); ?>
       </div>
       <div class="donate-content">
        <?php the_content(); ?>
       </div>
       <?php endwhile; ?>
   <?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
