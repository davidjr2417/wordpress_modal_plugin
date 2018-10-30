<!-- Add featured image in page header -->
<?php if (has_post_thumbnail( $post->ID ) ) : ?>
  <?php  
  //$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    $image = $image[0]; 
    ?>
  <?php else :
    $image = get_bloginfo( 'stylesheet_directory') . '/images/green-bg.svg'; ?>
<?php endif; ?>
<div class="container-fluid page-banner" style='background-image: url("<?php echo $image; ?>") !important;' >
	<div class="container">
    	<div class="row"><?php the_breadcrumb(); ?></div>

    	<h2 class="page-banner__title">

            <?php //echo the title
                if ( is_day() ) :
                    printf( __( 'Daily Archives: %s', 'boen' ), get_the_date() );

                elseif ( is_month() ) :
                    printf( __( 'Monthly Archives: %s', 'boen' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'boen' ) ) );

                elseif ( is_year() ) :
                    printf( __( 'Yearly Archives: %s', 'boen' ), get_the_date( _x( 'Y', 'yearly archives date format', 'boen' ) ) );
                elseif ( is_tax() ) :
                    $term = $wp_query->get_queried_object();
                    echo $term->name;

                elseif ( is_post_type_archive() ) :
                    post_type_archive_title(); 

                elseif ( is_page() ) :
                    the_title();

                elseif ( is_single() && !is_singular('tribe_events') ) :
                    the_title();

                elseif ( is_singular('tribe_events')  ) :
                    echo 'Events';
                    
                elseif ( is_404()) :
                    _e( 'Not Found', 'bplf' );

                else :
                    _e( 'Archives', 'boen' );

                endif;

             ?>
		
    	</h2>

	</div><!-- container -->

</div><!-- container-fluid -->