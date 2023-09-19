<?php

function check_elementor_status()
{
    // Check if Elementor plugin is active
    if (is_plugin_active('elementor/elementor.php')) {
        // Elementor is active
        return true;
    } else {
        // Elementor is not active
        return false;
    }
}

function display_elementor_notice()
{
    if (!check_elementor_status()) {
?>
        <div class="notice notice-error is-dismissible">
            <p><?php _e('Elementor is not active. Please activate Elementor to use this functionality.', 'evnt-mngmnt'); ?></p>
        </div>
<?php
    }
}

add_action('admin_notices', 'display_elementor_notice');












function enqueue_parent_theme_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_parent_theme_styles');
