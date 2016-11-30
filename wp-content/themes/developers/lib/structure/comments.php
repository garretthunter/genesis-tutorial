<?php
/**
 * Comments structure handling
 *
 * @package     Blacktower\Developers
 * @since       1.0.0
 * @author      Garrett Hunter
 * @link        https://www.blacktower.com
 * @license
 */

namespace Blacktower\Developers;

//*
add_filter( 'genesis_comment_list_args', __NAMESPACE__ . '\setup_comments_gravatar' );
/**
 * Modify size of the Gravatar in the entry comments
 *
 * @version 1.0.0
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return array
 */
function setup_comments_gravatar( array $args ) {

	$args['avatar_size'] = 60;

	return $args;

}