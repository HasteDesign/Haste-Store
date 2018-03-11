<?php
/**
 * Register widget areas.
 *
 * @since 2.2.0
 */
function haste_store_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Home main content', 'haste-store' ),
			'id' => 'home-main-content',
			'description' => __( 'Home page template main content area', 'haste-store' ),
			'before_widget' => '<div id="%1$s" class="widget page-section %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widgettitle widget-title section-title">',
			'after_title' => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'haste-store' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar, displayed on pages and posts', 'haste-store' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __( 'WooCommerce Sidebar', 'haste-store' ),
			'id' => 'woo-sidebar',
			'description' => __( 'Displays widgets on WooCommerce pages' , 'haste-store' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title HHHAHAHAHA">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __( 'Footer area 1', 'haste-store' ),
			'id' => 'footer-widget-area-1',
			'description' => __( 'First footer column ', 'haste-store' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __( 'Footer area 1', 'haste-store' ),
			'id' => 'footer-widget-area-1',
			'description' => __( 'First footer column ', 'haste-store' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __( 'Footer area 2', 'haste-store' ),
			'id' => 'footer-widget-area-2',
			'description' => __( 'Second footer column ', 'haste-store' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __( 'Footer area 3', 'haste-store' ),
			'id' => 'footer-widget-area-3',
			'description' => __( 'Third footer column ', 'haste-store' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __( 'Footer area 4', 'haste-store' ),
			'id' => 'footer-widget-area-4',
			'description' => __( 'Fourth footer column ', 'haste-store' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'haste_store_widgets_init' );
