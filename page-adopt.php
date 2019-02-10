<?php
/* Template Name: Adopt Page */
 ?>

<?php get_header(); ?>

<?php if(have_posts()): ?>
    <?php while(have_posts()): the_post();?>
      <h1><?php the_title(); ?></h1>
      <div class="wp_content">
          <?php the_content(); ?>
      </div>
  </div>
</div>
<div class="row">
  <?php
      // $allCats = new WP_Query('post_type=staff&order=ASC&orderby=title');
      $args = array(
          'post_type' => 'cats',
          'order' => 'ASC',
          'orderby' => 'title',
          'posts_per_page' => -1
      );
      $allCats = new WP_Query($args);
   ?>
   <?php if( $allCats->have_posts() ): ?>
       <?php while($allCats->have_posts()): $allCats->the_post();?>
           <div class="card">
               <?php if( has_post_thumbnail() ): ?>
                   <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top img-fluid', 'alt'=>'Card image cap']); ?>
               <?php endif; ?>
             <div class="card-body">
               
               <!-- Create link to post -->
               <h5 class="card-title">
                 <a href="<?php echo get_permalink($id) ?>">
                   <?php the_title(); ?>
                 </a>
                 </h5>

               <!-- Show excerpt - if no excerpt, show content -->
               <?php if( has_excerpt() ): ?>
                 <p><?php the_excerpt(); ?></p>
               <?php else: ?>
                  <p><?php the_content(); ?></p>
                <?php endif; ?>
               <?php
                  $id = get_the_id();
                  $cat = get_post_meta($id, 'cat', true);
               ?>

               <?php if($cat): ?>
                   <p><?= $cat; ?></p>
              <?php endif; ?>

             </div>
           </div>
       <?php endwhile; ?>
   <?php endif; ?>

      </div>
  </div>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
