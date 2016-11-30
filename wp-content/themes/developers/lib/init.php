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

/**
 * Initialize the theme's constants
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {

	$theme = wp_get_theme();

	define( 'CHILD_THEME_NAME', $theme->get( 'Name') );
	define( 'CHILD_THEME_URL', $theme->get( 'ThemeURI') );
	define( 'CHILD_THEME_VERSION', $theme->get( 'Version') );
	define( 'CHILD_TEXT_DOMAIN', $theme->get( 'TextDomain') );

	define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
	define( 'CHILD_CONFIG_DIR', CHILD_THEME_DIR . '/config/');
}

init_constants();