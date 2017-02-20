<?php
Haste_Store_Kirki::add_config( 'haste-store', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/**
 * Options
 */

include_once dirname( __FILE__ ) . '/fields/color.php';
include_once dirname( __FILE__ ) . '/fields/button.php';
include_once dirname( __FILE__ ) . '/fields/type.php';
include_once dirname( __FILE__ ) . '/fields/header.php';
include_once dirname( __FILE__ ) . '/fields/footer.php';
include_once dirname( __FILE__ ) . '/fields/blog.php';
include_once dirname( __FILE__ ) . '/fields/front-page.php';
include_once dirname( __FILE__ ) . '/fields/shop.php';
