<?php  
/* make repeaters gutenberg ready */
if (!array_key_exists('team_repeater', $instance) ){
	$instance['team_repeater'] = array();
};	
/* prepare variables */
$per_row = $instance['per_row'];
$layout = $instance['display_layout'];

// options section

$column_class = 'col-md-'.(12 / $instance['per_row']);
if ($column_class != 'col-md-12') {
	$column_class .= ' col-sm-6';
}

switch ($instance['text_color']) {
    case "text-light":
    	$text_color = 'text-light';
    	break;
	case "text-dark":
		$text_color = 'text-dark';
		break;
	default:	
		$text_color = '';
		break;
}

// style section
$entry_header_class = '';
$hide_images = false;
$image_style = $instance['style_section']['image_style'];
if ($image_style == 'hide_images') {
	$hide_images = true;
}
$image_class = $instance['style_section']['image_style'];

$bg_color = 'transparent';
$hover_color = $instance['style_section']['hover_color'];
switch ($hover_color) {
	case 'primary':
		$btn_color = 'bg1';
		break;
	case 'secondary':
		$btn_color = 'bg2';
		break;	
	case 'tertiary':
		$btn_color = 'bg3';
		break;			
	default:
	 $btn_color = $hover_color;
}
$departments_hover_class = $hover_color . '-hover';

$hex = $instance['style_section']['bg_color'];
$alpha = ($instance['style_section']['bg_opacy']/100);

$content_css_class = '';
if ($hex) {
	$bg_color = orion_hextorgba($hex, $alpha);
	$content_css_class .= 'has_bg_color';
} else {
	$content_css_class .= 'no_bg_color';
}
if ($instance['style_section']['display_border'] == 1 ) {
	$content_css_class .= ' has_border';
} else {
	$content_css_class .= ' no_border';
}

$add_circle_wrap = false;
if ($image_style == 'orion_circle') {
	$add_circle_wrap = true;
	$image_size = 'orion_square';
	$image_class .= ' rounded';
	if ($hex || $instance['style_section']['display_border'] == 1) {
		$entry_header_class = 'padding-medium';
	}
	if ($instance['style_section']['display_border'] == 1 ) {
		$entry_header_class .= ' has_border';
	}	

} else {
	$image_size = $image_style;
}

$image_overlay = $instance['style_section']['image_overlay'];
$image_hover_overlay = $instance['style_section']['image_overlay_hover'];
$scale_efect = $instance['style_section']['scale_efect'];
$effect_classes = $image_overlay . ' ' . $image_hover_overlay . ' ' . $scale_efect;

// carousel
$navigation_carousel = $instance['option_section']['option_carousel']['navigation_carousel'];
$display_mobile_nav = $instance['option_section']['option_carousel']['display_mobile_nav'];

$display_mobile_nav_class = '';
if ($layout == 'carousel' && $display_mobile_nav != true) {
	$display_mobile_nav_class = ' hide-mobile-nav';
}

$wrapper_class = '';
if ($layout == 'carousel') {
	$wrapper_class = ' type-' . $navigation_carousel;
}

$autoplay = 'false';
if ($instance['option_section']['option_carousel']['autoplay'] == true) {
	$autoplay = 'true';
}
$autoplay_timeout = $instance['option_section']['option_carousel']['autoplay_timeout'];
if (!is_numeric($autoplay_timeout) || $autoplay_timeout < 1000) {
	$autoplay_timeout = 5000;
}
$autoplay_data = '';

/* row class */
$row_class = $layout;
if ($navigation_carousel == 'arrows_top') {
	$row_class .= ' top-nav';
}
if ($text_color != '') {
	$row_class .= ' ' . $text_color;
}
$row_class .= $display_mobile_nav_class;
?>
<div class="row team-members <?php echo esc_attr($row_class);?>">
<?php //title
if(!empty($instance['title'])) : ?>
	<div class="col-md-12 widget-header">
		<h3 class="widget-title"><?php echo esc_html($instance['title']);?></h3>
	</div>
<?php endif; ?>

