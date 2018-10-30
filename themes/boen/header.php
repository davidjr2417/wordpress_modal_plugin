<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/respond-proxy.html" id="respond-proxy" rel="respond-proxy">
    <link href="/vendor/respondjs/respond.proxy.gif" id="respond-redirect" rel="respond-redirect">
    <script src="<?php echo esc_url( get_stylesheet_directory_uri() );  ?>/js/respondjs/respond.proxy.js"></script>
  <![endif]-->

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
    /* 
     *  Add this to support sites with sites with threaded comments enabled.
     */
    if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    wp_get_archives('type=monthly&format=link');
 
    wp_head();
?>
</head>

<body <?php body_class(); ?>>
  
<div class="navbar-wrapper">
  <div class="container-fluid header-background">
    <div class="container">
      <div class="navbar navbar-static-top" role="navigation">
        <div class="container">

          <!--  -->
          <!-- mobile menu icon -->
          <!--  -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only"><?php _e("Toggle navigation","boen");?></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <!--  -->
          <!-- widgets -->
          <!--  -->
          <div class="row links-top">
              <?php if ( is_active_sidebar( 'top-1' ) ) : ?>
		  			    <div id="topleft" class="col-xs-7 col-sm-5 col-md-8" role="complementary">
			            <?php dynamic_sidebar( 'top-1' ); ?>
			  		    </div>
              <?php endif; ?>
          </div>		
          
          <!--  -->
          <!-- logo -->
          <!--  -->
          <div class="brand row">
    				<div class="col-md-12">
							<h1><a class="pull-left" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img class="logo--main" src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a></h1>
              <h2 class="site-description hidden"><?php bloginfo( 'description' ); ?></h2>
            </div>

            <div class="social-media hidden-xs">

                <a href="https://www.facebook.com/<?php echo get_field('facebook_page_name', 'option') ?>" alt="facebook" class="icon"></a>

                <!-- <a href="https://www.twitter.com/<?php echo get_field('twitter_username', 'option') ?>" alt="twitter" class="icon"></a>

                <a href="https://www.youtube.com/channel/<?php echo get_field('youtube_channel', 'option') ?>" alt="youtube" class="icon"></a> -->

                <!-- Button trigger modal -->
                <button type="button" class="icon--updates" alt="get updates" data-toggle="modal" data-target="#myModal"> UPDATES</button>  

                 <!-- Button trigger modal -->
                <!-- <button type="button" class="icon--updates" alt="get updates" data-toggle="modal" data-target="#myModal2">SIGN IN</button>              -->

            </div><!-- /.social-media -->

            <div class="hidden-xs"><?php get_template_part( 'partials/header/_donate_btn' ); ?></div>
	        </div> <!-- brand row -->
        </div> <!-- /container  -->
      </div><!-- /navbar static top -->
      

      <!--  -->
      <!-- main menu -->
      <!--  -->
      <div id="site-navigation" class="navbar-collapse collapse main-navigation" role="navigation">
        <div class="container">
          
          <?php wp_nav_menu( array( 'menu' => 'Main Menu', 'theme_location' => 'primary', 'menu_class' => 'slimmenu' ) ); ?>
          <div class="social-media visible-xs">

            <a href="https://www.facebook.com/<?php echo get_field('facebook_page_name', 'option') ?>" alt="facebook" class="icon"></a>

            <!-- <a href="https://www.twitter.com/<?php echo get_field('twitter_username', 'option') ?>" alt="twitter" class="icon"></a>

            <a href="https://www.youtube.com/channel/<?php echo get_field('youtube_channel', 'option') ?>" alt="youtube" class="icon"></a> -->

            <!-- Button trigger modal -->
            <button type="button" class="icon--updates" alt="get updates" data-toggle="modal" data-target="#myModal">UPDATES</button>  
            <!-- Button trigger modal -->
            <!-- <button type="button" class="icon--updates" alt="get updates" data-toggle="modal" data-target="#myModal2">SIGN IN</button>              -->

            </div><!-- /.social-media -->
          <div class="donate visible-xs">
            
            <?php get_template_part( 'partials/header/_donate_btn' ); ?>
            
          </div>
          
        </div><!-- .container -->
      </div><!-- #site-navigation -->

    </div><!-- container -->
  </div><!-- container-fluid -->
</div><!-- navbar-wrapper -->