<?php

add_action('admin_enqueue_scripts', 'admin_add_styles'); // Add Theme Stylesheet
add_action('enqueue_block_editor_assets', 'admin_add_editor_styles'); // Add Theme Stylesheet
add_action('enqueue_block_editor_assets', 'admin_add_editor_scripts'); // Add Theme Stylesheet

function admin_add_editor_styles()
{
    wp_register_style('zsz-admin-fontawesome', get_template_directory_uri() . '/assets/font-awesome.css', array(), ZSZ_THEME_VERSION);
    wp_enqueue_style('zsz-admin-fontawesome'); // Enqueue it!
    //This css is for render bootstrap inside pages, posts
    wp_register_style('zsz', get_template_directory_uri() . '/assets/main.css', array(), ZSZ_THEME_VERSION);
    wp_enqueue_style('zsz'); // Enqueue it!
    wp_register_style('zsz-fonts', get_template_directory_uri() . '/assets/fonts.css', array(), ZSZ_THEME_VERSION);
    wp_enqueue_style('zsz-fonts'); // Enqueue it!

}
function admin_add_editor_scripts(){
    wp_register_script('zsz-main-script', get_template_directory_uri() . '/assets/main.js', array('jquery'), ZSZ_THEME_VERSION); // Custom scripts
    wp_enqueue_script('zsz-main-script'); // Enqueue it!
}

function admin_add_styles()
{
    //add styles that should fire in admin panel
}