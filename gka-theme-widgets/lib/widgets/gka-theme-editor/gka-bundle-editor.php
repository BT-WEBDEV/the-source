<?php
/*
* Widget Name: (GKA) Editor
* Description: A widget which allows editing of content using the TinyMCE editor.
* Author: GKA Creative Agency
* Author URI: https://gkaadvertising.com/
*/

class GKA_Theme_Editor_Widget extends SiteOrigin_Widget {

    function __construct() {

		parent::__construct(
			'gka-theme-editor',
			__('(GKA) Editor', 'gka-theme-widgets'),
			array(
				'description' => __('A widget which allows editing of content using the TinyMCE editor.', 'gka-theme-widgets'),
				'help' => 'https://siteorigin.com/widgets-bundle/editor-widget/'
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);

		add_filter( 'siteorigin_widgets_sanitize_instance_gka-theme-editor', array( $this, 'add_noreferrer_to_link_targets' ) );
    }
    
    function get_widget_form() {
		$global_settings = $this->get_global_settings();
		return array(
			'text' => array(
				'type' => 'tinymce',
				'rows' => 20,
				'wpautop_toggle_field' => '.siteorigin-widget-field-autop input[type="checkbox"]',
			),
			'autop' => array(
				'type' => 'checkbox',
				'default' => $global_settings['autop_default'],
				'label' => __( 'Automatically add paragraphs', 'gka-theme-widgets' ),
			),
		);
    }

    function get_settings_form() {
		return array(
			'autop_default' => array(
				'type'    => 'checkbox',
				'default' => true,
				'label'   => __( 'Enable the "Automatically add paragraphs" setting by default.', 'gka-theme-widgets' ),
			),
		);
    }
    
    public function get_template_variables( $instance, $args ) {
		$instance = wp_parse_args(
			$instance,
			array(  'text' => '' )
		);

		if (
			// Only run these parts if we're rendering for the frontend
			empty( $GLOBALS[ 'SITEORIGIN_PANELS_CACHE_RENDER' ] ) &&
			empty( $GLOBALS[ 'SITEORIGIN_PANELS_POST_CONTENT_RENDER' ] )
		) {
			if ( function_exists( 'wp_filter_content_tags' ) ) {
				$instance['text'] = wp_filter_content_tags( $instance['text'] );
			} else if ( function_exists( 'wp_make_content_images_responsive' ) ) {
				$instance['text'] = wp_make_content_images_responsive( $instance['text'] );
			}

			// Manual support for Jetpack Markdown module.
			if ( class_exists( 'WPCom_Markdown' ) &&
			     Jetpack::is_module_active( 'markdown' ) &&
			     $instance['text_selected_editor'] == 'html'
			) {
				$markdown_parser = WPCom_Markdown::get_instance();
				$instance['text'] = $markdown_parser->transform( $instance['text'] );
			}

			// Run some known stuff
			if( ! empty( $GLOBALS['wp_embed'] ) ) {
				$instance['text'] = $GLOBALS['wp_embed']->run_shortcode( $instance['text'] );
				$instance['text'] = $GLOBALS['wp_embed']->autoembed( $instance['text'] );
			}

			// As in the Text Widget, we need to prevent plugins and themes from running `do_shortcode` in the `widget_text`
			// filter to avoid running it twice and to prevent `wpautop` from interfering with shortcodes' output.
			$widget_text_do_shortcode_priority = has_filter( 'widget_text', 'do_shortcode' );
			if ( $widget_text_do_shortcode_priority !== false ) {
				remove_filter( 'widget_text', 'do_shortcode', $widget_text_do_shortcode_priority );
			}

			$instance['text'] = apply_filters( 'widget_text', $instance['text'] );

			if ( $widget_text_do_shortcode_priority !== false ) {
				add_filter( 'widget_text', 'do_shortcode', $widget_text_do_shortcode_priority );
			}

			if( $instance['autop'] ) {
				$instance['text'] = wpautop( $instance['text'] );
			}

			$instance['text'] = do_shortcode( shortcode_unautop( $instance['text'] ) );

			$instance['text'] = $this->process_more_quicktag( $instance['text'] );
		}


		return array(
			'text' => $instance['text'],
		);
	}

	private function process_more_quicktag( $content ) {
		$post = get_post();
		if ( ! empty( $post ) ) {
			$panels_content = get_post_meta( $post->ID, 'panels_data', true );
		}
		// We only want to do this processing if on archive pages for posts with non-PB layouts.
		if ( ! is_singular() && empty( $panels_content ) && ! $this->is_block_editor_page() && empty( $GLOBALS['SO_WIDGETS_BUNDLE_PREVIEW_RENDER'] ) ) {
			if ( preg_match( '/<!--more(.*?)?-->/', $content, $matches ) ) {
				$content = explode( $matches[0], $content, 2 );
				$content = $content[0];
				$content = force_balance_tags( $content );
				if ( ! empty( $matches[1] ) ) {
					$more_link_text = strip_tags( wp_kses_no_null( trim( $matches[1] ) ) );
				} else {
					$more_link_text = __( 'Read More', 'siteorigin-panels' );
				}
				$more_link = apply_filters( 'the_content_more_link', ' <a href="' . get_permalink() . "#more-{$post->ID}\" class=\"more-link\">$more_link_text</a>", $more_link_text );
				$content .= '<p>' . $more_link . '</p>';
			}
		}

		return $content;
	}

	function add_noreferrer_to_link_targets( $instance ) {
		if ( function_exists( 'wp_targeted_link_rel' ) ) {
			$instance['text'] = wp_targeted_link_rel( $instance['text'] );
		}
		return $instance;
	}


	function get_style_name($instance) {
		// We're not using a style
		return false;
    }
    
}

siteorigin_widget_register( 'gka-theme-editor', __FILE__, 'GKA_Theme_Editor_Widget' );