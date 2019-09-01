<?php
/**
 * Strock functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Strock
 */

if ( ! function_exists( 'onlinecoder_strock_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function onlinecoder_strock_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Strock, use a find and replace
		 * to change 'onlinecoder-strock' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'onlinecoder-strock', get_template_directory() . '/languages' );

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
		add_image_size('onlinecoder-strock-blog-thumnail', 750, 450, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'onlinecoder-strock' ),
		) );
		register_nav_menus( array(
			'footer_menu' => esc_html__( 'Footer Menu', 'onlinecoder-strock' ),
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
		add_theme_support( 'custom-background', apply_filters( 'onlinecoder_strock_custom_background_args', array(
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
add_action( 'after_setup_theme', 'onlinecoder_strock_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function onlinecoder_strock_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'onlinecoder_strock_content_width', 640 );
}
add_action( 'after_setup_theme', 'onlinecoder_strock_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function onlinecoder_strock_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'onlinecoder-strock' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'onlinecoder-strock' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Project Sidebar', 'onlinecoder-strock' ),
		'id'            => 'stock_project_sidebar',
		'description'   => esc_html__( 'Add project sidebar widgets here.', 'onlinecoder-strock' ),
		'before_widget' => '<div id="%1$s" class="widget footer-menu %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu', 'onlinecoder-strock' ),
		'id'            => 'stock_footer',
		'description'   => esc_html__( 'Add Footer widgets here.', 'onlinecoder-strock' ),
		'before_widget' => '<div class="col-xl-3"><div id="%1$s" class="widget footer-menu %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'onlinecoder_strock_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function onlinecoder_strock_scripts() {
	wp_enqueue_style( 'font-Awesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), '5.9');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.3');
	wp_enqueue_style('onlinecoder-strock-common-css', get_template_directory_uri() . '/assets/css/common.css', array(), '1.0');
	wp_enqueue_style( 'onlinecoder-strock-style', get_stylesheet_uri() );

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.3', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'onlinecoder_strock_scripts' );

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
 *
 * Codestar Framework
 * A Simple and Lightweight WordPress Option Framework for Themes and Plugins
 *
 */
require_once get_theme_file_path() .'/inc/codestar-framework/codestar-framework.php';
require get_template_directory() . '/inc/csf/stock-admin.php';
require get_template_directory() . '/inc/csf/stock-page-metabox.php';
require get_template_directory() . '/inc/csf/stock-slides-metabox.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
