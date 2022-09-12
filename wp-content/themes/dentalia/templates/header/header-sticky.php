<?php 
// get sticky header bg color 
$navigation_type = orion_get_theme_option_css('sticky_navigation_style', 'nav-style-1', 'navigation_style');
$header_style = orion_get_theme_option_css('sticky_navigation_links_color_style', 'nav-dark', 'navigation_links_color_style');

if($header_style == 'nav-dark') {
	$color_3 = orion_get_theme_option_css('color_3', '#1F2A44' );
	$header_bg_color = orion_get_theme_option_css(array('sticky_header_background','background-color'),$color_3, 'nav_menu_bg_color_nav_dark');
} else {
	$header_bg_color = orion_get_theme_option_css(array('sticky_header_background','background-color'),"#fff", 'nav_menu_bg_color_nav_light');
}

if(orion_isColorLight($header_bg_color)){
	$text_color_class = 'text-dark'; 
} else {
	$text_color_class = 'text-light'; 
}

$container_class = 'container';

if ( (orion_get_option("orion_header_type", false, 'classic') == 'widgetsfluid' && orion_get_option('header_width_with_widgets', false, '0') == 1 ) || (
	orion_get_option("orion_header_type", false, 'classic') == 'classic'&& orion_get_option('header_width_classic', false, '0') == 1)
	) {
	$container_class = 'container-fluid';
} else {
	$container_class = 'container';
}
?>

<header class="stickymenu hidesticky <?php echo esc_attr($header_style);?> <?php echo esc_attr($navigation_type);?>">
	<div class="nav-container">
		<div class="<?php echo esc_attr($container_class);?>">
			 <div class="relativewrap row">
			 	<div class="site-branding absolute left <?php echo esc_attr($text_color_class); ?>">
			 		<?php orion_get_sticky_logo(); ?>
			 	</div>
			 	<div class="col-md-12 site-navigation">
			 	<?php orion_get_navigation(array('text-left','clearfix'), array('float-right'));?>		 			
			 	</div>	  	
			</div>
		</div>
	</div>
</header>
