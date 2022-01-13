<?php
/**
 * Plugin Name: Hullabaloo Custom Modules
 * Plugin URI: https://hullabaloo.co.uk
 * Description: Custom modules for different clients
 * Version: 2.0
 * Author: Hullabaloo Visual Communications
 * Author URI: https://hullabaloo.co.uk
 */
define( 'custom_bbPlugin_DIR', plugin_dir_path( __FILE__ ) );
define( 'custom_bbPlugin_URL', plugins_url( '/', __FILE__ ) );

require_once custom_bbPlugin_DIR . 'classes/class-fl-custom-modules-loader.php';

function my_custom_builder_fields( $fields ) {
	$fields['hulla-pdf-field'] 	  		= custom_bbPlugin_DIR.'/fields/pdf-field.php';
	$fields['testimonial-selector'] 	= custom_bbPlugin_DIR.'/fields/testimonial-selector.php';
	#$fields['news-category'] 	  = custom_bbPlugin_DIR . 'fields/news-category-field.php';
	return $fields;
}
add_filter( 'fl_builder_custom_fields', 'my_custom_builder_fields' );

function team_grid_ColWidth($numCols, $gutter)
{
	$totalGutterWidth 	= $gutter*($numCols - 1);
	return (100-$totalGutterWidth)/$numCols;
}