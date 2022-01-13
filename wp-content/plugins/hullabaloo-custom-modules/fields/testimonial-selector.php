<?php
$args = array(
	'post_type' 		=> 'testimonials',
	'posts_per_page' 	=> -1,
);

$output = '<select name="{{data.name}}" selected="{{data.value}}" >';
$output.= '<option value="0">Please select...</option>';

$the_query = new WP_Query( $args );
// The Loop
if ( $the_query->have_posts() ) 
{
	while ( $the_query->have_posts() ) 
	{
		$the_query->the_post();
		$postID 	= get_the_ID();
		ob_start();
	?>
		<# 
			var selectedPost = "";
			if( data.value == <?=$postID?> )
			{
				selectedPost = ' selected="selected"';
			}
		#>
		<option value="<?=$postID?>" {{{selectedPost}}} ><?=get_the_title($postID)?></option>
	<?php
		$output .= ob_get_clean();
	}
} 
wp_reset_postdata();
$output.='</select>';
echo $output;
?>