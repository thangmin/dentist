<?php
/**
 * The template used for displaying page content in post.php
 *
 * @package dentalia
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php // get the right post format template
	$post_format = get_post_format();
	if ($post_format == false) { $post_format = 'standard';	}; ?>

	<?php get_template_part( 'templates/posts/formats/format', $post_format );?>
	
	<?php /* now display the rest of the content */ ;?>
	<div class="entry-content">

		<?php the_content(); ?>
		<?php wp_link_pages( array(
		'before'      => '<ul class="page-numbers p-numbers"><li>',
		'after'       => '</li></ul>',
		'separator'   =>  '</li><li>',
		) );
		?>		
		
		<?php get_template_part( 'templates/parts/single', 'part_bottom_meta' ); ?>

		<?php  //author info
        if( get_the_author_meta('description') ): ?>
        	<hr>
	        <div class="about-author">
				<div class="avatar author-avatar circle-img">
					<?php echo get_avatar(get_the_author_meta('ID'), 143); ?>
				</div>
	            <div class="author-info">
					<h4 class="author"><a href="<?php get_author_posts_url( 'ID'); ?>"><?php the_author(); ?></a> <span class="post-author primary-color"><?php echo esc_html__('Post Author', 'dentalia');?> </span></h4>
					<p class="author-description">
						<?php the_author_meta('description'); ?>
					</p>
				</div>
	        </div>
        <?php endif; ?>

		<section class="row">
			<div class="post-navigation col-md-12">

				<?php //advanced previous and next post navigation	
				$prev_post = get_previous_post();
				$next_post = get_next_post();
				
				$pull_right = "";
				if ($prev_post=="" && $next_post!="") {
					$pull_right = "pull-right";
				} else if($prev_post!="" && $next_post==""){
					$pull_right = "pull-left";
				}?>

				<?php if (empty( $prev_post ) &&  empty( $next_post ) ):?>
				<p></p>
				<?php else : ?>
				<div class="wrapper <?php echo esc_attr($pull_right);?> clearfix orion-equal-height">
					
					<?php if (!empty( $prev_post )): ?>
						<?php
							$prev_thumbnail_id = get_post_thumbnail_id( $prev_post->ID );
							$prev_thumbnail_src = wp_get_attachment_image_src($prev_thumbnail_id, 'large');
						?>
						<div class="text-left prev-post <?php if ($prev_thumbnail_id != "") :?>bg-img<?php endif;?> "
							<?php if ($prev_thumbnail_id != "") :?> 
								style='background-image:url("<?php echo esc_url($prev_thumbnail_src[0]);?>");'
							<?php endif;?>>
						
							<a class="equal-height-item" href="<?php echo esc_url(get_permalink($prev_post->ID));?>">	
							<span class="text-uppercase primary-color" >
								<i class="orionicon orionicon-arrow-circle-o-left"></i> 
								<?php esc_html_e( 'previous post', 'dentalia' );?>
							</span>						
								<h4><?php echo esc_html($prev_post->post_title); ?></h4>
							</a>
						</div>
					<?php endif;?>
		        						
					<?php if (!empty( $next_post )): ?>
						<?php 
							$next_thumbnail_id = get_post_thumbnail_id( $next_post->ID );
							$next_thumbnail_src = wp_get_attachment_image_src($next_thumbnail_id, 'large'); 
						?>
						 <div class="text-right next-post <?php if ($next_thumbnail_id != "") :?>bg-img<?php endif;?>"
								<?php if ($next_thumbnail_id != "") :?> 
									style='background-image:url("<?php echo esc_url($next_thumbnail_src[0]);?>");'
								<?php endif;?>>

							<a class="equal-height-item" href="<?php echo esc_url(get_permalink($next_post->ID));?>">	
							<span class="text-uppercase primary-color" >
								<?php esc_html_e( 'next post', 'dentalia' );?>
								<i class="orionicon orionicon-arrow-circle-o-right"></i> 
							</span>	
								<h4><?php echo esc_html($next_post->post_title); ?></h4>
							</a>
						</div>
					<?php endif;?>
		    	</div> 
		    	<?php endif;?> 
		    </div>  
		</section>	
		<?php // themecheck requires this functions:
			if (!function_exists('wp_link_pages')) {
				 posts_nav_link(); 
			}
			if (!function_exists('posts_nav_link')) {
				 wp_link_pages(); 
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'dentalia' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
