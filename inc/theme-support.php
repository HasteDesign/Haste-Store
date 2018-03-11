<?php

if ( ! function_exists( 'haste_store_theme_support' ) ) :
	/**
	 * Setup theme support.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support
	 */
	function haste_store_theme_support() {

		// Add multiple languages support.
		load_theme_textdomain( 'haste-store', get_template_directory() . '/languages' );

		// Add post_thumbnails suport.
		add_theme_support( 'post-thumbnails' );

		// Add feed link support.
		add_theme_support( 'automatic-feed-links' );

		// Custom Header.
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		// Custom Background.
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		// Add custom editor style support.
		add_editor_style( 'assets/css/editor-style.css' );

		// Add infinite scroll support.
		add_theme_support( 'infinite-scroll', array(
			'type'           => 'scroll',
			'footer_widgets' => false,
			'container'      => 'content',
			'wrapper'        => false,
			'render'         => false,
			'posts_per_page' => get_option( 'posts_per_page' ),
		) );

		// Add support for Post Formats.
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat',
		// ) );

		// Add the excerpt on pages.
		// add_post_type_support( 'page', 'excerpt' );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add custom logo support.
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
			'flex-width' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
		
		// Customizer selective refresh
		add_theme_support( 'customize-selective-refresh-widgets' );
		 
		/*
		 * WooCommerce
		 */
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

	} /* end theme support */
endif;

add_action( 'after_setup_theme', 'haste_store_theme_support' );

if ( ! function_exists( 'haste_store_content_width' ) ) :
	/**
	 * Sets the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function haste_store_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'haste_store_content_width', 860 );
	}
endif;

add_action( 'after_setup_theme', 'haste_store_content_width', 0 );
