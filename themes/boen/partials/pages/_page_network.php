<?php if( have_rows('our_network') ): ?>

  <div class="row leaders">

	<?php while( have_rows('our_network') ): the_row(); 

		// vars
		$image = get_sub_field('photo');
		$name = get_sub_field('full_name');
		$title = get_sub_field('title');
		$content = get_sub_field('bio');
		
		?>

		<div class="col-sm-4">
  	    <?php if( $image ): ?>
        <img class="media-object" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
        <?php endif; ?>
		</div>
    <div class="col-sm-8">
      <h4><?php echo $name; ?><small><?php echo $title; ?></small></h4>
      <p><?php echo $content; ?></p>
		</div>

	<?php endwhile; ?>

	</div><!-- row -->

<?php endif; ?>