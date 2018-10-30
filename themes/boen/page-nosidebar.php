<?php 
/**
 * Template name: full width no sidebar
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */

get_header(); ?>

<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

  <?php get_template_part( 'partials/pages/_page_banner' ); ?>

<div class="container container-normal">

      <div class="row mainconten lower">

        <div class="col-sm-12">

        <div class="post">

          <?php get_template_part( 'partials/pages/_share' ); ?>
         
           <div class="entry">
            <?php the_content(); ?> 
        	 </div>

        </div>
		<?php endwhile; ?>
 
        <div class="navigation">
          <?php posts_nav_link(); ?>
        </div>

     <?php endif; ?>

		</div><!-- col-sm-12 -->

	<div><!-- row -->

  </div></div>

	
<?php get_footer(); ?>