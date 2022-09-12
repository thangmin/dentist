<?php  //prepare variables 

	if (!array_key_exists('slide_repeater', $instance) ){
		$instance['slide_repeater'] = array();
	};
	$column_class = '';
	$per_row = 1;
	$uniqid = "tab_" . uniqid();
	$text_style = $instance['option_section']['text_style'];
	$background_color = $instance['option_section']['background_color'];
	$text_color = '';
	$row_class = ' row';
	

	if ($background_color == '')  {
		if ($text_style == 'text-light'){
			$column_class .= ' tertiary-color-bg';
		} else {
			$column_class .= ' white-bg';
		}
	} else {
		$column_class = ' '. $background_color;
	}

	if ($text_style == 'text-default' && $background_color != '') {
		switch ($background_color) {
			case 'black-color-bg':
			case 'bg-c3':
				$text_style = 'text-light';
				break;
			
			case 'white-bg':
			default:
				$text_style = 'text-dark';
				break;
		}
	}

	$btn_type = $instance['option_section']['btn_type'];
	$btn_style = $instance['option_section']['btn_style'];
	$btn_size = $instance['option_section']['btn_size'];
	$button_color = $instance['option_section']['button_color'];
	$btn_color = 'primary';

	/* Carousel */
	$owlloop = 'true';
	if($instance['option_carousel']['autoplay'] == '1') {
		$autoplay = 'true';
		$owlloop = 'true';
	} else {
		$autoplay = 'false';
	}

	$navigation_carousel = $instance['option_carousel']['navigation_carousel'];
	if ($navigation_carousel == 'dots') {
		$dots = true;
	} else {
		$dots = false;
	}
	$counter = 0;
	foreach ($instance['slide_repeater'] as $slide_count) {
		$counter++;
	}
	if ($navigation_carousel == 'arrows_top') {
		$row_class .= ' top-nav';
	}
	if ($navigation_carousel == 'arrows_aside') {
		$row_class .= ' nav-arrows-aside';
	}
?>
<?php if ($navigation_carousel == 'tabs') :?>
<?php $counter = 0; ?>
	<ul class="carousel-navigation nav nav-tabs tabs-style-2 text-center">
	<?php foreach ($instance['slide_repeater'] as $slide) : ?>
		<?php 

		$navigation_label = $slide['navigation_label'];
		$tab_custom_id = $slide['slide_option_section']['slide_custom_id'];
		$tab_custom_id = preg_replace("/[^a-zA-Z0-9]+/", "", $tab_custom_id);
			
		if ($tab_custom_id != '') {		
			$slide_id = $tab_custom_id;
		} else {
			$slide_title = $slide['slide_title'];
			$slide_id = preg_replace("/[^a-zA-Z0-9]+/", "", $slide_title) . $counter . $uniqid;
		}	
		$counter ++;
		?>
		<li <?php if ($counter == 1):?> class="active" <?php endif;?> ><a class="owl-nav-link font-2" data-navid="<?php echo esc_attr($slide_id);?>" href="#<?php echo esc_attr($slide_id);?>"><?php echo esc_html($navigation_label);?></a></li>
		
	<?php endforeach;?>
	</ul>
