<?php

# Change Menu Titles and remove links for Non Admins
function edit_admin_menus() 
{
    global $menu;
    global $submenu;
    # Change titles     
    $menu[5][0] = 'Blog'; // Change Posts to News
    $submenu['edit.php'][5][0] = 'All Blog Posts';
    $submenu['edit.php'][10][0] = 'Add Blog Post';
}
add_action( 'admin_menu', 'edit_admin_menus' );

## Remove Items from the Admin Bar
function remove_wp_logo( $wp_admin_bar ) 
{
    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_menu( 'comments' ); 
    $wp_admin_bar->remove_menu( 'updates' );
    $wp_admin_bar->remove_menu( 'new-content' );
}
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

## Add Items to the Admin Bar
function add_author_edit_link( $wp_admin_bar )
{
    $args = array(
       'id'    => 'pages-list',
       'title' => __( 'List Pages' ),
       'href'  => admin_url( sprintf( 
           'edit.php?post_type=page',
           get_queried_object_id() 
       ) )
    );
    $wp_admin_bar->add_node($args);
}

add_action( 'admin_bar_menu', 'add_author_edit_link', 99 );
## Customise the Dashboard
function remove_dashboard_widgets() 
    {
        $remove_defaults_widgets = array(
            'dashboard_activity' => array(
                'page'    => 'dashboard',
                'context' => 'normal'
            ),
            'dashboard_incoming_links' => array(
                'page'    => 'dashboard',
                'context' => 'normal'
            ),
            'dashboard_right_now' => array(
                'page'    => 'dashboard',
                'context' => 'normal'
            ),
            'dashboard_recent_drafts' => array(
                'page'    => 'dashboard',
                'context' => 'side'
            ),
            'dashboard_quick_press' => array(
                'page'    => 'dashboard',
                'context' => 'side'
            ),
            'dashboard_plugins' => array(
                'page'    => 'dashboard',
                'context' => 'normal'
            ),
            'dashboard_primary' => array(
                'page'    => 'dashboard',
                'context' => 'side'
            ),
            'dashboard_secondary' => array(
                'page'    => 'dashboard',
                'context' => 'side'
            ),
            'dashboard_recent_comments' => array(
                'page'    => 'dashboard',
                'context' => 'normal'
            )
        );
    
        foreach ( $remove_defaults_widgets as $widget_id => $options ) {
            remove_meta_box( $widget_id, $options['page'], $options['context'] );
        }
    }
 
    function add_dashboard_widgets() 
    {
        $custom_dashboard_widgets = array(
            'hull_contacts' => array(
                'id' => 'hullabaloo-contact',
                'title' => 'Contacts at Hullabaloo',
                'callback' => 'hullabaloo_contacts', 
                'context' => 'normal' 
            )
        );
        foreach ( $custom_dashboard_widgets as $widget_id => $options ) 
        {
            add_meta_box( $options['id'], $options['title'], $options['callback'], 'dashboard', $options['context'], 'high' );
        }
    }  

function hullabaloo_contacts() 
{
    echo "<p><strong>Email:</strong> <a href='mailto:websites@hullabaloo.co.uk'>websites@hullabaloo.co.uk</a></p>";
    echo "<p><strong>Phone:</strong> 01509 224466</p>";
    echo "<p><strong>Address:</strong><br />Hullabaloo Visual Communications Limited, <br />21 The Office Village, <br />North Road<br />Loughborough<br />Leicestershire<br />LE11 1QJ</p>";
}
function serviceInfo() 
{
    echo "No service information to be aware of.";
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );
add_action( 'wp_dashboard_setup', 'add_dashboard_widgets');


### Remove the column "Posts" from the user page.
function remove_user_posts_column($column_headers) {
    unset($column_headers['posts']);
    return $column_headers;
}
add_action('manage_users_columns','remove_user_posts_column');

?>