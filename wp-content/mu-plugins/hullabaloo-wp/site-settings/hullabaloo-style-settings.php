<?php

#### Create a custom login page
## /site-settings/libs/css/login-style.css
## /wp-content/mu-plugins/hullabaloo-wp/libs/css/login-style.css

function hulla_login_stylesheet() 
{
    wp_enqueue_style( 'custom-login', WPMU_PLUGIN_URL.'/hullabaloo-wp/libs/css/login-style.css' );
}
add_action( 'login_enqueue_scripts', 'hulla_login_stylesheet' );

function hulla_custom_jsScripts()
{
	wp_enqueue_script( 'custom-mu-js-scripts', WPMU_PLUGIN_URL.'/hullabaloo-wp/libs/js/custom-site-script-min.js', array( 'jquery' ) );
}
#add_action( 'wp_enqueue_scripts', 'hulla_custom_jsScripts' );

?>