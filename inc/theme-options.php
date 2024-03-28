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
// Step 2: Create a Theme Options Page

function custom_theme_options_page() {
    add_menu_page(
        'Customize Your Theme Options',
        'Theme Options',
        'manage_options',
        'custom-theme-options',
        'render_custom_theme_options_page',
        'dashicons-admin-generic' // Change this to your desired icon
    );
}
add_action('admin_menu', 'custom_theme_options_page');

// Step 3: Create the HTML Structure
function render_custom_theme_options_page() {
    ?>
    <div class="wrap">
        <h2>Theme Options</h2>
        <form method="post" action="options.php">
            <?php
                settings_fields('custom-theme-settings');
                do_settings_sections('custom-theme-options');
                submit_button();
            ?>
        </form>
    </div>
    <?php
}

function custom_theme_general_section_callback() {
    echo '<p>General settings for the custom theme.</p>';
}

function custom_theme_settings_init() {
    // Save and Retrieve Options
    register_setting('custom-theme-settings', 'custom_theme_options');

    // General Settings Section
    add_settings_section(
        'custom-theme-general',
        'General Settings',
        'custom_theme_general_section_callback',
        'custom-theme-options'
    );

    // Primary Color Option
    add_settings_field(
        'primary_color',
        'Primary Color',
        'custom_theme_primary_color_callback',
        'custom-theme-options',
        'custom-theme-general'
    );

    // Background Color Option
    add_settings_field(
        'background_color',
        'Background Color',
        'custom_theme_background_color_callback',
        'custom-theme-options',
        'custom-theme-general'
    );

    // Hero Image Option
    add_settings_field(
        'hero_image',
        'Hero Image',
        'custom_theme_hero_image_callback',
        'custom-theme-options',
        'custom-theme-general'
    );

    // Hero Slider Text Option
    add_settings_field(
        'hero_slider_text',
        'Hero Slider Text',
        'custom_theme_hero_slider_text_callback',
        'custom-theme-options',
        'custom-theme-general'
    );

    // Button Text/Link Option
    add_settings_field(
        'button_text_link',
        'Button Text/Link',
        'custom_theme_button_text_link_callback',
        'custom-theme-options',
        'custom-theme-general'
    );

    // About Us Text Option
    add_settings_field(
        'about_us_text',
        'About Us Text',
        'custom_theme_about_us_text_callback',
        'custom-theme-options',
        'custom-theme-general'
    );

    // About Us Left Image Option
    add_settings_field(
        'about_us_left_image',
        'About Us Left Image',
        'custom_theme_about_us_left_image_callback',
        'custom-theme-options',
        'custom-theme-general'
    );
}
add_action('admin_init', 'custom_theme_settings_init');


// Callback functions for each settings field
function custom_theme_primary_color_callback() {
    $options = get_option('custom_theme_options');
    $primary_color = isset($options['primary_color']) ? $options['primary_color'] : '';
    echo '<input type="color" name="custom_theme_options[primary_color]" value="' . esc_attr($primary_color) . '" />';
}

function custom_theme_background_color_callback() {
    $options = get_option('custom_theme_options');
    $background_color = isset($options['background_color']) ? $options['background_color'] : '';
    echo '<input type="color" name="custom_theme_options[background_color]" value="' . esc_attr($background_color) . '" />';
}

function custom_theme_hero_image_callback() {
    $options = get_option('custom_theme_options');
    $hero_image = isset($options['hero_image']) ? $options['hero_image'] : '';
    echo '<input type="file" name="custom_theme_options[hero_image]" value="' . esc_url($hero_image) . '" />';
}

function custom_theme_hero_slider_text_callback() {
    $options = get_option('custom_theme_options');
    $hero_slider_text = isset($options['hero_slider_text']) ? $options['hero_slider_text'] : '';
    echo '<input type="text" name="custom_theme_options[hero_slider_text]" value="' . esc_attr($hero_slider_text) . '" />';
}

function custom_theme_button_text_link_callback() {
    $options = get_option('custom_theme_options');
    $button_text_link = isset($options['button_text_link']) ? $options['button_text_link'] : '';
    echo '<input type="text" name="custom_theme_options[button_text_link]" value="' . esc_attr($button_text_link) . '" />';
}

function custom_theme_about_us_text_callback() {
    $options = get_option('custom_theme_options');
    $about_us_text = isset($options['about_us_text']) ? $options['about_us_text'] : '';
    echo '<textarea name="custom_theme_options[about_us_text]" rows="5">' . esc_textarea($about_us_text) . '</textarea>';
}

function custom_theme_about_us_left_image_callback() {
    $options = get_option('custom_theme_options');
    $about_us_left_image = isset($options['about_us_left_image']) ? $options['about_us_left_image'] : '';

    // Output the input field for selecting the image
    echo '<input type="file" id="about_us_left_image" name="custom_theme_about_us_left_image" />';
    echo '<input type="button" id="upload_about_us_left_image_button" class="button" value="Upload Image" />';
    
    // Display the preview of the selected image
    if ($about_us_left_image) {
        echo '<div id="about_us_left_image_preview"><img src="' . esc_url($about_us_left_image) . '" style="max-width: 100px;" /></div>';
    }
}



function custom_theme_enqueue_scripts() {
    // Enqueue script only in the admin area
    if (is_admin()) {
        // Enqueue jQuery
        wp_enqueue_script('jquery');

        // Enqueue custom script
        wp_enqueue_script('custom-theme-script', get_template_directory_uri() . '/js/custom-script.js', array('jquery', 'media-upload'), '1.0', true);
    }
}
add_action('admin_enqueue_scripts', 'custom_theme_enqueue_scripts');
