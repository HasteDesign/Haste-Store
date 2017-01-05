<?php

/**
 * Color options
 */

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'color',
	'settings'    => 'primary-color',
	'label'       => __( 'Primary color', 'haste-store' ),
	'section'     => 'colors',
	'default'     => '#4d69f1',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	'transport'	=> 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.btn-primary',
			'function' => 'style',
			'property' => 'background-color',
		),
		array(
			'element'  => 'a',
			'function' => 'style',
			'property' => 'color',
		),
	),
	'output'	=> array(
		array(
			'element' => array( '.btn-primary' ),
			'property' => 'background-color',
		),
		array(
			'element' => array( '.a' ),
			'property' => 'color',
		),
	),
) );
