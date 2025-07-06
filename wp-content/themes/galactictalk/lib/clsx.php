<?php
/**
 * Class names utility.
 *
 * @package GalacticTalk
 */

/**
 * Takes any number of class names or arrays of class names and returns a string of unique class names.
 *
 * @param mixed ...$classnames Any number of class names or arrays of class names.
 *
 * @return string A string of unique class names.
 */
function clsx( ...$classnames ) {
	$classnames = array_filter(
		$classnames,
		function ( $classname ) {
			return ! empty( $classname ) && is_string( $classname );
		}
	);

	$classnames = array_map(
		function ( $classname ) {
			return preg_replace( '/\s+/S', ' ', trim( $classname ) );
		},
		$classnames
	);

	return implode( ' ', $classnames );
}

/**
 * Takes any number of class names or arrays of class names and echoes a string of unique class names.
 *
 * @param mixed ...$classnames Any number of class names or arrays of class names.
 *
 * @return void
 */
function cx( ...$classnames ) {
	echo clsx( ...$classnames ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
