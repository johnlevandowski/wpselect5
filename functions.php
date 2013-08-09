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

/**
 * Customize post info
 * genesis/lib/structure/post.php
 */
add_filter( 'genesis_post_info', 'wpselect_post_info' );
function wpselect_post_info($post_info) {
    $post_info = 'Posted on [post_date] [post_edit] [post_comments]';
    return $post_info;
}

/**
 * Customize footer
 * genesis/lib/structure/footer.php
 */
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'wpselect_do_footer' );
function wpselect_do_footer() {
    ?><p>&copy; Copyright 2010-<?php echo date( 'Y' ); ?> <a title="wpselect.com" href="http://wpselect.com/">wpselect.com</a></p>
	<p>Powered by <a title="Genesis Framework" href="http://wpselect.com/go/genesis/">Genesis</a>, 
	<a title="Hosting by HostGator" href="http://wpselect.com/go/hostgator/">HostGator</a>, 
	and <a title="WordPress" href="http://wordpress.org/">WordPress</a></p>
	<p><a title="Privacy Policy" href="http://wpselect.com/privacy-policy/">Privacy Policy</a> &middot; 
	<a title="Disclaimer" href="http://wpselect.com/disclaimer/">Disclaimer</a> &middot; 
	<a title="FTC Disclosure" href="http://wpselect.com/ftc-disclosure/">FTC Disclosure</a> &middot; 
	<a title="Image Attribution" href="http://wpselect.com/image-attribution/">Image Attribution</a></p>
    <?php
}

/**
 * Customize length of post excerpts
 * default is 55
 */
add_filter( 'excerpt_length', 'wpselect_excerpt_length' );
function wpselect_excerpt_length($length) {
    return 60;
}

/** Customize more link of post excerpts */
add_filter('excerpt_more', 'wpselect_excerpt_more');
function wpselect_excerpt_more($more) {
	return ' &hellip;';
}

/** Customize jpeg quality */
add_filter( 'jpeg_quality', 'wpselect_jpeg_quality' );
function wpselect_jpeg_quality($quality) {
	return (int)79;
}

/** Add read more link to post on all archive pages */
add_action( 'genesis_entry_content', 'wpselect_read_more_post_content', 15 );
function wpselect_read_more_post_content() {
	if ( ! is_singular() ) {
	echo '<p class="wpselect-read-more"><a href="' . get_permalink() . '">Continue Reading &rarr;</a></p>';
	}
}
