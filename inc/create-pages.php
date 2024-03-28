<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Astrid_Innovate
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
add_action('after_switch_theme', 'setup_theme_defaults');

function setup_theme_defaults() {
    create_blog_page();
    create_homepage();
}

function create_blog_page() {
    // Check if the 'Blog' page doesn't already exist
    if (!get_page_by_title('Blog')) {
        // Create a new post object
        $blog_page = array(
            'post_title' => 'Blog',
            'post_content' => '',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_name' => 'blog'
        );

        // Insert the post into the database
        $blog_page_id = wp_insert_post($blog_page);

        // Set the blog page as the posts page
        update_option('page_for_posts', $blog_page_id);
    }
}

function create_homepage() {
    // Check if the 'Homepage' page doesn't already exist
    if (!get_page_by_title('Homepage')) {
        // Create a new post object
        $homepage = array(
            'post_title' => 'Homepage',
            'post_content' => '',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_name' => 'homepage'
        );

        // Insert the post into the database
        $homepage_id = wp_insert_post($homepage);

        // Set the homepage as the static front page
        update_option('page_on_front', $homepage_id);
        update_option('show_on_front', 'page');

        // Assign a template to the homepage
        update_post_meta($homepage_id, '_wp_page_template', 'homepage-template.php'); // Replace 'homepage-template.php' with the template file name
    }
}
