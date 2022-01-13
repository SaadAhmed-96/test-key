<?php
	
/**
 * A class that handles loading custom modules and custom
 * fields if the builder is installed and activated.
 */
class FL_Custom_Modules_Example_Loader {
	
	/**
	 * Initializes the class once all plugins have loaded.
	 */
	static public function init() {
		add_action( 'plugins_loaded', __CLASS__ . '::setup_hooks' );
	}
	
	/**
	 * Setup hooks if the builder is installed and activated.
	 */
	static public function setup_hooks() {
		if ( ! class_exists( 'FLBuilder' ) ) {
			return;	
		}
		
		// Load custom modules.
		add_action( 'init', __CLASS__ . '::load_modules' );
		
		// Register custom fields.
		add_filter( 'fl_builder_custom_fields', __CLASS__ . '::register_fields' );
		
		// Enqueue custom field assets.
		add_action( 'init', __CLASS__ . '::enqueue_field_assets' );
	}
	
	/**
	 * Loads our custom modules.
	 */
	static public function load_modules() {		

		require_once custom_bbPlugin_DIR . 'modules/do-shortcode/do-shortcode.php';
		require_once custom_bbPlugin_DIR . 'modules/column-text/column-text.php';

		## Reynaers at Home
		require_once custom_bbPlugin_DIR . 'modules/page-banner/page-banner.php';
		require_once custom_bbPlugin_DIR . 'modules/cta-row/cta-row.php';
		require_once custom_bbPlugin_DIR . 'modules/testimonial-item/testimonial-item.php';
		require_once custom_bbPlugin_DIR . 'modules/info-row/info-row.php';

		## Arge
		// require_once custom_bbPlugin_DIR . 'modules/simple-cta/simple-cta.php';
		// require_once custom_bbPlugin_DIR . 'modules/simple-blog-cta/simple-blog-cta.php';
		// require_once custom_bbPlugin_DIR . 'modules/download-item/download-item.php';
		// require_once custom_bbPlugin_DIR . 'modules/main-slider/main-slider.php';
		// require_once custom_bbPlugin_DIR . 'modules/info-box-icon-grey/info-box-icon-grey.php';
		// require_once custom_bbPlugin_DIR . 'modules/event-info-box/event-info-box.php';
		// require_once custom_bbPlugin_DIR . 'modules/download-list/download-list.php';
	
		## DG Legal
		// require_once custom_bbPlugin_DIR . 'modules/testimonial-slider/testimonial-slider.php';
		// require_once custom_bbPlugin_DIR . 'modules/testimonial-feed/testimonial-feed.php';
		// require_once custom_bbPlugin_DIR . 'modules/theme-button/theme-button.php';
		// require_once custom_bbPlugin_DIR . 'modules/img-and-text/img-and-text.php';
		// require_once custom_bbPlugin_DIR . 'modules/homepage-dual-banner-text/homepage-dual-banner-text.php';
	}
	
	/**
	 * Registers our custom fields.
	 */
	static public function register_fields( $fields ) {
		$fields['pdf_file'] 			= custom_bbPlugin_DIR . 'fields/pdf-field.php';
		$fields['testimonial-selector'] = custom_bbPlugin_DIR . 'fields/testimonial-selector.php';
		return $fields;
	}
	
	/**
	 * Enqueues our custom field assets only if the builder UI is active.
	 */
	static public function enqueue_field_assets() {
		if ( ! FLBuilderModel::is_builder_active() ) {
			return;
		}
		
		// wp_enqueue_style( 'my-custom-fields', custom_bbPlugin_URL . 'assets/css/fields.css', array(), '' );
		// wp_enqueue_script( 'my-custom-fields', custom_bbPlugin_URL . 'assets/js/fields.js', array(), '', true );
	}
}

FL_Custom_Modules_Example_Loader::init();