<?php
$orion_audio = get_post_meta(get_the_ID(), '_dentalia_audio_embed');
$orion_audio_file = get_post_meta(get_the_ID(), '_dentalia_audio_file');



if ((!isset($orion_audio) || empty($orion_audio)) && (!isset($orion_audio_file) || empty($orion_audio_file))) : ?> 
	
	<?php get_template_part( 'templates/posts/formats/format', 'standard' );?> 
<?php  else : ?> 

	<?php if (!isset($orion_audio_file) || empty($orion_audio_file)) :?>
		
		<?php $embed_code = wp_oembed_get( $orion_audio[0] ); ?>

		<div class="video embed-responsive embed-responsive-16by9">

		<?php echo wp_oembed_get( $orion_audio[0], array( 'width' => 1140 ) ); ?>

		</div>
	<?php else :?>		

		<header class="entry-header">
		<?php $file = $orion_audio_file[0]; 

			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}

			foreach ($file as $key => $value) {
				$shortcode = '[audio src="' . $value .'"]';
				echo do_shortcode($shortcode);
			};?>
		</header> 
	<?php endif; ?>
	

	<?php get_template_part( 'templates/parts/single', 'part_meta' ); ?>

	<?php if(is_single()) :?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php else : ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<?php endif;?>


<?php endif; ?>