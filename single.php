
<?php
get_header(); ?>
<h3>This is a single cat</h3>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>

            <!-- <?php get_template_part('content', get_post_format()); ?> -->

            <?php if( has_post_thumbnail() ): ?>
              <?php the_post_thumbnail('thumbnail'); ?>
            <?php endif; ?>
                <h3><?php the_title(); ?></h3>
                <p><?php the_content(); ?></p>
            </div>


        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer(); ?>
