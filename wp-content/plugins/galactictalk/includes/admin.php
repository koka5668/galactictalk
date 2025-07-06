<?php
/**
 * Admin.
 *
 * @package GalacticTalk
 */

add_action(
	'admin_menu',
	function () {
		/**
		 * Remove some side menu
		 */
		remove_menu_page( 'edit-comments.php' );
	}
);

add_action(
	'admin_bar_menu',
	function ( $wp_admin_bar ) {
		/**
		 * Remove some admin bar menu
		 */
		$wp_admin_bar->remove_node( 'comments' );
	},
	99
);
