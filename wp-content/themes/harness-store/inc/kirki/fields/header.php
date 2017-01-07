<?php



/**
 * Header section
 */

 Haste_Store_Kirki::add_section( 'header', array(
    'title'          => __( 'Header', 'haste-store' ),
    'description'    => __( 'Header options', 'haste-store' ),
    'panel'          => '', // Not typically needed.
    'priority'       => 150,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'color',
	'settings'    => 'header-bg-color',
	'label'       => __( 'Header background color', 'haste-store' ),
	'section'     => 'header',
	'default'     => '#e7e7e7',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	'transport'	=> 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#main-navigation, .dropdown-menu',
			'function' => 'style',
			'property' => 'background-color',
		),
	),
	'output'	=> array(
		array(
			'element' => '#main-navigation', '.dropdown-menu',
			'property' => 'background-color',
		),
	),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'color',
	'settings'    => 'header-text-color',
	'label'       => __( 'Header text color', 'haste-store' ),
	'section'     => 'header',
	'default'     => 'inherit',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	'transport'	=> 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#main-navigation, .dropdown-menu, .header-cart a',
			'function' => 'style',
			'property' => 'color',
		),
	),
	'output'	=> array(
		array(
			'element' => '#main-navigation', '.dropdown-menu', '.header-cart a',
			'property' => 'color',
		),
	),
) );
