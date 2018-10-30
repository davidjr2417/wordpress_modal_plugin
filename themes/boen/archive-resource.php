<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

  <?php get_template_part( 'partials/pages/_page_banner' ); ?>

  <div class="container container-normal">

    <div class="row maincontent lower">

      <div class="col-sm-12">
                
        <!-- Show Featured Resources -->
        <div class="featured-resources">
          <?php get_template_part( 'partials/pages/_featured_resources' ); ?>
        </div>
        <!-- Show Rest of Resources -->
        <div class="other-resources">
          <?php 
            // WP_Query arguments
            $args = array (
            	'post_type'              => 'resource',
            	'posts_per_page'         => -1,
            'orderby'           => 'menu_order',
        'order'      => 'DESC',
            	'meta_query' => array(
                    array(
                    'key' => 'featured_resources',
                    'value' => true,
                    'compare' => '!='
                   )
               )	
            );

            // The Query
            $resource = new WP_Query( $args );
           

            // The Loop
            if($resource->have_posts()) :
            
            while($resource->have_posts()) : $resource->the_post();
               // echo $resource->have_posts() . " " .  $resource->the_post();
              get_template_part( 'content');
            
            endwhile; 
            
            else :
            
              _e("No Resources found.","boen");
            
            endif; wp_reset_postdata(); ?>
        
        </div>
		  </div><!-- col-sm-12 -->
    </div><!-- .row -->
<?php
get_footer();
