<?php
/**
 * Customize the search text
 * genesis/lib/structure/search.php
 */
add_filter( 'genesis_search_text', 'wpselect_search_text');
function wpselect_search_text() {
	return esc_attr__( 'Google Search ...', 'genesis' );
}

/**
 * Customize the search form
 * genesis/lib/structure/search.php
 */
add_filter( 'genesis_search_form', 'wpselect_search_form', 10, 4);
function wpselect_search_form( $form, $search_text, $button_text, $label ) {
	$form = '
		<form method="get" class="search-form" action="' . home_url() . '/google-cse/" role="search">
			' . $label . '
			<input type="search" name="q" placeholder="' . esc_attr( $search_text ) . '" />
			<input type="submit" value="' . esc_attr( $button_text ) . '" />
		</form>
	';
	return $form;
}
