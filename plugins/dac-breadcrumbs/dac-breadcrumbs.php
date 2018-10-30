<?php
/*
Plugin Name: Design Action - Breadcrumbs
Description: Display breadcrumbs with template tag the_breadcrumb()
Version:     0.0.1
Author:      Design Action
Author URI:  http://designaction.org
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function the_breadcrumb() {
    global $post;
    echo '<ul class="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li><li class="separator"> / </li>';
        if (is_category() || is_single() || is_tax()) {
            echo '<li>';
            if( ! is_singular( array('page', 'attachment', 'post') ) && ! is_tax() ){
            	$post_type = get_post_type_object( get_post_type($post) );
            	if (function_exists('tribe_is_event')){ if(tribe_is_event()) {
            		echo '<a href="' . tribe_get_events_link() . '">' . $post_type->labels->menu_name . '</a></li><li> ';
            	} else {
					echo '<a href="' . get_post_type_archive_link( get_post_type($post) ) . '">' . $post_type->labels->menu_name . '</a></li><li> ';
            	}}  else {
					echo '<a href="' . get_post_type_archive_link( get_post_type($post) ) . '">' . $post_type->labels->menu_name . '</a></li><li> ';
            	}
            }
            elseif (is_tax()) {
            	$post_type = get_post_type_object( get_post_type($post) );
            	$slug = strtolower($post_type->labels->name);
            	$url = get_bloginfo('url') . '/' . $slug;
				echo '<a href="' . $url . '">' . $post_type->labels->menu_name . '</a></li> <li class="separator">/</li> <li>';
            	global $wp_query;
  						  	$term = $wp_query->get_queried_object();
    						$title = $term->name;
            	echo '<strong title="'.$title.'"> '.$title.'</strong>';
            }
            else { the_category(' </li><li class="separator"> / </li><li> '); }
            if (is_single()) {
                echo '</li><li class="separator"> / </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<strong> ';
                echo the_title();
                echo '</strong>';
            }
        }

    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (is_post_type_archive()) {
    	$post_type = get_post_type_object( get_post_type($post) );
		echo $post_type->labels->menu_name; }
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    elseif (function_exists('tribe_is_event')) { if(tribe_is_month() || tribe_is_past() || tribe_is_upcoming() || tribe_is_week() || tribe_is_day() ||  tribe_is_map() || tribe_is_photo()) {
    	echo 'Events';
    }}
    echo '</ul>';
    }
}