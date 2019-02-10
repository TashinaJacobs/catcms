<?php
  // /* Template Name: Adopt
 ?>
<?php get_header(); ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>

            <?php get_template_part('content', get_post_format()); ?>

            <?php if( has_post_thumbnail() ): ?>
                <?php  $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                echo '<div class="bg-img" style="background: url('. $url.')"></div>'; ?>
            <?php endif; ?>
            <div class="container">
            <div class="text-center mb-5 mt-5">
                <h3 class="subheader mb-3"><?php the_title(); ?></h3>
                <h6 class="body"><?php the_content(); ?></h6>
            </div>


        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer(); ?>
