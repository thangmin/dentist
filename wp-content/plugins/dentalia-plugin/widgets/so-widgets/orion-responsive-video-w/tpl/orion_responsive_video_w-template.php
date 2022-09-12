<?php  //prepare variables
	$orion_video = $instance['video_url'];	
	$lightbox = $instance['lightbox_options']['lightbox'];
	$image = $instance['lightbox_options']['image'];
	$play_icon = $instance['lightbox_options']['play_icon'];
	$play_icon_style = $instance['lightbox_options']['play_icon_style'];
	$video_add_style_class = $instance['video_add_style'];	
	$video_image = '';
	if ($image) {
		$get_image = wp_get_attachment_image_src($image, 'full');
		$video_image = $get_image[0];
	};
	if ($video_add_style_class != '') {
		$video_add_style_class = ' '.$video_add_style_class;
	}
?>
<?php if ($orion_video != '') :?>
	<?php if($lightbox != true) :?>
		<?php if ($video_add_style_class != '') :?>
			<div class="wrapper<?php echo esc_attr($video_add_style_class);?>">			
		<?php endif;?>
			<div class="video embed-responsive embed-responsive-16by9">
				<?php echo wp_oembed_get( $orion_video, array( 'width' => 1140 ) ); ?>
			</div>
		<?php if ($video_add_style_class != '') :?>
			</div>
		<?php endif;?>
	<?php else : ?>
	<?php $unique_rel = 'v_'. uniqid(); ?>
	<a rel="<?php echo esc_attr($unique_rel);?>" data-fancybox="<?php echo esc_attr($unique_rel);?>" class="swipebox-video swipebox relative<?php echo esc_attr($video_add_style_class);?>" href="<?php echo esc_url($orion_video);?>">
		<?php if ($video_image) :?>
			<img src="<?php echo esc_url($video_image);?>" alt="<?php esc_attr_e('Play video', 'dentalia');?>"/>
		<?php endif;?>
		<?php if ($play_icon != '') :?>
			<div class="play-icon absolute <?php echo esc_attr($play_icon);?> <?php echo esc_attr($play_icon_style);?>">
				<?php if ($play_icon_style == 'play_style_2') :?>
					<i class="orionicon orionicon-play" aria-hidden="true"></i>
				<?php else : ?>
					<i class="orionicon orionicon-play-circle-o" aria-hidden="true"></i>
				<?php endif;?>
			</div>
		<?php endif;?>
	</a>
	<?php endif;?>
<?php else :?>
	<h2><?php esc_html_e('Please select a video', 'dentalia');?></h2>
<?php endif;?>