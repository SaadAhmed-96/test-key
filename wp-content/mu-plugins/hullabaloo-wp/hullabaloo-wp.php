<?php

## Manage any Hullabaloo site initial site settings.
## Version 0.3
## Created: 13th Sept 2018
## hullabaloo.co.uk
## Author: Kane Mitchell

## WP Settings
require_once 'site-settings/hullabaloo-wp-settings.php';
## User Settings
require_once 'site-settings/hullabaloo-user-settings.php';
## Admin Settings
require_once 'site-settings/hullabaloo-admin-settings.php';
## Style Settings
require_once 'site-settings/hullabaloo-style-settings.php';

## Google Analytics Tag Code
function insert_GoogleAnalytics()
{
	## Google Analytics is not added when a logged in user is on the site!
	if( !is_user_logged_in() )
	{
		echo file_get_contents('google-analytics-tag.html', FILE_USE_INCLUDE_PATH);
	}
}
add_action('wp_head', 'insert_GoogleAnalytics', 100);

## Shortcodes
require_once 'custom-shortcodes/basic-shortcodes.php';

## Custom Post Types
require_once 'custom-post-types/cpt-news.php';
require_once 'custom-post-types/cpt-testimonials.php';

## Custom Settings For Each Site

## Add -> Custom Image Sizes
## add_image_size( '768x513', 768, 513, true );


## REMOVE Menu Items at Editor Level (Admin)
// function setEditorMenuItems()
// {
//     $user           = wp_get_current_user();
//     $userRole       = $user->roles[0];

//     if( $userRole == 'editor' )
//     {
//          remove_menu_page( 'tools.php' );
//          remove_menu_page( 'profile.php' );
//          remove_menu_page( 'edit-comments.php' );
//     }

// }
// add_action( 'admin_menu', 'setEditorMenuItems' );


?>