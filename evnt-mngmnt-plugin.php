<?php
/*
 * Plugin Name:       Event Management Plugin
 * Plugin URI:        https://github.com/ashrafbd1496/event-management
 * Description:       Event management plugin that simplifies the organization and promotion of events. It typically provides features such as event creation, ticketing, RSVP management, calendar integration, and customizable event pages. Users can easily create, manage, and promote events on your websites.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md Ashraf Uddin
 * Author URI:        https://ashrafbd.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/ashrafbd1496/plugin-dev
 * Text Domain:       evnt-mngmnt
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    die('Hello, You cant be here');
}

if (!class_exists('EvntManagementPlugin')) {

    class EvntManagementPlugin
    {
        public function __construct()
        {
            define('EVNT_MNGMNT_PLUGIN_PATH', plugin_dir_path(__FILE__));

            require_once(EVNT_MNGMNT_PLUGIN_PATH . '/carbon-fields/vendor/autoload.php');

            //create custom post type
            add_action('init', array($this, 'create_evnt_mngmnt_custom_post'));

            //add asets(js, css, etc)
            add_action('wp_enqueue_scripts', array($this, 'load_assets'));

            //load javascript at footer
            add_action('wp_footer', array($this, 'load_script_at_footer'));
        }


        public function initialize()
        {
            include_once EVNT_MNGMNT_PLUGIN_PATH . '/includes/utilities.php';

            include_once EVNT_MNGMNT_PLUGIN_PATH . '/options/options.php';

            include_once EVNT_MNGMNT_PLUGIN_PATH . '/includes/evnt-mngmnt.php';
        }

        function create_evnt_mngmnt_custom_post()
        {
            register_block_type('event-management/sponsor-shortcode', array(
                'render_callback' => 'sponsor_shortcode_function',
            ));


            register_post_type('sponsor', [
                'labels' => [
                    'name' => 'Sponsors',
                    'singular_name' => 'Sponsor',
                    'add_new' => 'Add New',
                    'add_new_item' => 'Add New Sponsor',
                    'edit_item' => 'Edit Sponsor',
                    'new_item' => 'New Sponsor',
                    'view_item' => 'View Sponsor',
                    'search_items' => 'Search Sponsors',
                    'not_found' => 'No sponsors found',
                    'not_found_in_trash' => 'No sponsors found in Trash',
                    'menu_name' => 'Sponsors',
                ],

                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'sponsor'), // Change 'slug' to your desired URL slug
                'capability_type' => 'post',
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => 20, // Adjust the menu position as needed
                'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
                'menu_icon'  => 'dashicons-buddicons-friends'

            ]);

            register_taxonomy(
                'sponsor_category',
                'sponsor',
                [
                    'labels' => [
                        'name' => 'Sponsor Categories',
                        'singular_name' => 'Sponsor Category',
                        'search_items' => 'Search Sponsor Categories',
                        'all_items' => 'All Sponsor Categories',
                        'parent_item' => 'Parent Sponsor Category',
                        'parent_item_colon' => 'Parent Sponsor Category:',
                        'edit_item' => 'Edit Sponsor Category',
                        'update_item' => 'Update Sponsor Category',
                        'add_new_item' => 'Add New Sponsor Category',
                        'new_item_name' => 'New Sponsor Category Name',
                        'menu_name' => 'Sponsor Categories',
                    ],
                    'hierarchical' => true,
                    'show_ui' => true,
                    'show_admin_column' => true,
                    'query_var' => true,
                    'rewrite' => array('slug' => 'sponsor-category')
                ]
            );

            register_post_type('speaker', [
                'labels' => [
                    'name' => 'Speakers',
                    'singular_name' => 'Speaker',
                    'add_new' => 'Add New',
                    'add_new_item' => 'Add New Speaker',
                    'edit_item' => 'Edit Speaker',
                    'new_item' => 'New Speaker',
                    'view_item' => 'View Speaker',
                    'search_items' => 'Search Speaker',
                    'not_found' => 'No speakers found',
                    'not_found_in_trash' => 'No speakers found in Trash',
                    'menu_name' => 'Speakers',
                ],

                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'speaker'),
                'capability_type' => 'post',
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => 20,
                'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'comments'),
                'menu_icon' => 'dashicons-controls-volumeon'

            ]);

            register_post_type('schedule', [
                'labels' => [
                    'name' => 'Schedules',
                    'singular_name' => 'Schedule',
                    'add_new_item' => 'Add New Schedule',
                    'menu_name' => 'Schedules',
                ],

                'public' => false,
                'show_ui' => true,
                'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
                'menu_icon'  => 'dashicons-clock'

            ]);

            register_post_type('person', [
                'labels' => [
                    'name' => 'Persons',
                    'singular_name' => 'person',
                    'add_new_item' => 'Add New Person',
                    'menu_name' => 'Persons',
                ],

                'public' => true,
                'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'comments'),
                'menu_icon'  => 'dashicons-businessman'


            ]);
        }



        public function load_assets()
        {
            wp_enqueue_style('bootstrap-css', 'https://ajax.aspnetcdn.com/ajax/bootstrap/5.2.3/css/bootstrap.css');

            wp_enqueue_style(
                'myctform-stylesheet.css',
                plugin_dir_url(__FILE__) . 'assets/css/myctform-stylesheet.css',
                ['bootstrap'],
                'all'
            );

            wp_enqueue_script('bootstrap-js', 'https://ajax.aspnetcdn.com/ajax/bootstrap/5.2.3/bootstrap.js', array('jquery'), null, true);

            wp_enqueue_script(
                'ctform-script.js',
                plugin_dir_url(__FILE__) . 'assets/js/ctform-script.js',
                ['jquery'],
                null,
                true
            );
        }


        public function load_script_at_footer()
        {
        }
    }

    $evntmngPlugin = new EvntManagementPlugin();
    $evntmngPlugin->initialize();
}
