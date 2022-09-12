<?php
/*
Template name: Page - Full Width - Transparent Header - Gap
 */
get_header();?>

<?php do_action('flatsome_before_page');?>

<div id="content" role="main">
	<section class="banner-header">
		<!-- Left Panel -->
		<div class="left-panel"></div>
	</section>
			<?php while (have_posts()): the_post();?>

							<?php the_content();?>

						<?php endwhile; // end of the loop. ?>
</div>

<?php do_action('flatsome_after_page');?>

<?php get_footer();?>
