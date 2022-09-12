<?php //title
if(!empty($instance['title'])) : ?>
	<div class="widget-header">
		<h2 class="h5 widget-title"><?php echo esc_html($instance['title']);?></h2>
	</div>
<?php endif; ?>

<?php 
if(isset($instance['static_block']) && $instance['static_block'] != '' && function_exists( 'siteorigin_panels_render' ) ) {
	echo '<div class="staticblock-wrap">';
   	$static_block_id = preg_replace('/[^0-9]/', '', $instance['static_block']);
   	echo siteorigin_panels_render($static_block_id);
   	echo '</div>';
}
?>