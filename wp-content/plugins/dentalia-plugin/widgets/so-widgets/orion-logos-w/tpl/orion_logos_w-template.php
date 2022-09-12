<?php  //prepare variables 
	/* make repeaters gutenberg ready */
	if (!array_key_exists('repeater', $instance) ){
		$instance['repeater'] = array();
	};
	$text_color = $instance['text_color'];
	$display_as = $instance['display_as'];
	$logo_height = $instance['logo_height'];
	$add_opacy = $instance['add_opacy'];
	if ($add_opacy) {
		$opacity_class = ' add-opacy';
	} else {
		$opacity_class = '';
	}
	
	//needed for gutenberg.
	if(!$logo_height) {
		$logo_height = 180;
	}	
	$per_row = $instance['per_row'];

	$counter = 0;
	foreach ($instance['repeater'] as $logos) {
		$counter++;
	} 
	$logos_wrap_class = "";
	$logo_wrap_class = "";
	$logos_wrap_data = "";

	if($display_as == 'carousel') {
			$logos_wrap_class = $display_as;
			$logos_wrap_class .= ' owl-carousel owl-theme';
			$logos_wrap_data = 'data-col=' . $per_row;

			if($instance['option_carousel']['autoplay'] == '1') {
				$autoplay = 'true';
			} else {
				$autoplay = 'false';
			}
			$logos_wrap_data .= ' data-autoplay=' . $autoplay;

			if($instance['option_carousel']['autoplay_timeout']) {
				$autoplay_timeout = $instance['option_carousel']['autoplay_timeout'];
				if (!is_numeric($autoplay_timeout) || $autoplay_timeout < 1000) {
					$autoplay_timeout = 5000;
				}
			} else {
				$autoplay_timeout = 5000;
			}
			
			$logos_wrap_data .= ' data-autoplaytimeout=' . $autoplay_timeout;

	} else { 
		// grid

		switch ($per_row) {
			case '1':
				$logo_wrap_class .= ' col-xs-12';				
				break;
			case '2':
				$logo_wrap_class .= ' col-xs-6';
				break;
			case '3':
				$logo_wrap_class .= ' col-xs-6 col-sm-4 col-md-4';
				break;
			case '4':
				$logo_wrap_class .= ' col-xs-6 col-sm-3 col-md-3';
				break;
			case '6':
				$logo_wrap_class .= ' col-xs-6 col-sm-4 col-md-2 col-lg-2';
				break;
			case '12':
				$logo_wrap_class .= ' col-xs-6 col-sm-4 col-md-2 col-lg-1 ';
				break;																
			default:
				$logo_wrap_class .= 'col-xs-6 col-md-'.(12 / $per_row);
				break;
		}
	}

	$b_color = $instance['border_color'];
	if (!$b_color) {
		$b_color = '#f2f2f2';
	}
	$border_color = 'border-color:'. $b_color .';';
	
	$logo_img_size = $instance['logo_img_size'];
	if (!$logo_img_size) {
		$logo_img_size = 80;
	}
	$logo_img_hover_size = $instance['logo_img_hover_size'];
	if (!$logo_img_hover_size) {
		$logo_img_hover_size = 90;
	}	
	$logo_data_attr = 'data-imgsize=' . $logo_img_size;
	$logo_data_attr .= ' data-imghoversize=' . $logo_img_hover_size;

	$navigation_carousel = $instance['option_carousel']['navigation_carousel'];
	$display_mobile_nav = $instance['option_carousel']['display_mobile_nav'];

?>
<?php 
$display_mobile_nav_class = '';
if ($display_as == 'carousel' && $display_mobile_nav != true) {
	$display_mobile_nav_class = ' hide-mobile-nav';
}
?>
<div class="row logo-w-wrap<?php echo esc_attr($display_mobile_nav_class);?><?php echo esc_attr($opacity_class);?>">
	<?php if(!empty($instance['title'])) : ?>
		<div class="col-md-12 entry-header">
			<h3 class="widget-title <?php echo esc_attr($text_color);?>">
				<?php echo esc_html($instance['title']);?>
			</h3>
		</div>
	<?php endif;?>
	<?php if ($display_as == 'carousel' &&  $navigation_carousel == 'arrows_aside') : ?>
	<?php // relative wrapper for carousel: ?>
	<div class="relative clearfix">
	<?php endif;?>
	<div class="logos-wrap col-md-12 <?php echo esc_attr($logos_wrap_class);?>" <?php echo esc_attr($logos_wrap_data);?> >
		<?php if($display_as != 'carousel') :?>
		<div class="wrap-2 clearfix">
		<?php endif;?>

		<?php foreach ($instance['repeater'] as $logos) :?>
			<?php //prepare variables
				$custom_html_class = '';
				$link = '';
				$logo = '';
				if (isset($logos['logo']) && $logos['logo'] != ''){
					$logo = wp_get_attachment_image_src($logos['logo'], 'full');
					$logo_image = $logo[0];					
				} else if (isset($logos['logo_fallback'])) {
					$logo_image = $logos['logo_fallback'];	

				}

				$logs_alt = $logos['logo-title'];

				$custom_html_class = $logos['advanced_settings']['html_class'];
				if (isset($custom_html_class) && $custom_html_class!='') {
					$custom_html_class = ' ' . $custom_html_class;
				}
				$logo_wrap_classes = $logo_wrap_class . $custom_html_class;
			?>
			<div class="cell-wrap<?php echo esc_attr($logo_wrap_classes);?>" style="padding-bottom: <?php echo esc_attr($logo_height);?>px;<?php echo esc_attr($border_color);?>">
				<?php if ($logos['link'] != '') :?>
					<?php 
						$rel = array();
						$target = '';
						if ($logos['option_link']['new_tab']){
							$rel[] = "noreferrer";
							$rel[] = "noopener"; 
							$target ="target='_blank'";
						};
						if ($logos['option_link']['no_follow']){
							$rel[] = "nofollow";
						}

						if (!empty($rel)) {
							$rel = implode(' ',$rel);
							$rel = 'rel="' . $rel . '"';
						} else {
							$rel = '';
						}
					?>
					<a href="<?php echo esc_url($logos['link']);?>" class="logo" <?php echo esc_attr($logo_data_attr);?> title="<?php echo esc_attr($logs_alt);?>" <?php echo wp_kses_post($rel);?> <?php echo wp_kses_post($target);?>>
						<?php if (isset($logo_image)) :?>
						<img src="<?php echo esc_url($logo_image);?>" alt="<?php echo esc_attr($logs_alt);?>">
						<?php endif;?>
					</a>
				<?php else : ?>
					<span class="logo" <?php echo esc_attr($logo_data_attr);?>>
						<?php if (isset($logo_image)) :?>
						<img src="<?php echo esc_url($logo_image);?>" alt="<?php echo esc_attr($logs_alt);?>">
						<?php endif;?>
					</span>
				<?php endif;?>
			</div>			
		<?php endforeach;?>	
		<?php if($display_as != 'carousel') :?>
		</div>
		<?php endif;?>			
	</div>
	<?php if ($display_as == 'carousel' &&  $navigation_carousel == 'arrows_aside') : ?>
		<div class="nav-controll arrows-aside">
			<div class="owl-nav aside <?php echo esc_attr($text_color);?>">
				<a class="btn btn-sm btn-empty owlprev icon" ><i class="orionicon orionicon-arrow_carrot-left"></i></a>
				<a class="btn btn-sm btn-empty owlnext icon" ><i class="orionicon orionicon-arrow_carrot-right"></i></a>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>