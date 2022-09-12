<?php
$orion_video = get_post_meta(get_the_ID(), '_dentalia_video_embed');

if (!isset($orion_video) || empty($orion_video)) : ?> 
	<?php get_template_part( 'templates/posts/formats/format', 'standard' );?> 
<?php  else : ?> 

	<?php $embed_code = wp_oembed_get( $orion_video[0] ); ?>

	<div class="video embed-responsive embed-responsive-16by9">
		<?php echo wp_oembed_get( $orion_video[0], array( 'width' => 1140 ) ); ?>
	</div>

	<?php get_template_part( 'templates/parts/single', 'part_meta' ); ?>

	<?php if(is_single()) :?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php else : ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<?php endif;?>

<?php endif; ?>