
<?php get_header(); ?>
  <?php if (have_posts()): ?>
    <?php while ( have_posts()): the_post(); ?>

      <div class="page-title primary-color">
        <h1><?php the_title(); ?></h1>
      </div>
        <div class="cat-image-container">
          <?php if( has_post_thumbnail() ): ?>
              <?php the_post_thumbnail('medium', ['class'=>'cat-img', 'alt'=>'Cat image']) ?>
            <?php endif; ?>
        </div>

        <div class="cat-excerpt-container">
          <?php if( has_excerpt() ): ?>
            <p><?php the_excerpt(); ?></p>
          <?php endif; ?>
        </div>

        <div class="cat-description-container">
          <p><?php the_content(); ?></p>
        </div>
        
    <?php endwhile; ?>
  <?php endif ?>
<?php get_footer(); ?>
