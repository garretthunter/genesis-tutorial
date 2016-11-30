<?php
/**
 * Description
 *
 * @package     Blacktower\Developers
 * @since       1.0.0
 * @author      Garrett Hunter
 * @link        https://www.blacktower.com
 * @license
 */

namespace Blacktower\Developers;

add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme' );

/**
 * Setup child theme
 *
 * @version 1.0.0
 * @since 1.0.0
 */
function setup_child_theme() {
	//* Set Localization (do not remove)
	load_child_theme_textdomain( CHILD_TEXT_DOMAIN, apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/languages', CHILD_TEXT_DOMAIN ) );

    unregister_genesis_callbacks();

	adds_theme_support();
	adds_new_image_sizes();
}

/**
 * Unregister Genesis callbacks.  We do this here because the child theme loads before Genesis.
 *
 * @version 1.0.0
 * @since 1.0.0
 */
function unregister_genesis_callbacks() {
    unregister_menu_callbacks();
}

/**
 * Add theme supports to the site
 *
 * @version 1.0.0
 * @since 1.0.0
 */
function adds_theme_support() {

	$config = array(
		//* Add HTML5 markup structure
		'html5'                           => array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form'
		),

		//* Add Accessibility support
		'genesis-accessibility'           => array(
			'404-page',
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links'
		),

		//* Add viewport meta tag for mobile browsers
		'genesis-responsive-viewport'     => null,

		//* Add support for custom header
		'custom-header'                   => array(
			'width'           => 600,
			'height'          => 160,
			'header-selector' => '.site-title a',
			'header-text'     => false,
			'flex-height'     => true,
		),

		//* Add support for custom background
		'custom-background'               => null,

		//* Add support for after entry widget
		'genesis-after-entry-widget-area' => null,

		//* Add support for 3-column footer widgets
		'genesis-footer-widgets'          => 3,

		//* Rename primary and secondary navigation menus
		'genesis-menus'                   => array(
			'primary'   => __( 'After Header Menu', CHILD_TEXT_DOMAIN ),
			'secondary' => __( 'Footer Menu', CHILD_TEXT_DOMAIN )
		),
	);

	foreach ( $config as $feature => $args ) {
		add_theme_support( $feature, $args );
	}
}

/**
 * Adds additional images sizes supported by child theme
 *
 * @version 1.0.0
 * @since 1.0.0
 */
function adds_new_image_sizes() {

	$config = array(
		//* Add Image Sizes
		'featured-image' => array(
			'width'  => 720,
			'height' => 400,
			'crop'   => true,
		),
	);

	foreach ( $config as $feature => $args ) {
		$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;

		add_image_size( $name, $args['width'], $args['height'], $crop );
	}
}

add_filter( 'genesis_theme_settings_defaults', __NAMESPACE__ . '\set_theme_settings_defaults' );
/**
 * Description
 *
 * @version 1.0.0
 * @since 1.0.0
 *
 * @param array $defaults
 *
 * @return array
 */
function set_theme_settings_defaults( array $defaults ) {
	$config = get_theme_settings_defaults();
	$defaults = wp_parse_args( $config, $defaults );

	return $defaults;
}

add_action( 'after_switch_theme', __NAMESPACE__ . '\update_theme_settings_defaults' );

/**
 * Updates theme settings on reset
 *
 * @version 1.0.0
 * @since 1.0.0
 */
function update_theme_settings_defaults() {
	$config = get_theme_settings_defaults();

	if ( function_exists( 'genesis_update_settings' ) ) {
		genesis_update_settings( $config );
	}

	update_option( 'posts_per_page', $config['blog_cat_num'] );
}

/**
 * Get theme settings elements
 *
 * @version 1.0.0
 * @since 1.0.0
 * @return array
 */
function get_theme_settings_defaults() {
	return array(
		'blog_cat_num'              => 6,
		'content_archive'           => 'full',
		'content_archive_limit'     => 0,
		'content_archive_thumbnail' => 0,
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'content-sidebar',
	);

}