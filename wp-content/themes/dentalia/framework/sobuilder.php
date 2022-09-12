<?php
// @author: Orion Themes

/********************************************************************/
/*****************         Site Origin panels       *****************/
/********************************************************************/

/*no row bottom margin */
add_action( 'after_setup_theme', 'orion_panel_setup' );

function orion_panel_setup() { 
	add_theme_support( 'siteorigin-panels', array(
		'margin-bottom' => '0',
		'padding-bottom' => '24px',
		'padding-top' => '24px',
	) );
}

/********************************************************************/
/*  						Row attributes							*/
/********************************************************************/
if(!function_exists('orion_custom_row_style_attributes')) {
	function orion_custom_row_style_attributes( $attributes, $args ) {

	    /*Bottom to top parallax*/
	    if (isset($args['background_display']) && $args['background_display'] == 'para-bottom') {
	    	array_push($attributes['class'], 'vertical_up');
	    	array_push($attributes['class'], 'orion-parallax');
	    }
	    /*Bottom to top parallax*/
	    if (isset($args['background_display']) && $args['background_display'] == 'para-top') {
	    	array_push($attributes['class'], 'vertical_down');
	    	array_push($attributes['class'], 'orion-parallax');
	    }	    
	    /*Bottom to top parallax*/
	    if (isset($args['background_display']) && $args['background_display'] == 'para-left') {
	    	array_push($attributes['class'], 'horizontal_left');
	    	array_push($attributes['class'], 'orion-parallax');
	    }
	    /*Bottom to top parallax*/
	    if (isset($args['background_display']) && $args['background_display'] == 'para-right') {
	    	array_push($attributes['class'], 'horizontal_right');
	    	array_push($attributes['class'], 'orion-parallax');
	    }
	    /* Additional style options
	    /*this isn't exactly for parallax, but just a fixed backround*/
	    if (isset($args['background_display']) && $args['background_display'] == 'fixed') {
	    	array_push($attributes['class'], 'fixed-bg');
	    }		  	    	    	    
	    return $attributes;   
	}
}	
add_filter('siteorigin_panels_row_style_attributes', 'orion_custom_row_style_attributes', 1, 2);

if(!function_exists('orion_add_row_stretch_style')) {
	function orion_add_row_stretch_style( $form_options, $fields ) {
		$form_options["row_stretch"]["options"]['standard-no-padding'] = esc_html__('Standard, no padding', 'dentalia');
		$form_options["row_stretch"]["options"]['padding-5'] = esc_html__('Stretched, with padding ', 'dentalia');
		return $form_options;
	}
}	
add_filter('siteorigin_panels_row_style_fields', 'orion_add_row_stretch_style', 10, 2);
		
if(!function_exists('orion_add_row_bg_styles')) {
	function orion_add_row_bg_styles( $form_options, $fields ) {
		//paralax styles
		$form_options['background_display']['options']['fixed'] = esc_html__('Fixed', 'dentalia');
		$form_options['background_display']['options']['para-bottom'] = esc_html__( 'Parallax Top to bottom', 'dentalia' );
		$form_options['background_display']['options']['para-top'] = esc_html__( 'Parallax Bottom to top', 'dentalia' );
		$form_options['background_display']['options']['para-left'] = esc_html__( 'Parallax Right to left', 'dentalia' );
		$form_options['background_display']['options']['para-right'] = esc_html__( 'Parallax Left to right', 'dentalia' );

		//additional styles: 
		$form_options['background_display']['options']['cover-center'] = esc_html__( 'Cover and Centered', 'dentalia' );
		$form_options['background_display']['options']['right-top'] = esc_html__( 'Align top-right', 'dentalia' );
		$form_options['background_display']['options']['right-bottom'] = esc_html__( 'Align bottom-right', 'dentalia' );
		$form_options['background_display']['options']['left-bottom'] = esc_html__( 'Align bottom-left', 'dentalia' );
		$form_options['background_display']['options']['left-top'] = esc_html__( 'Align top-left', 'dentalia' );
		$form_options['background_display']['options']['responsive-fit'] = esc_html__( 'Responsive Fit', 'dentalia' );
		$form_options['background_display']['options']['contain-left'] = esc_html__( 'Contain left', 'dentalia' );
		$form_options['background_display']['options']['contain-right'] = esc_html__( 'Contain right', 'dentalia' );
		return $form_options;
	}
}	
add_filter('siteorigin_panels_row_style_fields', 'orion_add_row_bg_styles', 10, 2);

