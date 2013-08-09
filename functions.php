<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'WPselect5' );
define( 'CHILD_THEME_URL', 'http://wpselect.com/' );
define( 'CHILD_THEME_VERSION', filemtime( CHILD_DIR . '/style.css' ) );

//* Enqueue Lato Google font
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:700', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

/** Add Adsense Widget Areas */
include_once( CHILD_DIR . '/lib/adsense-widgetize.php');

/** Add YARPP Related Posts */
add_action( 'genesis_after_entry_content', 'wpselect_related_posts', 9 );
function wpselect_related_posts() {
	if ( is_single() && function_exists('related_posts') ) { 
		related_posts();
	}
}
