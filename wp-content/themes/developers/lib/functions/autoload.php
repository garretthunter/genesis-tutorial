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
 * Load specified non admin files
 *
 * @version 1.0.0
 * @since 1.0.0
 */
function load_nonadmin_files() {
	$filenames = array(
		'setup.php',
        'components/customizer/css-handler.php',
        'components/customizer/helpers.php',
		'functions/formatting.php',
		'functions/load-assets.php',
		'functions/markup.php',
//		'structure/archive.php',
		'structure/comments.php',
//		'structure/footer.php',
//		'structure/header.php',
		'structure/menu.php',
		'structure/post.php',
//		'structure/sidebar.php',
        'components/customizer/customizer.php',
	);

	load_specified_files( $filenames );
}

//add_action( 'admin_init', __NAMESPACE__ . '\load_admin_files');
/**
 * Load each of the specified admin files
 *
 * @version 1.0.0
 * @since 1.0.0
 */
function load_admin_files() {

	$filenames = array(

	);

	load_specified_files( $filenames );
}

/**
 * Load each of the specified files
 *
 * @version 1.0.0
 * @since 1.0.0
 *
 * @param array $filenames
 * @param string $folder_root
 */
function load_specified_files( array $filenames, $folder_root = '' ) {
	$folder_root = $folder_root ?: CHILD_THEME_DIR . '/lib/';

	foreach ( $filenames as $filename ) {
		include( $folder_root . $filename);
	}
}

load_nonadmin_files();