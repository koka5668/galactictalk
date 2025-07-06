<?php
/**
 * Block pattern menu
 *
 * @package GalacticTalk
 */

// Display "Patterns" in the menu.
add_action(
	'admin_menu',
	function () {
		add_menu_page(
			'パターン',
			'パターン',
			'edit_posts',
			'edit.php?post_type=wp_block',
			'',
			'dashicons-block-default',
			50
		);
	}
);
