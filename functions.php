<?php
/**
 * Gka Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gka_theme
 */

if ( ! function_exists( 'gka_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gka_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gka_theme, use a find and replace
		 * to change 'gka_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'GkaTheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'gka_theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'gka_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'gka_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gka_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'gka_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'gka_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gka_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Widget Before Content', 'gka_theme' ),
		'id'            => 'gka_theme_widget_before',
		'description'   => esc_html__( 'Add widgets here.', 'gka_theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Widget After Content', 'gka_theme' ),
		'id'            => 'gka_theme_widget_after',
		'description'   => esc_html__( 'Add widgets here.', 'gka_theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gka_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gka_theme_scripts() {
	wp_enqueue_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js' );
	wp_enqueue_script( 'Popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js', array(), '2.7.0', true );
	wp_enqueue_script( 'Bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js', array(), '4.6.0', true  );
	wp_enqueue_script( 'MDB', get_template_directory_uri() . '/scripts/js/mdb.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'JS', get_template_directory_uri() . '/scripts/js/main.min.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gka_theme_scripts' );

// Custom styles 
function gka_theme_styles() {
	wp_enqueue_style( 'gka_theme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'Font_Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' );
	wp_enqueue_style( 'Bootstrap_css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css' );
	wp_enqueue_style( 'MDB', get_stylesheet_directory_uri() . '/styles/css/mdb.min.css' );
	wp_enqueue_style( 'Style', get_stylesheet_directory_uri() . '/styles/css/main.min.css' );
}
add_action('wp_enqueue_scripts', 'gka_theme_styles');

/**
 * Theme Add Ons.
 */
require get_template_directory() . '/inc/slider.php';
require get_template_directory() . '/inc/employees.php';

/**
 * Implement the Custom Fields.
 */
require get_template_directory() . '/inc/custom-fields.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function console_log($output, $with_script_tags = true) {
	$js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
	if ($with_script_tags) {
		$js_code = '<script>' . $js_code . '</script>';
	}
	echo $js_code;
}

/**
 * Assign Custom Widget Bundle
 */

function gka_theme_widget_collection($folders) {
    $folders[] = get_template_directory() . '/gka-theme-widgets/widgets/'; // important: Slash on end string is required
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'gka_theme_widget_collection');

/**
 * Check Theme Dependencies
 */
// add_action( 'admin_notices', 'my_theme_dependencies' );

// function my_theme_dependencies() {
//   if( ! function_exists('plugin_function') )
//     echo '<div class="error"><p>' . __( 'Warning: The theme needs Plugin X to function', 'my-theme' ) . '</p></div>';
// }
