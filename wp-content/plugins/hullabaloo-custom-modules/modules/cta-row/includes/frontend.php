<!-- <div class="BB-cta-row" id="BB-cta-row-<?php echo $id; ?>">
<?php
	$c = 1;
	foreach ($settings->cta_row_items as $item) { 
?>
	<div class="BB-cta-item" id="BB-cta-item-<?php echo $id . '-' .$c; ?>" >
		<a href="<?php echo $item->cta_row_form_btn_link; ?>"><?php echo $item->cta_row_form_btn_label; ?></a>
		<?php if( $item->cta_row_form_heading != "" ) { ?>
		<h3><a href="<?php echo $item->cta_row_form_btn_link; ?>"><?php echo $item->cta_row_form_heading; ?></a></h3>
		<?php } ?>
	</div>
<?php $c++; } ?>
</div> -->


<div class="BB-cta-row" id="BB-cta-row-<?php echo $id; ?>">
<?php
	$c = 1;
	foreach ($settings->cta_row_items as $item) { 
?>
	<div class="BB-cta-item" id="BB-cta-item-<?php echo $id . '-' .$c; ?>" >
		<a href="<?php echo $item->cta_row_form_btn_link; ?>">
			<p><?php echo $item->cta_row_form_btn_label; ?></p>
			<?php if( $item->cta_row_form_heading != "" ) { ?>
				<h3><?php echo $item->cta_row_form_heading; ?></h3>
			<?php } ?>
		</a>
	</div>
<?php $c++; } ?>
</div>