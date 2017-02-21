<?php
/*
Functions file for the child theme
*/

/* Edit the Primary navigation bar */
function FSN_enqueue_scripts_styles(){
	/* script to disable textarea animation */
	wp_enqueue_script('load_jquery',get_stylesheet_directory_uri().'/js/jquery-3.1.1.min.js');
 	wp_enqueue_script('disable_textarea_animation',get_stylesheet_directory_uri().'/js/script.js');
 	wp_enqueue_script('material_design_js',get_stylesheet_directory_uri().'/js/material.min.js');
 	wp_enqueue_style('material_design_css',get_stylesheet_directory_uri().'/css/material.min.css');
 	wp_enqueue_script('wordpress_giving_errors_so_upload_like_this',home_url().'/wp-content/plugins/buddypress/bp-themes/bp-default/_inc/global.js');
}

add_action('FSN_enqueue_scripts_styles','FSN_enqueue_scripts_styles');
		

function FSN_bp_dtheme_main_nav(){
	$pages_args = array(
		'depth'      => 1,
		'echo'       => false,
		'exclude'    => '',
		'title_li'   => ''
	);
	$home_url = home_url();
	$menu = wp_page_menu( $pages_args );
	$menu = str_replace( array( '<div class="menu"><ul>', '</ul></div>' ), array( '<ul id="nav" class="nav navbar-nav navbar-right">', '</ul><!-- #nav -->' ), $menu );
	echo $menu;

	do_action( 'bp_nav_items' );
}
function sayHello(){
	echo "Hello I am testing wordpress hooks<br>";
}
add_action('bp_before_directory_activity_content','sayHello');

function FSN_bp_get_options_nav( $parent_slug = '' ) {
	$bp = buddypress();

	// If we are looking at a member profile, then the we can use the current
	// component as an index. Otherwise we need to use the component's root_slug.
	$component_index = !empty( $bp->displayed_user ) ? bp_current_component() : bp_get_root_slug( bp_current_component() );
	$selected_item   = bp_current_action();

	// Default to the Members nav.
	if ( ! bp_is_single_item() ) {
		// Set the parent slug, if not provided.
		if ( empty( $parent_slug ) ) {
			$parent_slug = $component_index;
		}

		$secondary_nav_items = $bp->members->nav->get_secondary( array( 'parent_slug' => $parent_slug ) );

		if ( ! $secondary_nav_items ) {
			return false;
		}

	// For a single item, try to use the component's nav.
	} else {
		$current_item = bp_current_item();
		$single_item_component = bp_current_component();

		// Adjust the selected nav item for the current single item if needed.
		if ( ! empty( $parent_slug ) ) {
			$current_item  = $parent_slug;
			$selected_item = bp_action_variable( 0 );
		}

		// If the nav is not defined by the parent component, look in the Members nav.
		if ( ! isset( $bp->{$single_item_component}->nav ) ) {
			$secondary_nav_items = $bp->members->nav->get_secondary( array( 'parent_slug' => $current_item ) );
		} else {
			$secondary_nav_items = $bp->{$single_item_component}->nav->get_secondary( array( 'parent_slug' => $current_item ) );
		}

		if ( ! $secondary_nav_items ) {
			return false;
		}
	}

	// Loop through each navigation item.
	foreach ( $secondary_nav_items as $subnav_item ) {
		if ( empty( $subnav_item->user_has_access ) ) {
			continue;
		}

		// If the current action or an action variable matches the nav item id, then add a highlight CSS class.
		if ( $subnav_item->slug === $selected_item ) {
			$selected = ' class="current selected"';
		} else {
			$selected = '';
		}

		// List type depends on our current component.
		$list_type = bp_is_group() ? 'groups' : 'personal';

		/**
		 * Filters the "options nav", the secondary-level single item navigation menu.
		 *
		 * This is a dynamic filter that is dependent on the provided css_id value.
		 *
		 * @since 1.1.0
		 *
		 * @param string $value         HTML list item for the submenu item.
		 * @param array  $subnav_item   Submenu array item being displayed.
		 * @param string $selected_item Current action.
		 */
		echo apply_filters( 'bp_get_options_nav_' . $subnav_item->css_id, '<li id="' . esc_attr( $subnav_item->css_id . '-' . $list_type . '-li' ) . '" ' . $selected . '><a id="' . esc_attr( $subnav_item->css_id ) . '" href="' . esc_url( $subnav_item->link ) . '">' . $subnav_item->name . '</a></li>', $subnav_item, $selected_item );
	}
}

?>