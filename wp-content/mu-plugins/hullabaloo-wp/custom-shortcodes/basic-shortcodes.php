<?php

######
### Useful Shortcodes ###
######

## Get the Page Title of the current page
function shc_showPageTitle( )
{
    return get_the_title();
}
add_shortcode( 'page_title', 'shc_showPageTitle' );

## Add the current year dynamically.
function shc_showYear() {
	$year = date('Y');
	return $year;
}
add_shortcode('year', 'shc_showYear');

?>