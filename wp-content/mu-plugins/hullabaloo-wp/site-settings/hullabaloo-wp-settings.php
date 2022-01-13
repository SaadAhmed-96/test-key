<?php

## Hide WordPress Updates from everyone apart from Admin Users
function hide_update_notice_to_all_but_admin_users()
{
    if (!current_user_can('update_core'))
    {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1 );

## Remove WP Version && Remove Query Strings from Static Resources
// remove version from head
remove_action('wp_head', 'wp_generator');
// remove version from rss
add_filter('the_generator', '__return_empty_string');
// remove version from scripts and styles
function shapeSpace_remove_version_scripts_styles($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    ## DEBUG by forcing new resources
    $src = add_query_arg( 'vs', uniqid(), $src );
    return $src;
}
add_filter('style_loader_src', 'shapeSpace_remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'shapeSpace_remove_version_scripts_styles', 9999);

## Remove height & width attributes from inserting meda.
function remove_width_attribute( $html )
{
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

## SAVE LOGIN ATTEMPT
function hullabaloo_saveLoginAttempt($username)
{
    if (!empty($username))
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        global $wpdb;

        $wpdb->insert(
            'login_attempt',
            array(
                'username'      => $username,
                'ip_address'    => $ipAddress
            ),
            array(
                '%s',
                '%s'
            )
        );
    }
}
add_action('wp_authenticate', 'hullabaloo_saveLoginAttempt', 30, 2);

## Disable Emojis
function disable_wp_emojicons()
{
    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}

add_action( 'init', 'disable_wp_emojicons');

function disable_emojicons_tinymce( $plugins )
{
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

function wpse_edit_footer() {
    add_filter( 'admin_footer_text', 'wpse_edit_text', 11 );
}

function wpse_edit_text($content) {
    return "Created by Hullabaloo";
}
add_action( 'admin_init', 'wpse_edit_footer' );

## Save Contact Form 7 to the database
function before_send_mail( $wpcf7 )
{
    $submission = WPCF7_Submission::get_instance();
    $data       = $submission->get_posted_data();
    
    global $wpdb; // DB Connection
    
    $wpdb->insert( 
        $wpdb->prefix.'contactform_data', 
        array( 
            'contact_form'  => $data['_wpcf7'], 
            'contact_data'  => json_encode($data),
            'contact_ip'    => $_SERVER['REMOTE_ADDR']  
        ), 
        array( 
            '%s', 
            '%s',
            '%s' 
        )
    );
}
add_action( 'wpcf7_before_send_mail', 'before_send_mail' );

?>