<?php

## Default Height
$minHeight = 600;

if( $settings->page_banner_row_height != "" )
{
	$minHeight = $settings->page_banner_row_height;
}

$tablet_minHeight = $minHeight * 0.7;
$mobile_minHeight = $minHeight * 0.4;


?>
#BB-page-banner-<?php echo $id; ?>
{
	min-height: <?php echo $minHeight; ?>px;
	background-image: url(<?php echo $settings->page_banner_photo_src; ?>);
	background-size: cover;
	background-position: center;
}

@media only screen and (max-width: 1025px) {
	#BB-page-banner-<?php echo $id; ?>
	{
		min-height: <?php echo $tablet_minHeight; ?>px;
	}
}

@media only screen and (max-width: 768px) {
	#BB-page-banner-<?php echo $id; ?>
	{
		min-height: <?php echo $mobile_minHeight; ?>px;
	}
}