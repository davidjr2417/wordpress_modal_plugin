<?php get_header(); ?>

    <!-- Slider
    ================================================== -->
    <div class="container-fluid">
    	<div class="row slider">
    		<?php echo do_shortcode('[slideshow id="2332"]'); ?>
    	</div><!-- row -->
    </div><!-- container -->
    <!-- /.slider -->

    <!-- Latest News & Events
    ================================================== -->
    <div class="container mainpage">

  		<div class="row maincontent"><h3 class="col-xs-12 section-header--home"><?php _e("Latest News & Events","boen"); ?></h3></div>
      <!-- latests news & events -->
      <div class="row maincontent three-across-same-height-container">
        <?php 
          get_template_part('partials/home/_event' );    
          get_template_part('partials/home/_news' ); 
        ?>   
      </div><!-- /.row -->

    </div> <!-- /container -->


    <!-- Resources
    ================================================== -->
    <div class="container-fluid resource--section">
      <div class="container mainpage">

        <div class="row maincontent"><h3 class="col-xs-12 section-header--home"><?php _e("Resources","boen"); ?></h3></div>

        <div class="row maincontent">
          <?php get_template_part('partials/home/_resource' ); ?>  
        </div><!-- /.row -->

      </div> <!-- /container -->  
    </div><!-- /.container-fluid -->
    
      
<?php get_footer(); ?>