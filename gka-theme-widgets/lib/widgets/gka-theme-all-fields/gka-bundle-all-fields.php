<?php
/*
* Widget Name: (GKA) All Fields
* Description: Development Library for Widgets
* Author: GKA Creative Agency
* Author URI: https://gkaadvertising.com/
*/

class GKA_Theme_All_Fields_Widget extends SiteOrigin_Widget {

    function __construct() {

		parent::__construct(
			'gka-theme-all-fields',
			__('(GKA) All Fields', 'gka-theme-widgets'),
			array(
				'description' => __('Development Library for Widgets.', 'gka-theme-widgets'),
				'help' => 'https://siteorigin.com/widgets-bundle/editor-widget/'
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
        );
        
    }
    
    function get_widget_form() {

		// Gets taxonomy objects and extracts the 'label' field from each one.
		$categories = wp_list_pluck( get_categories( array('orderby' => 'term_id', 'order'   => 'ASC') ), 'name', 'term_id' );

        return array(
			'textfield' => array(
				'type' => 'text',
				'label' => __('Textfield', 'gka-theme-widgets'),
			),
			'textarea' => array(
				'type' => 'textarea',
				'label' => __('Textarea', 'gka-theme-widgets'),
				'row' => 2,
				'hidden' => true,
			),
			'number' => array(
				'type' => 'number',
				'label' => __('Number', 'gka-theme-widgets'),
				'default' => false,
			),
			'select' => array(
				'type'    => 'select',
				'label'   => __( 'Select', 'gka-theme-widgets' ),
				'options' => $categories,
			),
			'checkbox' => array(
				'type' => 'checkbox',
				'label' => __('Checkbox', 'gka-theme-widgets'),
				'default' => true,
			),
			'link' => array(
				'type' => 'link',
				'label' => __('Link', 'gka-theme-widgets'),
			),
			'media' => array(
				'type' => 'media',
				'label' => __('Media', 'gka-theme-widgets'),
				'library' => 'image',
				'fallback' => false,
			),
			'section' => array(
				'type' => 'section',
				'label' => __('Section', 'gka-theme-widgets'),
				'hide' => 'true',
				'fields' => array(
					'textfield' => array(
						'type' => 'text',
						'label' => __('Textfield', 'gka-theme-widgets'),
					),
				),
			),
			'repeater' => array(
				'type' => 'repeater',
				'label' => __( 'Repeater', 'gka-theme-widgets' ),
				'item_name' => __('Item', 'gka-theme-widgets'),
				'item_label' => array(
					'selector' => "[id*='repeater-title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'textfield' => array(
						'type' => 'text',
						'label' => __('Textfield', 'gka-theme-widgets'),
					),
				),
			),
        );
    }

    public function get_template_variables( $instance, $args ) {
		// Return your instance value here
        return array(
			'textfield' => $instance['textfield'],
		);
	}
	
	function get_template_name($instance) {
		// Return template file name without file extension e.g. return 'hello-world-template';
        return false;
	}
	
	function get_style_name($instance) {
		// Return template file name without file extension e.g. return 'style';
        return false;
	}
	
}

siteorigin_widget_register( 'gka-theme-all-fields', __FILE__, 'GKA_Theme_All_Fields_Widget' );