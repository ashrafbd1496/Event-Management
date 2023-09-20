<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Carbon_Fields\Carbon_Fields::boot();


add_action('carbon_fields_register_fields', 'crb_attach_theme_options');

function crb_attach_theme_options()
{

    Container::make('theme_options', __('Event Options'))
        ->set_icon('dashicons-screenoptions')
        ->add_fields(array(

            Field::make('text', 'ctform_rcpnt_email', 'Recipient Email'),

            Field::make('media_gallery', 'crb_media_gallery', __('Media Gallery'))
                ->set_duplicates_allowed(false),


        ));
}
