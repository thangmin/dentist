<?php
/* prepare input variables */

$image = $instance['image'];

if(!$image){
	if(isset($instance['image_fallback']) && strpos($instance['image_fallback'], 'http') == 0) {
		$image_url = $instance['image_fallback'];
	}
} else {
	$image_url = false;
}


$hovertext = $instance['hovertext'];
$url = $instance['url'];
$onclick = $instance['onclick'];

$image_style = $instance['style_section']['image_style'];
$image_style_class = $instance['style_section']['image_add_style'];
if ($image_style_class!= '') {
	$image_style_class = ' '. $image_style_class;
}

$text_color = $instance['style_section']['text_color'];

$image_overlay = $instance['style_section']['image_overlay'];
$image_overlay_hover = $instance['style_section']['image_overlay_hover'];

$image_w_class = $instance['style_section']['image_align'];
$image_w_class .= $image_style_class;

if ($image_w_class != '') {
	$image_w_class = ' '.$image_w_class;
}

/* prepare output variables */
// image
$image_class = $instance['style_section']['image_style'];

$add_circle_wrap = false;

if ($image_style == 'orion_circle') {
	$add_circle_wrap = true;
	$image_size = 'orion_square';
	$image_class .= ' image-wrap rounded';
	$image_w_class .= ' rounded';
} else {
	$image_size = $image_style;
}
// link;
if (preg_match('#^post#', $url) === 1) {
	preg_match_all('!\d+!', $url, $post_id);
	$post_url = get_permalink($post_id[0][0]);
	$url = $post_url;
}

// overlay
$image_class .= ' ' . $image_overlay . ' ' . $image_overlay_hover;
?>

<div class="image-w relative<?php echo esc_attr($image_w_class);?>">

		<?php
		if (isset($image)) {
			$img = wp_get_attachment_image($image, $image_size);		
		} else if ($image_url != false){
			$img = $image_url;
		}
		?>
		<?php // add a link?
		if($onclick == 'link' && $url != '') : ?>
			<a class="<?php echo esc_attr($image_class);?>" href="<?php echo esc_url($url);?>">
		<?php elseif ($onclick == 'lightbox') : ?>
			<?php 
			if (isset($image)) {
				$large_image = wp_get_attachment_image_src($image, 'large');
				$image_alt = get_post_meta($image, '_wp_attachment_image_alt', TRUE);				
			} else if($image_url != false && isset( $img)) {
				$large_image = array();
				$large_image[0] = $img;
				$image_alt = '';
			} 
			?>
			<a rel="orion-images" class="<?php echo esc_attr($image_class);?>" href="<?php echo wp_kses_post($large_image[0]);?>" title="<?php echo esc_attr($image_alt);?>" data-caption="<?php echo esc_attr($image_alt);?>" data-fancybox="<?php echo wp_kses_post($large_image[0]);?>">
		<?php else : ?>
			<div class="<?php echo esc_attr($image_class);?>">
		<?php endif; ?>

		<?php if ($add_circle_wrap == true) :?>
		<div class="circle-wrap">
		<?php endif;?>
			<?php if($image_url !=  false) {
				echo wp_kses_post('<img src="'.$image_url.'" class="lazy">');
			} else {
				echo wp_kses_post($img); 
			};?>
			<div class="overlay"></div>
		<?php if ($add_circle_wrap == true) :?>
		</div>
		<?php endif;?>

		<?php if($onclick == 'lightbox' || ($url != '' && $onclick == 'link')) : ?>
			</a>
		<?php else : ?>
			</div>
		<?php endif; ?>	
	
	<div class="absolute">
		<div class="hover-desc table-wrap">
			<div class="cell-wrap">
				<h4 class="<?php echo esc_attr($text_color);?>"><?php echo wp_kses_post($hovertext);?></h4>
			</div>
		</div>
	</div>					
</div>

