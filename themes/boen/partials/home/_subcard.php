<!-- thumbnail -->
<div class="card">


	<!-- thumbnail -->
	<div class="card__thumbnail">
		<a  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="card__img">

			<?php if ( has_post_thumbnail() ) : ?>

			    <?php the_post_thumbnail('post-thumbnail', ['class' => 'card__img']); ?>

			<?php else : ?>

			    <?php echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/placeholder-blog.png"  class="card__img"/>'; ?>

			<?php endif; ?>
		
		</a>

		<span class="card__category">
			<?php the_category(', '); ?>
			<?php echo tribe_get_event_categories (); ?>		
		</span>

	</div><!-- .card__thumbnail -->



	<!-- card-content -->
	<div class="card__content">

		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<h3 class="card__sub-title" ><?php the_title(); ?></h3>
		</a>

		<span class="card__meta">Posted by <?php the_author(); ?> on <?php the_time('F j, Y'); ?></span>
		 
		<p class="card__excerpt">
			<?php the_excerpt(); ?>		
		</p>
		  
	</div><!-- .card__content -->

	

</div><!-- /card -->
