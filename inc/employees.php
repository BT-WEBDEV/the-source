<?php
// Register Custom Post Type
function gka_theme_employees_post_type() {

	$labels = array(
		'name'                  => __( 'Employees', 'custom-post-type-ui' ),
		'singular_name'         => __( 'Employee', 'custom-post-type-ui' ),
	);

	$args = array(
		'label'                 => __( 'Employees', 'custom-post-type-ui' ),
		'labels'                => $labels,
		"description" 			=> "",
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		"show_in_rest" 			=> true,
		"rest_base" 			=> "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		'has_archive'           => false,
		'show_in_menu'          => true,
		"show_in_nav_menus" 	=> true,
		"delete_with_user" 		=> false,
		'exclude_from_search'   => false,
		'capability_type'       => 'post',
		"map_meta_cap" 			=> true,
		"hierarchical"			=> false,
		"rewrite" 				=> [ "slug" => "employees", "with_front" => true ],
		"query_var" 			=> true,
		'menu_icon' 			=> 'dashicons-groups',
		'supports'              => array( 'title','editor','thumbnail' ),
		'menu_position'         => 25,
		
	);
	register_post_type( 'employees', $args );
}

add_action( 'init', 'gka_theme_employees_post_type' );

// Register Custom Fields
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'employees_group',
		'title' => 'Empolyee Information',
		'fields' => array(
			array(
				'key' => 'employee_field_title',
				'label' => 'Title',
				'name' => 'employee_title',
				'type' => 'text',
			),
			array(
				'key' => 'employee_field_email',
				'label' => 'Email',
				'name' => 'employee_email',
				'type' => 'email',
			),
			array(
				'key' => 'employee_field_phone',
				'label' => 'Phone Number',
				'name' => 'employee_phone',
				'type' => 'text',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'employees',
				),
			),
		),
	));
	
endif;