<div class="BB-page-banner BB-page-banner-<?php echo $settings->page_banner_theme; ?>" id="BB-page-banner-<?php echo $id; ?>">
	<section>
		<div>
			<h1><?php echo $settings->page_banner_heading;?></h1>
			<?php 
				if( $settings->page_banner_text != "" )
				{
					printf("<p>%s</p>", $settings->page_banner_text);
				}
				if( $settings->page_banner_btn_link != "" ) 
				{
					printf("<a href='%s'>%s</a>", $settings->page_banner_btn_link, $settings->page_banner_btn_label); 
				}
			?>
		</div>
		<?php
		if( $settings->page_banner_subtext != "" ) 
		{
			printf("<h2>%s</h2>", $settings->page_banner_subtext);
		}
		?>
	</section>
</div>