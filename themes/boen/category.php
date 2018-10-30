<?php get_header(); ?>
 
<div class="container container-normal">
	<div class="row maincontent"><div class="col-sm-12"><?php the_breadcrumb(); ?></div></div>
      <div class="row maincontent">
        <div class="col-lg-8">
        <?php //$post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
      <?php /* If this is a category archive */ if (is_category()) { ?>
        <h2 class="page-title"><?php single_cat_title(); ?></h2>
      <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
        <h2 class="page-title">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
      <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <h2 class="page-title">Archive for <?php the_time('F jS, Y'); ?>:</h2>
      <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <h2 class="page-title">Archive for <?php the_time('F, Y'); ?>:</h2>
      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <h2 class="page-title">Archive for <?php the_time('Y'); ?>:</h2>
      <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        <h2 class="page-title">Author Archive</h2>
      <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <h2 class="page-title">Blog Archives</h2>
    <?php } ?>
    	<?php $cur_cat_id = get_cat_id( single_cat_title("",false) );
			  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			   query_posts('paged=' . $paged . '&cat=' . $cur_cat_id ); // show posts in category  with pagination enabled ?>
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
    
         
        <?php get_template_part( 'content', 'blog' ); ?>
 
         
<?php endwhile; ?>
 
        			<?php wpbeginner_numeric_posts_nav(); ?>
 
<?php endif; ?>
 
</div>
 
<?php get_sidebar(); ?>   
<?php get_footer(); ?>
