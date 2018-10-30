<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


<?php get_template_part( 'partials/pages/_page_banner' ); ?>
        
<div class="container container-normal">
      <div class="row maincontent lower">
	  	  <div class="col-sm-8">
	

			<div class="post">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'bplf' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->

		</div><!-- col-sm-8 -->

	
      </div>  
<?php get_footer(); ?>
