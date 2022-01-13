.fl-node-<?php echo $id; ?> .fl-module-content .pp-social-icon {
	<?php if ( isset( $settings->direction ) && $settings->direction == 'vertical' ) { ?>
		display: block;
	<?php } ?>
}
<?php
	// Icon - Spacing
	FLBuilderCSS::responsive_rule( array(
		'settings'		=> $settings,
		'setting_name'	=> 'spacing',
		'selector'		=> ".fl-node-$id .fl-module-content .pp-social-icon",
		'prop'			=> 'margin-bottom',
		'unit'			=> 'px',
		'enabled'		=> ( isset( $settings->direction ) && $settings->direction == 'vertical' )
	) );
?>

<?php
	// Icon - Size
	FLBuilderCSS::responsive_rule( array(
		'settings'		=> $settings,
		'setting_name'	=> 'box_size',
		'selector'		=> ".fl-node-$id .fl-module-content .pp-social-icon a",
		'prop'			=> 'width',
		'unit'			=> 'px',
	) );

	FLBuilderCSS::responsive_rule( array(
		'settings'		=> $settings,
		'setting_name'	=> 'box_size',
		'selector'		=> ".fl-node-$id .fl-module-content .pp-social-icon a",
		'prop'			=> 'height',
		'unit'			=> 'px',
	) );
?>

.fl-node-<?php echo $id; ?> .fl-module-content .pp-social-icon a,
.fl-node-<?php echo $id; ?> .fl-module-content .pp-social-icon a:hover {
	text-decoration: none;
}

.fl-node-<?php echo $id; ?> .fl-module-content .pp-social-icon a {
	display: inline-block;
	float: left;
	text-align: center;
	<?php if ( ! empty( $settings->color ) ) { ?>
		color: #<?php echo $settings->color; ?>;
	<?php } ?>
	<?php if ( isset( $settings->bg_color ) && ! empty( $settings->bg_color ) ) { ?>
		background-color: <?php echo pp_get_color_value( $settings->bg_color ); ?>;
	<?php } ?>
	<?php if ( '' !== $settings->radius ) { ?>
		border-radius: <?php echo $settings->radius; ?>px;
	<?php } ?>
	<?php if ( '' !== $settings->border_width ) { ?>
		border: <?php echo $settings->border_width; ?>px solid #<?php echo $settings->border_color; ?>;
	<?php } ?>
}

.fl-node-<?php echo $id; ?> .fl-module-content .pp-social-icon a:hover {
	<?php if ( ! empty( $settings->hover_color ) ) { ?>
		color: #<?php echo $settings->hover_color; ?>;
	<?php } ?>
	<?php if ( isset( $settings->bg_hover_color ) && ! empty( $settings->bg_hover_color ) ) { ?>
		background-color: <?php echo pp_get_color_value( $settings->bg_hover_color ); ?>;
	<?php } ?>
	<?php if ( '' !== $settings->border_width ) { ?>
		border-color: #<?php echo $settings->border_hover_color; ?>;
	<?php } ?>
}

<?php
	// Icon - Size
	FLBuilderCSS::responsive_rule( array(
		'settings'		=> $settings,
		'setting_name'	=> 'size',
		'selector'		=> ".fl-node-$id .fl-module-content .pp-social-icon a",
		'prop'			=> 'font-size',
		'unit'			=> 'px',
	) );

	// Icon - Box Size
	FLBuilderCSS::responsive_rule( array(
		'settings'		=> $settings,
		'setting_name'	=> 'box_size',
		'selector'		=> ".fl-node-$id .fl-module-content .pp-social-icon a",
		'prop'			=> 'width',
		'unit'			=> 'px',
	) );

	FLBuilderCSS::responsive_rule( array(
		'settings'		=> $settings,
		'setting_name'	=> 'box_size',
		'selector'		=> ".fl-node-$id .fl-module-content .pp-social-icon a",
		'prop'			=> 'height',
		'unit'			=> 'px',
	) );

	FLBuilderCSS::responsive_rule( array(
		'settings'		=> $settings,
		'setting_name'	=> 'box_size',
		'selector'		=> ".fl-node-$id .fl-module-content .pp-social-icon a",
		'prop'			=> 'line-height',
		'unit'			=> 'px',
	) );
?>

