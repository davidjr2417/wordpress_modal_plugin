<?php
/**
 * The template for displaying a blog roll
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<div class="row">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="col-sm-5">
			<?php if(has_post_thumbnail()) :?>
					<a href="<?php echo get_the_permalink();?>"><?php the_post_thumbnail();?></a>
			<?php else : ?>
				 <a href="<?php echo get_the_permalink(); ?>"><img alt="<?php the_title(); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/images/placeholder-blog.png" /></a>
			<?php endif; ?>
		</div>
			
				<div class="col-sm-7">
				<p>Posted <?php the_time('F j, Y'); ?> by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
				<h3 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h3>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

		</div><!-- col-sm-7 -->
	</article><!-- #post -->
</div><!-- .row -->