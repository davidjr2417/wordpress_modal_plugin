<?php 
  // WP_Query arguments
  $args = array (
  	'post_type'         => 'resource',
  	'posts_per_page'  => 1,
  	'orderby'           => 'menu_order',
  'order'      => 'ASC',
  	'meta_query' => array(
         array(
             'key' => 'featured_resources',
             'value' => 1
         )
     )	
  );

  // The Query
  $resource = new WP_Query( $args );

  // The Loop
  if($resource->have_posts()) :
  
  while($resource->have_posts()) : $resource->the_post();
    
     get_template_part('content', 'feat-resource');

  endwhile; 
  
  else :
  
    _e("There in no featured resource at the moment.","boen");

  endif; wp_reset_postdata(); ?>