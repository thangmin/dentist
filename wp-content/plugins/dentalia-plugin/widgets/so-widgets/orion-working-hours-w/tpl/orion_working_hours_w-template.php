<?php  // prepare variables  
	$column_class = 'col-md-12';
	$text_color_class = $instance['text_color_class'];
	$text_color = $instance['style_section']['text_color'];
	$current_color = $instance['style_section']['current_color'];
	$week_starts_with = $instance['week_starts_with'];	
	// the days of the week
	$days = array(
		'monday' => esc_html__('Monday', 'dentalia'),
		'tuesday' => esc_html__('Tuesday', 'dentalia'), 
		'wednesday' => esc_html__('Wednesday', 'dentalia'),
		'thursday' => esc_html__('Thursday', 'dentalia'), 
		'friday' => esc_html__('Friday', 'dentalia'), 
		'saturday' => esc_html__('Saturday', 'dentalia'),
		'sunday' => esc_html__('Sunday', 'dentalia'),
		'lunch_break' => esc_html__('Lunch break', 'dentalia'),
		);

	if ($week_starts_with == 'sunday') {
		$days = array('sunday' => esc_html__('Sunday', 'dentalia')) + $days;

	} else if ($week_starts_with == 'saturday') {
		$days = array('saturday' => esc_html__('Saturday', 'dentalia'), 'sunday' => esc_html__('Sunday', 'dentalia')) + $days;
	}	

	// set date variables
	$current_time_base = time() + ( (double) get_option( 'gmt_offset' ) * 3600 );
	$current_time = (int)$current_time_base;
	$current_day = strtolower(date( 'l', $current_time ));
	
	// bg color
	$bg_color = 'transparent';
	$hex = $instance['style_section']['bg_color'];
	$alpha = ($instance['style_section']['bg_opacy']/100);
	$wrap_it = false;
	if ($hex) {
		$bg_color = orion_hextorgba($hex, $alpha);
		$wrap_it = true;
	}
	$wrap_class = '';
	if (isset($instance['style_section']['has_border']) && $instance['style_section']['has_border'] == true) {
		if ($hex) {
			$wrap_class .= ' has_border';
		}
		$wrap_class .= ' has_borders';
		$border_html = '<span class="border"></span>';
	} else {
		$border_html = '';
	}
?>
<?php $row_classes = rtrim($text_color_class . $wrap_class);?>
<div class="row working-hours-wrap <?php echo esc_attr($row_classes);?>">
	<?php // show title
	if(!empty($instance['title'])) : ?>
		<div class="col-md-12 entry-header">
			<h3 class="widget-title"><?php echo esc_html($instance['title']);?></h3>
		</div>
	<?php endif; ?>	
	<?php if ($wrap_it == true) :?>
		<div class="col-md-12 has_padding">
	<?php endif;?>
	<div class="content-wrap col-xs-12" style="background:<?php echo esc_attr($bg_color);?>">
		
		<?php // render the HTML for the working hours
			foreach ($days as $key => $value) : ?>	
				<?php // set color
				$style = "";
				if ($key == $current_day) {
					$style_class = 'current-day';
					if ($current_color != false) {
					 	$style = 'color:'. $current_color . ';'; 
					} else {
						$style_class .= ' primary-color';
					}
				} else {
					$style_class = '';
					if ($text_color != false) {
					 	$style = 'color:'. $text_color . ';'; 
					}				
				}
				if ($style != "") {
					$render_style = 'style=' . $style;
				} else {
					$render_style = "";
				}
				?>

				<?php if(isset($instance[$key]) && ($instance[$key] != '')) : ?>
				<div class="row working-day">
					<div class="col-xs-6 day <?php echo esc_attr($style_class);?>" <?php echo esc_attr($render_style);?>> 
						<?php 
						$translations = $instance['translations_section'];
						if (array_key_exists( $key, $translations ) && $instance['translations_section'][$key] != '') {
							echo esc_html($instance['translations_section'][$key]);
						} else {
							echo esc_html($days[$key]);
						};?>
					</div>
					<div class="col-xs-6 hours text-right <?php echo esc_attr($style_class);?>" <?php echo esc_attr($render_style);?>> 
						<?php echo wp_kses_post($instance[$key]);?>
					</div>
					<?php echo wp_kses_post($border_html);?>
				</div>		
				<?php endif; ?>
			<?php endforeach; ?>
	</div>
	<?php if ($wrap_it == true) :?>
		</div>
	<?php endif;?>	
</div>