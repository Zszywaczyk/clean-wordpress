<?php


// Load main scripts (header.php)
function zsz_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('zsz', get_template_directory_uri() . '/assets/main.js', array('jquery'), ZSZ_THEME_VERSION); // Custom scripts
        wp_enqueue_script('zsz'); // Enqueue it!
        wp_register_script('zsz-theme', get_template_directory_uri() . '/assets/theme.js', array('zsz', 'jquery-migrate', 'jquery-core'), ZSZ_THEME_VERSION); // Custom scripts
        wp_enqueue_script('zsz-theme'); // Enqueue it!
    }

}

// Load main styles
function zsz_styles()
{
    wp_register_style('zsz', get_template_directory_uri() . '/assets/main.css', array(), ZSZ_THEME_VERSION);
    wp_enqueue_style('zsz'); // Enqueue it!
    wp_register_style('zsz-fonts', get_template_directory_uri() . '/assets/fonts.css', array(), ZSZ_THEME_VERSION);
    wp_enqueue_style('zsz-fonts'); // Enqueue it!
}

function zsz_head_scripts_to_footer()
{
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
}
function zsz_disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    //add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

/*------------------------------------*\
Actions + Filters
\*------------------------------------*/
// Add Actions

add_action('init', 'zsz_header_scripts'); // Add Custom Scripts to wp_head
add_action('init', 'zsz_disable_emojis');

add_action('wp_enqueue_scripts', 'zsz_styles'); // Add Theme Stylesheet
add_action('wp_enqueue_scripts', 'zsz_head_scripts_to_footer');

// Remove Actions
// remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
// remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
add_filter('emoji_svg_url', '__return_false');
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10); // Display relational links for the posts adjacent to the current post.
// remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// remove_action('wp_head', 'rel_canonical');
// remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

/* REMOVE REST API INFO FROM HEADER */
remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
remove_action('wp_head', 'rest_output_link_wp_head');          //Remove json api links in header https://developer.wordpress.org/reference/functions/rest_output_link_wp_head/
// remove_action('wp_head', 'wp_oembed_add_discovery_links');         //Remove json api links in header https://developer.wordpress.org/reference/functions/wp_oembed_add_discovery_links/
remove_action('template_redirect', 'rest_output_link_header', 11); //Remove json api links in header https://developer.wordpress.org/reference/functions/rest_output_link_header/

//Wyszukanie przeglądarki wraz z nadaniem preload
add_filter('style_loader_tag',  'zsz_fontpreload', 10, 4);
function zsz_fontpreload($html, $handle, $href, $media)
{
    if ($handle === 'zsz-fonts') {
        $info = $_SERVER['HTTP_USER_AGENT'];
        //if(strpos($info, 'Firefox') == true){
        //return "<link rel='stylesheet' id='".$handle."-css'  href='".$href."' type='text/css' media='".$media."' />";
        //}else{
        return "<link rel='preload' as='style' id='".$handle."-css'  href='".$href."' type='text/css' media='".$media."' crossorigin='anonymous' />".
            "<link rel='stylesheet' id='".$handle."-css-support' href='".$href."' type='text/css' media='".$media."' />";
        //}
    }
    return $html;
}

//add_action("wp_enqueue_scripts", "bad_enqueue_scripts");
//Really Bad Vendor:
function bad_enqueue_scripts(){
    /*wp_register_script('bad2', get_template_directory_uri() . '/assets/vendor/cookie/jquery.cookie.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad2'); // Enqueue it!

    wp_register_script('bad3', get_template_directory_uri() . '/assets/vendor/bootstrap-datetimepicker/moment.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad3'); // Enqueue it!
    wp_register_script('bad4', get_template_directory_uri() . '/assets/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad4'); // Enqueue it!
    wp_register_script('bad5', get_template_directory_uri() . '/assets/vendor/popper/popper.min.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad5'); // Enqueue it!
    wp_register_script('bad6', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.min.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad6'); // Enqueue it!
    wp_register_script('bad7', get_template_directory_uri() . '/assets/vendor/waypoints/jquery.waypoints.min.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad7'); // Enqueue it!
    wp_register_script('bad8', get_template_directory_uri() . '/assets/vendor/waypoints/sticky.min.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad8'); // Enqueue it!
    wp_register_script('bad9', get_template_directory_uri() . '/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad9'); // Enqueue it!
    wp_register_script('bad10', get_template_directory_uri() . '/assets/vendor/slick/slick.min.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad10'); // Enqueue it!
    wp_register_script('bad11', get_template_directory_uri() . '/assets/vendor/scroll-with-ease/jquery.scroll-with-ease.min.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad11'); // Enqueue it!
    wp_register_script('bad12', get_template_directory_uri() . '/assets/vendor/countTo/jquery.countTo.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad12'); // Enqueue it!
    wp_register_script('bad13', get_template_directory_uri() . '/assets/vendor/form-validation/jquery.form.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad13'); // Enqueue it!
    wp_register_script('bad14', get_template_directory_uri() . '/assets/vendor/form-validation/jquery.validate.min.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad14'); // Enqueue it!

    wp_register_script('bad15', get_template_directory_uri() . '/assets/vendor/js/app.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad15'); // Enqueue it!
    wp_register_script('bad16', get_template_directory_uri() . '/assets/vendor/js/app-shop.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad16'); // Enqueue it!
    wp_register_script('bad17', get_template_directory_uri() . '/assets/vendor/form/forms.js', array('jquery'), ZSZ_THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('bad17'); // Enqueue it!*/
}