<!-- textcard -->
<div class="textcard">

	<!-- card-content -->
	<div class="textcard__content">

		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="textcard__sub-title-link">
			<h3 class="textcard__sub-title" ><?php the_title(); ?></h3>
		</a>	
		 
		<p class="textcard__excerpt">
			<?php the_advanced_excerpt('length=250&length_type=characters&no_custom=1&ellipsis=%26hellip;&exclude_tags=img,p,strong');
 ?>		
		</p> 	

		  
	</div><!-- .textcard__content -->

	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" role="button" class="button--red--resource">GET IT!</a>

</div><!-- /card -->