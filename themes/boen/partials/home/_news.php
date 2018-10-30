<!--  -->
<!-- News -->
<!--  -->

<?php 
// WP_Query arguments
$args = array (
  'post_type'              => 'news',
  'posts_per_page'         => 2,
  'meta_key'               => 'featured',
  'meta_value'             => true
);

// The Query
$news = new WP_Query( $args );

// The Loop
if($news->have_posts()) : ?>
      
  <?php while($news->have_posts()) : $news->the_post(); ?>
      
    <div class="col-sm-4">
        
      <?php get_template_part('partials/home/_subcard' ); ?>

    </div><!-- /.col-sm-4 -->

  <?php endwhile;?> 

    
<?php else : ?>
    
  <?php 
  // _e("There in no featured news at the moment.","boen"); 
  ?>

<?php endif; wp_reset_postdata(); ?>