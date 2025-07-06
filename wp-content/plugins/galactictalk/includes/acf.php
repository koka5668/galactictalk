<?php
/**
 * Advanced Custom Fields
 *
 * @package GalacticTalk
 */

add_filter(
	'acf/settings/save_json',
	function () {
		return __DIR__ . '/../acf-json';
	}
);

add_filter(
	'acf/settings/load_json',
	function ( $paths ) {
		// Remove the original path (optional).
		unset( $paths[0] );

		// Append the new path and return it.
		$paths[] = __DIR__ . '/../acf-json';

		return $paths;
	}
);
