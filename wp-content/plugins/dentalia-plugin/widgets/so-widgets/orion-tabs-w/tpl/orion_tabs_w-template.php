<?php
	/* make repeaters gutenberg ready */
	if (!array_key_exists('icon_repeater', $instance) ){
		$instance['icon_repeater'] = array();
	};	
	//prepare variables
	$style = $instance['style'];
	$style_nav_class = 'col-sm-12';
	$style_content_class = 'col-sm-12';
	$nav_tabs_class = 'nav-tabs';
	$uniqid = "tab_" . uniqid();
	//set style
	if($style != 'tabs-top') {
		$style_nav_class = 'col-sm-3';
		$style_content_class = 'col-sm-9';
		$nav_tabs_class = 'nav-stacked';

		if($style == 'tabs-right') {
			$style_nav_class .= ' col-sm-push-9';
			$style_content_class .= ' col-sm-pull-3';
		}
	}
?>

<div class="row tabs-wrap <?php echo esc_attr($style);?>">
	<?php

	if(!empty($instance['title'])) : ?>
		<div class="col-sm-12 entry-header">
			<h3 class="widget-title"><?php echo esc_html($instance['title']);?></h3>
		</div>
	<?php endif; ?>	

	<ul class="nav <?php echo esc_attr($nav_tabs_class);?> <?php echo esc_attr($style_nav_class);?>" role="tablist">
		<?php $counter = 0 ;?>
		<?php foreach ($instance['icon_repeater'] as $tabtitle) :?>
				
			<?php
			$counter++; 
			$active_class = "";
			if ($counter == 1) {
				$active_class = "active";
			}
			$tab_title = $tabtitle['tab_title'];
			$tab_custom_id = $tabtitle['tab_custom_id'];
			$tab_custom_id = urlencode($tab_custom_id);
			if (isset($tab_custom_id) && $tab_custom_id != '') {
				$uniqe_HTML_id = $tab_custom_id;
			} else {
				$uniqe_HTML_id = preg_replace("/[^a-zA-Z0-9]+/", "", $tab_title) . $counter . $uniqid;
			}
			
			$the_icon = $tabtitle['the_icon'];
			$tab_title_color = $tabtitle['tab_title_color'];	
			$icon_styles = array();	
			$icon_styles[] = 'color: '. $tab_title_color;
			?>
		    <li role="presentation" class="<?php echo esc_attr($active_class);?>"><a class="primary-hover" href="#<?php echo esc_html($uniqe_HTML_id);?>" aria-controls="<?php echo esc_html($uniqe_HTML_id);?>" role="tab" data-toggle="tab">
		    	<?php if(isset($the_icon) && $the_icon != "") : ?>
		    	<span class="icon"><?php echo siteorigin_widget_get_icon( $the_icon, $icon_styles); ?></span>
				<?php endif;?>
				<?php echo esc_html($tab_title);?>
		    </a></li>

		<?php endforeach;?>
	</ul>	

    <div class="tab-content <?php echo esc_attr($style_content_class);?>">
    	<?php $counter = 0;?>
    	<?php foreach ($instance['icon_repeater'] as $tabcontent) :?>

    		<?php 
    		$counter++;
    		$active_class = '';
			if ($counter == 1) {
				$active_class = "active";
			} else {
				$active_class = "fade";
			}
			$tab_title = $tabcontent['tab_title'];
			$tab_custom_id = $tabcontent['tab_custom_id'];
			$tab_custom_id = urlencode($tab_custom_id);
			if (isset($tab_custom_id) && $tab_custom_id != '') {
				$uniqe_HTML_id = $tab_custom_id;
			} else {
				$uniqe_HTML_id = preg_replace("/[^a-zA-Z0-9]+/", "", $tab_title) . $counter . $uniqid;
			}
    		$tab_content = $tabcontent['tab_content']; ?>

	        <div class="tab-pane <?php echo esc_attr($active_class);?>" role="tabpanel" id="<?php echo esc_html($uniqe_HTML_id);?>">
	            <?php echo wp_kses_post($tab_content);?>
	        </div>

		<?php endforeach;?>        
    </div>	

</div>
