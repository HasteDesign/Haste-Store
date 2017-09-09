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


Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_shop_sidebar',
	'label'       => __( 'Display sidebar on shop and product archives', 'haste-store' ),
	'section'     => 'shop',
	'default'     => '1',
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'haste-store' ),
		'off' => esc_attr__( 'Disable', 'haste-store' ),
	),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_buy_button',
	'label'       => __( 'Display the buy button on shop and product archives', 'haste-store' ),
	'section'     => 'shop',
	'default'     => '1',
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'haste-store' ),
		'off' => esc_attr__( 'Disable', 'haste-store' ),
	),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_product_rating',
	'label'       => __( 'Display the product star rating on shop and product archives', 'haste-store' ),
	'section'     => 'shop',
	'default'     => '1',
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'haste-store' ),
		'off' => esc_attr__( 'Disable', 'haste-store' ),
	),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_price',
	'label'       => __( 'Display the product price on shop and product archives', 'haste-store' ),
	'section'     => 'shop',
	'default'     => '1',
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'haste-store' ),
		'off' => esc_attr__( 'Disable', 'haste-store' ),
	),
) );

/**
 * Products title font size
 */


  Haste_Store_Kirki::add_field( 'haste-store', array(
  	'type'        => 'slider',
  	'settings'    => 'product_title_font-size',
  	'label'       => __( 'Product Title Font Size on shop and product archives', 'haste-store' ),
  	'section'     => 'shop',
  	'default'     => 1,
  	'choices'     => array(
  		'min'  => '0',
  		'max'  => '10',
  		'step' => '0.1',
  	),
  	'transport'	=> 'auto',
  	'output'	=> array(
  		array(
  			'element' => array(
  							'.woocommerce ul.products li.product .woocommerce-loop-category__title',
                            '.woocommerce ul.products li.product .woocommerce-loop-product__title',
                            '.woocommerce ul.products li.product h3',
  						),
  			'property' => 'font-size',
  			'units'    => 'em',
  		),
  	),
  ) );
