<?php
// Enqueue Theme Styles and Scripts
// If you're not using one of these assets, feel free to remove that one!
function my_assets() {
	wp_enqueue_style( 'bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
  wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700,800', false );
  wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'slimmenu', get_stylesheet_directory_uri() . '/js/jquery.slimmenu.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'template-js', get_stylesheet_directory_uri() . '/js/template.js', array( 'jquery' ), null, true );
}
add_action( 'wp_enqueue_scripts', 'my_assets' ); 

/*  Add Jquery */
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}


/* ------------- Add logo to login page ---------------- */
function my_login_logo() { 
	$top_background_color = "#000";
	$bottom_background_color = "#000";
	$button_color = "#59BF6F";
	$logo_file_name = "logo";

	?>
    <style type="text/css">
    	body {
    		background: linear-gradient( <?php echo $top_background_color; ?>, <?php echo $bottom_background_color; ?>) !important;
            border: 5px solid <?php echo $button_color;?>;
            height: calc(100% - 10px) !important;
    	}
    	#login form {
    	     background: none !important;; 
    	     -webkit-box-shadow: none !important;; 
    	     box-shadow: none !important;; 
    	}
        body.login div#login h1 a {
            background-image: url(<?php echo bloginfo('stylesheet_directory'); ?>/images/<?php echo $logo_file_name; ?>.png) !important;
        	background-position: center center !important;
        	background-size: 347px;
        	margin: 0 auto;
        	outline: 0 none;
        	overflow: hidden;
        	width: 352px;
        	margin-left: -15px;
        }
        .login form {
			margin-top: -10px;
        }
        input[type=text]:focus, input[type=search]:focus, input[type=radio]:focus, input[type=tel]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, input[type=password]:focus, input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, select:focus, textarea:focus {
            border-color: <?php echo $top_background_color; ?> !important;
            -webkit-box-shadow: 0 0 2px rgba(#000,.8);
            box-shadow: 0 0 2px rgba(#000,.8);
        }
        .wp-core-ui .button-primary {
		    background: <?php echo $button_color; ?> !important;
		    border-color: <?php echo $button_color; ?> !important;
		    -webkit-box-shadow: 0 0 0 #888 !important;
		    box-shadow: 0 0 0 #888 !important;
		    color: #000 !important;
		    text-decoration: none !important;
		    text-shadow: initial !important;
		}	
		.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
		    background: #333;
		    border-color: #333;
		    color: #000 !important;
		}
		.wp-core-ui .button-primary.active, .wp-core-ui .button-primary.active:focus, .wp-core-ui .button-primary.active:hover, .wp-core-ui .button-primary:active {
		    background: #555;
		    border-color: #555;
		    -webkit-box-shadow: inset 0 2px 0 #333;
		    box-shadow: inset 0 2px 0 #333;
		    vertical-align: top;
		}
		.login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
    		color: <?php echo $button_color ?> !important;
		}

    </style>
<?php }

add_action( 'login_enqueue_scripts', 'my_login_logo' );


//change logo link on login page
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

