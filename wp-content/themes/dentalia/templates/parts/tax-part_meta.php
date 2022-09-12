<?php
global $orion_options;

$post_id = get_queried_object_id();
$author_id = get_post_field( 'post_author', $post_id );
$num_comments = get_comments_number( get_the_ID() ); 
$permalink = get_permalink( $post_id); 
$featured_image = "";

if ( has_post_thumbnail($post_id) ) {
	$featured_image = wp_get_attachment_url(get_post_thumbnail_id($post_id));
} 

$post_meta_bar = "post";

if (isset($orion_options['post-meta-bar'])) {
	$post_meta_bar = $orion_options['post-meta-bar'];	
}

if ( comments_open() ) {
	if ( $num_comments == 0 ) {
		$write_comments = esc_html__('No Comments', 'dentalia' );
	} elseif ( $num_comments > 1 ) {
		$comments = $num_comments . esc_html__(' Comments', 'dentalia' );
		$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
	} else {
		$comments = esc_html__('1 Comment', 'dentalia' );
		$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
	}
} else {
	$write_comments =  esc_html__('', 'dentalia' );
}


$sharing_switch = "";
if (isset($orion_options['sharing_icons_switch'])) {
	$sharing_switch = $orion_options['sharing_icons_switch'];	
}?>

<ul class="entry-meta">
	<li>
		<?php _e( 'by ', 'dentalia' );
		the_author_meta( 'user_nicename', $author_id ); ?>
	</li>
	
	<?php the_date( get_option('date_format'), "<li>", "</li>"); ?>

	<li>
		<?php the_category('&nbsp;&bull;&nbsp;'); ?>
	</li>
	
	<?php 
	$tags = get_the_term_list( get_the_ID(), 'post_tag', '', ' #');

	if ($tags) : ?>
		<li>
			<?php  echo '#'.$tags; ?> 
		</li>
	<?php endif; ?>

	<li>
		<?php echo wp_kses_post($write_comments);?>
	</li>

</ul>
<?php if ($sharing_switch!="0" && is_single() ) : ?>

	<?php $share_icons_array = $orion_options['share-icons'];

	$icon_fb = '<li><a href="https://www.facebook.com/sharer/sharer.php?u=' . esc_url($permalink) . '&amp;t=' . str_replace(' ', '%20', get_the_title()) . '" title="' . esc_html__( "Share on Facebook", 'dentalia' ) . '" target="_blank"><i class="orionicon orionicon-facebook"></i></a></li>';
	$icon_tw = '<li><a href="https://twitter.com/intent/tweet?source=' . esc_url($permalink) . '&amp;text=' . str_replace(' ', '%20', get_the_title()). ':'. esc_url($permalink) . '" target="_blank" title="' . esc_html__( "Tweet", 'dentalia' ) . '"><i class="orionicon orionicon-twitter"></i></a></li>';
	$icon_linkedin = '<li><a class="btn btn-sm btn-c1 icon" href="https://www.linkedin.com/shareArticle?mini=true&url=' . esc_url($permalink) . '" target="_blank" title="' . esc_html__( "Share on LinkedIn", "dentalia" ) . '"><i class="orionicon orionicon-linkedin"></i></a></li>';	
	
	$enabled_icons = array();
	foreach ($share_icons_array as $icon => $value) {
		if($value == "1") {
			array_push($enabled_icons, $icon);
		}
	}

	if (!$enabled_icons =="") : ?>
		<ul class="share-links col-md-3">
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
	<?php endif; ?>
<?php endif;?>