/********************************************************************/
/*						Background positions						*/
/********************************************************************/
if(!function_exists('orion_dumprowdata')) {
	function orion_dumprowdata( $attributes, $args ) {
	 
	    if (isset($args['background_display'])) {

	    	$style_css = $attributes["style"];

	    	switch ($args['background_display']) {
	    		case 'right-top':
	    		$style_css .= 'background-position: right top; background-repeat: no-repeat;';
	    			break;
	    		case 'left-top':
	    		$style_css .= 'background-position: left top; background-repeat: no-repeat;';
	    			break;
	    		case 'right-bottom':
	    		$style_css .= 'background-position: right bottom; background-repeat: no-repeat;';
	    			break;
	    		case 'left-bottom':
	    		$style_css .= 'background-position: left bottom; background-repeat: no-repeat;';
	    			break;
	    		case 'responsive-fit':
	    		array_push($attributes['class'], 'responsive-fit');
	    			break;
	    		case 'contain-left':
	    		$style_css .= 'background-position: left bottom; background-repeat: no-repeat; background-size:contain;';
	    			break;
	    		case 'contain-right':
	    		$style_css .= 'background-position: right bottom; background-repeat: no-repeat; background-size:contain;';
	    			break;
	    		case 'cover-center':
	    		$style_css .= 'background-position: center center; background-repeat: no-repeat; background-size:cover;';
	    			break;
	    	}
	    	$attributes["style"] = $style_css;
	    }
		return $attributes; 	    
	}
}	
add_filter('siteorigin_panels_row_style_attributes', 'orion_dumprowdata', 20, 2);

/********************************************************************/
/*								Separators							*/
/********************************************************************/

function orion_separator_group( $groups ) {
    $groups['separators'] = array(
    	'name' => esc_html__('Separators', 'dentalia'),
   	 	'priority' => 30
    );
    return $groups;
}
add_filter( 'siteorigin_panels_row_style_groups', 'orion_separator_group', 2, 3 );

if(!function_exists('orion_separator_row_style_fields')) {
	function orion_separator_row_style_fields($fields) {

		$fields['separator_top'] = array(
	    	'name' => esc_html__('Top Separator', 'dentalia'),
	        'type' => 'select',
	        'group' => 'separators',
	        'description' => esc_html__('Will add a separator to the row.', 'dentalia'),
	        'default' => 'none',
	        'options' => array(
	        	'none' => esc_html__( 'No separator', 'dentalia' ),
	            'top-svg-1' => esc_html__( 'Small triangle', 'dentalia' ),
	            'top-svg-2' => esc_html__( 'Half circle', 'dentalia' ),
	            'top-svg-3' => esc_html__( 'Arc', 'dentalia' ),
	            'top-svg-4' => esc_html__( 'Zigzag', 'dentalia' ),
	            'top-svg-5' => esc_html__( 'Small waves', 'dentalia' ),
	            'top-svg-6' => esc_html__( 'Lift up', 'dentalia' ),
	            'top-svg-7' => esc_html__( 'Triangle', 'dentalia' ),
	            'top-svg-8' => esc_html__( 'Clouds', 'dentalia' ),	            
	        ),
	        'priority' =>  '100'
		);
		$fields['separator_top_position'] = array(
	    	'name' => esc_html__('Top Separator position', 'dentalia'),
	        'type' => 'select',
	        'group' => 'separators',
	        'description' => esc_html__('Will add a separator to the row.', 'dentalia'),
	        'default' => 'top-svg-inside',
	        'options' => array(
	            'top-svg-outside' => esc_html__( 'outside row', 'dentalia' ),
	            'top-svg-inside' => esc_html__( 'inside row', 'dentalia' ),
	        ),
	        'priority' =>  '101'
		);
		$fields['separator_top_color'] = array(
	    	'name'      => esc_html__('Top Separator color', 'dentalia'),
	        'type' 		=> 'color',
	        'group'     => 'separators',
	        'description' => esc_html__('Choose a color', 'dentalia'),
	        'priority' =>  '101'
		);		
		$fields['separator_bottom'] = array(
	    	'name'        => esc_html__('Bottom Separator', 'dentalia'),
	        'type' => 'select',
	        'group'       => 'separators',
	        'description' => esc_html__('Will add a separator to the row.', 'dentalia'),
	        'default' => 'none',
	        'options' => array(
	        	'none' => esc_html__( 'No separator', 'dentalia' ),
	            'bottom-svg-1' => esc_html__( 'Arrow', 'dentalia' ),
	            'bottom-svg-2' => esc_html__( 'Half circle', 'dentalia' ),
	            'bottom-svg-3' => esc_html__( 'Arc', 'dentalia' ),
	            'bottom-svg-4' => esc_html__( 'Zigzag', 'dentalia' ),
	            'bottom-svg-5' => esc_html__( 'Small waves', 'dentalia' ),
	            'bottom-svg-6' => esc_html__( 'Lift', 'dentalia' ),
	            'bottom-svg-7' => esc_html__( 'Triangle', 'dentalia' ),
	            'bottom-svg-8' => esc_html__( 'Clouds', 'dentalia' ),
	        ),
	        'priority' =>  '102'
		);
		$fields['separator_bottom_position'] = array(
	    	'name'      => esc_html__('Bottom Separator position', 'dentalia'),
	        'type' 		=> 'select',
	        'group'     => 'separators',
	        'description' => esc_html__('Will add a separator to the row.', 'dentalia'),
	        'default' => 'bottom-svg-inside',
	        'options' => array(
	            'bottom-svg-outside' => esc_html__( 'outside row', 'dentalia' ),
	            'bottom-svg-inside' => esc_html__( 'inside row', 'dentalia' ),
	        ),
	        'priority' =>  '103'
		);	
		$fields['separator_bottom_color'] = array(
	    	'name'      => esc_html__('Bottom Separator color', 'dentalia'),
	        'type' 		=> 'color',
	        'group'     => 'separators',
	        'description' => esc_html__('Choose a color', 'dentalia'),
	        'priority' =>  '103'
		);	
	return $fields;
	}
}
add_filter( 'siteorigin_panels_row_style_fields', 'orion_separator_row_style_fields', 10, 2 );

