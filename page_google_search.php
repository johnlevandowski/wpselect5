<?php
/**
 * Template Name: Google Custom Search
 * Description: Google Custom Search
 */

/**
 * Force full-width layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
wpselect_remove_adsense_actions();
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

/**
 * Remove standard post content output
 */
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
add_action( 'genesis_entry_content', 'wpselect_google_cse_content' );
function wpselect_google_cse_content() { ?>
<script>
  (function() {
    var cx = '009034775234597001862:WMX2724661';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchresults-only></gcse:searchresults-only><?php
}

genesis();
