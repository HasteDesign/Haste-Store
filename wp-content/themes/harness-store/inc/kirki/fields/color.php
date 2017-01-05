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
			'element'  => '[class*="primary"], .button, .woocommerce div.product form.cart .button',
			'function' => 'style',
			'property' => 'background-color',
		),
		array(
			'element'  => 'a, [class*="primary"] .badge, .btn-link, .star-rating',
			'function' => 'style',
			'property' => 'color',
		),
	),
	'output'	=> array(
		array(
			'element' => array( '[class*="primary"]', '.button', '.woocommerce div.product form.cart .button' ),
			'property' => 'background-color',
		),
		array(
			'element' => array( 'a', '[class*="primary"] .badge', '.btn-link', '.star-rating' ),
			'property' => 'color',
		),
	),
) );
