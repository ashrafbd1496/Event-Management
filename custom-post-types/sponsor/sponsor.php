<?php


function evnt_mngmnt_sponsor()
{

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
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
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
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon'  => 'dashicons-businessman'


    ]);
}


add_action('init', 'evnt_mngmnt_sponsor');
