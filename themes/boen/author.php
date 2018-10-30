<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Skeleton
 * @since Skeleton 0.1
 */

get_header(); ?>


<div class="container container-normal">
	<div class="row maincontent authorpage"><div class="col-sm-12"><?php the_breadcrumb(); ?></div></div>
		<div id="content" class="row maincontent" role="main">
						<div class="col-sm-8">
<?php
	/* Queue the first post, that way we know who
	 * the author is when we try to get their name,
	 * URL, description, avatar, etc.
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
		$author_id = get_the_author_meta('ID');
?>

				<h2 class="page-title author"><?php echo get_the_author(); ?></h2>

<?php
// If a user has filled out their description, show a bio on their entries.
	if ( get_the_author_meta( 'description' ) ) : ?>
					<div id="entry-author-info" class="row">
					<div class="col-sm-12">
							<?php the_author_meta( 'description' ); ?>
					</div>
					</div><!-- #entry-author-info -->
	
<?php endif; ?>
			



<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();
	
	/* Run the loop for the author archive page to output the authors posts
	 * If you want to overload this in a child theme then include a file
	 * called loop-author.php and that will be used instead.
	 */
	
	 
	 $args = array(
	 	'author'=> $author_id,
	 	'posts_per_page' => -1,
	 	'post_type' => array('post')
	 );
	 	//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		query_posts( $args );
				/* Start the Loop */ 
				if( have_posts()):
				echo '<h3>'.get_the_author().'\'s Blog Posts</h3>';
				while ( have_posts() ) : the_post(); 
					get_template_part( 'content','blog'); 
		        endwhile; 
		        
		        wpbeginner_numeric_posts_nav();
		        
		        wp_reset_query();
		        endif;
		?>	

</div><!-- #col-sm-8 -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
