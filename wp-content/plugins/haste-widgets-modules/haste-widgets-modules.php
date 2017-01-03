<?php
/*
Plugin Name: Haste Widgets Modules
Version: 1.0
Plugin URI: http://hastedesign.com.br/
Description: Adds multiple widgets that can be used as page builder modules.
Author: Anyssa Ferreira
Author URI: http://hastedesign.com.br/
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'admin_enqueue_scripts', 'haste_assets' );


/**
* Media uploader scripts enqueue
*/
function haste_assets() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');

	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script(
	    'iris',
	    admin_url( 'js/iris.min.js' ),
	    array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),
	    false,
	    1
	);
	wp_enqueue_script(
	    'wp-color-picker',
	    admin_url( 'js/color-picker.min.js' ),
	    array( 'iris' ),
	    false,
	    1
	);
	$colorpicker_l10n = array(
	    'clear' => __( 'Clear' ),
	    'defaultString' => __( 'Default' ),
	    'pick' => __( 'Select Color' ),
	    'current' => __( 'Current Color' ),
	);
	wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n );

	wp_enqueue_script('haste-widgets', plugin_dir_url(__FILE__) . 'js/haste-widgets.js', array( 'jquery', 'wp-color-picker' ) ) ;
}




require_once( plugin_dir_path( __FILE__ ) . 'widgets\class-haste-shortcode-module.php');
require_once( plugin_dir_path( __FILE__ ) . 'widgets\class-haste-text-image-module.php');