if(!function_exists('custom_row_style_attributes')) {
	function custom_row_style_attributes( $attributes, $args ) {
		if ( (!empty($args['separator_top']) && $args['separator_top']!= 'none') || (!empty($args['separator_bottom']) && $args['separator_bottom']!= 'none' )) {
			array_push($attributes['class'], 'orion-separator');
		}
	    if( !empty( $args['separator_top'] ) && ($args['separator_top']!= 'none') ) {
	        array_push($attributes['class'], $args['separator_top']);
	        array_push($attributes['class'], $args['separator_top_position']);
	    } 
	    if( !empty( $args['separator_bottom'] ) && ($args['separator_bottom']!= 'none') ) {   
	        array_push($attributes['class'], $args['separator_bottom']);
	        array_push($attributes['class'], $args['separator_bottom_position']);
	    }
	    if( !empty( $args['separator_bottom_color'] ) && ($args['separator_bottom_color']!= 'none') ) {   
	        $attributes['data-svg-bottom-color'] = $args['separator_bottom_color'];	        
	    }
	    if( !empty( $args['separator_top_color'] ) && ($args['separator_top_color']!= 'none') ) {   
	        $attributes['data-svg-top-color'] = $args['separator_top_color'];
	    }
	    return $attributes;
	}
}	
add_filter('siteorigin_panels_row_style_attributes', 'custom_row_style_attributes', 10, 2);

/********************************************************************/
/*							Responsive options  					*/
/********************************************************************/

function orion_responsive_group( $groups ) {
    $groups['responsive'] = array(
    	'name' => esc_html__('Responsive options', 'dentalia'),
   	 	'priority' => 31
    );
    return $groups;
}
add_filter( 'siteorigin_panels_row_style_groups', 'orion_responsive_group', 2, 3 );

