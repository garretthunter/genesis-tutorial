<?php
/**
 * Menu HTML markup structure
 *
 * @package     Blacktower\Developers
 * @since       1.0.0
 * @author      Garrett Hunter
 * @link        https://www.blacktower.com
 * @license
 */

namespace Blacktower\Developers;

/**
 * Unregister menu callbacks
 *
 * @version 1.0.0
 * @since 1.0.0
 */
function unregister_menu_callbacks() {
    remove_action( 'genesis_after_header', 'genesis_do_subnav' );
}

// Reposition the secondary navigation menu
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\setup_secondary_menu_args' );
/**
 * Reduce the secondary navigation menu to one level depth
 *
 * @version 1.0.0
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return array
 */
function setup_secondary_menu_args( array $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}