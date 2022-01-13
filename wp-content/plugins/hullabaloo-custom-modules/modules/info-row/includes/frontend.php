<section class="BB-info-row BB-info-row-btns-<?php echo $settings->info_row_show_btns; ?>" id="BB-info-row-<?php echo $id; ?>">
	<?php echo wp_get_attachment_image($settings->info_row_photo, 'small-landscape'); ?>
	<div>
		<div class="info-row-content">
			<div class="info-row-content-text">
				<h3><?php echo $settings->info_row_title; ?></h3>
				<div><?php echo $settings->info_row_text; ?></div>
			</div>
			<?php if( $settings->info_row_show_btns == "yes" ) { ?>
			<div class="info-row-content-btns">
				<?php 
				foreach ($settings->info_row_btns as $btn) 
				{
					printf("<a class='reynaers-btn' href='%s'>%s</a>", $btn->info_row_btns_btn_link, $btn->info_row_btns_btn_label);
				} 
				?>
			</div>
			<?php } ?>
		</div>
		
	</div>
</section>