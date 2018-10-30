<?php 
/**
 * The template for displaying Search Results pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */

get_header(); ?>
<div class="container container-normal">
      <div class="row maincontent lower">
        <div class="col-sm-8">
        <h2 class="page-title"><?php _e("Search Results:","boen"); ?> <span><?php  echo get_search_query(); ?></span></h2>
        <?php if(have_posts()) : ?>
        
        <?php while(have_posts()) : the_post(); ?>
         
        <div class="post">
        <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
 
 
            <div class="entry">
            <?php the_excerpt(); ?>

 
            </div>
 
        </div>
         
<?php endwhile; ?>


 
    <div class="navigation">
        <?php posts_nav_link(); ?>
    </div>
 
 <?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h2 class="entry-title"><?php _e("Nothing Found","custom-template");?></h2>
				</header>

				<div class="entry-content">
					<p><?php _e("Sorry, but nothing matched your search criteria. Please try again with some different keywords","custom-template"); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

<?php endif; ?>


	
		</div><!-- col-sm-8 -->
<?php get_sidebar(); ?> 
<?php get_footer(); ?>
