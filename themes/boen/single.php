<?php get_header(); ?>

<?php get_template_part( 'partials/pages/_page_banner' ); ?>

<div id="blog" class="container container-normal">
    <div class="row maincontent lower">
    	<div class="col-sm-8">
         <div class="post">
            <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
            <div class="entry">   
                <?php the_content(); ?> 
            </div>

            <?php 

                        $file = get_field('document');

                    if( $file ): ?>
    
                        <a href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a>

                    <?php endif; ?>

        </div>
 
            
 
<?php endwhile; ?>
     
<!--
    <div class="navigation">
      <div class="row"> 
        <?php previous_post_link('<div class="col-sm-6"><i class="fa fa-angle-left" aria-hidden="true"></i>%link</div>') ?> <?php next_post_link('<div class="col-sm-6">%link<i class="fa fa-angle-right" aria-hidden="true"></i></div>') ?>
      </div>
    </div>
-->
 
<?php endif; ?>
     </div><!-- .col-sm-8 --> 
<?php get_sidebar(); ?>        
<?php get_footer(); ?>
