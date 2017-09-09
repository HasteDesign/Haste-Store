<?php

/**
 * Front page settings
 */

// Home content custom settings

Haste_Store_Kirki::add_field( 'haste-store', array(
    'type'        => 'custom',
    'settings'    => 'home-custom-settings-separator',
    'section'     => 'static_front_page',
    'default'     => '<hr> <h2>' . __('Haste Store Custom Settings', 'haste-store') . '</h2> <p>' . __('This options applies to the Home page template.', 'haste-store') . '</p>',
    'priority'    => 99,
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	 'type'        => 'toggle',
	 'settings'    => 'enable-home-content-section',
	 'label'       => __( 'Display a section with the page content and featured image', 'haste-store' ),
	 'section'     => 'static_front_page',
	 'default'     => '1',
	 'priority'    => 100,
 ) );

 Haste_Store_Kirki::add_field( 'haste-store', array(
 	 'type'        => 'radio',
 	 'settings'    => 'home-content-section-height',
 	 'label'       => __( 'Home section height', 'haste-store' ),
 	 'section'     => 'static_front_page',
 	 'default'     => 'full-height',
 	 'priority'    => 102,
	 'choices'     => array(
 		'full-height'  	=> esc_attr__( 'Full height', 'my_textdomain' ),
 		'auto-height' 	=> esc_attr__( 'Auto height', 'my_textdomain' ),
 	),
	'active_callback'  => array(
		   array(
			   'setting'  => 'enable-home-content-section',
			   'operator' => '==',
			   'value'    => 1,
		   ),
	   ),
  ) );

  Haste_Store_Kirki::add_field( 'haste-store', array(
  	'type'        => 'color',
  	'settings'    => 'banner-overlay',
  	'label'       => __( 'Banner overlay color', 'haste-store' ),
  	'section'     => 'static_front_page',
  	'default'     => 'rgba(0,0,0,0.3)',
  	'priority'    => 10,
  	'choices'     => array(
  		'alpha' => true,
  	),
  	'transport'	=> 'auto',
  	'output'	=> array(
  		array(
  			'element' => '.banner .section-wrapper',
  			'property' => 'background-color',
  		),
  	),
  ) );

 Haste_Store_Kirki::add_field( 'haste-store', array(
 	 'type'     => 'text',
 	 'settings' => 'home-content-section-title',
 	 'label'    => __( 'Override home page title', 'haste-store' ),
 	 'section'  => 'static_front_page',
 	 'priority' => 105,
	 'description' => 'Leave empty to use the original page title',
	 'active_callback'  => array(
  		   array(
  			   'setting'  => 'enable-home-content-section',
  			   'operator' => '==',
  			   'value'    => 1,
  		   ),
  	   ),
) );

// Home first button


Haste_Store_Kirki::add_field( 'haste-store', array(
    'type'        => 'custom',
    'settings'    => 'home-custom-settings-separator-2',
    'section'     => 'static_front_page',
    'default'     => '<hr>',
    'priority'    => 109,
	'active_callback'  => array(
		   array(
			   'setting'  => 'enable-home-content-section',
			   'operator' => '==',
			   'value'    => 1,
		   ),
	   ),
) );


Haste_Store_Kirki::add_field( 'haste-store', array(
	 'type'        => 'toggle',
	 'settings'    => 'enable-home-1st-btn',
	 'label'       => __( 'Display first button', 'haste-store' ),
	 'section'     => 'static_front_page',
	 'default'     => '1',
	 'priority'    => 110,
	 'active_callback'  => array(
  		   array(
  			   'setting'  => 'enable-home-content-section',
  			   'operator' => '==',
  			   'value'    => 1,
  		   ),
  	   ),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	 'type'     => 'text',
	 'settings' => 'home-1st-btn-text',
	 'label'    => __( 'Home first button text', 'haste-store' ),
	 'section'  => 'static_front_page',
	 'default'  => esc_attr__( 'View', 'haste-store' ),
	 'priority' => 120,
	 'active_callback'  => array(
 		   array(
 			   'setting'  => 'enable-home-content-section',
 			   'operator' => '==',
 			   'value'    => 1,
 		   ),
 	   ),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'     => 'url',
	'settings' => 'home-1st-btn-link',
	 'label'    => __( 'Home first button link', 'haste-store' ),
	 'section'  => 'static_front_page',
	 'default'  => '#',
	 'priority' => 130,
	 'active_callback'  => array(
 		   array(
 			   'setting'  => 'enable-home-content-section',
 			   'operator' => '==',
 			   'value'    => 1,
 		   ),
 	   ),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
   'type'     => 'text',
   'settings' => 'home-1st-btn-classes',
	'label'    => __( 'Home first button CSS classes', 'haste-store' ),
	'section'  => 'static_front_page',
	'default'  => 'btn btn-success',
	'priority' => 140,
	'active_callback'  => array(
		  array(
			  'setting'  => 'enable-home-content-section',
			  'operator' => '==',
			  'value'    => 1,
		  ),
	  ),
) );

// Home second button

Haste_Store_Kirki::add_field( 'haste-store', array(
    'type'        => 'custom',
    'settings'    => 'home-custom-settings-separator-3',
    'section'     => 'static_front_page',
    'default'     => '<hr>',
    'priority'    => 149,
	'active_callback'  => array(
		  array(
			  'setting'  => 'enable-home-content-section',
			  'operator' => '==',
			  'value'    => 1,
		  ),
	  ),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	 'type'        => 'toggle',
	 'settings'    => 'enable-home-2nd-btn',
	 'label'       => __( 'Display second button', 'haste-store' ),
	 'section'     => 'static_front_page',
	 'default'     => '1',
	 'priority'    => 150,
	 'active_callback'  => array(
 		   array(
 			   'setting'  => 'enable-home-content-section',
 			   'operator' => '==',
 			   'value'    => 1,
 		   ),
 	   ),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	 'type'     => 'text',
	 'settings' => 'home-2nd-btn-text',
	 'label'    => __( 'Home second button text', 'haste-store' ),
	 'section'  => 'static_front_page',
	 'default'  => esc_attr__( 'Tell me more', 'haste-store' ),
	 'priority' => 160,
	 'active_callback'  => array(
 		   array(
 			   'setting'  => 'enable-home-content-section',
 			   'operator' => '==',
 			   'value'    => 1,
 		   ),
 	   ),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'     => 'url',
	'settings' => 'home-2nd-btn-link',
	 'label'    => __( 'Home second button link', 'haste-store' ),
	 'section'  => 'static_front_page',
	 'default'  => '#',
	 'priority' => 170,
	 'active_callback'  => array(
 		   array(
 			   'setting'  => 'enable-home-content-section',
 			   'operator' => '==',
 			   'value'    => 1,
 		   ),
 	   ),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
   'type'     => 'text',
   'settings' => 'home-2nd-btn-classes',
	'label'    => __( 'Home second button CSS classes', 'haste-store' ),
	'section'  => 'static_front_page',
	'default'  => 'btn btn-outline',
	'priority' => 180,
	'active_callback'  => array(
		  array(
			  'setting'  => 'enable-home-content-section',
			  'operator' => '==',
			  'value'    => 1,
		  ),
	  ),
) );
