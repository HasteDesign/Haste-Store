<?php
Haste_Store_Kirki::add_config( 'haste-store', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/**
 * Options
 */


/**
 * Typography section
 */

 Haste_Store_Kirki::add_section( 'typography', array(
    'title'          => __( 'Typography', 'haste-store' ),
    'description'    => __( 'Font options', 'haste-store' ),
    'panel'          => '', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );


Haste_Store_Kirki::add_field( 'body_type', array(
	'type'        => 'typography',
	'settings'    => 'body_type',
	'label'       => esc_attr__( 'Body typography', 'haste-store' ),
	'section'     => 'typography',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#333333',
	),
	'priority'	=> 10,
	'transport'	=> 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body',
			'function' => 'style',
			'property' => 'font',
		),
	),
	'output'	=> array(
		array(
			'element' => 'body',
			'property' => 'font',
		),
	),
) );


Haste_Store_Kirki::add_field( 'headers_type', array(
	'type'        => 'typography',
	'settings'    => 'header_type',
	'label'       => esc_attr__( 'Headers typography', 'haste-store' ),
	'section'     => 'typography',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'line-height'    => '1',
		'color'          => '#333333',
		'text-transform' => 'none',
	),
	'priority'	=> 20,
	'transport'	=> 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'h1, h2, h3, h4, h5, h6',
			'function' => 'style',
			'property' => 'font',
		),
	),
	'output'	=> array(
		array(
			'element' => 'h1', 'h2', 'h3',
			'property' => 'font',
		),
	),
) );



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

Haste_Store_Kirki::add_field( 'header-bg-color', array(
	'type'        => 'color',
	'settings'    => 'header-bg-color',
	'label'       => __( 'Header background-color', 'haste-store' ),
	'section'     => 'header',
	'default'     => '#e7e7e7',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	'transport'	=> 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#main-navigation',
			'function' => 'style',
			'property' => 'background-color',
		),
	),
	'output'	=> array(
		array(
			'element' => '#main-navigation',
			'property' => 'background-color',
		),
	),
) );
