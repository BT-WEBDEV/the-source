<?php
$gallery_list = gka_theme_get_gallery_list();
$choices = array();
foreach ($gallery_list as $key => $value) {
    $choices += [$value->gid => $value->gid . " | " . $value->title];
}

// Register Custom Slider Fields
if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
		'key' => 'gka_theme_slider_group',
		'title' => 'Slider',
		'fields' => array(
			array(
				'key' => 'gka_theme_slider_field',
				'label' => 'Select Slider',
				'name' => 'gka_theme_slider',
				'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
				'wrapper' => array(
					'width' => 50,
					'class' => '',
					'id' => '',
				),
                'choices' => $choices,
				'default_value' => false,
                'allow_null' => 1,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => 'No Slider',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'packages',
                ),
            ),
		),
		'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
	));
	
endif;

function gka_theme_get_gallery($id) {
	global $wpdb;
	$result = $wpdb->get_results("	SELECT 	pictures.pid,
											pictures.description,
											pictures.alttext,
											pictures.filename,
											gallery.path,
											MAX(
												CASE 
													WHEN field.fid = 4 
													THEN field.field_value
													ELSE NULL 
												END
											) AS 'title',
											MAX(
												CASE 
													WHEN field.fid = 5 
													THEN field.field_value
													ELSE NULL 
												END
											) AS 'CTA',
											MAX(
												CASE 
													WHEN field.fid = 6 
													THEN field.field_value
													ELSE NULL 
												END
											) AS 'link'
									FROM {$wpdb->prefix}ngg_pictures AS pictures 
									INNER JOIN {$wpdb->prefix}ngg_gallery AS gallery 
									ON pictures.galleryid = gallery.gid
									LEFT JOIN {$wpdb->prefix}nggcf_field_values AS field
									ON field.pid = pictures.pid 
									WHERE pictures.galleryid = {$id} AND pictures.exclude = 0 
									GROUP BY pictures.pid
									ORDER BY sortorder");
	return $result;
}

function gka_theme_get_gallery_list() {
	global $wpdb;
	$result = $wpdb->get_results("	SELECT gid, title 
										FROM {$wpdb->prefix}ngg_gallery 
									ORDER BY gid");
	return $result;
}