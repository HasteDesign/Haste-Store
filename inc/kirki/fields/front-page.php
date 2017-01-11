<?php

/**
 * Front page settings
 */

// Home content custom settings

Haste_Store_Kirki::add_field( 'haste-store', array(
    'type'        => 'custom',
    'settings'    => 'home-custom-settings-separator',
    'section'     => 'static_front_page',
    'default'     => '<hr> <h2>' . __('Haste Store Custom Settings', 'haste-store') . '</h2> <p>' . __('This options applies to the Home Shop page template.', 'haste-store') . '</p>',
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
 	 'type'     => 'text',
 	 'settings' => 'home-content-section-title',
 	 'label'    => __( 'Override home page title (leave empty to use the original page title)', 'haste-store' ),
 	 'section'  => 'static_front_page',
 	 'priority' => 105,
 ) );

// Home first button


Haste_Store_Kirki::add_field( 'haste-store', array(
    'type'        => 'custom',
    'settings'    => 'home-custom-settings-separator-2',
    'section'     => 'static_front_page',
    'default'     => '<hr>',
    'priority'    => 109,
) );


Haste_Store_Kirki::add_field( 'haste-store', array(
	 'type'        => 'toggle',
	 'settings'    => 'enable-home-1st-btn',
	 'label'       => __( 'Display first button', 'haste-store' ),
	 'section'     => 'static_front_page',
	 'default'     => '1',
	 'priority'    => 110,
 ) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	 'type'     => 'text',
	 'settings' => 'home-1st-btn-text',
	 'label'    => __( 'Home first button text', 'haste-store' ),
	 'section'  => 'static_front_page',
	 'default'  => esc_attr__( 'View', 'haste-store' ),
	 'priority' => 120,
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'     => 'text',
	'settings' => 'home-1st-btn-link',
	 'label'    => __( 'Home first button link', 'haste-store' ),
	 'section'  => 'static_front_page',
	 'default'  => '#',
	 'priority' => 130,
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
   'type'     => 'text',
   'settings' => 'home-1st-btn-classes',
	'label'    => __( 'Home first button CSS classes', 'haste-store' ),
	'section'  => 'static_front_page',
	'default'  => 'btn btn-success',
	'priority' => 140,
) );

// Home second button

Haste_Store_Kirki::add_field( 'haste-store', array(
	 'type'        => 'toggle',
	 'settings'    => 'enable-home-2nd-btn',
	 'label'       => __( 'Display second button', 'haste-store' ),
	 'section'     => 'static_front_page',
	 'default'     => '1',
	 'priority'    => 150,
 ) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	 'type'     => 'text',
	 'settings' => 'home-2nd-btn-text',
	 'label'    => __( 'Home second button text', 'haste-store' ),
	 'section'  => 'static_front_page',
	 'default'  => esc_attr__( 'Tell me more', 'haste-store' ),
	 'priority' => 160,
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'     => 'text',
	'settings' => 'home-2nd-btn-link',
	 'label'    => __( 'Home second button link', 'haste-store' ),
	 'section'  => 'static_front_page',
	 'default'  => '#',
	 'priority' => 170,
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
   'type'     => 'text',
   'settings' => 'home-2nd-btn-classes',
	'label'    => __( 'Home second button CSS classes', 'haste-store' ),
	'section'  => 'static_front_page',
	'default'  => 'btn btn-outline',
	'priority' => 180,
) );
