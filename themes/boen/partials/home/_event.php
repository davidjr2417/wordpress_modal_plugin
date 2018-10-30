<!--  -->
<!-- events -->
<!--  -->


<?php 
// WP_Query arguments
$args = array (
  'post_type'              => 'tribe_events',
  'posts_per_page'         => 2,
  'featured'       => true
);

// The Query
$events = new WP_Query( $args );

// The Loop
if($events->have_posts()) : ?>
      
  <?php while($events->have_posts()) : $events->the_post(); ?>
      
    <div class="col-sm-4">
        
      <?php get_template_part('partials/home/_subcard' ); ?>

    </div><!-- /.col-sm-4 -->

  <?php endwhile;?> 

    
<?php else : ?>
    
  <?php
   // _e("There in no featured events at the moment.","boen"); 
   ?>

<?php endif; wp_reset_postdata(); ?>