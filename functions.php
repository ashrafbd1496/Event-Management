<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package event-management
 * @since 1.0.0
 */
include __DIR__ . '/custom-post-types/sponsor/sponsor.php';
include __DIR__ . '/inc/carbon-fields/vendor/autoload.php';
include __DIR__ . '/inc/options.php';

//include get_template_directory() . '/custom-post-types/sponsor/sponsor.php';

/**
 * Add theme support.
 */
function event_management_setup()
{
	/*
* Load additional block styles.
*/
	$styled_blocks = ['quote'];
	foreach ($styled_blocks as $block_name) {
		$args = array(
			'handle' => "event-management-$block_name",
			'src' => get_theme_file_uri("assets/css/blocks/$block_name.css"),
			'path' => get_theme_file_path("assets/css/blocks/$block_name.css"),
		);
		// Replace the "core" prefix if you are styling blocks from plugins.
		wp_enqueue_block_style("core/$block_name", $args);
	}
}
add_action('after_setup_theme', 'event_management_setup');

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function event_management_styles()
{
	wp_enqueue_style(
		'event-management-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get('Version')
	);
}
add_action('wp_enqueue_scripts', 'event_management_styles');
