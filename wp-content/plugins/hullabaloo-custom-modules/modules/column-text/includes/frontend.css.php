<?
	$colNum = 0;
	$colMar = 0;
	$colWid = 0;

	if( $settings->columntext_spread == "manual" )
	{
		## Get Num of columns
		if( $settings->columntext_col4_text != "" )
		{
			$colNum = 4;
			$colMar = 2;
			$colWid = 23.5;
		}
		elseif( $settings->columntext_col3_text != "" )
		{
			$colNum = 3;
			$colMar = 2;
			$colWid = 32;
		}
		elseif ( $settings->columntext_col2_text != "" ) 
		{
			$colNum = 2;
			$colMar = 2;
			$colWid = 49;
		}
		else
		{
			$colNum = 1;
			$colMar = 0;
			$colWid = 100;
		}
	}

	## Colours
	$colColours['grey'] 	= "#505050";
	$colColours['blue'] 	= "#0085ba";
	$colColours['purple'] 	= "#a71e5e";
	$colColours['green'] 	= "#bccf02";
	$colColours['orange'] 	= "#f07d00";
?>

#column-text-holder-<?php echo $id; ?> { max-width: <?php echo $settings->width . $settings->width_unit; ?> }

.column-text-holder
{
	width: 100%;
	position: relative;
}
.fl-node-<?=$id?> .column-text-holder
{
	margin: 0 auto 0px;
	text-align: left;
}

.fl-node-<?=$id?> .column-text-header.align-left { text-align: left; }
.fl-node-<?=$id?> .column-text-header.align-center { text-align: center; }
.fl-node-<?=$id?> .column-text-header.align-right { text-align: right; }


.fl-node-<?=$id?> .column-holder
{
	-webkit-column-count: <?=$settings->columntext_numcols?>; 
    -moz-column-count: <?=$settings->columntext_numcols?>;
    column-count: <?=$settings->columntext_numcols?>;
}

.fl-node-<?=$id?> .multi-column
{
	float:left;
	width: <?=$colWid?>%;
	margin: 0 0 0 <?=$colMar?>%;
}

.fl-node-<?=$id?> .multi-column:first-child
{
	margin-left: 0;
}


@media screen and (max-width: <?=$global_settings->responsive_breakpoint?>px) {
	.fl-node-<?=$id?> .column-holder
	{
		-webkit-column-count: 1; 
	    -moz-column-count: 1;
	    column-count: 1;
	}

	.fl-node-<?=$id?> .multi-column
	{
		width: 100%;
		margin: 0;
	}
}

