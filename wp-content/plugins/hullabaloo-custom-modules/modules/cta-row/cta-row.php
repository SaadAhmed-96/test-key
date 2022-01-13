<?php

/**
 * @class FLHeadingModule
 */
class customMod_cta_row extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('CTA Row', 'fl-builder'),
			'description'   	=> __('', 'fl-builder'),
			'category'      	=> __('Page Objects', 'fl-builder'),
			'partial_refresh'	=> true,
			'dir'             	=> custom_bbPlugin_DIR . 'modules/cta-row/',
            'url'             	=> custom_bbPlugin_URL . 'modules/cta-row/',
		));

        // Register and enqueue your own.
        $this->add_css( 'cta-row-style', $this->url . 'css/settings.css' );
	}
}

FLBuilder::register_module('customMod_cta_row', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => 'CTA Row Settings',
				'fields'        => array(
					'cta_row_items' => array(
						'type'          => 'form',
						'label'         => __('CTA Item', 'fl-builder'),
						'form'          => 'cta_row_form',
						'preview_text'  => 'cta_row_form_heading',
						'multiple'		=> true
					),
					'cta_row_height' => array(
						'type'        => 'unit',
						'label'       => 'CTA Row Height',
						'units'  	  => array( 'px' ),
						'description' => 'px (leave blank for default)',
					),
				)
			),		
		)
	)
));

FLBuilder::register_settings_form('cta_row_form', array(
	'title' => __('CTA Item', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('General', 'fl-builder'),
			'sections'      => array(
				'general'       => array(
					'title'         => '',
					'fields'        => array(
						'cta_row_form_heading'  => array(
							'type'            => 'text',
							'label'           => __('Heading', 'fl-builder'),
							'default'         => '',
						),
						'cta_row_form_btn_label' => array(
							'type'            => 'text',
							'label'           => __('Button Label', 'fl-builder'),
							'default'         => '',
							'connections'     => array( 'string' ),
						),
						'cta_row_form_btn_link' => array(
							'type'          => 'link',
							'label'         => __('Link', 'fl-builder')
						),
						'cta_row_form_photo' => array(
							'type'          => 'photo',
							'label'         => __('Background Image', 'fl-builder'),
							'show_remove'   => false,
						)
					)
				),
			)
		)
	)
));