if(!function_exists('orion_responsive_row_style_fields_responsive_options')) {
	function orion_responsive_row_style_fields_responsive_options($fields) {
		$fields['mobile'] = array(
		    	'name'        => esc_html__('Mobile display', 'dentalia'),
		        'type' => 'select',
		        'group'       => 'responsive',
		        'description' => esc_html__('Defines behaviour of the row on small (mobile) displays.', 'dentalia'),
		        'default' => 'mobile-1-in-row',
		        'options' => array(
		        	'mobile-default' => esc_html__( 'Default', 'dentalia' ),
		        	'mobile-1-in-row' => esc_html__( '1 column', 'dentalia' ),
		            'mobile-2-in-row' => esc_html__( '2 columns', 'dentalia' ),
		            'hidden-xs' => esc_html__( 'Hide', 'dentalia' ),
		        ),
		        'priority' =>  '100'
		);
		$fields['tablet'] = array(
		    	'name'      => esc_html__('Tablet display', 'dentalia'),
		        'type' 		=> 'select',
		        'group'     => 'responsive',
		        'description' => esc_html__('Defines behaviour of the row on medium size devices.', 'dentalia'),
		        'default' => 'tablet-default',
		        'options' => array(
		            'tablet-default' => esc_html__( 'Same as desktop', 'dentalia' ),
		            'tablet-1-in-row' => esc_html__( '1 column', 'dentalia' ),
		            'tablet-2-in-row' => esc_html__( '2 column', 'dentalia' ),
		            'tablet-3-in-row' => esc_html__( '3 column', 'dentalia' ),
		            'tablet-4-in-row' => esc_html__( '4 column', 'dentalia' ),
		            'hidden-sm' => esc_html__( 'Hide', 'dentalia' ),
		        ),
		        'priority' =>  '101'
		);
		$fields['desktop'] = array(
		    	'name'      => esc_html__('Desktop display', 'dentalia'),
		        'type' 		=> 'select',
		        'group'     => 'responsive',
		        'description' => esc_html__('Defines behaviour of the row on Desktop devices.', 'dentalia'),
		        'default' => 'desktop-default',
		        'options' => array(
		            'desktop-default' => esc_html__( 'Default', 'dentalia' ),
		            'desktop-1-in-row' => esc_html__( '1 column', 'dentalia' ),
		            'desktop-2-in-row' => esc_html__( '2 column', 'dentalia' ),
		            'desktop-3-in-row' => esc_html__( '3 column', 'dentalia' ),
		            'desktop-4-in-row' => esc_html__( '4 column', 'dentalia' ),
		            'hidden-md-lg' => esc_html__( 'Hide', 'dentalia' ),
		        ),
		        'priority' =>  '102'
		);
		$fields['full_width_small'] = array(
		  'name'        => esc_html__('Remove margins on mobile devices', 'dentalia'),
		  'type'        => 'checkbox',
		  'group'       => 'responsive',
		  'description' => esc_html__('Stretches the content on small devices.', 'dentalia'),
		  'priority'    => 103,
		);
		$fields['full_width_tablets'] = array(
		  'name'        => esc_html__('Remove margins on tablets', 'dentalia'),
		  'type'        => 'checkbox',
		  'group'       => 'responsive',
		  'description' => esc_html__('Stretches the content on Tablets.', 'dentalia'),
		  'priority'    => 103,
		);
	return $fields;
	}
}
add_filter( 'siteorigin_panels_row_style_fields', 'orion_responsive_row_style_fields_responsive_options', 10, 2 );

if(!function_exists('orion_custom_row_style_attributes_responsive_options')) {
	function orion_custom_row_style_attributes_responsive_options( $attributes, $args ) {
		if (!empty($args['tablet']) && $args['tablet']!= 'none') {
			array_push($attributes['class'], $args['tablet']);
		}
		if (!empty($args['mobile']) && $args['mobile']!= 'none') {
			array_push($attributes['class'], $args['mobile']);
		}
		if (!empty($args['desktop']) && $args['desktop']!= 'none') {
			array_push($attributes['class'], $args['desktop']);
		}		
		if (!empty($args['full_width_small']) && $args['full_width_small']== 'true') {
			array_push($attributes['class'], 'full-width-on-small-devices');
		}
		if (!empty($args['full_width_tablets']) && $args['full_width_tablets']== 'true') {
			array_push($attributes['class'], 'full-width-on-tablets');
		}		
	    return $attributes;
	}
}	
add_filter('siteorigin_panels_row_style_attributes', 'orion_custom_row_style_attributes_responsive_options', 10, 2);


/********************************************************************/
/*						END Responsive options  					*/
/********************************************************************/
/********************************************************************/
/*						Row Position  								*/
/********************************************************************/

if(!function_exists('orion_row_position')) {
	function orion_row_position($fields) {

		$fields['row_position'] = array(
	    	'name'      => esc_html__('Row Position', 'dentalia'),
	        'type' 		=> 'select',
	        'group'     => 'layout',
	        'description' => esc_html__('Change row position.', 'dentalia'),
	        'default' => 'default',
	        'options' => array(
	            'default' => esc_html__( 'Default', 'dentalia' ),
	            'push-up-row' => esc_html__( 'Push up 100%', 'dentalia' ),		            
	            'row-divide' => esc_html__( 'Push up 50%', 'dentalia' ),
	            'push-up-120' => esc_html__( 'Push up 120px', 'dentalia' ),
	            'push-up-60' => esc_html__( 'Push up 60px', 'dentalia' ),
	        ),
	        'priority' =>  100,
		);
		return $fields;
	}
}
add_filter('siteorigin_panels_row_style_fields', 'orion_row_position', 10, 2);

