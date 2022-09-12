<?php  //prepare variables
	$listsliders = $instance['listsliders'];

	if ( class_exists( 'RevSliderSlider' ) ) : ?>
		<?php 
		$rev_slider = new RevSliderSlider();
		if (method_exists($rev_slider,'get_slider_for_admin_menu')) {
			/*  slider version 6.x */
			$sliders_rev = $rev_slider->get_slider_for_admin_menu();
			$sliderlist = array();
			foreach ( $sliders_rev as $slide ) {
				$alias = $slide['alias'];
				$title = $slide['title'];
				$sliders[$alias] = $alias;
			}
			
		} else if (method_exists($rev_slider,'getAllSliderAliases')) {
			$rev_slider = new RevSlider();
			/*  slider version 5.x  */
			$sliders = $rev_slider->getAllSliderAliases(); 
		}

		if (in_array($listsliders, $sliders)) : ?>			
			<?php 

			if (function_exists('putRevSlider')) {
				putRevSlider($listsliders);
			} else {
				_e('Slider can not be displayed.', 'dentalia');
			}		
			?>
		<?php else :?>
			<h2><?php _e('Please select a slider', 'dentalia');?></h2>
		<?php endif;?>
	<?php else :?>
		<h2><?php _e('Revolution slider is not installed', 'dentalia');?></h2>
	<?php endif;?>
