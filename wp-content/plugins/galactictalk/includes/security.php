<?php
/**
 * Security.
 *
 * @package GalacticTalk
 */

/**
 * Disable XML-RPC
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Use theme version instead of WordPress and plugin version
 */
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

/**
 * Remove version query string from styles and scripts.
 *
 * @param string $src The original source URL of the script or style.
 * @return string The modified source URL without the version query string.
 */
function gt_remove_style_script_ver( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = add_query_arg( 'ver', wp_get_theme()->get( 'Version' ), $src );
	}
	return $src;
}

/**
 * Add filters to remove version query string from styles and scripts.
 */
add_filter( 'style_loader_src', 'gt_remove_style_script_ver' );
add_filter( 'script_loader_src', 'gt_remove_style_script_ver' );