function orion_row_position_class( $attributes, $args ) {
    if( !empty( $args['row_position'] ) && $args['row_position'] != 'default' ) {
        array_push($attributes['class'], $args['row_position']);
    }
    return $attributes;
}

add_filter('siteorigin_panels_row_style_attributes', 'orion_row_position_class', 10, 2);
/********************************************************************/
/*						Equal Height  								*/
/********************************************************************/

/* new */

if(!function_exists('orion_equal_height_layout_options')) {
	function orion_equal_height_layout_options($fields) {
		$fields['cell_alignment']['options']['equal_height'] = esc_html__( 'Equal Height', 'dentalia' );
		return $fields;
	}
}
add_filter('siteorigin_panels_row_style_fields', 'orion_equal_height_layout_options', 10, 2);

function orion_equal_height_class_layout( $attributes, $args ) {
    if( !empty( $args['cell_alignment'] ) && $args['cell_alignment'] == 'equal_height' ) {
        array_push($attributes['class'], 'orion-equal-height');
    }
    return $attributes;
}
add_filter('siteorigin_panels_row_style_attributes', 'orion_equal_height_class_layout', 10, 2);

/* end new */

/* left for backward compatibility */
function orion_equal_height_class( $attributes, $args ) {
    if( !empty( $args['equal_height'] ) && $args['equal_height'] != 'default' ) {
        array_push($attributes['class'], $args['equal_height']);
    }
    return $attributes;
}
add_filter('siteorigin_panels_row_style_attributes', 'orion_equal_height_class', 10, 2);

/********************************************************************/
/*						Full screen option 	(row)					*/
/********************************************************************/

function orion_fullscreen_checkbox($fields) {
  $fields['full_screen'] = array(
      'name'        => esc_html__('Full screen row height', 'dentalia'),
      'type'        => 'checkbox',
      'group'       => 'layout',
      'description' => esc_html__('Set height of the row to height of the screen.', 'dentalia'),
      'priority'    => 101,
  );
  return $fields;
}
add_filter( 'siteorigin_panels_row_style_fields', 'orion_fullscreen_checkbox', 10, 2);

function orion_fullscreen_layout( $attributes, $args ) {
    if( !empty( $args['full_screen'] ) && $args['full_screen'] == '1' ) {
        array_push($attributes['class'], 'full-screen-row');
    }
    return $attributes;
}
add_filter('siteorigin_panels_row_style_attributes', 'orion_fullscreen_layout', 10, 2);

/********************************************************************/
/*						text color / rows   						*/
/********************************************************************/

if(!function_exists('orion_row_text_style')) {
	function orion_row_text_style($fields) {

		$fields['text_style'] = array(
	    	'name'      => esc_html__('Text color', 'dentalia'),
	        'type' 		=> 'select',
	        'group'     => 'design',
	        'description' => esc_html__('Text color.', 'dentalia'),
	        'default' => 'default',
	        'options' => array(
	            'default' => esc_html__( 'Default', 'dentalia' ),
	            'text-dark' => esc_html__( 'Dark text', 'dentalia' ),
	            'text-light' => esc_html__( 'Light text', 'dentalia' ),
	        ),
	        'priority' =>  '101'
		);
		return $fields;
	}
}
add_filter('siteorigin_panels_row_style_fields', 'orion_row_text_style', 10, 2);

function orion_row_text_style_class( $attributes, $args ) {
    if( !empty( $args['text_style'] ) && $args['text_style'] != 'default' ) {
        array_push($attributes['class'], $args['text_style']);
    }
    return $attributes;
}
add_filter('siteorigin_panels_row_style_attributes', 'orion_row_text_style_class', 10, 2);

/********************************************************************/
/*						text color / Widget  						*/
/********************************************************************/

add_filter('siteorigin_panels_widget_style_fields', 'orion_row_text_style', 10);

function orion_cell_text_style_class( $attributes, $args) {
	if (!empty($args["text_style"])) {
		$add_class = $args["text_style"];
		$attributes['class'][] = $add_class;
	}
	return $attributes;
}
add_filter('siteorigin_panels_widget_style_attributes', 'orion_cell_text_style_class', 20, 2);


/********************************************************************/
/*						Center on mobile / Widget  						*/
/********************************************************************/

