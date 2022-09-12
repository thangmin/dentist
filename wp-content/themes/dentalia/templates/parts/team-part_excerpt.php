
<?php $post_id = get_the_ID(); ?>
				
<header class="entry-header team-header<?php if (is_single()) : ?> row <?php endif;?>">
		<div class="col-md-4">

			<?php $img = get_the_post_thumbnail($post_id, 'size-orion_tablet');?>
			<?php if ($img != "") : ?>

				<?php if (!is_single()) : ?>
					<a href="<?php echo get_permalink($post_id);?>" class="image-wrap">
				<?php endif;?>	

					<?php echo wp_kses_post($img);?>

				<?php if (!is_single()) : ?>
					</a>
				<?php endif;?>

			<?php else :?>

				<?php if (!is_single()) : ?>
					<a href="<?php echo get_permalink($post_id);?>" class="image-wrap no-image">
				<?php else:?>
					<span class="image-wrap no-image">
				<?php endif;?>

				<span class="orionicon orionicon-icon_group"></span>
				
				<?php if (!is_single()) : ?>
					</a>
				<?php else:?>
					</span>
				<?php endif;?>

			<?php endif;?>		
		</div>
		<div class="col-md-8">
			<div class="team-title clearfix row">
				<?php if (get_the_term_list( $post->ID, 'department') != "" ) : ?>
					<?php echo get_the_term_list( $post->ID, 'department', '<ul class="departments col-md-12"><li>', ', </li><li>', '</li></ul>' ); ?>
	   			<?php endif; ?>	
				<div class="title-wrap text-left separator-style-2 style-text-dark col-md-12">
				
			 		<?php if (get_post_meta(get_the_ID(), 'member_social_icons') != "") : ?>
				 		<?php $social_links = get_post_meta(get_the_ID(), 'member_social_icons');?>
				 		<?php if (isset($social_links[0])) :?>
							<ul class="social-links clearfix">
							 	<?php foreach ($social_links[0] as $key => $value) : ?>
							 		<?php if (isset($value['social_icons']) && isset($value['social_links']) ) :?>
							 			
							 			<?php
							 			if ($value['social_icons'] == 'fa-envelope-o') : ?>

								 		 <li> 
								 		 	<a class='btn icon btn-empty btn-black btn-sm primary-hover' href="mailto:<?php echo esc_html(orion_removehttp(($value['social_links'])));?>">
								 		 		<i class="fa <?php echo esc_attr($value['social_icons']);?>"></i>
								 		 	</a>
								 		 </li>
								 		<?php else : ?>
								 		 <li> 
								 		 	<a class='btn icon btn-empty btn-black btn-sm primary-hover' href="<?php echo esc_url(orion_addhttp($value['social_links']));?>">
								 		 		<i class="fa <?php echo esc_attr($value['social_icons']);?>"></i>
								 		 	</a>
								 		 </li>
								 		<?php endif;?>
									<?php endif;?>							 		
							 	<?php endforeach;?>
						 	</ul>
					 	<?php endif;?>
					<?php endif;?>
					<?php if (is_single()) : ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php else : ?>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_title(); ?></a></h2>
					<?php endif; ?>					
				</div>				
			</div>
	
			<?php $medical_title = get_post_meta( $post->ID, 'medical_title');
				if (isset($medical_title[0])) : ?>
				<div class="medical-title">
					<?php echo wp_kses_post($medical_title[0]);?>
				</div>
				<?php endif; ?>				
			 
			<?php $additional_info = get_post_meta( $post->ID, 'short_about');
			if (isset($additional_info[0])) : ?>
			<div class="additional-info<?php if (is_single()) : ?> lead<?php endif;?>">
				<?php echo wpautop(wp_kses_post($additional_info[0]), true);?>
			</div>
			<?php endif; ?>
		</div>		
	</header> 