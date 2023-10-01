<?php

/**
 * Register new Elementor widgets.
 *
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */

function register_evnt_mngmnt_sponsor_widget($widgets_manager)
{
    require_once(__DIR__ . '/widgets/sponsor-widget.php');

    $widgets_manager->register(new Evnt_Mngmnt_Sponsor_Widget());
}

add_action('elementor/widgets/register', 'register_evnt_mngmnt_sponsor_widget', 10, 1);