if(!function_exists('orion_text_center_on_mobile')) {
	function orion_text_center_on_mobile($fields) {

		$fields['center_on_mobile'] = array(
		    	'name'      => esc_html__('Align to center on Mobile', 'dentalia'),
		        'type' 		=> 'checkbox',
		        'group'     => 'layout',
		        'default' => false,
		        'priority' =>  '101'
		);
		$fields['center_on_tablets'] = array(
		    	'name'      => esc_html__('Align to center on Tablets', 'dentalia'),
		        'type' 		=> 'checkbox',
		        'group'     => 'layout',
		        'default' => false,
		        'priority' =>  '101'
		);		
		return $fields;
	}
}
add_filter('siteorigin_panels_widget_style_fields', 'orion_text_center_on_mobile', 10, 2);

function orion_text_center_mobile_html_class( $attributes, $args ) {
    if( !empty($args['center_on_mobile']) && $args['center_on_mobile'] == true ) {
	    $attributes['class'][] = 'mobile-text-center';
    }
    if( !empty($args['center_on_tablets']) && $args['center_on_tablets'] == true ) {
	    $attributes['class'][] = 'tablets-text-center';
    }    
    return $attributes;
}

add_filter('siteorigin_panels_widget_style_attributes', 'orion_text_center_mobile_html_class', 11, 2);


/********************************************************************/
/*					shadows and borders / Widget  					*/
/********************************************************************/

if(!function_exists('orion_widget_shadow')) {
	function orion_widget_shadow($fields) {

		$fields['widget_shadow'] = array(
		    	'name'      => esc_html__('Drop Shadow Effect', 'dentalia'),
		        'type' 		=> 'select',
		        'group'     => 'design',
		        'description' => esc_html__('Add shadow to an element.', 'dentalia'),
		        'default' => 'none',
		        'options' => array(
		            'none' => esc_html__( 'None', 'dentalia' ),
		            'shadow-1' => esc_html__( 'Raised Box', 'dentalia' ),
		            'shadow-2' => esc_html__( 'Lifted Corners', 'dentalia' ),
		            'shadow-3' => esc_html__( 'Horizontal Curves', 'dentalia' ),
		        ),
		        'priority' =>  '101'
		);

		$fields['widget_border_radius'] = array(
		    	'name'      => esc_html__('Border radius', 'dentalia'),
		        'type' => 'measurement',
		        'group'     => 'design',
		        'label' => esc_html__( 'Add rounded quarners', 'dentalia' ),
		        'priority' =>  '15'
		);
		return $fields;
	}
}
add_filter('siteorigin_panels_widget_style_fields', 'orion_widget_shadow', 10, 2);

function orion_cell_shadow_class( $attributes, $args) {
	if (!empty($args["widget_shadow"]) && $args["widget_shadow"]!= 'none') {
		$add_class = $args["widget_shadow"];
		$attributes['class'][] = $add_class;

		if ($args["widget_shadow"] == 'shadow-2' || $args["widget_shadow"] == 'shadow-3') { 
			$style_css = $attributes["style"];
			preg_match("/background-color:(.*?);/", $style_css, $preg_match_result);
			if( count( $preg_match_result ) == 0 ) {
				// add bg color:
				$style_css .= 'background-color: #fff;';
		    }		
		    $attributes["style"] = $style_css;	
	    }	
	}
	if (!empty($args["widget_border_radius"]) && $args["widget_border_radius"] != 0) {
		$style_css = $attributes["style"];
		$style_css .= 'border-radius:' .$args["widget_border_radius"] .';';
		$attributes["style"] = $style_css;
	}	
	return $attributes;
}

add_filter('siteorigin_panels_widget_style_attributes', 'orion_cell_shadow_class', 20, 2);

/********************************************************************/
/*						remove cell side padding					*/
/********************************************************************/
if(!function_exists('orion_remove_side_padding_mobile')) {
	function orion_remove_side_padding_mobile($fields) {

		$fields['remove_padding_mobile'] = array(
	    	'name'      => esc_html__('Remove side padding on small devices', 'dentalia'),
	        'type' 		=> 'checkbox',
	        'group'     => 'layout',
	        'default' => false,
	        'priority' =>  '101'
		);
		$fields['remove_margin_mobile'] = array(
	    	'name'      => esc_html__('Remove side margin on small devices', 'dentalia'),
	        'type' 		=> 'checkbox',
	        'group'     => 'layout',
	        'default' => false,
	        'priority' =>  '101'
		);		

		return $fields;
	}
}
add_filter('siteorigin_panels_widget_style_fields', 'orion_remove_side_padding_mobile', 10, 2);

