<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); 
$orion_sidebars = orion_get_sidebars();
$padding_classes = '';

if (is_home() && is_front_page() == false) {
	$page_for_posts = get_option( 'page_for_posts' );
	$orion_wp_meta = get_post_meta( $page_for_posts );
	$padding_classes = " " . get_orion_page_padding($page_for_posts);
	if ($orion_wp_meta && array_key_exists ( '_dentalia_heading_type' , $orion_wp_meta ) && $orion_wp_meta['_dentalia_heading_type'][0] != '') {
		if (isset($orion_wp_meta['_dentalia_hide_heading']) && ($orion_wp_meta['_dentalia_hide_heading'][0] == 'on')) {
		} else {	
			$blog_type = $orion_wp_meta['_dentalia_heading_type'][0];
		}
	} else {
		$blog_type = orion_get_option('post_heading_type', false);
	}
} else {
	$blog_type = orion_get_option('post_heading_type', false);
}
?>
<?php 
	if(isset( $blog_type )) {
		get_template_part( 'templates/heading/content-heading', $blog_type); 
	}
?>
<div class="site-content" id="content">
	<div class="container">
		<main id="main" class="site-main section row<?php echo esc_attr($padding_classes);?>">
			<div class="col-md-12 blog-page-content">
				<?php 
				if (is_home() && is_front_page() == false) {
					$blog_page = get_post($page_for_posts);
					if (isset($orion_wp_meta['panels_data'][0])) {
						if( function_exists( 'siteorigin_panels_render' ) ) : ?>
						<div class="col-md-12 blog-page-content">
							<?php echo siteorigin_panels_render($blog_page->ID);?>
						</div>	
						<?php endif;
					}
				}
				?>
			</div>
			<div id="primary" class="<?php echo esc_attr($orion_sidebars['primary_class']);?>">	
				<?php if ( have_posts() ) : ?>	
					<?php $blog_type = orion_get_blog_type();
						if (strpos($blog_type, 'grid') !== false) {
							$row_class = 'grid';
						} else {
							$row_class = orion_get_blog_type();
						}
					?>
					<div class="row <?php echo esc_attr($row_class);?>">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'templates/blog/content-blog', orion_get_blog_type() ); ?>
						<?php endwhile; ?>
					</div>					
					
					<?php orion_paging_nav(); ?>

				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>		
			</div><!-- #primary -->

			<?php if ( $orion_sidebars['ot_left_sidebar_id']): ?>
				<aside class="left-s sidebar <?php echo esc_attr($orion_sidebars['left_sidebar_class']);?>">
				    <section><?php dynamic_sidebar($orion_sidebars['ot_left_sidebar_id']); ?></section>
				</aside>   
			<?php endif; ?>

			<?php if ( $orion_sidebars['ot_right_sidebar_id']): ?>
			    <aside class="right-s sidebar <?php echo esc_attr($orion_sidebars['right_sidebar_class']);?>">
				    <section><?php dynamic_sidebar($orion_sidebars['ot_right_sidebar_id']); ?></section>
			    </aside>   
			<?php endif; ?>			
		</main><!-- #main -->
	</div> <!-- container-->
</div> <!-- #content-->

<?php get_footer(); 