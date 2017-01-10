<?php



/**
 * Footer section
 */

 Haste_Store_Kirki::add_section( 'footer', array(
    'title'          => __( 'Footer', 'haste-store' ),
    'description'    => __( 'Footer options', 'haste-store' ),
    'panel'          => '', // Not typically needed.
    'priority'       => 170,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'color',
	'settings'    => 'footer-bg-color',
	'label'       => __( 'Footer background color', 'haste-store' ),
	'section'     => 'footer',
	'default'     => '#fff',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	'transport'	=> 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#footer',
			'function' => 'style',
			'property' => 'background-color',
		),
	),
	'output'	=> array(
		array(
			'element' => '#footer',
			'property' => 'background-color',
		),
	),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'color',
	'settings'    => 'footer-text-color',
	'label'       => __( 'Footer text color', 'haste-store' ),
	'section'     => 'footer',
	'default'     => 'inherit',
	'priority'    => 20,
	'choices'     => array(
		'alpha' => true,
	),
	'transport'	=> 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#footer',
			'function' => 'style',
			'property' => 'color',
		),
	),
	'output'	=> array(
		array(
			'element' => '#footer',
			'property' => 'color',
		),
	),
) );
