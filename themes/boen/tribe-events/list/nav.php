<?php
/**
 * List View Nav Template
 * This file loads the list view navigation.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/nav.php
 *
 * @package TribeEventsCalendar
 * @version 4.2
 *
 */
global $wp_query;

$events_label_plural = tribe_get_event_label_plural();

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<h3 class="screen-reader-text" tabindex="0"><?php echo esc_html( sprintf( esc_html__( '%s List Navigation', 'the-events-calendar' ), $events_label_plural ) ); ?></h3>
<ul class="tribe-events-sub-nav">
	<!-- Left Navigation -->

	<?php if ( tribe_has_previous_event() ) : ?>
		<!-- <li class="<?php echo esc_attr( tribe_left_navigation_classes() ); ?>" aria-label="previous events link"> -->
			<!-- <a href="http://caps.ucsf.edu/events/list/?tribe_event_display=past" rel="prev"><?php printf( '<span>&lsaquo;</span> ' . esc_html__( 'Previous %s', 'the-events-calendar' ), $events_label_plural ); ?></a> -->

		<!-- </li> -->
		<!-- .tribe-events-nav-left -->
	<?php endif; ?>

	<!-- Right Navigation -->
	<?php if ( tribe_has_next_event() ) : ?>
		<!-- <li class="<?php echo esc_attr( tribe_right_navigation_classes() ); ?>" aria-label="next events link"> -->
			<!-- <a href="<?php echo esc_url( tribe_get_listview_next_link() ); ?>" rel="next"><?php printf( esc_html__( 'Next %s', 'the-events-calendar' ), $events_label_plural . ' <span>&raquo;</span>' ); ?></a> -->
		<!-- </li> -->
		<!-- .tribe-events-nav-right -->
	<?php endif; ?>
	
</ul>

<ul class='custom-event-links'>
	<?php if ( tribe_has_previous_event() ) : ?>
		<li class="pull-left">
			<a href="<?php echo home_url(); ?>/events/list/?tribe_paged=1&tribe_event_display=past" rel="prev" id="events-past-link"><?php printf( '<span>&lsaquo;</span> ' . esc_html__( 'Previous %s', 'the-events-calendar' ), $events_label_plural ); ?></a>
		</li>
	<?php endif; ?>
	<?php if ( tribe_has_next_event() ) : ?>
		<li class="pull-right">
			<a href="<?php echo home_url(); ?>/events/list/?tribe_event_display=list&tribe_paged=1"  id="events-next-link" rel="next"><?php printf( esc_html__( 'Next %s', 'the-events-calendar' ), $events_label_plural . ' <span>&rsaquo;</span>' ); ?></a>
		</li>
	<?php endif; ?>
</ul>


