<?php if ( has_post_thumbnail() ) : ?>
	<header class="entry-header">
		 <?php the_post_thumbnail(); ?>
	</header> 
<?php endif; ?>

<?php get_template_part( 'templates/parts/single', 'part_meta' ); ?>

<?php if(is_single()) :?>
<h1 class="entry-title"><?php the_title(); ?></h1>
<?php else : ?>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<?php endif;