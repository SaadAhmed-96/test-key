<?php

class FL_HullaCustom_DoShortcode extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Do Shortcode', 'fl-builder'),
            'description'   => __('Use this module to quicky add a Shortcode.', 'fl-builder'),
            'category'		=> __('Page Objects', 'fl-builder'),
            'dir'           => custom_bbPlugin_DIR . 'modules/do-shortcode/',
            'url'           => custom_bbPlugin_URL . 'modules/do-shortcode/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
    }
}

FLBuilder::register_module('FL_HullaCustom_DoShortcode', array(
    'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Section Title', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'text_field'     => array(
                        'type'          => 'text',
                        'label'         => __('Text Field', 'fl-builder'),
                        'default'       => '',
                        'help'          => 'Please make you include the brackets!',
                    ),
                )
            )
        )
    )
));