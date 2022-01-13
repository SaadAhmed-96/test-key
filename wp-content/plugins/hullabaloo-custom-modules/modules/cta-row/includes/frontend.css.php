<?php

$totalItems = count($settings->cta_row_items);
$itemWidth 	= number_format( 100/$totalItems , 2, '.', '');

?>
#BB-cta-row-<?php echo $id; ?>
{
	min-height: <?php echo $settings->cta_row_height; ?>px;
}

#BB-cta-row-<?php echo $id; ?> .BB-cta-item
{
	width: calc(<?php echo $itemWidth; ?>% - 5px);
}

@media screen and (max-width: 768px) 
{
	#BB-cta-row-<?php echo $id; ?> .BB-cta-item { width: 100%; }
}

<?php
	$c = 1;
	foreach ($settings->cta_row_items as $item) {
?>
	#BB-cta-item-<?php echo $id . '-' .$c; ?>
	{
		background-image: url( '<?php echo $item->cta_row_form_photo_src; ?>' );
	}
<?php 
	$c++; }
?>