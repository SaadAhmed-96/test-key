<?php

class customMod_testimonial_item extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Testimonial Item', 'fl-builder'),
            'description'   => __('', 'fl-builder'),
            'category'		=> __('Page Objects', 'fl-builder'),
            'dir'           => custom_bbPlugin_DIR . 'modules/testimonial-item/',
            'url'           => custom_bbPlugin_URL . 'modules/testimonial-item/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));

		$this->add_css( 'testimonial-item-style', $this->url . 'css/settings.css' );
    }
}

FLBuilder::register_module('customMod_testimonial_item', array(
    'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Testimonial Details', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'testimonial_name'     => array(
                        'type'          => 'text',
                        'label'         => __('Name', 'fl-builder'),
                        'default'       => '',
                    ),
                    'testimonial_location'     => array(
                        'type'          => 'text',
                        'label'         => __('Location', 'fl-builder'),
                        'default'       => '',
                    ),
					'testimonial_text' => array(
						'type'          => 'textarea',
						'label'         => __( 'Quote', 'fl-builder' ),
						'default'       => '',
						'rows'          => '6'
					),
                )
            )
        )
    )
));