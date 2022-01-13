<?php

/**
 * @class FLHeadingModule
 */
class customMod_page_banner extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Page Banner', 'fl-builder'),
			'description'   	=> __('', 'fl-builder'),
			'category'      	=> __('Page Objects', 'fl-builder'),
			'partial_refresh'	=> true,
			'dir'             	=> custom_bbPlugin_DIR . 'modules/page-banner/',
            'url'             	=> custom_bbPlugin_URL . 'modules/page-banner/',
		));

        // Register and enqueue your own.
        $this->add_css( 'page-banner-style', $this->url . 'css/page-banner-settings.css' );
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('customMod_page_banner', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => 'Banner Setup',
				'fields'        => array(
					'page_banner_theme'  => array(
						'type'          => 'select',
						'label'         => __( 'Theme', 'fl-builder' ),
						'default'       => 'photo',
						'options'       => array(
							'photo' => __( 'Photo', 'fl-builder' ),
							'white'	=> __( 'White', 'fl-builder' )
						),
						'toggle'        => array(
							'photo'      => array(
								'fields'        => array( 'page_banner_heading'),
								'sections'        => array( 'details' ),
							),
							'white'      => array(
								'fields'        => array( 'page_banner_heading'),
							),
						)
					),
					'page_banner_heading'  => array(
						'type'            => 'text',
						'label'           => __('Heading', 'fl-builder'),
						'default'         => '',
                        'connections'     => array( 'string' ),
					),
				)
			),
			'details'       => array(
				'title'         => 'Details',
				'fields'        => array(
					'page_banner_text' => array(
						'type'          => 'textarea',
						'label'         => __( 'Banner Text', 'fl-builder' ),
						'default'       => '',
						'rows'          => '6',
						'connections'     => array( 'string' ),
					),
					'page_banner_btn_label' => array(
						'type'            => 'text',
						'label'           => __('Button Label', 'fl-builder'),
						'default'         => '',
                        'connections'     => array( 'string' ),
					),
					'page_banner_btn_link' => array(
						'type'          => 'link',
						'label'         => __('Link', 'fl-builder')
					),
					'page_banner_subtext' => array(
						'type'          => 'textarea',
						'label'         => __( 'Sub Text', 'fl-builder' ),
						'default'       => '',
						'rows'          => '6',
						'description'	=> 'This will show below the white border area.',
						'connections'     => array( 'string' ),
					),
					'page_banner_photo' => array(
						'type'          => 'photo',
						'label'         => __('Background Image', 'fl-builder'),
						'show_remove'   => false,
						'connections'     => array( 'string' ),
					),
					'page_banner_row_height' => array(
						'type'        => 'unit',
						'label'       => 'Row Height',
						'units'          => array( 'px' ),
						'description' => 'px (leave blank for default)',
					),
				)
			),		
		)
	)
));