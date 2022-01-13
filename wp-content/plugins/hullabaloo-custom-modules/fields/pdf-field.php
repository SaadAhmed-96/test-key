<?

$unsupported_mimes  = array( 'image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/tiff', 'image/x-icon' );
$all_mimes          = get_allowed_mime_types();
$accepted_mimes     = array_diff( $all_mimes, $unsupported_mimes );

$query_pdf_args = array(
    'post_type' 		=> 'attachment',
    'post_status'		=>'any',
    'post_mime_type' 	=> $accepted_mimes,
    'posts_per_page' 	=> -1,
);

$query_pdfs = new WP_Query( $query_pdf_args );

// The Loop
if ( $query_pdfs->have_posts() ) {
	echo '<select name="{{data.name}}">';
	echo '<option value="{{data.value}}">Please select...</option>';
		
	$i = 1;

	while ( $query_pdfs->have_posts() ) 
	{
		$query_pdfs->the_post();
		$theID = get_the_ID();
		printf( '<option value="%s" <# if ( data.value === "%s" ) { #> selected="selected"<# } # >%s</option>', $theID, $theID, get_the_title() );
		$i++;
	}
	echo '</select>';
	/* Restore original Post Data */
	wp_reset_postdata();
} 
else {
	echo 'Sorry, no PDFs available!';
}
?>