<?php $grid_class = 'col-md-12'; 

$post_format = get_post_format();
if ($post_format == false) { $post_format = 'standard';	}; 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($grid_class); ?>>
	<?php get_template_part( 'templates/posts/formats/format', $post_format );?>
	
	<?php if ($post_format != 'quote' && $post_format != 'status' && $post_format != 'link' && $post_format != 'image') : ?>
		<?php the_content();?>
	<?php endif; ?>
	<?php get_template_part( 'templates/parts/single', 'part_bottom_meta' ); ?>
</article>

