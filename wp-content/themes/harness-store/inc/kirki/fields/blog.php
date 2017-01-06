<?php

/**
 * Blog options section
 */

 Haste_Store_Kirki::add_section( 'blog', array(
    'title'          => __( 'Blog options', 'haste-store' ),
    'description'    => __( 'Blog and post options', 'haste-store' ),
    'panel'          => '', // Not typically needed.
    'priority'       => 170,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_blog_sidebar',
	'label'       => __( 'Display sidebar on blog and archives', 'my_textdomain' ),
	'section'     => 'blog',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'my_textdomain' ),
		'off' => esc_attr__( 'Disable', 'my_textdomain' ),
	),
) );


Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_posts_sidebar',
	'label'       => __( 'Display sidebar on single posts', 'my_textdomain' ),
	'section'     => 'blog',
	'default'     => '1',
	'priority'    => 20,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'my_textdomain' ),
		'off' => esc_attr__( 'Disable', 'my_textdomain' ),
	),
) );


Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_post_author',
	'label'       => __( 'Display post author', 'my_textdomain' ),
	'section'     => 'blog',
	'default'     => '1',
	'priority'    => 30,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'my_textdomain' ),
		'off' => esc_attr__( 'Disable', 'my_textdomain' ),
	),
) );
