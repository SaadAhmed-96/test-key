<div class="column-text-holder" id="column-text-holder-<?php echo $id; ?>" >
	<? if($settings->columntext_heading != "") { ?>	
	<<?=$settings->columntext_title_tag?> class="column-text-header align-<?=$settings->columntext_title_alignment?>"><?=$settings->columntext_heading?></<?=$settings->columntext_title_tag?>>
	<? 
		}
		## IF columns are created automatically
		if( $settings->columntext_spread == "automatic" )
		{
	?>
		<div class="column-holder">
			<? echo $settings->columntext_auto_text; ?>
			<span class="clear"></span>
		</div>
	<?
		}
		## Else IF columns are done manually using content entered
		elseif( $settings->columntext_spread == "manual" )
		{
			## Get Num of columns
			if( $settings->columntext_col4_text != "" )
			{
				$colNum = 4;
				$colWidth = "width25";
			}
			elseif( $settings->columntext_col3_text != "" )
			{
				$colNum = 3;
				$colWidth = "width33";
			}
			elseif ( $settings->columntext_col2_text != "" ) 
			{
				$colNum = 2;
				$colWidth = "width50";
			}
			else
			{
				$colNum = 1;
				$colWidth = "width100";
			}

			$colContent[0] = $settings->columntext_col1_text;
			$colContent[1] = $settings->columntext_col2_text;
			$colContent[2] = $settings->columntext_col3_text;
			$colContent[3] = $settings->columntext_col4_text; 

	?>
			<div class="multi-column-holder">
	<?
			for ($i=0; $i < $colNum; $i++) 
			{ 
	?>
			<div class="multi-column multi-column-<?=($i+1)?> <?=$colWidth?>">
				<?=$colContent[$i]?>
			</div>
	<?
			}
	?>
			</div>
	<?
		}
	?>
</div>