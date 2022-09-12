<?php  
$btn_alignment = $instance['style_section']['btn_alignment'];
$btn_gutter = $instance['style_section']['btn_gutter'];
/* make repeaters gutenberg ready */
if (!array_key_exists('btn_repeater', $instance) ){
	$instance['btn_repeater'] = array();
};
?>
<div class="button-group <?php echo esc_attr($btn_alignment);?> <?php echo esc_attr($btn_gutter); ?>">
<?php 


foreach ($instance['btn_repeater'] as $btn) : ?>

	<?php 
	//prepare variables
	$buttontext = $btn['button'];
	$button_color = $btn['style_section']['button_color'];
	$btn_style = $btn['style_section']['btn_style'];
	$icon = $btn['icon_section']['icon'];
	$icon_position = $btn['icon_section']['icon_position'];
	$url = $btn['url'];
	$btn_type = $btn['style_section']['btn_type'];
	$btn_size = $btn['style_section']['btn_size'];
	$new_tab = $btn['new_tab'];
	$icon_color	 = $btn['icon_section']['icon_color'];

	$button_classes = '';
	$icon_style = array();

	if ($icon_color!= '') {
		$icon_style[] .= 'color:' . $icon_color;
	}

	$link = false;
	if ($btn['url'] != '') {
		$link = true;
	}
	if($new_tab == true) {
		$target = 'target=_blank';
	} else {
		$target = '';
	}

	if ($button_color) {
		$button_classes .= $button_color;
	}
	if ($btn_style) {
		$button_classes .= ' ' . $btn_style;
	}
	if ( $icon != '' ) {
		$button_classes .= ' ' . $icon_position;
	}
	if ( $btn_type != '' ) {
		$button_classes .= ' ' . $btn_type;
	}
	if ( $btn_size != '' ) {
		$button_classes .= ' ' . $btn_size;
	}
	if ( $btn_alignment != 'center' &&  $btn_alignment != 'align-default' && $btn_alignment != '' ) {
		$button_classes .= ' ' . $btn_alignment;
	}
	// get link;
	if (preg_match('#^post#', $url) === 1) {
		preg_match_all('!\d+!', $url, $post_id);
		$post_url = get_permalink($post_id[0][0]);
		$url = $post_url;
	}
	?>


		<?php if($link) : ?>
			<a class="<?php echo esc_attr($button_classes);?>" <?php echo esc_attr($target);?> href="<?php echo esc_url($url);?>">
				<?php //render button content
				if ($icon_position == 'icon-left' || $icon_position == 'inset-left' ) {
					echo siteorigin_widget_get_icon( $icon, $icon_style);
				};
				echo esc_html($buttontext); 

				if ($icon_position == 'icon-right' || $icon_position == 'inset-right' ) {
					echo siteorigin_widget_get_icon( $icon, $icon_style);
				};?>		
			</a>
		<?php else :?>
			<button class="<?php echo esc_attr($button_classes);?>" >
				<?php //render button content
				if ($icon_position == 'icon-left' || $icon_position == 'inset-left' ) {
					echo siteorigin_widget_get_icon( $icon, $icon_style);
				};
				echo esc_html($buttontext); 

				if ($icon_position == 'icon-right' || $icon_position == 'inset-right' ) {
					echo siteorigin_widget_get_icon( $icon, $icon_style);
				};?>
			</button>
		<?php endif;?>
<?php endforeach;?>
</div>