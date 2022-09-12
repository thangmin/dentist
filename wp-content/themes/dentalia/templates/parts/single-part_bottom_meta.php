<?php

$dentalia_options = get_option('dentalia', orion_get_orion_defaults());
$permalink = get_permalink(); 
?>
<div class="row bottom-meta">
<div class="col-md-8">

		<?php if (has_tag()) : ?>
			<span class="meta">
				<?php echo esc_html__('Tags:', 'dentalia');?>
			</span>			
		<div class="tagcloud">

			
			<?php echo get_the_tag_list('', ' ', ''); ?>
		</div>
		<?php endif; ?>
</div>


<?php if (isset($dentalia_options['share-icons'])) : ?>

	<?php $share_icons_array = $dentalia_options['share-icons'];
	$icon_fb = '<li><a class="btn btn-sm btn-c1 icon" href="https://www.facebook.com/sharer/sharer.php?u=' . esc_url($permalink) . '&amp;t=' . str_replace(' ', '%20', get_the_title()) . '" title="' . esc_html__( "Share on Facebook", "dentalia" ) . '" target="_blank"><i class="orionicon orionicon-facebook"></i></a></li>';
	$icon_tw = '<li><a class="btn btn-sm btn-c1 icon" href="https://twitter.com/intent/tweet?source=' . esc_url($permalink) . '&amp;text=' . str_replace(' ', '%20', get_the_title()) . ':'. esc_url($permalink) . '" target="_blank" title="' . esc_html__( "Tweet", "dentalia" ) . '"><i class="orionicon orionicon-twitter"></i></a></li>';
	$icon_linkedin = '<li><a class="btn btn-sm btn-c1 icon" href="https://www.linkedin.com/shareArticle?mini=true&url=' . esc_url($permalink) . '" target="_blank" title="' . esc_html__( "Share on LinkedIn", "dentalia" ) . '"><i class="orionicon orionicon-linkedin"></i></a></li>';

	$enabled_icons = array();
	foreach ($share_icons_array as $icon => $value) {
		if($value == "1") {
			array_push($enabled_icons, $icon);
		}
	}

	if (!$enabled_icons =="") : ?>
		<div class="col-md-4 text-right">
			<span class="meta">
				<?php echo esc_html__('Share:', 'dentalia');?>
			</span>
			<ul class="share-links">
				<?php foreach($enabled_icons as $icon) {
					switch($icon) {
					case "facebook": 
						echo wp_kses_post($icon_fb); 
						break;
					case "twitter": 
						echo wp_kses_post($icon_tw); 
						break;
					case "linkedin": 
						echo wp_kses_post($icon_linkedin); 
						break;
					}
				} ?>
			</ul>
		</div>	
	<?php endif; ?>
<?php endif;?>
</div>
