<?php

/**
 * @class FLHeadingModule
 */
class customMod_infoRow extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Info Row', 'fl-builder'),
			'description'   	=> __('', 'fl-builder'),
			'category'      	=> __('Page Objects', 'fl-builder'),
			'partial_refresh'	=> true,
			'dir'             	=> custom_bbPlugin_DIR . 'modules/info-row/',
            'url'             	=> custom_bbPlugin_URL . 'modules/info-row/',
		));

        // Register and enqueue your own.
        $this->add_css( 'info-row-style', $this->url . 'css/settings.css' );
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('customMod_infoRow', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => 'Row Details',
				'fields'        => array(
					'info_row_title' => array(
						'type'            => 'text',
						'label'           => __('Title', 'fl-builder'),
						'default'         => '',
					),
					'info_row_text' => array(
						'type'          => 'textarea',
						'label'         => __( 'Text', 'fl-builder' ),
						'default'       => '',
						'rows'          => '6',
					),
					'info_row_photo' => array(
						'type'          => 'photo',
						'label'         => __('Image', 'fl-builder'),
						'show_remove'   => false,
					),
					'info_row_show_btns'  => array(
						'type'          => 'select',
						'label'         => __( 'Show Buttons', 'fl-builder' ),
						'default'       => 'no',
						'options'       => array(
							'no' => __( 'No', 'fl-builder' ),
							'yes'=> __( 'Yes', 'fl-builder' )
						),
						'toggle'        => array(
							'yes'      => array(
								'fields'        => array( 'info_row_btns'),
							),
						)
					),
					'info_row_btns' => array(
						'type'          => 'form',
						'label'         => __('Buttons', 'fl-builder'),
						'form'          => 'info_row_btns',
						'preview_text'  => 'info_row_btns_btn_label',
						'multiple'		=> true
					),
				)
			),		
		)
	)
));


FLBuilder::register_settings_form('info_row_btns', array(
	'title' => __('CTA Item', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('General', 'fl-builder'),
			'sections'      => array(
				'general'       => array(
					'title'         => '',
					'fields'        => array(
						'info_row_btns_btn_label' => array(
							'type'            => 'text',
							'label'           => __('Button Label', 'fl-builder'),
							'default'         => '',
						),
						'info_row_btns_btn_link' => array(
							'type'          => 'link',
							'label'         => __('Link', 'fl-builder')
						),
					)
				),
			)
		)
	)
));