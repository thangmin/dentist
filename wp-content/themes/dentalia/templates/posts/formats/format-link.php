
<?php
$orion_link_title = get_post_meta(get_the_ID(), '_dentalia_link_title');
$orion_link_url = get_post_meta(get_the_ID(), '_dentalia_url');
$orion_link_desc = get_post_meta(get_the_ID(), '_dentalia_link_desc');


if (!isset($orion_link_url) || empty($orion_link_url)) : ?> 
	<?php get_template_part( 'templates/posts/formats/format', 'standard' );?> 
<?php  else : ?> 

	<?php
	$orion_link_url['0'] = orion_addhttp($orion_link_url['0']);

	if(empty($orion_link_title)) {
		$orion_link_title = $orion_link_url;
	}?>
	<?php if ( has_post_thumbnail() ) : ?>
		<header class="entry-header">
			 <?php 
			 if (is_single()) {
				the_post_thumbnail('orion_container_width' );
			 } else {
				the_post_thumbnail('orion_carousel' );
			 }
			 ?>
		</header> 
	<?php endif; ?>
	<?php get_template_part( 'templates/parts/single', 'part_meta' ); ?>

	<div class="header-link clearfix">
		<?php if (is_single()) :?>
			<div class="absolute">
				<i class="orionicon orionicon-link primary-color-bg"></i>
			</div>
		<?php else: ?>
			<a href="<?php the_permalink(); ?>" class="absolute">
				<i class="orionicon orionicon-link primary-color-bg"></i>
			</a>
		<?php endif; ?>
		
		<p>
			<a target="_blank" href="<?php echo esc_url($orion_link_url['0']);?>" class="primary-color"><?php echo esc_html($orion_link_title['0']); ?></a>
		</p>
		<?php if (isset($orion_link_desc['0']) && !empty($orion_link_desc['0'])) : ?>
			<p class="link-desc clearfix">
				<?php echo esc_html($orion_link_desc['0']); ?>
			</p>
		<?php endif; ?>
	</div>

<?php endif; ?>
