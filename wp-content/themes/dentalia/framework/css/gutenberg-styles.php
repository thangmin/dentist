<?php // loads on backend and frontend
function orion_create_gutenberg_css(){ 
	global $orion_options;  

	/* ---COLORS--- */
	$color_1 = orion_get_theme_option_css('main_theme_color', '#00BCD4' );
	$color_2 = orion_get_theme_option_css('secondary_theme_color', '#3F51B5' );
	$color_3 = orion_get_theme_option_css('color_3', '#2B354B' );


?><?php
/*********************************** O.o ***********************************/
/*                    	gutenberg colors and backgrounds  	  		   	   */ 
/***************************************************************************/
?>

.has-primary-color, 
.has-primary-color p {
	color: <?php echo esc_html($color_1);?>; 
}
.has-secondary-color, 
.has-secondary-color p {
	color: <?php echo esc_html($color_2);?>; 
}
.has-tertiary-color, 
.has-tertiary-color p  {
	color: <?php echo esc_html($color_3);?>; 
}

.has-white-color, .has-white-color p {
	color: #fff;
}

.has-black-color, .has-black-color p {
	color: #000; 
}

.has-primary-background-color, .wp-block-button__link {
	background-color: <?php echo esc_html($color_1);?>; 
}
.has-secondary-background-color {
	background-color: <?php echo esc_html($color_2);?>; 
}
.has-tertiary-background-color {
	background-color: <?php echo esc_html($color_3);?>; 
}
.has-white-background-color {
	background-color: #fff; 
}
.has-black-background-color {
	background-color: #000; 
}
<?php }