<?php
	## Quote Details
	$quoteLocation = ( $settings->testimonial_location != "" ) ? ", " . $settings->testimonial_location : "" ;
?>
<div class="bb-testimonial-item">
	<p>What people are saying…</p>
	<blockquote>"<?php echo $settings->testimonial_text; ?>"</blockquote>
	<p><?php echo $settings->testimonial_name . $quoteLocation; ?></p>
</div>