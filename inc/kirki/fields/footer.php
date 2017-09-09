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
	'transport'	=> 'auto',
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
	'transport'	=> 'auto',
	'output'	=> array(
		array(
			'element' => '#footer',
			'property' => 'color',
		),
	),
) );


 Haste_Store_Kirki::add_field( 'haste-store', array(
 	 'type'     => 'text',
 	 'settings' => 'site-credits-text',
 	 'label'    => __( 'Site credit text', 'haste-store' ),
 	 'section'  => 'footer',
 	 'priority' => 30,
	 'default' => __( 'Proudly powered by Haste Store and WordPress', 'haste-store' ),
) );


 Haste_Store_Kirki::add_field( 'haste-store', array(
 	 'type'     => 'url',
 	 'settings' => 'site-credits-link',
 	 'label'    => __( 'Site credit link', 'haste-store' ),
 	 'section'  => 'footer',
 	 'priority' => 40,
	 'default'	=> 'http://'
) );
