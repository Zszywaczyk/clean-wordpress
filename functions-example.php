<?php

define('ZSZ_THEME_VERSION', '1.0.0');
define('ZSZ_THEME_NAME', 'CleanWordpress');
define('ZSZ_DOMAIN', 'clean-wordpress');

add_filter('xmlrpc_enabled', '__return_false');     //Disabled xmlrp https://en.wikipedia.org/wiki/XML-RPC
add_filter('rest_jsonp_enabled', '__return_false'); //Disabled, https://developer.wordpress.org/reference/hooks/rest_jsonp_enabled/

// -- Css/Js manager with transient support
require_once('inc/enqueue-scripts.php');

// -- Post Types
//require_once('inc/post-types.php');

// -- Media config
//require_once('inc/media.php');

// -- Admin
require_once('inc/admin.php');

// -- Theme Setup
require_once('inc/theme-setup.php');

// -- ACF
if(class_exists('ACF')) {
    require_once('inc/acf.php');
}

// -- Helpers
require_once('inc/helpers.php');

// add_filter('next_posts_link_attributes', 'posts_link_attributes');
// add_filter('previous_posts_link_attributes', 'posts_link_attributes');

// function posts_link_attributes() {
//   return 'class="styled-button"';
// }

//--debug info
/*function wpse_footer_db_queries()
{
    echo '<h1 style="position:fixed;bottom:10%;right:0%;">' . get_num_queries() . ' queries in ' . timer_stop(0) . '</h1>' . PHP_EOL;
}
add_action('admin_footer', 'wpse_footer_db_queries');
add_action('wp_footer', 'wpse_footer_db_queries');*/
