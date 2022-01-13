<?php

## Change Roles names to client friendly names
function wps_change_role_name()
{
    global $wp_roles;
    if ( isset( $wp_roles ) )
    {
	    $wp_roles = new WP_Roles();
	    #$wp_roles->roles['editor']['name']          = 'Admin';
	    #$wp_roles->role_names['editor']             = 'Admin';
	    $wp_roles->roles['administrator']['name']   = 'Web Master';
	    $wp_roles->role_names['administrator']      = 'Web Master';
	}
}
add_action('init', 'wps_change_role_name');

## Update the Editor Capabilities
## Remove the Promote User
function changeEditorCaps()
{
	$editorRole = get_role( 'editor' );
	$editorRole->remove_cap( 'install_plugins' );
	$editorRole->remove_cap( 'install_themes' );
	$editorRole->remove_cap( 'install_plugins' );
}
#add_action('init', 'changeEditorCaps');

?>