<div class="wrapper<?php echo esc_attr($wrapper_class);?>">

	<?php if ($layout == 'carousel') : ?>
		<?php 
		if ($autoplay == 'true' && isset($autoplay_timeout)) {
			$autoplay_data .= ' data-autoplaytimeout=' . $autoplay_timeout;
		}
		?>		
		<?php if ( $navigation_carousel == 'arrows_top') : ?>
			<?php // carousel top navigation ?>
			<div class="owl-nav style-1 top <?php echo esc_attr($text_color);?>">
				<a class="btn btn-sm btn-flat owlprev icon" ><i class="orionicon orionicon-arrow_left"></i></a>
				<a class="btn btn-sm btn-flat owlnext icon" ><i class="orionicon orionicon-arrow_right"></i></a>
			</div>
		<?php endif;?>

		<div class="owl-carousel owl-theme clearfix" data-col="<?php echo esc_html($instance['per_row']);?>" data-autoplay="<?php echo esc_attr($autoplay);?>"<?php echo esc_attr($autoplay_data);?> data-dots="<?php echo esc_attr($navigation_carousel == 'dots');?>">
		
		<?php $column_class = 'col-md-12';?>
	<?php endif;?>

	
	<?php foreach ($instance["team_repeater"] as $member) : ?>
		<?php 
			$custom_html_class = '';
			$member_image_id = $member["image"];
			$img = wp_get_attachment_image($member_image_id, $image_size);
			$img_link =  wp_get_attachment_url($member_image_id);
			$member_name = $member["team_name"];
			$member_titles = $member["medical_titles"];
			$team_department = $member["team_department"];
			$team_description = $member["team_description"];
			$link_page = $member["link_page"];
			$social_icons = $member["icon_repeater"];			
			if (preg_match('#^post#', $link_page) === 1) {
				preg_match_all('!\d+!', $link_page, $post_id);
				$post_url = get_permalink($post_id[0][0]);
				$link_page = $post_url;
			}
			// custom HTML class
			$custom_html_class = $member['html_class'];
			if (isset($custom_html_class) && $custom_html_class!='') {
				$custom_html_class = ' ' . $custom_html_class;
			}


		?>
		<article class="item <?php echo esc_attr($column_class);?><?php echo esc_attr($custom_html_class);?>">
			<div class="wrap" style="background-color: <?php echo esc_attr($bg_color);?>">
				<?php if (!$hide_images) :?>
				<header class="entry-header <?php echo esc_attr($entry_header_class);?>" >
					
					<?php if (isset($img) && $img != '') : ?>
						<?php if (isset($link_page) && $link_page != '') :?>
						<a href="<?php echo esc_url($link_page);?>" class="image-wrap <?php echo esc_attr($effect_classes);?> <?php echo esc_attr($image_class);?>">
							
							<?php if ($add_circle_wrap == true) :?>
							<div class="circle-wrap">
							<?php endif;?>
								<?php echo wp_kses_post($img);?>
								<div class="overlay"></div>
							<?php if ($add_circle_wrap == true) :?>
							</div>
							<?php endif;?>

						</a>
						<?php else :?>
						<span class="image-wrap <?php echo esc_attr($effect_classes);?> <?php echo esc_attr($image_class);?>">
							
							<?php if ($add_circle_wrap == true) :?>
							<div class="circle-wrap">
							<?php endif;?>
								<?php echo wp_kses_post($img);?>
								<div class="overlay"></div>
							<?php if ($add_circle_wrap == true) :?>
							</div>
							<?php endif;?>
						</span>	
						<?php endif;?>					
					<?php else :?>	
						<?php if (isset($link_page) && $link_page != '') :?>
						<a href="<?php echo esc_url($link_page);?>" class="image-wrap no-image <?php echo esc_attr($image_class);?>">
						<span class="orionicon orionicon-icon_group"></span>
						</a>
						<?php else :?>
						<span class="image-wrap no-image <?php echo esc_attr($image_class);?>">
						<span class="orionicon orionicon-icon_group"></span>
						</span>							
						<?php endif;?>	
					<?php endif;?>						
				</header>
				<?php endif;?>	
			<div class="entry-content vcard <?php echo esc_attr($text_color);?> <?php echo esc_attr($content_css_class);?>">
				<div class="basic-info">
					
					<?php if (isset($team_department) && $team_department != '') :?>
					<span class="font-3 small category departments <?php echo esc_attr($hover_color);?>-color" ><?php echo wp_kses_post($team_department);?></span>
					<?php endif;?>
				    <?php //render member name
					if (isset($member_name) && $member_name != '') :?>
						<?php if (isset($link_page) && $link_page != '') :?>
					
						<a title="<?php echo esc_url($link_page);?>" class="<?php echo esc_attr($hover_color);?>-hover" href="<?php echo esc_url($link_page);?>"> <h2 class="item-title h5 <?php echo esc_attr($text_color);?>"> <?php echo wp_kses_post($member_name);?></h2>
						</a>
						<?php else :?>
						<h2 class="item-title h5 <?php echo esc_attr($text_color);?>"> <?php echo wp_kses_post($member_name);?></h2>
						<?php endif;?>	
					<?php endif;?>
				
					<?php if (isset($member_titles) && $member_titles != '') : ?>
						<div class="additional-title small">
							<?php echo wp_kses_post($member_titles);?>
						</div>
					<?php endif;?>

					<?php if(isset($team_description) && $team_description != '') : ?>
							<span class="separator-hr <?php echo esc_attr($hover_color);?>-color-bg"></span>
							<div class="short-about">
								<?php echo wp_kses_post($team_description);?>
							</div>
						<?php endif;?>
				</div> 

				<?php 
				$hide_icon_wrap = false;
				if (empty($social_icons)) {
					$hide_icon_wrap = true;
				} else if (count($social_icons) == 1) {
					if (!isset($social_icons[0]['icon']) || strlen($social_icons[0]['icon']) == 0) {
						$hide_icon_wrap = true;
					}
				}
				/*check if there are no icons */
				if ($hide_icon_wrap != true) :?>
				<div class="icon wrapper">
					<?php 
					switch ($hover_color) {
						case 'primary':
							$btn_color = "btn-c1";
							break;
						case 'secondary':
							$btn_color = "btn-c2";
							break;
						case 'tertiary':
							$btn_color = "btn-c3";
							break;		
						default:
							break;
					}

					?>
					<?php foreach ($social_icons as $o_icon) :?>

						<?php //$icon_classes = $btn_color . ' ' .$o_icon['icon_color']; ?>
						<?php $url = $o_icon['url'];
							if (preg_match('#^post#', $url) === 1) {
								preg_match_all('!\d+!', $url, $post_id);
								$post_url = get_permalink($post_id[0][0]);
								$url = $post_url;
							} 
							if ($url == '') {
								$url = '#';
							}
						?>

						<?php $icon = $o_icon['icon'];
						$icon_style = array();
						$icon_color = $o_icon['icon_color'];
						if ($icon_color!= '') {
							$icon_style[] .= 'color:' . $icon_color;
						} 
						?>

						<?php	
						$new_tab = $o_icon['new_tab'];
						if($new_tab == true) {
							$target = 'target=_blank';
						} else {
							$target = '';
						}
						$link_atts = $target; ?>
	
						<a href="<?php echo esc_url($url);?>" class="btn btn-icon btn-empty btn-sm <?php echo esc_attr($btn_color)?>" <?php echo esc_attr($link_atts);?>>
							<?php echo siteorigin_widget_get_icon( $icon, $icon_style);?>
						</a>
					<?php endforeach;?>
				</div>
			<?php endif;?>
			</div>
		</article>
	<?php endforeach; ?>

	<?php if ($layout == 'carousel') : ?>
		</div>
		<?php if ($navigation_carousel == 'arrows_aside') : ?>
			<div class="nav-controll arrows-aside">
				<div class="owl-nav aside <?php echo esc_attr($text_color);?>">
					<a class="btn btn-sm btn-empty owlprev icon" ><i class="orionicon orionicon-arrow_carrot-left"></i></a>
					<a class="btn btn-sm btn-empty owlnext icon" ><i class="orionicon orionicon-arrow_carrot-right"></i></a>
				</div>
			</div>
		<?php endif; ?>			
		<?php if($navigation_carousel == 'arrows_bottom' ) : ?>
			<div class="nav-controll bottom">			
				<div class="owl-nav style-1 bottom text-right col-md-12 <?php echo esc_attr($text_color);?>">
					<a class="btn btn-sm btn-flat owlprev icon" ><i class="orionicon orionicon-arrow_left"></i></a>
					<a class="btn btn-sm btn-flat owlnext icon" ><i class="orionicon orionicon-arrow_right"></i></a>
				</div>
			</div>	
		<?php endif;?>
	
	<?php endif; ?>	
	</div>
</div>	
