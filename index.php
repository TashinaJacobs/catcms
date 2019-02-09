<?php get_header();
// Standard WP Post Loop
  if( have_posts() ):
    while( have_posts() ): the_post(); ?>
      <div class="container">
        <h1><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>
      </div>
    <?php endwhile;
  endif;
  
get_footer(); ?>
