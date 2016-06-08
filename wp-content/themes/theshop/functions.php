<?php
/**
 * TheShop functions and definitions
 *
 * @package TheShop
 */

if ( ! function_exists( 'theshop_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theshop_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TheShop, use a find and replace
	 * to change 'theshop' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'theshop', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1170;
	}

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('theshop-small', 400, 230, true);
	add_image_size('theshop-large', 800);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'theshop' ),
		'secondary' => esc_html__( 'Side menu', 'theshop' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'theshop_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // theshop_setup
add_action( 'after_setup_theme', 'theshop_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function theshop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'theshop' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	//Footer widget areas
	$widget_areas = get_theme_mod('footer_widget_areas', '3');
	for ($i=1; $i<=$widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'theshop' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}	
}
add_action( 'widgets_init', 'theshop_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theshop_scripts() {

	wp_enqueue_style( 'theshop-style', get_stylesheet_uri() );

	if ( get_theme_mod('body_font_name') !='' ) {
	    wp_enqueue_style( 'theshop-body-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('body_font_name')) ); 
	} else {
	    wp_enqueue_style( 'theshop-body-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic');
	}

	if ( get_theme_mod('headings_font_name') !='' ) {
	    wp_enqueue_style( 'theshop-headings-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('headings_font_name')) ); 
	} else {
	    wp_enqueue_style( 'theshop-headings-fonts', '//fonts.googleapis.com/css?family=Oswald:300,400,700'); 
	}

	wp_enqueue_style( 'theshop-fontawesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );	

	wp_enqueue_script( 'theshop-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'theshop-unslider', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '', true );	

	wp_enqueue_script( 'theshop-scripts', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'theshop_scripts' );

/**
 * Enqueue Bootstrap
 */
function theshop_enqueue_bootstrap() {
	wp_enqueue_style( 'theshop-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'theshop_enqueue_bootstrap', 9 );

/**
 * Load html5shiv
 */
function theshop_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'theshop_html5shiv' );

/**
 * Full width single posts
 */
function theshop_fullwidth_singles($classes) {
	if ( get_theme_mod('fullwidth_single', 0) ) {
		$classes[] = 'fullwidth-single';
	}
	return $classes;
}
add_filter('body_class', 'theshop_fullwidth_singles');

/**
 * Change the excerpt length
 */
function theshop_excerpt_length( $length ) {
	$excerpt = get_theme_mod('exc_lenght', '35');
	return $excerpt;
}
add_filter( 'excerpt_length', 'theshop_excerpt_length', 999 );

/**
 * Secondary nav fallback
 */
function theshop_menu_fallback() {
	echo '<ul class="menu">';
	echo '<li><i class="fa fa-child"></i><a href="#">' . __( 'Kids clothing', 'theshop' ) . '</a></li>';
	echo '<li><i class="fa fa-bicycle"></i><a href="#">' . __( 'Sports', 'theshop' ) . '</a></li>';
	echo '<li><i class="fa fa-book"></i><a href="#">' . __( 'Books', 'theshop' ) . '</a></li>';
	echo '<li><i class="fa fa-diamond"></i><a href="#">' . __( 'Jewelry', 'theshop' ) . '</a></li>';
	echo '<li><i class="fa fa-briefcase"><a href="#"></i>' . __( 'Accessories', 'theshop' ) . '</a></li>';
	echo '</ul>';
}

/**
 * Add clearfix to post classes
 */
function theshop_clearfix_posts( $classes ) {
	$classes[] = 'clearfix';
	return $classes;
}
add_filter( 'post_class', 'theshop_clearfix_posts' );

/**
 * Footer credits
 */
function theshop_footer_credits() {
	echo '<a href="' . esc_url( __( 'http://wordpress.org/', 'theshop' ) ) . '">';
		printf( __( 'Proudly powered by %s', 'theshop' ), 'WordPress' );
	echo '</a>';
	echo '<span class="sep"> | </span>';
	printf( __( 'Theme: %2$s by %1$s.', 'theshop' ), 'aThemes', '<a href="http://athemes.com/theme/theshop" rel="designer">TheShop</a>' );
}
add_action( 'theshop_footer', 'theshop_footer_credits' );

/**
 * Remove categories/tags prefix
 */
function theshop_archive_prefix($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
    	$title = single_tag_title( '', false );
  	}
	return $title;
}
add_filter( 'get_the_archive_title', 'theshop_archive_prefix' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Styles
 */
require get_template_directory() . '/inc/styles.php';

/**
 * Homepage sections
 */
require get_template_directory() . '/inc/sections.php';

/**
 * Header functions
 */
require get_template_directory() . '/inc/header-functions.php';

/**
 * Woocommerce
 */
require get_template_directory() . '/woocommerce/woocommerce.php';