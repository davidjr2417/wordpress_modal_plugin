<?php
/**
 * The default template for displaying content
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
		<div class="col-sm-4">
			<?php 
			
			if(has_post_thumbnail()) :
				the_post_thumbnail();
			else : ?>
			<img alt="<?php the_title(); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/images/placeholder.png" />
		<?php endif; ?>
	</div>			
	<?php if ( is_single() ) : ?>
		<div class="col-sm-12">
			<header class="entry-header">
				<h2 class="entry-title"><?php the_title(); ?></h2>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php the_content();?>
			</div><!-- .entry-content -->
		<?php else : ?>
			<div class="col-sm-8">
				<?php echo '<div class="category-list">' . get_the_category_list() . '</div>'; ?>

				<h3 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h3>
				<div class="entry-summary">
					<p><?php the_excerpt(); ?></p>
					<?php 	$file = get_field('document');
            if( $file ): ?>
						<a class="btn btn-default" title="<?php echo $file['filename']; ?>" href="<?php echo $file['url']; ?>">Download</a>
					<?php endif; ?>
				</div><!-- .entry-summary -->
					
			<?php endif; // is_single() ?>

		</div><!-- col-sm- 8 OR col-sm-12-->
	</article><!-- #post -->
</div><!-- .row -->