function orion_remove_side_padding_mobile_html_class( $attributes, $args ) {
    if( !empty($args['remove_padding_mobile']) && $args['remove_padding_mobile'] == true ) {
	    $attributes['class'][] = 'remove-padding-mobile';
    }
    if( !empty($args['remove_margin_mobile']) && $args['remove_margin_mobile'] == true ) {
	    $attributes['class'][] = 'remove-margin-mobile';
    }    
    return $attributes;
}
add_filter('siteorigin_panels_widget_style_attributes', 'orion_remove_side_padding_mobile_html_class', 11, 2);

/********************************************************************/
/*						Absolute positions 							*/
/********************************************************************/

if(!function_exists('orion_widget_absolute_position')) {
	function orion_widget_absolute_position($fields) {
		
		$fields['absolute'] = array(
		    	'name'      => esc_html__('Overlap Row', 'dentalia'),
		        'type' 		=> 'select',
		        'group'     => 'layout',
		        'default' => '',
		        'options' => array(
		            '' => esc_html__( 'None', 'dentalia' ),
		            'absolute-bottom-left' => esc_html__( 'Left', 'dentalia' ),
		            'absolute-bottom-center' => esc_html__( 'Center', 'dentalia' ),
		            'absolute-bottom-right' => esc_html__( 'right', 'dentalia' ),
		        ),
		        'priority' =>  '111'
		);
		return $fields;
	}
}
add_filter('siteorigin_panels_widget_style_fields', 'orion_widget_absolute_position', 10, 2);

function orion_widget_absolute_position_class( $attributes, $args ) {
    if( !empty($args['absolute']) && $args['absolute'] != '' ) {
	    $attributes['class'][] = 'absolute-bottom';
	    $attributes['class'][] = $args['absolute'];
    }
    return $attributes;
}
add_filter('siteorigin_panels_widget_style_attributes', 'orion_widget_absolute_position_class', 11, 2);

/********************************************************************/
/*						Panel Row overlay 							*/
/********************************************************************/

if(!function_exists('orion_row_overlay')) {
	function orion_row_overlay($fields) {

		$fields['row_overlay'] = array(
		    	'name'      => esc_html__('Overlay', 'dentalia'),
		        'type' 		=> 'select',
		        'group'     => 'design',
		        'description' => esc_html__('Lighten or Darken background.', 'dentalia'),
		        'default' => 'default',
		        'options' => array(
		            'default' => esc_html__( 'None', 'dentalia' ),
		            'overlay-dark' => esc_html__( 'Dark Overlay', 'dentalia' ),
		            'overlay-light' => esc_html__( 'Light Overlay', 'dentalia' ),
		            'overlay-c1' => esc_html__( 'Main theme color', 'dentalia' ),
		            'overlay-c2' => esc_html__( 'Secondary theme color', 'dentalia' ),
		            'overlay-c3' => esc_html__( 'Tertiary theme color', 'dentalia' ),
		            'overlay-c2-c1' => esc_html__( 'Gradient 1', 'dentalia' ),		            
		            'overlay-c1-c2' => esc_html__( 'Gradient 2', 'dentalia' ),
		            'overlay-c1-t' => esc_html__( 'Primary to Transparent', 'dentalia' ),
		            'overlay-c2-t' => esc_html__( 'Secondary to Transparent', 'dentalia' ),
		            'overlay-c3-t' => esc_html__( 'Tertiary to Transparent', 'dentalia' ),
		        ),
		        'priority' =>  '10'
		);
		return $fields;
	}
}
add_filter('siteorigin_panels_row_style_fields', 'orion_row_overlay', 10, 2);
add_filter('siteorigin_panels_cell_style_fields', 'orion_row_overlay', 10, 2);

function orion_row_overlay_html_class( $attributes, $args ) {

    if( !empty( $args['row_overlay'] ) && $args['row_overlay'] != 'default' ) {
        array_push($attributes['class'], $args['row_overlay']);
    }
    return $attributes;
}
add_filter('siteorigin_panels_row_style_attributes', 'orion_row_overlay_html_class', 10, 2);
add_filter('siteorigin_panels_cell_style_attributes', 'orion_row_overlay_html_class', 10, 2);
/********************************************************************/
/*						Cell BG Opacity 							*/
/********************************************************************/