// Admin styles
function dac_admin_style() {
    wp_register_style( 'dac_admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'dac_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'dac_admin_style' );


// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');
 
//Add support for WordPress 3.0's custom menus
add_action( 'init', 'register_my_menu' );
 
//Register area for custom menu
function register_my_menu() {
    register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
    register_nav_menu( 'footer-menu', __( 'Footer Menu' ) );
    register_nav_menu( 'site-info-menu', __( 'Site Information Menu' ) );
}


/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 */
function wpbootstrap_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'boen' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'boen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
    
    register_sidebar( array(
        'name' => __( 'Modal Widget', 'boen' ),
        'id' => 'sidebar-2',
        'description' => __( 'Appears on modal used for updates button at header.', 'boen' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
	
	register_sidebar( array(
		'name' => __( 'Modal Widget 2', 'boen' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears on modal used for sign in button at header.', 'boen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'wpbootstrap_widgets_init' );

//Enable post and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// allow custom logo image to be added from admin
function themeslug_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'themeslug_logo_section' , array(
        'title'       => __( 'Logo', 'themeslug' ),
        'priority'    => 30,
        'description' => 'Upload a logo to replace the default site name and description in the header',
    ) );

    $wp_customize->add_setting( 'themeslug_logo' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
        'label'    => __( 'Logo', 'themeslug' ),
        'section'  => 'themeslug_logo_section',
        'settings' => 'themeslug_logo',
    ) ) );

}
add_action('customize_register', 'themeslug_theme_customizer');

//add address to customizer: 
function address_customizer( $wp_customize ) {
    $wp_customize->add_section( 'org_address_section' , array(
        'title'       => __( 'Address', 'address' ),
        'priority'    => 30,
        'description' => 'Enter organizational address',
    ) );

    $wp_customize->add_setting( 'org_address' );

    $wp_customize->add_control( 'org_address', array(
        'label'    => __( 'Address', 'address' ),
        'section'  => 'org_address_section',
        'type' => 'textarea',
        'settings' => 'org_address'
    ) );

}
add_action('customize_register', 'address_customizer');


/**
 * Add donatoin page selector to the customizer.
 */
function prefix_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'donate' , array(
        'title'      => __( 'Donate Page', 'textdomain' ),
        'priority'   => 30,
        'description' => 'Select the donation page (within the site) OR enter the url of the donation page.',
    ) );

    // Add page selector
    $wp_customize->add_setting( 'donate-page', array(
        'default'           => '',
        'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'donate-page', array(
        'label'    => __( 'Select Page', 'textdomain' ),
        'section'  => 'donate',
        'type'     => 'dropdown-pages'
    ) );

    // Add url box
    $wp_customize->add_setting( 'donate-page-url', array(
        'default'           => '',
    ) );

    $wp_customize->add_control( 'donate-page-url', array(
        'label'    => __( 'Enter Donation Page URL', 'textdomain' ),
        'section'  => 'donate',
        'type'     => 'url'
    ) );

}
add_action( 'customize_register', 'prefix_customize_register' );

/**
 * Add custom post types
 *
 * Additional custom post types can be defined here
 * http://codex.wordpress.org/Function_Reference/register_post_type
 *
 * You can also use the custom post type generator from the following link:
 * http://generatewp.com/post-type/
 */


/* This function finds _all_ your post types, 
 * and modifies the queries on category and tag pages 
 * to include those CPTs. If this is not the behavior 
 * you want from your CPTs, remove this code!
 * Note that this includes attachments.
 */
function add_custom_types_to_tax( $query ) {
	if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
		if (!is_admin() ) :
		
		// Get all your post types
		$post_types = get_post_types();
		$query->set( 'post_type', $post_types );
		endif;
	return $query;
	}
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 *
 * You can also use the custom taxonomy generator from the following link:
 * http://generatewp.com/taxonomy/
 */

// Enable post thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(400, 200, true);

//Custom Thumbnails
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'square', 400, 400, true );
}



/*
 * Modifying TinyMCE editor to remove unused items.
 */
function myformatTinyMCE($in) {
  $in['block_formats'] = "Paragraph=p;Header 3=h3;Header 4=h4;Header 5=h5;Header 6=h6";
  return $in;
}
add_filter('tiny_mce_before_init', 'myformatTinyMCE' );

// Remove default linking of images when using Add Media
function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

/*
 * Annoyed by the messiness of the dashboard? Me too.
 * This function removes that clutter and creates a happy, peaceful WordPress experience.
 * Want a meta box back? Just comment out that line or remove it altogether.
 */
function remove_dashboard_meta() {
  //    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        //remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
  //    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
        // Advanced Responsive Video Editor
        remove_meta_box( 'arve_dashboard_widget', 'dashboard', 'normal' );
        // Events Calendar
        remove_meta_box( 'tribe_dashboard_widget', 'dashboard', 'normal');
}
add_action( 'admin_init', 'remove_dashboard_meta' );


//Add Excerpt to pages
add_post_type_support('page', 'excerpt');

//remove posts and comments
add_action( 'admin_menu', 'my_remove_menu_pages' );

function my_remove_menu_pages() {
    remove_menu_page('edit-comments.php');  
    remove_menu_page('edit.php');  
}
?>