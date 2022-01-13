<?php

/**
 * @class FLHeadingModule
 */
class customMod_columntext extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Text in Columns', 'fl-builder'),
			'description'   	=> __('Display text in multiple columns.', 'fl-builder'),
			'category'      	=> __('Page Objects', 'fl-builder'),
			'partial_refresh'	=> true,
			'dir'             	=> custom_bbPlugin_DIR . 'modules/column-text/',
            'url'             	=> custom_bbPlugin_URL . 'modules/column-text/',
		));

        // Register and enqueue your own.
        $this->add_css( 'columnText-style', $this->url . 'css/settings.css' );
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('customMod_columntext', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => 'Column Settings',
				'fields'        => array(
					'columntext_heading'  => array(
						'type'            => 'text',
						'label'           => __('Heading', 'fl-builder'),
						'default'         => '',
                        'connections'     => array( 'string' ),
					),
					'columntext_title_tag' => array(
                        'type'          => 'select',
                        'label'         => __( 'Title H Tag', 'fl-builder' ),
                        'default'       => 'h3',
                        'options'       => array(
                            'h1'      => __( 'Heading 1', 'fl-builder' ),
                            'h2'      => __( 'Heading 2', 'fl-builder' ),
                            'h3'      => __( 'Heading 3', 'fl-builder' ),
                            'h4'      => __( 'Heading 4', 'fl-builder' ),
                            'h5'      => __( 'Heading 5', 'fl-builder' ),
                            'h6'      => __( 'Heading 6', 'fl-builder' )
                        )
                    ),
                    'columntext_title_alignment' => array(
                        'type'          => 'select',
                        'label'         => __( 'Title Alignment', 'fl-builder' ),
                        'help'          => 'This will override the default settings of the H tag. Leave a default to get standard colour.',
                        'default'       => 'left',
                        'options'       => array(
                            'left'         => __( 'Left', 'fl-builder' ),
                            'center'       => __( 'Centre', 'fl-builder' ),
                            'right'        => __( 'Right', 'fl-builder' )
                        )
                    ),
					'columntext_spread' => array(
                        'type'          => 'select',
                        'label'         => __( 'Automatic or Manual', 'fl-builder' ),
                        'default'       => 'automatic',
                        'options'       => array(
                            'automatic'      => __( 'Automatic', 'fl-builder' ),
                            'manual'      => __( 'Manual', 'fl-builder' )
                        ),
                        'toggle'        => array(
                            'automatic'      => array(
                                'fields'        => array( 'columntext_auto_text', 'columntext_numcols' )
                            ),
                            'manual'      => array(
                                'fields'        => array( 'columntext_col1_text', 'columntext_col2_text', 'columntext_col3_text', 'columntext_col4_text' )
                            )
                        )
                    ),
                    'columntext_numcols' => array(
                        'type'          => 'select',
                        'label'         => __( 'Number of Columns', 'fl-builder' ),
                        'default'       => '2',
                        'options'       => array(
                            '1'      => __( 'One', 'fl-builder' ),
                            '2'      => __( 'Two', 'fl-builder' ),
                            '3'      => __( 'Three', 'fl-builder' ),
                            '4'      => __( 'Four', 'fl-builder' )
                    	)
                    )
				)
			),
			'columns'       => array(
				'title'         => 'Column',
				'fields'        => array(
					'columntext_auto_text'  => array(
						'type'          => 'editor',
					    'media_buttons' => true,
					    'rows'          => 20,
                        'connections'     => array( 'string' ),
					),

                    'columntext_col1_text'  => array(
                        'type'          => 'editor',
                        'media_buttons' => true,
                        'rows'          => 20,
                        'placeholder'   => "Column 1",
                        'connections'     => array( 'string' ),
                    ),
                    'columntext_col2_text'  => array(
                        'type'          => 'editor',
                        'media_buttons' => true,
                        'rows'          => 20,
                        'placeholder'   => "Leave blank if you do not wish to use two columns.",
                        'connections'     => array( 'string' ),
                    ),
                    'columntext_col3_text'  => array(
                        'type'          => 'editor',
                        'media_buttons' => true,
                        'rows'          => 20,
                        'placeholder'   => "Leave blank if you do not wish to use three columns.",
                        'connections'     => array( 'string' ),
                    ),
                    'columntext_col4_text'  => array(
                        'type'          => 'editor',
                        'media_buttons' => true,
                        'rows'          => 20,
                        'placeholder'   => "Leave blank if you do not wish to use three columns.",
                        'connections'     => array( 'string' ),
                    )

				)
			),
			'column_style'       => array(
				'title'         => 'Style Settings',
				'fields'        => array(
					'width' => array(
						'type'         => 'unit',
						'label'        => 'Max Width',
						'units'        => array( 'px', 'vw', '%' ),
						'default_unit' => 'px',
					),
				)
			),		
		)
	)
));