if(!function_exists('orion_bg_opacity_field')) {
	function orion_bg_opacity_field($fields) {

		$fields['bg_opacity'] = array(
		    	'name'      => esc_html__('Background opacity', 'dentalia'),
		        'type' 		=> 'text',
		        'group'     => 'design',
		        'description' => esc_html__('Must be a number between 1 and 100. 1 is almost transparent, 100 is opaque.', 'dentalia'),
		        'default' => 100,
		        'priority' =>  '5'
		);
		return $fields;
	}
}
add_filter('siteorigin_panels_widget_style_fields', 'orion_bg_opacity_field', 10, 2);

function orion_cell_bg_color( $attributes, $args) {
	if (!empty($args['background']) && !empty($args['bg_opacity']) && intval($args['bg_opacity']) > 0 && intval($args['bg_opacity']) < 100 ) {
		preg_match("/background-color:(.*?);/", $attributes["style"], $preg_match_result);
		if( count( $preg_match_result ) > 0 ) {
			// get color:
	        $color_to_replace = $preg_match_result[1];
			$opacity_100 = intval(preg_replace('/[^0-9]+/', '', $args['bg_opacity']), 10);

			if( count( $opacity_100 ) > 0 ) {
				if ($opacity_100 != '' && $opacity_100 != '0') {
					$opacity = intval($opacity_100) / 100;
				} else {
					$opacity = 100;
				}
				$color_rgba = orion_hextorgba($color_to_replace, $opacity);

		        // set background color with rgba value
		        $attributes["style"] = str_replace('background-color:' . $color_to_replace, 'background-color:'.$color_rgba, $attributes["style"]);
			}
	    }
	}
	return $attributes;
}
add_filter('siteorigin_panels_widget_style_attributes', 'orion_cell_bg_color', 20, 2);

/********************************************************************/
/*						basic widget class  						*/
/********************************************************************/

function orion_panels_cell( $attributes, $args ) {
	array_push($attributes['class'], 'orion');
	return $attributes; 
}
add_filter('siteorigin_panels_widget_style_attributes', 'orion_panels_cell', 10, 2);

/********************************************************************/
/*				Remove SO premium refferences  						*/
/********************************************************************/

add_filter( 'siteorigin_premium_upgrade_teaser', '__return_false' );

/********************************************************************/
/*				add a field multiple media upload					*/
/********************************************************************/

// experimental features
$orion_experimental = false;

function orion_widgets_collection_folder($folders){
	$folders[] = get_template_directory(). '/framework/so-fields/';
	return $folders;
} 

function orion_fields_class_prefixes( $class_prefixes ) {
	$class_prefixes[] = 'Orion_';
	return $class_prefixes;
}

function orion_fields_class_paths( $class_paths ) {
	$class_paths[] = get_template_directory(). '/framework/so-fields/';
	return $class_paths;
}

if ($orion_experimental = true) {
	add_filter('siteorigin_widgets_widget_folders', 'orion_widgets_collection_folder');
	add_filter('siteorigin_widgets_field_class_prefixes', 'orion_fields_class_prefixes');
	add_filter('siteorigin_widgets_field_class_paths', 'orion_fields_class_paths');
}

/********************************************************************/
/*						Force Collapse on medium screens			*/
/********************************************************************/

if(!function_exists('force_collapse_medium')) {
	function force_collapse_medium($form_options, $fields) {
	$form_options["collapse_behaviour"]["options"]["collapse_below_lg"] = esc_html__('Force Collapse on medium screens', 'dentalia');
		return $form_options;
	}
}
add_filter('siteorigin_panels_row_style_fields', 'force_collapse_medium', 10, 2);

/* collapse if not screen-lg */
if(!function_exists('orion_collapse_lg_row_style_attributes')) {
	function orion_collapse_lg_row_style_attributes( $attributes, $args ) {
		
		if (!empty($args["collapse_behaviour"]) && $args['collapse_behaviour'] == 'collapse_below_lg') {
		array_push( $attributes['class'], 'orion-collapse-below-lg');
		}
	    return $attributes;
	}
}	
add_filter('siteorigin_panels_row_style_attributes', 'orion_collapse_lg_row_style_attributes', 10, 2);

/********************************************************************/
/*						SO settings 	  							*/
/********************************************************************/

// Add dentalia Widgets to Siteorigin Panels
function orion_add_widget_tabs_to_siteorigin ($tabs) {
    $tabs[] = array(
        'title' => esc_html__('OrionThemes', 'dentalia'),
        'filter' => array(
            'groups' => array('dentalia')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'orion_add_widget_tabs_to_siteorigin', 10);