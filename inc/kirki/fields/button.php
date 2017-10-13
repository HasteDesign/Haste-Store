<?php

/**
 * Buttons section
 */

 Haste_Store_Kirki::add_section( 'buttons', array(
    'title'          => __( 'Buttons', 'haste-store' ),
    'description'    => __( 'Buttons options', 'haste-store' ),
    'panel'          => '', // Not typically needed.
    'priority'       => 150,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );


Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'typography',
	'settings'    => 'button_type',
	'label'       => esc_attr__( 'Button typography', 'haste-store' ),
	'section'     => 'buttons',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#fff',
		'letter-spacing' => '0',
		'text-transform' => 'none',
	),
	'priority'	=> 10,
	'transport'	=> 'auto',
	'output'	=> array(
		array(
			'element' => array(
							'body',
							'button',
							'.button',
							'.btn',
							'input[type="submit"]',
							'input[type="button"]',
							'input[type="reset"]',
							'.woocommerce a.button',
							'.woocommerce button.button',
							'.woocommerce input.button',
							'.woocommerce #respond input#submit',
						),
		),
	),
) );


Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'slider',
	'settings'    => 'button_border_radius',
	'label'       => __( 'Button border radius', 'haste-store' ),
	'section'     => 'buttons',
	'default'     => 0,
	'choices'     => array(
		'min'  => '0',
		'max'  => '100',
		'step' => '1',
	),
	'priority'	=> 20,
	'transport'	=> 'auto',
	'output'	=> array(
		array(
			'element' => array(
							'body',
							'button',
							'.button',
							'.btn',
							'input[type="submit"]',
							'input[type="button"]',
							'input[type="reset"]',
							'.woocommerce a.button',
							'.woocommerce button.button',
							'.woocommerce input.button',
							'.woocommerce #respond input#submit',
							'.woocommerce #place_order',
						),
			'property' => 'border-radius',
			'units'    => 'px !important',
		),
	),
) );
