<?php if (have_posts()): ?>

<?php
// Create IDS
$ids = array();
while (have_posts()): the_post();
	array_push($ids, get_the_ID());
endwhile; // end of the loop.
$ids = implode(',', $ids);
?>

	<?php
echo flatsome_apply_shortcode('blog_posts', array(
	'style' => "push",
	'type' => get_theme_mod('blog_style_type', 'row'),
	'depth' => get_theme_mod('blog_posts_depth', 0),
	'depth_hover' => get_theme_mod('blog_posts_depth_hover', 0),
	'text_align' => get_theme_mod('blog_posts_title_align', 'center'),
	'columns' => '2',
	'show_date' => get_theme_mod('blog_badge', 1) ? 'true' : 'false',
	'excerpt_length' => "20",
	'image_height' => "75%",
	'text_bg' => "rgb(50, 50, 50)",
	'ids' => $ids,
));
?>

<?php flatsome_posts_pagination();?>

<?php else: ?>

	<?php get_template_part('template-parts/posts/content', 'none');?>

<?php endif;?>
