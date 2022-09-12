<?php  //prepare variables
	$listsliders = $instance['listsliders'];

	if ( class_exists( 'RevSlider' ) ) : ?>
		<?php $rev_slider = new RevSlider();
		$sliders = $rev_slider->getAllSliderAliases(); 

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
		<h2><?php _e('Revolution slider not installed', 'dentalia');?></h2>
	<?php endif;?>
