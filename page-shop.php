<?php get_header(); ?>
  <?php if (have_posts()): ?>
    <?php while ( have_posts()): the_post(); ?>
      <div class="page-title primary-color">
        <h1><?php the_title(); ?></h1>
      </div>

    <?php endwhile; ?>
  <?php endif ?>
<?php get_footer(); ?>
