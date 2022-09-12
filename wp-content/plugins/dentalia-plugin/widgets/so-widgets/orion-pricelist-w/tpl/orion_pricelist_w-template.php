<?php  //prepare variables
	/* make repeaters gutenberg ready */
	if (!array_key_exists('widget_repeater', $instance) ){
		$instance['widget_repeater'] = array();
	};
	$column_class = 'col-md-12';
	switch ($instance['text_color']) {
	    case "text-light":
	    	$text_color = 'text-light';    	
	    	break;
		case "text-dark":
			$text_color = 'text-light';
			break;
		default:	
			$text_color = '';
			break;
	}
	$service_name_color = $instance['style_section']['service_name_color'];
	$service_price_color = $instance['style_section']['service_price_color'];
	$service_desc_color  = $instance['style_section']['service_desc_color'];

	$service_name_color_style = '';
	$service_price_color_style = '';
	$service_desc_color_style = '';

	if($service_name_color != '') {
		$service_name_color_style = 'style="color:'. $service_name_color .';"';
	}
	if($service_price_color != '') {
		$service_price_color_style = 'style="color:'. $service_price_color .';"';
	}
	if($service_desc_color != '') {
		$service_desc_color_style = 'style="color:'. $service_desc_color .';"';
	}		

?>

<div class="orion-pricelist row <?php echo esc_attr($text_color);?>">
	<?php

	if(!empty($instance['title'])) : ?>
		<div class="col-md-12 entry-header">
			<h3 class="widget-title"><?php echo esc_html($instance['title']);?></h3>
		</div>
	<?php endif; ?>	

	<?php foreach ($instance['widget_repeater'] as $price_item) :?>
		<div class="item <?php echo esc_attr($column_class);?>">
			<div class="title <?php echo wp_kses_post($service_name_color_style);?>">
				<h6 class="item-title " <?php echo wp_kses_post($service_name_color_style);?> >
					<?php echo wp_kses_post($price_item["service_name"]);?>		
				</h6>

				<?php if(!empty($price_item["service_price"])) : ?>
					<?php 
					$highlight = $price_item['highlight'];
					if ($highlight) {
						$price_html_class = ' highlight';
					} else {
						$price_html_class = '';
					}

					?>
					<h6 class="price item-title text-right<?php echo esc_attr($price_html_class);?>" <?php echo wp_kses_post($service_price_color_style);?>>
						
						<?php if ($highlight) :?>
							<span class="highlight-wrap">
								<span class="highlight-innerwrap">
						<?php endif;?>
							<?php echo wp_kses_post($price_item["service_price"]);?>
						<?php if ($highlight) :?>
								</span>
							</span>
						<?php endif;?>						
							
						</h6>
				<?php endif;?>
			</div>

			<div class="description" <?php echo wp_kses_post($service_desc_color_style);?>>
				<?php echo wp_kses_post($price_item["description"]);?>
			</div>
		</div>
	<?php endforeach;?>
</div>