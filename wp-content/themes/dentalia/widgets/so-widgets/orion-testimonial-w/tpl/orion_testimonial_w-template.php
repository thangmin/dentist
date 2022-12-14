<?php  //prepare variables
/* make repeaters gutenberg ready */
if (!array_key_exists('widget_repeater', $instance) ){
	$instance['widget_repeater'] = array();
};	
$layout = $instance['display_layout'];
$column_class = 'col-md-'.(12 / $instance['per_row']);
if ($column_class != 'col-md-12') {
	$column_class .= ' col-sm-6';
}

$nav_color = 'white';
$text_size = $instance['option_section']['text_size'];
switch ($instance['text_color']) {
    case "text-light":
    	$text_color = 'text-light';
    	$separator_style = ' style-text-light';
    	break;
	case "text-dark":
		$text_color = 'text-dark';
		$separator_style = ' style-text-dark';
		break;
	default:	
		$text_color = '';
		$separator_style = '';
		break;
}
$testimonial_bg_color = 'transparent';
$hex = $instance['option_section']['bg_color'];
$alpha = ($instance['option_section']['bg_opacy']/100);
if ($hex) {
	$testimonial_bg_color = orion_hextorgba($hex, $alpha);
}

$testimonials_style = "style='";
$testimonials_style .= 'background-color:'. $testimonial_bg_color . ';';
if ($instance['option_section']['border_color'] != '' ) {
	$testimonials_style .= ' border: 1px solid '. $instance['option_section']['border_color'] . ';';
}
if($instance['option_section']['border-radius'] == true){
	$testimonials_style .= ' border-radius: 4px; ';
}	

$per_row = $instance['per_row'];

if ($per_row > 1) {
	$testimonial_style = $testimonials_style;

	// add padding if no background color or border
	if($testimonial_bg_color == 'transparent' && $instance['option_section']['border_color'] == false ) {
		$testimonial_style .= " padding-bottom:0;";
		$testimonial_style .= " padding-top:0;";
	}	

	$testimonial_style .= "'";
	$testimonials_style = '';	

} else {
	$testimonial_style = '';
	if($testimonial_bg_color == 'transparent' && $instance['option_section']['border_color'] == false ) {
		$testimonials_style .= " padding-bottom:0;";
		$testimonials_style .= " padding-top:0;";
	}		
	$testimonials_style .= "'";

}
// carousel options
$navigation_carousel = $instance['option_section']['option_carousel']['navigation_carousel'];
$display_mobile_nav = $instance['option_section']['option_carousel']['display_mobile_nav'];	

if($instance['option_section']['option_carousel']['autoplay']) {
	$autoplay = $instance['option_section']['option_carousel']['autoplay'];
} else {
	$autoplay = 'false';
}
$autoplay_timeout = $instance['option_section']['option_carousel']['autoplay_timeout'];
if (!is_numeric($autoplay_timeout) || $autoplay_timeout < 1000) {
	$autoplay_timeout = 5000;
}

$autoplay_data = '';

$display_mobile_nav_class = '';
if ($layout == 'carousel' && $display_mobile_nav != true) {
	$display_mobile_nav_class = ' hide-mobile-nav';
}
$wrapper_class = '';
if ($layout == 'carousel') {
	$wrapper_class = ' type-' . $navigation_carousel;
}		

/* row class */
$row_class = $layout;
if ($navigation_carousel == 'arrows_top') {
	$row_class .= ' top-nav';
}
if ($text_color != '') {
	$row_class .= ' ' . $text_color;
} ?>


<div class="orion-testimonial row <?php echo esc_attr($row_class);?><?php echo esc_attr($display_mobile_nav_class);?>">

<?php //title
if(!empty($instance['title'])) : ?>
	<div class="col-md-12 widget-header">
		<h3 class="widget-title"><?php echo esc_html($instance['title']);?></h3>
	</div>
<?php endif; ?>

	<div class="wrapper clearfix<?php echo esc_attr($wrapper_class);?>" <?php echo wp_kses_post($testimonials_style);?>>	
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
	<?php endif; ?>
		
		<?php foreach ($instance['widget_repeater'] as $item) :?>
			<article class="item <?php echo esc_attr($column_class);?>">
				<div class="wrapper text-center" <?php echo wp_kses_post($testimonial_style);?>>
				<?php if($item['image'] != '') {
					$get_image = wp_get_attachment_image_src($item['image'], 'thumbnail');
					$bg_image = $get_image[0];
				} else {
					$bg_image = get_template_directory_uri(). '/img/orion-client-avatar.png';
				}?>

				<?php if ($instance['option_section']['hide_image'] != true) :?>
					<div class="image-wrap">
						<img src="<?php echo esc_url($bg_image);?>" alt="<?php echo esc_attr($item["item_title"]);?>" class="circle" >
					</div>
				<?php endif;?>
				<div class="col-md-12 separator-style-1 text-center<?php echo esc_attr($separator_style);?>">
				<h4 class="item-title">
					<?php echo esc_html($item["item_title"]);?>		
				</h4>
				</div>

				<?php if(!empty($item["description"])) : ?>
					<div class="description col-md-12 <?php echo esc_attr($text_size);?>">
						<?php echo wp_kses_post($item["description"]);?>
					</div>
				<?php endif;?>
				
				<?php if(!empty($item["name"])) : ?>
					<h6>
						<small class="font-3">
						<?php echo wp_kses_post($item["name"]);?>
						</small>
					</h6>
				<?php endif;?>
				</div>
			</article>
		<?php endforeach;?>
		<?php if ($layout == 'carousel') : ?>
		</div> <!-- owl-carousel -->
			<?php if ($navigation_carousel == 'arrows_aside') : ?>
				<div class="nav-controll arrows-aside">
					<div class="owl-nav aside <?php echo esc_attr($text_color);?>">
						<a class="btn btn-sm btn-empty owlprev icon" ><i class="orionicon orionicon-arrow_carrot-left"></i></a>
						<a class="btn btn-sm btn-empty owlnext icon" ><i class="orionicon orionicon-arrow_carrot-right"></i></a>
					</div>
				</div>
			<?php endif; ?>		
			<?php if($navigation_carousel == 'arrows_bottom' ) : ?>
			<div class="nav-controll bottom clearfix" >					
				<div class="owl-nav style-1 bottom text-right col-md-12 <?php echo esc_attr($text_color);?>" <?php if($per_row == 1 ) :?> style="top: 24px; padding-right: 0;" <?php endif;?> >
					<a class="btn btn-sm btn-flat owlprev icon" ><i class="orionicon orionicon-arrow_left"></i></a>
					<a class="btn btn-sm btn-flat owlnext icon" ><i class="orionicon orionicon-arrow_right"></i></a>
				</div>
			</div>					
			<?php endif;?>
		<?php endif;?>
	</div>	<!-- wrapper -->
</div>	<!-- testimonials -->