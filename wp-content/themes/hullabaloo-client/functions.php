<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

// ACF -> Add Site Options 
if( function_exists('acf_add_options_page') ) 
{
    $option_page = acf_add_options_page(array(
		'page_title' 	=> 'Site Contact Settings',
		'menu_title' 	=> 'Contact Settings',
		'menu_slug' 	=> 'site-contact-settings',
	));
}

// Custom Site Functions