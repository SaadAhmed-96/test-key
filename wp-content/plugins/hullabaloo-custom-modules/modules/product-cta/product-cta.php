<?php

/**
 * @class FLHeadingModule
 */
class customMod_productCTA extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Product CTA', 'fl-builder'),
			'description'   	=> __('', 'fl-builder'),
			'category'      	=> __('Page Objects', 'fl-builder'),
			'partial_refresh'	=> true,
			'dir'             	=> custom_bbPlugin_DIR . 'modules/product-cta/',
            'url'             	=> custom_bbPlugin_URL . 'modules/product-cta/',
		));

        // Register and enqueue your own.
        $this->add_css( 'product-cta-style', $this->url . 'css/settings.css' );
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('customMod_productCTA', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => 'Product Settings',
				'fields'        => array(
					'product_cta_btn_label' => array(
						'type'            => 'text',
						'label'           => __('Button Label', 'fl-builder'),
						'default'         => '',
                        'connections'     => array( 'string' ),
					),
					'product_cta_btn_link' => array(
						'type'          => 'link',
						'label'         => __('Link', 'fl-builder')
					),
					'product_cta_photo' => array(
						'type'          => 'photo',
						'label'         => __('Background Image', 'fl-builder'),
						'show_remove'   => false,
					),
					'product_cta_row_height' => array(
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