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

$before_text = $instance['before_text'];
$after_text = $instance['after_text'];


$after_visibility = (int)$instance['after_visibility'] / 100;
$orientation = $instance['orientation'];

$id = 'ba_' . uniqid();

$image_overlay = $instance['style_section']['image_overlay'];
$image_hover_overlay = $instance['style_section']['image_overlay_hover'];
$image_add_style = $instance['style_section']['image_add_style'];
$handle_style = $instance['style_section']['handle_style'];
$ba_classes = $image_overlay . ' ' . $image_hover_overlay . ' handle-'. $handle_style;
?>
<?php if ($image_add_style != '') :?>
	<div class="wrapper <?php echo esc_attr($image_add_style);?>">			
<?php endif;?>
	<div class="twentytwenty-container orion-before-after <?php echo esc_attr($ba_classes);?>" id="<?php echo esc_attr($id);?>">
			<img src="<?php echo esc_url($b_image);?>" 
			class="before" 
			<?php if ($image_alt_b) :?>
				alt="<?php echo esc_attr($image_alt_b);?>" 	
			<?php endif;?>
			/>	
			<?php if($before_text != '') :?>
			<div class="twentytwenty-before before-text wrap absolute">
				<span class="bg-c1 font-3">
				<?php echo wp_kses_post($before_text);?>
				</span>
			</div>
			<?php endif;?>
			<img src="<?php echo esc_url($a_image);?>" class="after" 
			<?php if ($image_alt_a) :?>
				alt="<?php echo esc_attr($image_alt_a);?>"	
			<?php endif;?>
			/>
			<?php if($before_text != '') :?>
			<div class="twentytwenty-after after-text wrap absolute">
				<span class="bg-c1 font-3">
				<?php echo wp_kses_post($after_text);?>
				</span>
			</div>
			<?php endif;?>		
		<div class="overlay"></div>
	</div>
<?php if ($image_add_style != '') :?>
	</div>
<?php endif;?>

	<script>
	jQuery(window).on('load',function(){
		jQuery("#<?php echo esc_attr($id);?>").twentytwenty({
			default_offset_pct: <?php echo esc_html($after_visibility);?>, 
			orientation: '<?php echo esc_attr($orientation);?>', 
		});
	});
	</script> 