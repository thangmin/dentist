
<?php

$orion_status = get_post_meta(get_the_ID(), '_dentalia_status');
if (!isset($orion_status) || empty($orion_status)) : ?> 
	<?php get_template_part( 'templates/posts/formats/format', 'standard' );?> 
<?php  else : ?> 
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

<div class="header-status clearfix">

	<?php if (is_single()) :?>
		<div class="absolute">
			<i class="orionicon orionicon-commenting primary-color-bg"></i>
		</div>
	<?php else: ?>
		<a href="<?php the_permalink(); ?>" class="absolute">
			<i class="orionicon orionicon-commenting primary-color-bg"></i>
		</a>
	<?php endif; ?>			
	<p>
		<?php echo esc_html($orion_status['0']); ?>
	</p>
</div>

<?php endif; ?>
