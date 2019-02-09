<?php get_header(); ?>
<!-- Standard WP Post Loop -->
<?php
 if( have_posts() ):
    while( have_posts() ): the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>
      </div>
    <?php endwhile;
  endif;
?>

<?php get_footer(); ?>
