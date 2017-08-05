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
	'type'     => 'text',
	'settings' => 'blog_title',
	'label'    => __( 'Override the Blog title', 'haste-store' ),
	'section'  => 'blog',
	'priority' => 03,
	'description' => 'Leave empty to use "Blog" instead.',
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'     => 'text',
	'settings' => 'blog_description',
	'label'    => __( 'Blog description', 'haste-store' ),
	'section'  => 'blog',
	'priority' => 05,
	'description' => 'Optional',
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_blog_sidebar',
	'label'       => __( 'Display sidebar on blog and archives', 'haste-store' ),
	'section'     => 'blog',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'haste-store' ),
		'off' => esc_attr__( 'Disable', 'haste-store' ),
	),
) );


Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_posts_sidebar',
	'label'       => __( 'Display sidebar on single posts', 'haste-store' ),
	'section'     => 'blog',
	'default'     => '1',
	'priority'    => 20,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'haste-store' ),
		'off' => esc_attr__( 'Disable', 'haste-store' ),
	),
) );


Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_post_date',
	'label'       => __( 'Display post date', 'haste-store' ),
	'section'     => 'blog',
	'default'     => '1',
	'priority'    => 30,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'haste-store' ),
		'off' => esc_attr__( 'Disable', 'haste-store' ),
	),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_post_author',
	'label'       => __( 'Display post author', 'haste-store' ),
	'section'     => 'blog',
	'default'     => '1',
	'priority'    => 40,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'haste-store' ),
		'off' => esc_attr__( 'Disable', 'haste-store' ),
	),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_post_category',
	'label'       => __( 'Display post category', 'haste-store' ),
	'section'     => 'blog',
	'default'     => '1',
	'priority'    => 50,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'haste-store' ),
		'off' => esc_attr__( 'Disable', 'haste-store' ),
	),
) );

Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_post_comments_link',
	'label'       => __( 'Display post comments link', 'haste-store' ),
	'section'     => 'blog',
	'default'     => '1',
	'priority'    => 60,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'haste-store' ),
		'off' => esc_attr__( 'Disable', 'haste-store' ),
	),
) );


Haste_Store_Kirki::add_field( 'haste-store', array(
	'type'        => 'switch',
	'settings'    => 'display_post_content',
	'label'       => __( 'Display post content on blog and archives', 'haste-store' ),
	'section'     => 'blog',
	'default'     => '1',
	'priority'    => 70,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'haste-store' ),
		'off' => esc_attr__( 'Disable', 'haste-store' ),
	),
) );
