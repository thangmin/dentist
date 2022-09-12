<?php 
$is_single = is_single();
$orion_gallery = get_post_meta(get_the_ID(), '_dentalia_mutiple_img_upload');
$header_margin_class = '';

if ($is_single && get_post_meta(get_the_ID(), '_dentalia_gallery_display', true) != '') {
	$orion_gallery_display_type = get_post_meta(get_the_ID(), '_dentalia_gallery_display', true);
} else {
	$orion_gallery_display_type = 'carousel';
}

if ($orion_gallery_display_type != 'carousel'){
	$header_margin_class = ' no-bottom-margin';
}

if (!empty($orion_gallery)){
	$gallery_images = array();
	foreach ($orion_gallery[0] as $key => $value) {
		$gallery_images[] = $key;
	}
} else {
	$gallery_images = orion_get_gallery_attachments();
}

if (!isset($blog_type)) {
	$blog_type = orion_get_blog_type();
}
if (!isset($gallery_images) || empty($gallery_images)) : ?> 
	<?php get_template_part( 'templates/posts/formats/format', 'standard' );?> 
<?php  else : ?> 

	<header class="entry-header relative<?php echo esc_attr($header_margin_class);?>">
	<div class="row">	
		<?php if ($orion_gallery_display_type != 'carousel' && $orion_gallery_display_type != 'hide') :?>
			<div class="grid grid-header clearfix">
			<?php foreach ($gallery_images as $key => $value) : ?>
				<?php if (is_numeric($value)) :?>
					<div class="image-w <?php echo esc_attr($orion_gallery_display_type);?>">
					<a href="<?php echo wp_get_attachment_url( $value, 'full' );?>" class="overlay-hover-black">
					<?php echo wp_get_attachment_image( $value, 'orion_carousel' );?>
					<div class="overlay"></div>
					</a>
					</div>
				<?php endif;?>
			<?php endforeach; ?> 
			</div>
		<?php endif;?>

		<?php if ($orion_gallery_display_type == 'carousel') :?>
			<div class="col-xs-12">
				<div class="owl-carousel" data-col="1" >
				<?php foreach ($gallery_images as $key => $value) : ?>
					<?php if (is_numeric($value)) :?>
						<?php if (is_single()) {
							echo wp_get_attachment_image( $value, 'orion_container_width' );
						} else if (strpos($blog_type, 'masonry') == false){
							echo wp_get_attachment_image( $value, 'orion_container_width' );
						} else{
							echo wp_get_attachment_image( $value, 'orion_carousel' );
						}?>
					<?php endif;?>
				<?php endforeach; ?> 
				</div>
				<div class="owl-nav-custom">
				    <a class="owlprev primary-color-bg"><i class="orionicon orionicon-arrow_carrot-left"></i></a>
				    <a class="owlnext primary-color-bg"><i class="orionicon orionicon-arrow_carrot-right"></i></a>
				</div>
			</div>
		<?php endif;?>	

	</div>	
	</header> 

<?php get_template_part( 'templates/parts/single', 'part_meta' ); ?>

	<?php if(is_single()) :?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php else : ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<?php endif;?>
<?php  endif; ?> 