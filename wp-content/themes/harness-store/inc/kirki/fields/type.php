<?php

/**
 * Typography section
 */

 Haste_Store_Kirki::add_section( 'typography', array(
    'title'          => __( 'Typography', 'haste-store' ),
    'description'    => __( 'Font options', 'haste-store' ),
    'panel'          => '', // Not typically needed.
    'priority'       => 150,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );


Haste_Store_Kirki::add_field( 'haste-store', array(
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
		),
	),
	'output'	=> array(
		array(
			'element' => 'body',
		),
	),
) );


Haste_Store_Kirki::add_field( 'haste-store', array(
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
			'element'  => 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .product-name a, .mini_cart_item a, .product-title',
			'function' => 'style',
		),
	),
	'output'	=> array(
		array(
			'element' => array ('h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.h1', '.h2', '.h3', '.h4', '.h5', '.h6', '.product-name a', '.mini_cart_item a', '.product-title'),
		),
	),
) );
