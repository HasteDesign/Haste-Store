<?php
Haste_Store_Kirki::add_config( 'haste-store', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/**
 * Options
 */

include_once dirname( __FILE__ ) . '/fields/color.php';
include_once dirname( __FILE__ ) . '/fields/type.php';
include_once dirname( __FILE__ ) . '/fields/header.php';
include_once dirname( __FILE__ ) . '/fields/footer.php';
