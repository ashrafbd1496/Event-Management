<?php

add_shortcode('sponsor_shortcode', 'sponsor_shortcode_function');

function sponsor_shortcode_function($atts)
{
    require_once EVNT_MNGMNT_PLUGIN_PATH .  '/includes/template/event-mngmnt-template.php';
    // Get the sponsor images from the custom post type
}

function speaker_shortcode($atts)
{
    // Display the speakers content
    echo '<p>This is the speakers content.</p>';
}

add_shortcode('speaker_shortcode', 'speaker_shortcode');



function person_shortcode($atts)
{
    // Display the persons content
    echo '<p>This is the persons content.</p>';
}

add_shortcode('person_shortcode', 'person_shortcode');


function schedule_shortcode($atts)
{
    // Display the schedule content
    echo '<p>This is the schedule content.</p>';
}

// Register the shortcodes
add_shortcode('schedule_shortcode', 'schedule_shortcode');
