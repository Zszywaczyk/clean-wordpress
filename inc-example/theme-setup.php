<?php

add_theme_support('custom-logo',array(
    'flex-height' => true,
    'flex-width' => true,
    'header-text' => array('site-title', 'site-description')
));
add_theme_support('post-thumbnails', array('post', 'page', 'zsz_services'));
add_image_size( 'services-thumbnail', 870, 405 );
add_image_size( 'call-us-img', 654, 488 );
add_image_size( 'frontpage-services', 946, 400 );
add_image_size( 'our-story-full-gallery', 740, 432 );
add_image_size( 'our-story-full-gallery-thumbnail', 136, 95 );
add_image_size( 'metamor-img', 570, 350 );

add_action('init', 'zsz_menu_register');
add_action('init', 'zsz_add_posttype');
//add_action('widgets_init', 'zsz_register_sidebars'); //add this if use widgets
add_filter('get_search_form', 'zsz_search_form'); //unlock for search bar TODO: add to header custom search bar and change zsz_search_form function

//-- SIDEBARS REGISTERS
function zsz_register_sidebars()
{
    register_sidebar(
        array(
            'name' => __('Archive blog aside', ZSZ_DOMAIN),
            'description' => __('Widgets to be shown on the main sidebar', ZSZ_DOMAIN),
            'id' => 'sidebar_widgets',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<strong class="widget_title">',
            'after_title' => '</strong>'
        )
    );
    register_sidebar(
        array(
            'name' => __('Single post bottom', ZSZ_DOMAIN),
            'description' => __('Widgets to be shown on the single post after content', ZSZ_DOMAIN),
            'id' => 'sidebar_single_post',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<strong class="singlepost-sidebar-title">',
            'after_title' => '</strong>'
        )
    );
    register_sidebar(
        array(
            'name' => __('Service post aside', ZSZ_DOMAIN),
            'description' => __('Widgets to be shown on the service main sidebar', ZSZ_DOMAIN),
            'id' => 'sidebar_single_service_post',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<strong class="widget_title">',
            'after_title' => '</strong>'
        )
    );
}

//-- MENU REGISTER
function zsz_menu_register()
{
    register_nav_menus(array(
        'main' => __('Main', 'zsz'), // Main Navigation
    ));
    register_nav_menus(array(
        'oferta' => __('Oferta', 'zsz'), // Oferta Navigation
    ));
}

//--- CUSTOM POST
function zsz_add_posttype()
{
    // register_taxonomy_for_object_type( 'cpt_services_group', 'cpt_services' );

    register_post_type(
        'zsz_services',
        array(
            'labels' => array(
                'name' => __('Oferty'),
                'singular_name' => __('Oferta')
            ),
            'public' => true,
            'has_archive' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'show_in_rest' => true,
            // 'rewrite' => array('slug' => ''),
            'supports' => array('title', 'editor', 'thumbnail', 'author', 'revisions', 'excerpt'),
            'menu_icon' => 'dashicons-hammer',
            'rewrite' => array('slug' => __('oferta', 'zsz'), 'with_front' => false),
        )
    );
    register_post_type(
        'zsz_metamorphosis',
        array(
            'labels' => array(
                'name' => __('Metamorfozy'),
                'singular_name' => __('Metamorfoza')
            ),
            'public' => true,
            'has_archive' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'author', 'revisions'),
            'menu_icon' => 'dashicons-visibility',
            'rewrite' => array('slug' => __('metamorfoza', 'zsz'), 'with_front' => false),
        )
    );
    register_post_type(
        'zsz_testimonials',
        array(
            'labels' => array(
                'name' => __('Opinie'),
                'singular_name' => __('Opinia')
            ),
            'public' => true,
            'has_archive' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'show_in_rest' => true,
            // 'rewrite' => array('slug' => ''),
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'revisions'),
            'menu_icon' => 'dashicons-star-filled',
            'rewrite' => array('slug' => __('zsz-opinie', 'zsz'), 'with_front' => false),
        )
    );
    register_taxonomy('zsz_services_group', array('zsz_services'), array(
        'hierarchical' => true,
        'labels' => array('name' => 'Grupa ofert'),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'grupa_ofert'),
    ));
    register_taxonomy('zsz_metamorphosis_group', array('zsz_metamorphosis'), array(
        'hierarchical' => true,
        'labels' => array('name' => 'Kategoria metamorfozy'),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'grupa_metamorfoz'),
    ));
}

function zsz_search_form($form)
{
    $searchHTML = '<div class="header-search">
                        <form role="search" method="get" action="'.home_url('/').'" class="form-inline">
                            <i class="icon-search"></i>
                            <input type="search" value="'.get_search_query().'" name="s" id="s" placeholder="'.__('Szukaj').'">
                            <button type="submit" id="searchsubmit" ><i class="icon-search"></i></button>
                        </form>
                    </div>';

    return $searchHTML;
}