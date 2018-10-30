<!--  -->
<!-- resource -->
<!--  -->

<?php 
// WP_Query arguments
$args = array (
	'post_type'              => 'resource',
	'posts_per_page'         => 1,
	'meta_key'               => 'featured',
	'meta_value'             => true,
);

// The Query
$resource = new WP_Query( $args );

// The Loop
if($resource->have_posts()) :
      
  while($resource->have_posts()) : $resource->the_post();
          
    get_template_part('partials/home/_textcard' );

  endwhile; 
  
  else :
    
    _e("There in no featured resource at the moment.","boen"); 

endif; wp_reset_postdata(); ?>