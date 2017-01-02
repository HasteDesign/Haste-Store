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

require_once( plugin_dir_path( __FILE__ ) . 'widgets\class-haste-shortcode-module.php');
require_once( plugin_dir_path( __FILE__ ) . 'widgets\class-haste-text-image-module.php');
