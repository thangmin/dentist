
<?php

$orion_quote = get_post_meta(get_the_ID(), '_dentalia_quote');
$orion_quote_author = get_post_meta(get_the_ID(), '_dentalia_quote_source_name');
if (!isset($orion_quote) || empty($orion_quote)) : ?> 
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

<div class="header-quote clearfix">
	<?php if (is_single()) :?>
		<div class="absolute">
			<i class="orionicon orionicon-quote-left primary-color-bg"></i>
		</div>
	<?php else: ?>
		<a href="<?php the_permalink(); ?>" class="absolute">
			<i class="orionicon orionicon-quote-left primary-color-bg"></i>
		</a>
	<?php endif; ?>		
	<p>
		<?php echo esc_html($orion_quote['0']); ?>
	</p>
	<?php if (isset($orion_quote_author) && !empty($orion_quote_author)) : ?>
	<p class="author clearfix">
	<?php echo esc_html($orion_quote_author['0']); ?>
	</p>
<?php endif; ?>
</div>

<?php endif; ?>
