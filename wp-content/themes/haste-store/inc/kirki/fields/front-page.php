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

// Home CTA Buttons

Haste_Store_Kirki::add_field( 'haste-store', array(
	 'type'        => 'toggle',
	 'settings'    => 'enable-home-cta-btn',
	 'label'       => __( 'Display a Call to Action button', 'haste-store' ),
	 'section'     => 'static_front_page',
	 'default'     => '1',
	 'priority'    => 110,
 ) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	 'type'     => 'text',
	 'settings' => 'home-cta-btn-text',
	 'label'    => __( 'Home CTA button text', 'haste-store' ),
	 'section'  => 'static_front_page',
	 'default'  => esc_attr__( 'View', 'haste-store' ),
	 'priority' => 120,
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'     => 'text',
	'settings' => 'home-cta-btn-link',
	 'label'    => __( 'Home CTA button link', 'haste-store' ),
	 'section'  => 'static_front_page',
	 'default'  => '#',
	 'priority' => 130,
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
   'type'     => 'text',
   'settings' => 'home-cta-btn-classes',
	'label'    => __( 'Home CTA button CSS classes', 'haste-store' ),
	'section'  => 'static_front_page',
	'default'  => 'btn btn-success',
	'priority' => 140,
) );

// Home Secondary Button

Haste_Store_Kirki::add_field( 'haste-store', array(
	 'type'        => 'toggle',
	 'settings'    => 'enable-home-sec-btn',
	 'label'       => __( 'Display a secondary button', 'haste-store' ),
	 'section'     => 'static_front_page',
	 'default'     => '1',
	 'priority'    => 150,
 ) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	 'type'     => 'text',
	 'settings' => 'home-sec-btn-text',
	 'label'    => __( 'Home secondary button text', 'haste-store' ),
	 'section'  => 'static_front_page',
	 'default'  => esc_attr__( 'Tell me more', 'haste-store' ),
	 'priority' => 160,
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'     => 'text',
	'settings' => 'home-sec-btn-link',
	 'label'    => __( 'Home secondary button link', 'haste-store' ),
	 'section'  => 'static_front_page',
	 'default'  => '#',
	 'priority' => 170,
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
   'type'     => 'text',
   'settings' => 'home-sec-btn-classes',
	'label'    => __( 'Home secondary button CSS classes', 'haste-store' ),
	'section'  => 'static_front_page',
	'default'  => 'btn btn-outline',
	'priority' => 180,
) );
