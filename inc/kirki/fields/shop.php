<?php

/**
 * Shop options section
 */

 Haste_Store_Kirki::add_section( 'shop', array(
    'title'          => __( 'Shop options', 'haste-store' ),
    'description'    => __( 'WooCommerce shop options', 'haste-store' ),
    'panel'          => '', // Not typically needed.
    'priority'       => 180,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'slider',
	'settings'    => 'shop_columns',
	'label'       => __( 'Shop products columns', 'haste-store' ),
	'description' => __( 'Also affects the related products'),
	'section'     => 'shop',
	'default'     => 4,
	'choices'     => array(
		'min'  => '1',
		'max'  => '6',
		'step' => '1',
	),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'number',
	'settings'    => 'shop_products_per_page',
	'label'       => __( 'Products per page', 'haste-store' ),
	'section'     => 'shop',
	'default'     => 12,
	'choices'     => array(
		'min'  => '1',
		'max'  => '120',
		'step' => '1',
	),
) );
