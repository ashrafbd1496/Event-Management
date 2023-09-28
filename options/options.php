<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', 'load_carbon_fields');

function load_carbon_fields()
{
    \Carbon_Fields\Carbon_Fields::boot();

    add_action('carbon_fields_register_fields', 'crb_attach_theme_options');

    function crb_attach_theme_options()
    {

        // Default options page
        $evnt_mngmnt_options_container = Container::make('theme_options', 'Event Options')
            ->add_fields(array(
                Field::make('header_scripts', 'crb_header_script'),
                Field::make('footer_scripts', 'crb_footer_script'),
            ))->set_page_menu_position(2);

        // Add second options page under 'Basic Options'
        Container::make('theme_options', 'Sponsors')
            ->set_page_parent($evnt_mngmnt_options_container) // reference to a top level container
            ->add_fields(array(
                Field::make('text', 'crb_facebook_link'),
                Field::make('text', 'crb_twitter_link'),
            ));

        // Add third options page under "Appearance"
        Container::make('theme_options', 'Customize Background')
            ->set_page_parent('themes.php') // identificator of the "Appearance" admin section
            ->add_fields(array(
                Field::make('color', 'crb_background_color'),
                Field::make('image', 'crb_background_image'),
            ));



        // Define a metabox
        Container::make('post_meta', __('Schedule Fields'))

            ->where('post_type', '=', 'schedule') // Specify the post type where this metabox should appear

            // Add a text field
            ->add_fields(array(

                Field::make('date_time', 'est', 'Event Start Time')->set_attribute('placeholder', 'Event Start Time'),

                Field::make('date_time', 'eet', 'Event End Time')->set_attribute('placeholder', 'Event End Time'),

                Field::make("multiselect", "evnt_mngmnt_speakers", "Speaker")->add_options([
                    '1st Speaker' => 'Rasel Ahmed',
                    '2nd Speaker' => 'Anam Ahmed',
                    '3rd Speaker' => 'Hasin Hayder',

                ]),




            ));

        //sponsor information



        Container::make('post_meta', __('Schedule Fields'))->where('post_type', '=', 'person')->add_fields(array(

            Field::make("multiselect", "evnt_mngmnt_persons", "Person")->add_options([
                'Person 01' => 'Jon Doe',
                'Person 02' => 'Jakier Hossain',
                'Person 03' => 'Jahid Hossen',

            ]),

        ));

        Container::make('post_meta', __('Social Profiles'))
            ->where('post_type', 'IN', ['person', 'speaker'])
            ->add_tab('Social Profile', array(
                Field::make('complex', 'crb_social_urls', 'Social Links')->add_fields(array(
                    Field::make('text', 'label', 'Social Links'),
                    Field::make('image', 'image', 'Image')->set_width(50),
                    Field::make('text', 'url', 'URL'),
                )),
            ));
    }
}




function display_custom_fields()
{
    // Get the custom field values
    $custom_title = carbon_get_post_meta(get_the_ID(), 'custom_title');

    // Output the custom field in the editor
    echo "Custom Title: " . esc_html($custom_title);
}
