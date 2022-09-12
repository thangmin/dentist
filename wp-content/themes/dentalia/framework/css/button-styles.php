<?php function orion_create_custom_buttons_css() { 
		global $orion_options;  
	/* ---COLORS--- */
	$color_1 = orion_get_theme_option_css('main_theme_color', '#00BCD4' );
	$color_2 = orion_get_theme_option_css('secondary_theme_color', '#3F51B5' );
	$color_3 = orion_get_theme_option_css('color_3', '#2B354B' );
?>

button:hover, button:focus,.btn:hover, .btn:focus, input[type="submit"]:hover, input[type="submit"]:focus {
	background-color: <?php echo esc_attr($color_1);?>;
}
button.btn-c1, .btn.btn-c1, input.btn-c1[type="submit"], .post-password-form input[type="submit"] {
  background: <?php echo esc_attr($color_1);?>;
  color: #fff;
}
.btn:focus, .btn:active, .btn.active {
	color: #fff;
	background: <?php echo esc_attr($color_1);?>;
	box-shadow: none;
	outline: none;
}
<?php // wire general ?>
.icon-left.btn-wire:hover span[class*="icon"], .icon-left.btn-wire:focus span[class*="icon"], .icon-left.btn-wire:active span[class*="icon"],
.icon-right.btn-wire:hover span[class*="icon"], .icon-right.btn-wire:focus span[class*="icon"], .icon-right.btn-wire:active span[class*="icon"] {
  background: <?php echo esc_attr(orion_adjustBrightness($color_1, 15 ));?>;
  box-shadow: inset 0 0 0 1px <?php echo esc_attr($color_1);?>;    
}

<?php // wire c1 ?>
button.btn-c1.btn-wire:not(:hover):not(:focus), .btn.btn-c1.btn-wire:not(:hover):not(:focus), input.btn-c1.btn-wire[type="submit"]:not(:hover) {
  color: <?php echo esc_attr($color_1);?>;
  background: transparent;
  box-shadow: inset 0 0 0 1px <?php echo esc_attr($color_1);?>;
}
button.btn-c1.btn-wire:not(:hover):not(:focus) span[class*="icon"]:after, button.btn-c1.btn-wire:not(:hover):not(:focus) i:after,
.btn.btn-c1.btn-wire:not(:hover):not(:focus) span[class*="icon"]:after, .btn.btn-c1.btn-wire:not(:hover):not(:focus) i:after,
input.btn-c1.btn-wire[type="submit"]:not(:hover) span[class*="icon"]:after, input.btn-c1.btn-wire[type="submit"]:not(:hover) i:after {
  border-color: <?php echo esc_attr($color_1);?>; 
}
<?php // hover c1 ?>
button.btn-c1:hover, .btn.btn-c1:hover, input.btn-c1[type="submit"]:hover, .post-password-form input[type="submit"]:hover {
  background: <?php echo esc_attr(orion_adjustBrightness($color_1, 15 ));?>;
  color: #fff;
}
.btn-c1.icon-left:hover span[class*="icon"], .btn-c1.icon-left:focus span[class*="icon"], .btn-c1.icon-left:active span[class*="icon"],
.btn-c1.icon-right:hover span[class*="icon"], .btn-c1.icon-right:focus span[class*="icon"], .btn-c1.icon-right:active span[class*="icon"] {
  background: <?php echo esc_attr($color_1);?>;
}

button.btn-c1.btn-wire:hover, .btn.btn-c1.btn-wire:hover, input.btn-c1.btn-wire[type="submit"]:hover {
  background: <?php echo esc_attr($color_1);?>;
}
.btn-c1.icon-left.btn-wire:hover span[class*="icon"], .btn-c1.icon-left.btn-wire:focus span[class*="icon"], .btn-c1.icon-left.btn-wire:active span[class*="icon"],
.btn-c1.icon-right.btn-wire:hover span[class*="icon"], .btn-c1.icon-right.btn-wire:focus span[class*="icon"], .btn-c1.icon-right.btn-wire:active span[class*="icon"] {
  background: <?php echo esc_attr(orion_adjustBrightness($color_1, 15 ));?>;
  box-shadow: inset 0 0 0 1px <?php echo esc_attr($color_1);?>;    
}

.btn-c1.icon-left:hover span[class*="icon"]:after {
  display:none;
}

<?php // c2 ?>
button.btn-c2, .btn.btn-c2, input.btn-c2[type="submit"] {
  background: <?php echo esc_attr($color_2);?>;
  color: #fff;
}
button.btn-c2.btn-wire:not(:hover):not(:focus), .btn.btn-c2.btn-wire:not(:hover):not(:focus), input.btn-c2.btn-wire[type="submit"]:not(:hover) {
  color: <?php echo esc_attr($color_2);?>;
  background: transparent;
  box-shadow: inset 0 0 0 1px <?php echo esc_attr($color_2);?>;
}
button.btn-c2.btn-wire:not(:hover):not(:focus) span[class*="icon"]:after, button.btn-c2.btn-wire:not(:hover):not(:focus) i:after,
.btn.btn-c2.btn-wire:not(:hover):not(:focus) span[class*="icon"]:after, .btn.btn-c2.btn-wire:not(:hover):not(:focus) i:after,
input.btn-c2.btn-wire[type="submit"]:not(:hover) span[class*="icon"]:after, input.btn-c2.btn-wire[type="submit"]:not(:hover) i:after  {
  border-color: <?php echo esc_attr($color_2);?>; 
}
button.btn-c2:hover, .btn.btn-c2:hover, input.btn-c2[type="submit"]:hover {
  background: <?php echo esc_attr(orion_adjustBrightness($color_2, 15 ));?>;
  color: #fff;
}
.btn-c2.icon-left:hover span[class*="icon"], .btn-c2.icon-left:focus span[class*="icon"], .btn-c2.icon-left:active span[class*="icon"],
.btn-c2.icon-right:hover span[class*="icon"], .btn-c2.icon-right:focus span[class*="icon"], .btn-c2.icon-right:active span[class*="icon"] {
  background: <?php echo esc_attr($color_2);?>;
}
button.btn-c2.btn-wire:hover, .btn.btn-c2.btn-wire:hover, input.btn-c2.btn-wire[type="submit"]:hover {
  background: <?php echo esc_attr($color_2);?>;
  color: #fff;
}
.btn-c2.icon-left.btn-wire:hover span[class*="icon"], .btn-c2.icon-left.btn-wire:focus span[class*="icon"], .btn-c2.icon-left.btn-wire:active span[class*="icon"],
.btn-c2.icon-right.btn-wire:hover span[class*="icon"], .btn-c2.icon-right.btn-wire:focus span[class*="icon"], .btn-c2.icon-right.btn-wire:active span[class*="icon"] {
  background: <?php echo esc_attr(orion_adjustBrightness($color_2, 15 ));?>;
  box-shadow: inset 0 0 0 1px <?php echo esc_attr($color_2);?>;    
}
.btn-c2.icon-left:hover span[class*="icon"]:after {
  display:none;
}

<?php // c3 ?>
button.btn-c3, .btn.btn-c3, input.btn-c3[type="submit"] {
  background: <?php echo esc_attr($color_3);?>;
  color: #fff;
}
button.btn-c3.btn-wire:not(:hover):not(:focus), .btn.btn-c3.btn-wire:not(:hover):not(:focus), input.btn-c3.btn-wire[type="submit"]:not(:hover) {
  color: <?php echo esc_attr($color_3);?>;
  background: transparent;
  box-shadow: inset 0 0 0 1px <?php echo esc_attr($color_3);?>;
}
button.btn-c3.btn-wire:not(:hover):not(:focus) span[class*="icon"]:after, button.btn-c3.btn-wire:not(:hover):not(:focus) i:after,
.btn.btn-c3.btn-wire:not(:hover):not(:focus) span[class*="icon"]:after, .btn.btn-c3.btn-wire:not(:hover):not(:focus) i:after,
input.btn-c3.btn-wire[type="submit"]:not(:hover) span[class*="icon"]:after, input.btn-c3.btn-wire[type="submit"]:not(:hover) i:after  {
  border-color: <?php echo esc_attr($color_3);?>; 
}
button.btn-c3:hover, .btn.btn-c3:hover, input.btn-c3[type="submit"]:hover, .woocommerce-message a.button:hover {
  background: <?php echo esc_attr(orion_adjustBrightness($color_3, 15 ));?>;
  color: #fff;
}
.btn-c3.icon-left:hover span[class*="icon"], .btn-c3.icon-left:focus span[class*="icon"], .btn-c3.icon-left:active span[class*="icon"],
.btn-c3.icon-right:hover span[class*="icon"], .btn-c3.icon-right:focus span[class*="icon"], .btn-c3.icon-right:active span[class*="icon"] {
  background: <?php echo esc_attr($color_3);?>;
}

button.btn-c3.btn-wire:hover, .btn.btn-c3.btn-wire:hover, input.btn-c3.btn-wire[type="submit"]:hover {
  background: <?php echo esc_attr($color_3);?>;
}
.btn-c3.icon-left.btn-wire:hover span[class*="icon"], .btn-c3.icon-left.btn-wire:focus span[class*="icon"], .btn-c3.icon-left.btn-wire:active span[class*="icon"],
.btn-c3.icon-right.btn-wire:hover span[class*="icon"], .btn-c3.icon-right.btn-wire:focus span[class*="icon"], .btn-c3.icon-right.btn-wire:active span[class*="icon"] {
  background: <?php echo esc_attr(orion_adjustBrightness($color_3, 15 ));?>;
  box-shadow: inset 0 0 0 1px <?php echo esc_attr($color_3);?>;     
}

.btn-c3.icon-left:hover span[class*="icon"]:after {
  display:none;
}
<?php // empty ?>
button.btn-empty:not(:hover), .btn.btn-empty:not(:hover), input.btn-empty[type="submit"]:not(:hover) {
  	color: <?php echo esc_attr($color_1);?>;
}
button.btn-c2.btn-empty:not(:hover), .btn.btn-c2.btn-empty:not(:hover), input.btn-c2.btn-empty[type="submit"]:not(:hover) {
	color: <?php echo esc_attr($color_2);?>;
}
button.btn-c3.btn-empty:not(:hover), .btn.btn-c3.btn-empty:not(:hover), input.btn-c3.btn-empty[type="submit"]:not(:hover) {
  	color: <?php echo esc_attr($color_3);?>;
}

<?php } ?>