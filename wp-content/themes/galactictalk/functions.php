<?php
/**
 * GalacticTalk functions
 *
 * @package GalacticTalk
 */

 /**
  * Includes.
  */
require_once 'lib/clsx.php';
require_once 'lib/button.php';

/**
 *  Templates.
 */



/**
 * Set up theme defaults and registers support for various WordPress feaures.
 */
add_action(
	'after_setup_theme',
	function () {

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		register_nav_menus(
			array(
				'primary' => 'Primary Menu',
			)
		);
	}
);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
add_action(
	'after_setup_theme',
	function () {
		$GLOBALS['content_width'] = apply_filters( 'bathe_content_width', 1216 );
	},
	0
);

/**
 * Enqueue scripts and styles.
 */
$google_fonts_url = 'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;600&family=Barlow:wght@400;500;600;700;800;900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+JP:wght@100..900&display=swap';

/**
 * Add editor styles.
 */
add_action(
	'enqueue_block_editor_assets',
	function () use ( $google_fonts_url ) {
		// When loading Google Fonts API URL, the fourth argument must be `null` for fonts to load correctly.
		wp_enqueue_style( 'googlefonts', $google_fonts_url, array(), null );
		wp_enqueue_style( 'gt-editor', get_theme_file_uri( 'assets/css/editor.css' ) );
	}
);

/**
 * Enqueue scripts and styles.
 */
add_action(
	'wp_enqueue_scripts',
	function () use ( $google_fonts_url ) {
		// When loading Google Fonts API URL, the fourth argument must be `null` for fonts to load correctly.
		wp_enqueue_style( 'googlefonts', $google_fonts_url, array(), null );

		wp_enqueue_style( 'gt-front', get_theme_file_uri( 'assets/css/front.css' ), array() );

		wp_enqueue_script(
			'gt-main',
			get_theme_file_uri( 'assets/js/main.js' ),
			array(),
			true,
			array(
				'strategy' => 'defer',
			)
		);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
);

/**
 * Add preconnect for Google Fonts.
 */
add_filter(
	'wp_resource_hints',
	function ( $urls, $relation_type ) {
		if ( wp_style_is( 'googlefonts', 'queue' ) && 'preconnect' === $relation_type ) {
			$google_fonts_urls = array(
				array(
					'href' => 'https://fonts.googleapis.com',
				),
				array(
					'href' => 'https://fonts.gstatic.com',
					'crossorigin',
				),
			);

			array_push( $urls, ...$google_fonts_urls );
		}

		return $urls;
	},
	10,
	2
);