<?php foreach ( $settings->icons as $i => $icon ) : ?>
	<?php if ( $icon->border_width >= 0 ) : ?>
		.fl-node-<?php echo $id; ?> .fl-module-content .pp-social-icon:nth-child(<?php echo $i + 1; ?>) a {
			<?php if ( '' !== $icon->border_width ) { ?>
				border: <?php echo $icon->border_width; ?>px solid #<?php echo $icon->border_color; ?>;
			<?php } ?>
		}
		.fl-node-<?php echo $id; ?> .fl-module-content .pp-social-icon:nth-child(<?php echo $i + 1; ?>) a:hover {
			<?php if ( ! empty( $icon->border_hover_color ) ) { ?>
				border-color: #<?php echo $icon->border_hover_color; ?>;
			<?php } ?>
		}
	<?php endif; ?>
	<?php if ( isset( $icon->color ) || isset( $icon->bg_color ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-module-content .pp-social-icon:nth-child(<?php echo $i + 1; ?>) a {
			<?php if ( ! empty( $icon->color ) ) { ?>
				color: #<?php echo $icon->color; ?>;
			<?php } ?>
			<?php if ( isset( $icon->bg_color ) && ! empty( $icon->bg_color ) ) { ?>
				background-color: <?php echo pp_get_color_value( $icon->bg_color ); ?>;
			<?php } ?>
		}
	<?php endif; ?>
	<?php if ( isset( $icon->hover_color ) || isset( $icon->bg_hover_color ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-module-content .pp-social-icon:nth-child(<?php echo $i + 1; ?>) i:hover,
		.fl-node-<?php echo $id; ?> .fl-module-content .pp-social-icon:nth-child(<?php echo $i + 1; ?>) a:hover i {
			<?php if ( ! empty( $icon->hover_color ) ) { ?>
				color: #<?php echo $icon->hover_color; ?>;
			<?php } ?>
			<?php if ( isset( $icon->bg_hover_color ) && ! empty( $icon->bg_hover_color ) ) { ?>
				background-color: <?php echo pp_get_color_value( $icon->bg_hover_color ); ?>;
			<?php } ?>
		}
	<?php endif; ?>
<?php endforeach; ?>

<?php
	// Icon - Spacing
	FLBuilderCSS::responsive_rule( array(
		'settings'		=> $settings,
		'setting_name'	=> 'spacing',
		'selector'		=> ".fl-node-$id .pp-social-icons-left .pp-social-icon",
		'prop'			=> 'margin-right',
		'unit'			=> 'px',
		'enabled'		=> ( isset( $settings->direction ) && $settings->direction == 'horizontal' )
	) );

	FLBuilderCSS::responsive_rule( array(
		'settings'		=> $settings,
		'setting_name'	=> 'spacing',
		'selector'		=> ".fl-node-$id .pp-social-icons-center .pp-social-icon",
		'prop'			=> 'margin-left',
		'unit'			=> 'px',
		'enabled'		=> ( isset( $settings->direction ) && $settings->direction == 'horizontal' )
	) );

	FLBuilderCSS::responsive_rule( array(
		'settings'		=> $settings,
		'setting_name'	=> 'spacing',
		'selector'		=> ".fl-node-$id .pp-social-icons-center .pp-social-icon",
		'prop'			=> 'margin-right',
		'unit'			=> 'px',
		'enabled'		=> ( isset( $settings->direction ) && $settings->direction == 'horizontal' )
	) );

	FLBuilderCSS::responsive_rule( array(
		'settings'		=> $settings,
		'setting_name'	=> 'spacing',
		'selector'		=> ".fl-node-$id .pp-social-icons-right .pp-social-icon",
		'prop'			=> 'margin-left',
		'unit'			=> 'px',
		'enabled'		=> ( isset( $settings->direction ) && $settings->direction == 'horizontal' )
	) );
?>

@media only screen and (max-width: <?php echo $settings->breakpoint; ?>px) {
	.fl-node-<?php echo $id; ?> .pp-responsive-left {
		text-align: left;
	}

	.fl-node-<?php echo $id; ?> .pp-responsive-center {
		text-align: center;
	}

	.fl-node-<?php echo $id; ?> .pp-responsive-right {
		text-align: right;
	}

	/* Left */
	.fl-node-<?php echo $id; ?> .pp-responsive-left .pp-social-icon {
		margin-right: <?php echo $settings->spacing; ?>px;
	}

	/* Center */
	.fl-node-<?php echo $id; ?> .pp-responsive-center .pp-social-icon {
		margin-left: <?php echo $settings->spacing; ?>px;
		margin-right: <?php echo $settings->spacing; ?>px;
	}

	/* Right */
	.fl-node-<?php echo $id; ?> .pp-responsive-center .pp-social-icon {
		margin-left: <?php echo $settings->spacing; ?>px;
	}
}
