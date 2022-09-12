<?php 

/*
Widget Name: @OrionThemes Working Hours
Description: Displays Working hours
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_working_hours_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_working_hours_w',
			esc_html__('@Orion Working Hours', 'dentalia'),
			array(
				'description' => esc_html__('Displays opening hours.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-clock',
			),
			array(

			),
			array(
			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Widget Title', 'dentalia'),
					'default' => 'Opening Hours',			        
			    ),	    
			    'monday' => array(
			        'type' => 'text',
			        'label' => esc_html__('Monday', 'dentalia'),
					'default' => '8:00 - 16:00',
			    ),	
			    'tuesday' => array(
			        'type' => 'text',
			        'label' => esc_html__('Tuesday', 'dentalia'),
					'default' => '8:00 - 16:00',
			    ),
			    'wednesday' => array(
			        'type' => 'text',
			        'label' => esc_html__('Wednesday', 'dentalia'),
					'default' => '8:00 - 16:00',		        
			    ),	
			    'thursday' => array(
			        'type' => 'text',
			        'label' => esc_html__('Thursday', 'dentalia'),
					'default' => '8:00 - 16:00',			        
			    ),		
			    'friday' => array(
			        'type' => 'text',
			        'label' => esc_html__('Friday', 'dentalia'),
					'default' => '8:00 - 16:00',			        
			    ),	
			    'saturday' => array(
			        'type' => 'text',
			        'label' => esc_html__('Saturday', 'dentalia'),
					'default' => '8:00 - 13:00',			        
			    ),	
			    'sunday' => array(
			        'type' => 'text',
			        'label' => esc_html__('Sunday', 'dentalia'),
			    ),
			    'lunch_break' => array(
			        'type' => 'text',
			        'label' => esc_html__('Lunch Break', 'dentalia'),
			    ),
	 			'divider_whw_01' => array(
           				'type' => 'oriondivider',
            	),			    
				'text_color_class' => array(
					'type' => 'select',
					'label' => esc_html__( 'Text Color', 'dentalia' ),
					'default' => 'text-default',
					'options' => array(
					'text-default' => esc_html__( 'Default', 'dentalia' ),
					'text-light' => esc_html__( 'Light text', 'dentalia' ),
					'text-dark' => esc_html__( 'Dark text', 'dentalia' ),
					)
				),
				'week_starts_with' => array(
					'type' => 'select',
					'label' => esc_html__( 'Week starts with:', 'dentalia' ),
					'default' => 'monday',
					'options' => array(
					'monday' => esc_html__( 'Monday', 'dentalia' ),
					'sunday' => esc_html__( 'Sunday', 'dentalia' ),
					'saturday' => esc_html__( 'Saturday', 'dentalia' ),
					)
				),				

			   'style_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Settings' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'text_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Text color', 'dentalia' ),
					        'default' => ''
					    ),
						'current_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Current day color', 'dentalia' ),
					        'default' => '',
					    ),			        	
						'bg_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Background color', 'dentalia' ),
					        'default' => '',
					    ),
					    'bg_opacy' => array(
					        'type' => 'slider',
					        'label' => esc_html__( 'Background color opacity', 'dentalia' ),
					        'default' => 100,
					        'min' => 1,
					        'max' => 100,
					        'integer' => true,
					    ),
					    'has_border' => array(
					        'type' => 'checkbox',
					        'label' => esc_html__( 'Display borders', 'dentalia' ),
					        'default' => false
					    )
					),
				),
			   'translations_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Translations' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
					    'monday' => array(
					        'type' => 'text',
					        'label' => esc_html__('Monday', 'dentalia'),
							'default' => 'Monday',
					    ),	
					    'tuesday' => array(
					        'type' => 'text',
					        'label' => esc_html__('Tuesday', 'dentalia'),
							'default' => 'Tuesday',
					    ),
					    'wednesday' => array(
					        'type' => 'text',
					        'label' => esc_html__('Wednesday', 'dentalia'),
							'default' => 'Wednesday',		        
					    ),	
					    'thursday' => array(
					        'type' => 'text',
					        'label' => esc_html__('Thursday', 'dentalia'),
							'default' => 'Thursday',			        
					    ),		
					    'friday' => array(
					        'type' => 'text',
					        'label' => esc_html__('Friday', 'dentalia'),
							'default' => 'Friday',			        
					    ),	
					    'saturday' => array(
					        'type' => 'text',
					        'label' => esc_html__('Saturday', 'dentalia'),
							'default' => 'Saturday',			        
					    ),	
					    'sunday' => array(
					        'type' => 'text',
					        'label' => esc_html__('Sunday', 'dentalia'),
					        'default' => 'Sunday',
					    ),
					    'lunch_break' => array(
					        'type' => 'text',
					        'label' => esc_html__('Lunch Break', 'dentalia'),
					        'default' => 'Lunch Break',
					    ),					    
					),
				), 			   
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_working_hours_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_working_hours_w', __FILE__, 'orion_working_hours_w');