<?php endif;?>
<div class="carousel custom-carousel-wrap<?php esc_attr_e($row_class);?>">
	<div class="wrapper col-md-12">
	<?php if ( $navigation_carousel == 'arrows_top') : ?>
		<?php // carousel top navigation ?>
		<div class="owl-nav style-1 top <?php echo esc_attr($text_color);?>">
			<a class="btn btn-sm btn-flat owlprev icon" ><i class="orionicon orionicon-arrow_left"></i></a>
			<a class="btn btn-sm btn-flat owlnext icon" ><i class="orionicon orionicon-arrow_right"></i></a>
		</div>
	<?php endif;?>
	<div class=" owl-carousel owl-theme" data-col="<?php echo esc_attr($per_row);?>" data-autoplay="<?php echo esc_attr($autoplay);?>" data-dots="<?php echo esc_attr($dots);?>" data-owlloop="<?php echo esc_attr($owlloop);?>" data-hashlisten="true" data-slideby="1">

		<?php $counter = 0; ?>
		<?php foreach ($instance['slide_repeater'] as $slide) : ?>
			<?php 
			$slide_title = $slide['slide_title'];
			$navigation_label = $slide['navigation_label'];
			$subtitle = $slide['subtitle'];
			$description = $slide['description'];
			$image_position = $slide['slide_option_section']['image_position'];
			$text_align = $slide['slide_option_section']['text_align'];
			$tab_custom_id = $slide['slide_option_section']['slide_custom_id'];
			$tab_custom_id = preg_replace("/[^a-zA-Z0-9]+/", "", $tab_custom_id);
				
			if ($tab_custom_id != '') {					
				$slide_id = $tab_custom_id;
			} else {
				$slide_id = preg_replace("/[^a-zA-Z0-9]+/", "", $slide_title) . $counter . $uniqid;
			}	

			/* button */
			$btn_text = $slide['btn_text'];	

			$button_classes = '';
			if ($button_color) {
				$button_classes .= $button_color;
			}
			if ($btn_style) {
				$button_classes .= ' ' . $btn_style;
			}
			if ( $btn_type != '' ) {
				$button_classes .= ' ' . $btn_type;
			}
			if ( $btn_size != '' ) {
				$button_classes .= ' ' . $btn_size;
			}
			
			$counter ++;

			$slide_url = $slide['url'];
			// get link;
			if (preg_match('#^post#', $slide_url) === 1) {
				preg_match_all('!\d+!', $slide_url, $post_id);
				$post_slide_url = get_permalink($post_id[0][0]);
				$slide_url = $post_slide_url;
			}

			$slide_image = '';
			if ($slide['image']) {
				$get_image = wp_get_attachment_image_src($slide['image'], 'orion_carousel');
				$slide_image = $get_image[0];
			} ;?>
	
			<div class="item <?php echo esc_attr($column_class);?> <?php echo esc_attr($text_style);?>" data-hash="<?php echo esc_attr($slide_id);?>">
					
				<?php if ($image_position != 'img_right' ) :?>
				<div class="image">				
					<div class="absolute" style="background-image: url(<?php echo esc_url($slide_image);?>)"></div>
					<img src="<?php echo esc_url($slide_image);?>" alt="<?php echo esc_attr($slide_title);?>" />
				</div>
				<?php endif;?>
				<div class="content <?php echo esc_attr($text_align);?>">
	
					<?php if($slide_url != '' ) : ?>
					<a href="<?php echo esc_url($slide_url);?>">
					<?php endif;?>

					<h3 class="item-title <?php esc_attr_e($text_align);?>"><?php echo esc_html($slide_title);?></h3>

					<?php if($slide_url != '' ) : ?>
					</a>
					<?php endif;?>	

					<div class="subtitle lead <?php echo esc_attr($text_align);?>"><?php echo esc_html($subtitle);?></div>
					
					<?php if ( strlen($description) > 1) :?>
						<div class="description <?php echo esc_attr($text_align);?>"><?php echo esc_html($description);?></div>					
					<?php endif;?>

					<?php if($slide_url != '' && $btn_text != '' ) : ?>
					<a href="<?php echo esc_url($slide_url);?>" class="<?php echo esc_attr($button_classes);?>"> 
						<?php echo esc_html($btn_text);?> 
					</a>	
					<?php endif;?>		
				</div>
				<?php if ($image_position == 'img_right' ) :?>
				<div class="image">				
					<div class="absolute" style="background-image: url(<?php echo esc_url($slide_image);?>)"></div>
					<img src="<?php echo esc_url($slide_image);?>" alt="<?php echo esc_attr($slide_title);?>" />
				</div>
				<?php endif;?>					
			</div>
		<?php endforeach;?>
	</div>
	
	<?php if ($navigation_carousel == 'arrows_aside') : ?>
		<div class="owl-nav-custom">
			<div class="owl-nav aside <?php echo esc_attr($text_color);?>">
				<a class="primary-color-bg owlprev" ><i class="orionicon orionicon-arrow_carrot-left"></i></a>
				<a class="primary-color-bg owlnext" ><i class="orionicon orionicon-arrow_carrot-right"></i></a>
			</div>
		</div>
	<?php endif; ?>				
	<?php if($navigation_carousel == 'arrows_bottom' ) : ?>
		<div class="nav-controll bottom">
			<div class="owl-nav style-1 bottom text-right <?php echo esc_attr($text_color);?>">
				<a class="btn btn-sm btn-flat owlprev icon <?php echo esc_attr($text_color);?>" ><i class="orionicon orionicon-arrow_left"></i></a>
				<a class="btn btn-sm btn-flat owlnext icon <?php echo esc_attr($text_color);?>" ><i class="orionicon orionicon-arrow_right"></i></a>
			</div>
		</div>
	<?php endif;?>
	</div>
</div>