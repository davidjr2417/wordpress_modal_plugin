<?php 
/**
 * The template for displaying all pages
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

    <div class="row maincontent lower">
        <?php
$query = new AirpressQuery();
$query->setConfig("default");
$query->table("Volunteers")->view("Just Contact Info");
$query->addFilter("{Status}='Enabled'");

$events = new AirpressCollection($query);

foreach($events as $e){
  echo $e["Name"];
}
?>
        <div class="col-sm-8">

                <div class="post">

                    <?php get_template_part( 'partials/pages/_share' ); ?>

                    <div class="entry">
                        <?php the_content(); ?>
                    </div> <!-- entry -->
                    
                     <?php get_template_part( 'partials/pages/_page_network' ); ?>

                </div><!-- post -->

            <?php endwhile; ?>



            <div class="navigation">
                <?php posts_nav_link(); ?>
            </div>

            <?php endif; ?>

        </div><!-- col-sm-8 -->

    <!--/div><  row -->

<?php get_sidebar(); ?>   
<?php get_footer(); ?>
