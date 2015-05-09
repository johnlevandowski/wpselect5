<?php
/**
 * Customize the search form
 * genesis/lib/structure/search.php
 */
add_filter( 'genesis_search_form', 'wpselect_search_form', 10, 4);
function wpselect_search_form( $form, $search_text, $button_text, $label ) {
	$form = '
		<form method="get" class="search-form" action="' . home_url() . '/google-cse/" role="search">
			<label for="google-search" class="screen-reader-text">Google Search</label>
			<input type="search" name="q" id="google-search" placeholder="Google Search ..." />
			<input type="submit" value="' . esc_attr( $button_text ) . '" />
		</form>
	';
	return $form;
}
