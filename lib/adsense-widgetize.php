<?php
/**
 * Add Adsense Widget Areas.
 * genesis/lib/functions/widgetize.php
 */

/**
 * Before Loop Widget Area
 * Displays on all pages except single posts
 */
genesis_register_sidebar(
	array(
		'id'			=> 'wpselect_before_loop',
		'name'			=> __( 'Before Loop', 'genesis' ),
		'description'	=> __( 'Displays on all pages except single posts.', 'genesis' ),
	)
);

add_action( 'genesis_before_loop', 'wpselect_before_loop', 1 );
function wpselect_before_loop() {
	if ( !is_single() ) {
		genesis_widget_area( 'wpselect_before_loop', array(
		'before' => '<aside class="wpselect_before_loop widget-area">',
		) );
	}
}

/**
 * After Second Post Widget Area
 * Displays on archive pages after second post
 */
genesis_register_sidebar(
	array(
		'id'			=> 'wpselect_after_post',
		'name'			=> __( 'After Second Post', 'genesis' ),
		'description'	=> __( 'Displays on archive pages after second post.', 'genesis' ),
	)
);

add_action( 'genesis_before_loop', 'wpselect_set_loop_counter' );
function wpselect_set_loop_counter() {
	global $loop_counter;
	$loop_counter = 0;
}

add_action( 'genesis_after_entry', 'wpselect_after_post' );
function wpselect_after_post() {
	global $loop_counter; //important, this makes the variable available within this function.
	if ( !is_singular() && $loop_counter == 1 ) {
		genesis_widget_area( 'wpselect_after_post', array(
		'before' => '<aside class="wpselect_after_post widget-area">',
		) );
	}
	$loop_counter++;
}

/**
 * Before Post Content Widget Area
 * Displays on single posts before post content
 */
genesis_register_sidebar(
	array(
		'id'			=> 'wpselect_before_post_content',
		'name'			=> __( 'Before Post Content', 'genesis' ),
		'description'	=> __( 'Displays on single posts before post content.', 'genesis' ),
	)
);

add_action( 'genesis_before_entry_content', 'wpselect_before_post_content' );
function wpselect_before_post_content() {
	if ( is_single() ) {
		genesis_widget_area( 'wpselect_before_post_content', array(
		'before' => '<aside class="wpselect_before_post_content widget-area">',
		) );
	}
}

/**
 * After Post Content Widget Area
 * Displays on single posts after post content
 */
genesis_register_sidebar(
	array(
		'id'			=> 'wpselect_after_post_content',
		'name'			=> __( 'After Post Content', 'genesis' ),
		'description'	=> __( 'Displays on single posts after post content.', 'genesis' ),
	)
);

add_action( 'genesis_after_entry_content', 'wpselect_after_post_content', 1 );
function wpselect_after_post_content() {
	if ( is_single() ) {
		genesis_widget_area( 'wpselect_after_post_content', array(
		'before' => '<aside class="wpselect_after_post_content widget-area">',
		) );
	}
}

/** AdSense Section Targeting */
add_action( 'genesis_before_content', 'wpselect_ad_section_before_content' );
function wpselect_ad_section_before_content() { ?>
	<!-- google_ad_section_start -->
<?php
}

add_action( 'genesis_after_content', 'wpselect_ad_section_after_content' );
function wpselect_ad_section_after_content() { ?>
	<!-- google_ad_section_end -->
<?php
}

/** Remove all AdSense Actions */
function wpselect_remove_adsense_actions() {
	remove_action( 'genesis_before_loop', 'wpselect_before_loop', 1 );
	remove_action( 'genesis_after_entry', 'wpselect_after_post' );
	remove_action( 'genesis_before_entry_content', 'wpselect_before_post_content' );
	remove_action( 'genesis_after_entry_content', 'wpselect_after_post_content', 1 );
}
