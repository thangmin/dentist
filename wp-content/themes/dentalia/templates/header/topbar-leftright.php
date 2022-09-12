<?php 
$hide_top_bar = false;

if ( is_page() || is_single() || (is_home() && is_front_page() == false) ) {
		
		if (is_home() && is_front_page() == false) {
			$page_for_posts = get_option( 'page_for_posts' );
			$orion_wp_meta = get_post_meta( $page_for_posts );
		} else {
			$orion_wp_meta = get_post_meta( get_the_ID() );
		}

		if (isset($orion_wp_meta['_dentalia_hide_top-bar']) && $orion_wp_meta['_dentalia_hide_top-bar'] == true) {
			$hide_top_bar = true;	
		}
	}
?>

<?php if ($hide_top_bar != true) :?>
	<div class="top-bar left-right equal <?php orion_get_class_cb('is_top_bar_always_open','noclass','collapsable');?> <?php orion_get_option('topbar_text_color');?>">
		<div class="<?php orion_get_class_cb('is_top_bar_fluid', 'container-fluid', 'container', 'off');?>">
			<div class="row">
				<div class="col-md-12 clearfix">
					<div class="text-left top-bar-wrap container-fluid left <?php orion_get_class_cb('topbar_divider_left', 'add-dividers', 'no-dividers', 'off');?>">
						<?php dynamic_sidebar( 'sidebar-top-bar-left' ); ?>				
					</div>	
					<div class="pull-right top-bar-wrap container-fluid right <?php orion_get_class_cb('topbar_divider_right', 'add-dividers', 'no-dividers', 'off');?>">
						<?php dynamic_sidebar( 'sidebar-top-bar-right' ); ?>	
					</div>			
				</div>
			</div>
		</div>
	</div>
<?php endif;?>