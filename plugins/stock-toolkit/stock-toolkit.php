<?php
/**
 *
 * @package   Codestar Framework - WordPress Options Framework
 * @author    Codestar <info@codestarthemes.com>
 * @link      http://codestarframework.com
 * @copyright 2015-2018 Codestar
 *
 *
 * Plugin Name: Stock Toolkit
 * Plugin URI: http://onlinecoder.com/
 * Author: Online Coder
 * Author URI: http://onlinecoder.com/
 * Version: 1.0.0
 * Description: A Simple and Lightweight WordPress Option Framework for Themes and Plugins
 * Text Domain: oc
 * Domain Path: /languages
 *
 */
// Exit if accessible directly
if( !defined('ABSPATH' ) ){
   exit;
}

// Define
define('STOCK_ACC_URL', WP_PLUGIN_URL.'/'. plugin_basename( dirname( __FILE__ ) ) . '/' );
define('STOCK_ACC_PATH', plugin_dir_path( __FILE__ ) );

function stock_toolkit_get_slide_as_list(){
    $args = wp_parse_args(array(
        'post_type' => 'slides', 
        'numberposts' => -1, 
    ));

    $posts = get_posts($args);

    $posts_options = array(esc_html__('Select Slide', 'stock') => '');
    if($posts){
        foreach ($posts as $post) {
            $posts_options[ $post->post_title ] = $post->ID;
        }
    }
    return $posts_options;
}

function stock_toolkit_get_page_as_list(){
    $args = wp_parse_args(array(
        'post_type' => 'page', 
        'numberposts' => -1, 
    ));

    $posts = get_posts($args);

    $posts_options = array(esc_html__('Select Page', 'stock') => '');
    if($posts){
        foreach ($posts as $post) {
            $posts_options[ $post->post_title ] = $post->ID;
        }
    }
    return $posts_options;
}

add_action( 'init', 'stock_slider_custom_post' );
function stock_slider_custom_post() {
    register_post_type( 'slides',
        array(
            'labels' => array(
                'name' => __( 'Sliders' ),
                'singular_name' => __( 'Slider' )
            ),
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public'    => false,
            'show_ui'   => true,
        )
    );
}

// Print Shortcode In Widget
add_filter('widget_text', 'do_shortcode');

// Loading VC_addons
require_once( STOCK_ACC_PATH . 'vc-addons/vc-block-load.php');

// Theme Shortchodes
require_once( STOCK_ACC_PATH . 'theme-shortcodes/slides-shortcode.php');
require_once( STOCK_ACC_PATH . 'theme-shortcodes/logo-shortcode.php');
require_once( STOCK_ACC_PATH . 'theme-shortcodes/service-shortcode.php');
require_once( STOCK_ACC_PATH . 'theme-shortcodes/cta-shortcode.php');
require_once( STOCK_ACC_PATH . 'theme-shortcodes/start-shortcode.php');
require_once( STOCK_ACC_PATH . 'theme-shortcodes/stock-btn-shortcode.php');

// ShortCodes Depended on Visual Composer
include_once( ABSPATH . 'wp-admin/includes/plugin.php');
if( is_plugin_active( 'js_composer/js_composer.php' )){
   require_once( STOCK_ACC_PATH . 'theme-shortcodes/slides-shortcode.php');
   require_once( STOCK_ACC_PATH . 'theme-shortcodes/logo-shortcode.php');
   require_once( STOCK_ACC_PATH . 'theme-shortcodes/service-shortcode.php');
   require_once( STOCK_ACC_PATH . 'theme-shortcodes/cta-shortcode.php');
   require_once( STOCK_ACC_PATH . 'theme-shortcodes/start-shortcode.php');
   require_once( STOCK_ACC_PATH . 'theme-shortcodes/stock-btn-shortcode.php');
}


// Registering Stock Tolkit File
function stock_tolkit_files(){
   wp_enqueue_style('owl-carousel', plugin_dir_url( __FILE__ ) .'assets/css/owl.carousel.min.css');
   wp_enqueue_style('plugin-style', plugin_dir_url( __FILE__ ) .'assets/css/stock-toolkit.css');
   wp_enqueue_script('owl-carousel', plugin_dir_url( __FILE__ ) .'assets/js/owl.carousel.min.js', array('jquery'), '2.3.4', true);
   wp_enqueue_script('plugin-js', plugin_dir_url( __FILE__ ) .'assets/js/active.js', array('jquery'), '2.3.4', true);
}
add_action('wp_enqueue_scripts','stock_tolkit_files');