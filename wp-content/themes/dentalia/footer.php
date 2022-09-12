	
	<?php // prepare variables:
 
	// footer background variables
	$orion_footer_bg_color = orion_get_theme_option_css(array('footer_background','background-color'), '#2B354B', 'color_3');

	// footer text color variables
	if (orion_get_option('footer_text_colors', false, 'auto') != '' && orion_get_option('footer_text_colors', false, 'auto') != 'auto') {
		$orion_footer_color_class = orion_get_option('footer_text_colors', false, 'auto');
	} else if (orion_isColorLight($orion_footer_bg_color) == true){
		$orion_footer_color_class = 'text-dark';
	} else {
		$orion_footer_color_class = 'text-light';
	}?>

	<?php // Prefooter variables
	if (orion_display_prefooter() == true) :?>

		<?php // background color
		$orion_prefooter_bg_color = orion_get_theme_option_css(
			array('prefooter_background','background-color'), 
			'#fff');
		$orion_prefooter_color_class = orion_get_option('prefooter_text_colors', false, 'text-dark');
		
		/* Rendering */
		?>
		<div class="prefooter section <?php echo esc_attr($orion_prefooter_color_class);?>" style="background-color:<?php echo esc_attr($orion_prefooter_bg_color);?>">
			<div class="container">
				<div class="row">
					<?php $sidebar_number = orion_get_option('prefooter-sidebars', false, '4');
					$sidebar_class = 'col-md-'.('12'/ $sidebar_number);
					if ($sidebar_number == '4') {
						$sidebar_class .= ' col-sm-6';
					}
					for($i = 1; $i <= $sidebar_number; $i++ ) {
						$sidebar_id = "prefooter-".$i; ?>
						<div class="widgets <?php echo esc_attr($sidebar_class);?>">
							<?php if ( is_active_sidebar($sidebar_id)) {
								dynamic_sidebar($sidebar_id);
							};?>
						</div>
					<?php } ?>	
				</div>		
			</div>
		</div>
	<?php endif;?>
	</div> <!-- site -->
	<?php  // footer
	if (orion_get_option('uncoveringfooter_switch', false) == true){
		$orion_footer_color_class .= ' fixed-footer';

		if( orion_get_option('boxed_fullwidth', false) == 0) {
			$orion_footer_color_class .= ' boxed-container';
		}
	};?>

	<div class="section site-footer <?php echo esc_attr($orion_footer_color_class);?>" style="background-color: <?php echo esc_attr($orion_footer_bg_color);?>;">
		
		<div class="container main-footer">
			<div class="row">
				<?php $sidebar_number = orion_get_option('mainfooter-sidebars', false, '4');
				$sidebar_class = 'col-md-'.('12'/ $sidebar_number);
				$mobile_class = ' col-sm-6';
				for($i = 1; $i <= $sidebar_number; $i++ ) {
					if($sidebar_number == 1 || ($sidebar_number == 3 && $i == 3)) {
						$mobile_class = ' col-sm-12';
					}
					$sidebar_id = "sidebar-footer-".$i; ?>
					<?php if ( is_active_sidebar($sidebar_id)) : ?>
					<div class="widgets <?php echo esc_attr($sidebar_class);?><?php echo esc_attr($mobile_class);?>">
						<?php if ( is_active_sidebar($sidebar_id)) {
							dynamic_sidebar($sidebar_id);
						};?>
					</div>
					<?php endif;?>
				<?php } ?>	
			</div>
		</div>
		<?php // copyright footer
		if (orion_get_option('copyrightarea_switch', false) == true) :?>
			<?php
			if (orion_get_theme_option_css(array('copyright_background','background-color'), '') != '') {
				$orion_c_footer_bg_color = orion_get_theme_option_css(array('copyright_background','background-color'), '');
			} else {
				$orion_c_footer_bg_color = orion_adjustBrightness($orion_footer_bg_color, -20 );
			}
			// get text-color class
			if (orion_get_option('copyright_text_colors', false, 'auto') != '' && orion_get_option('copyright_text_colors', false, 'auto') != 'auto') {
				$copyrightfooter_color_class = orion_get_option('copyright_text_colors', false, 'auto');
			} else if (orion_isColorLight($orion_c_footer_bg_color) == true){
				$copyrightfooter_color_class = 'text-dark';
			} else {
				$copyrightfooter_color_class = 'text-light';
			}?>	

			<div class="copyright-footer section <?php echo esc_attr($copyrightfooter_color_class);?>" style="background-color: <?php echo esc_attr($orion_c_footer_bg_color);?>;">
				<div class="container">
					<div class="row">

						<?php // display copyright footer widgets
						$sidebar_number = orion_get_option('copyrightfooter-sidebars', false, '1');
						$sidebar_class = 'col-md-'.('12'/ $sidebar_number);
						$mobile_class = ' col-sm-6';
						$sidebars_active = 0;
						for($i = 1; $i <= $sidebar_number; $i++ ) {
							$sidebar_id = "copyright-footer-".$i; 
							if (($sidebar_number == '3' && $i == '3') || $sidebar_number == '1') {
								$mobile_class = ' col-sm-12';
							}
							?>
							<?php if ( is_active_sidebar($sidebar_id)) : ?>
								<div class="widgets <?php echo esc_attr($sidebar_class);?><?php echo esc_attr($mobile_class);?>">
									<?php
									dynamic_sidebar($sidebar_id);
									$sidebars_active ++;
									?>
								</div>
							<?php endif;?>
						<?php } ?>	
					<?php if ( $sidebars_active	== 0) :?>
						<div class="col-md-12 text-center">
						<?php $orion_url = 'http://orionthemes.com';?>
							<p style="text-align: center;" class="font-2">
							<small>Made with <i class="orionicon orionicon-icon_heart"></i> by <a href="<?php echo esc_url($orion_url)?>" target="_blank">OrionThemes</a></small>
							</p>
						</div>
					<?php endif;?>
					</div>
				</div>
			</div>
		<?php endif;?>
	</div>		
	<?php orion_is_boxed('end');?>
	<?php do_action( 'orion_footer');?>
	<?php wp_footer(); ?>
</body>
</html>