<?php
$terms = get_terms( array(
		'taxonomy' => 'news-category',
		'hide_empty' => false,
		'orderby' => 'name',
		'order' => 'ASC',
) );

$output = '<select name="{{data.name}}" selected="{{data.value}}" >';
$output.= '<option value="0">All</option>';
if( !empty($terms) )
{
    foreach( $terms as $category ) {
    	ob_start();
    	?>
			<# 
				var selectedCat = "";
				if( data.value == <?=$category->term_id?> )
				{
					selectedCat = ' selected="selected"';
				}
			#>
			<option value="<?=$category->term_id?>" {{{selectedCat}}} ><?=esc_html( $category->name )?></option>
		<?php
	    $output .= ob_get_clean();
    }  
}
$output.='</select>';
echo $output;
?>