<?php  

// enqueue scripts and styles
orion_set_before_after();

//prepare variables
	
	$before_image = wp_get_attachment_image_src($instance['before_image'], 'full');
	$after_image = wp_get_attachment_image_src($instance['after_image'], 'full');
	$image_alt_b = get_post_meta( $instance['before_image'], '_wp_attachment_image_alt', true);
	$image_alt_a = get_post_meta( $instance['after_image'], '_wp_attachment_image_alt', true);
	$b_image = $before_image[0];
	$a_image = $after_image[0];	


	$after_visibility = (intval($instance['after_visibility']) / 100);
	$orientation = $instance['orientation'];

	$id = uniqid();

	$image_overlay = $instance['style_section']['image_overlay'];
	$image_hover_overlay = $instance['style_section']['image_overlay_hover'];
	$effect_classes = $image_overlay . ' ' . $image_hover_overlay;

?>
	<div class="twentytwenty-container orion-before-after <?php echo esc_attr($effect_classes);?>" id="<?php echo esc_attr($id);?>">
		<img src="<?php echo esc_url($b_image);?>" 
		class="before" 
		<?php if ($image_alt_b) :?>
			alt="<?php echo esc_attr($image_alt_b);?>" 	
		<?php endif;?>
		/>	
		<img src="<?php echo esc_url($a_image);?>" class="after" 
		<?php if ($image_alt_a) :?>
			alt="<?php echo esc_attr($image_alt_a);?>"	
		<?php endif;?>
		/>
		<div class="overlay"></div>
	</div>

	<script>
	jQuery(window).load(function(){
		jQuery("#<?php echo esc_attr($id);?>").twentytwenty({
			default_offset_pct: <?php echo esc_html($after_visibility);?>, 
			orientation: '<?php echo esc_attr($orientation);?>', 
		});
	});
	</script> 