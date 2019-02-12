<?php get_header(); ?>
<!-- Standard WP Post Loop -->


  <?php if (have_posts()): ?>
    <?php while ( have_posts()): the_post(); ?>
      <div class="page-title">
        <h1><?php the_title(); ?></h1>
      </div>
      <p><?php the_content(); ?></p>
    <?php endwhile; ?>
  <?php endif ?>

<?php get_footer(); ?>
