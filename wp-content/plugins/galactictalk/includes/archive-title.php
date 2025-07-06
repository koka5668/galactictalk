<?php
/**
 * Customize archive title
 *
 * @package GalacticTalk
 */

add_filter(
	'get_the_archive_title_prefix',
	function () {
		return '';
	}
);
