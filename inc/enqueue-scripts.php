<?php

/**
 * Load scripts and styles.
 *
 * @since 2.2.0
 */
function haste_store_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// JQuery script.
	wp_enqueue_script( 'jquery' );

	// IE-specific scripts with conditional comments.
	wp_enqueue_script( 'respondjs', 'https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js' );
	wp_script_add_data( 'respondjs', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'html5shiv', 'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	// General scripts.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		// Loads main stylesheet file.
		wp_enqueue_style( 'haste-store-main-style', $template_url . '/assets/css/main.css' );

		// Loads main script file.
		wp_enqueue_script( 'haste-store-main-script', $template_url . '/src/js/main.js', array(), null, true );

	} else {
		// Loads main stylesheet file compressed.
		wp_enqueue_style( 'haste-store-main-style', get_stylesheet_uri() );

		// Loads main script file compressed.
		wp_enqueue_script( 'haste-store-main-script', $template_url . '/assets/js/main.min.js', array(), null, true );
	}

	// Load Thread comments WordPress script.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'haste_store_enqueue_scripts', 1 );

/**
 * Haste Starter custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function haste_store_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/main.css';
}
add_filter( 'stylesheet_uri', 'haste_store_stylesheet_uri', 10, 2 );

/**
 * Displays BrowserSync script
 */
function haste_store_browser_sync() {
	?>
	<script id="__bs_script__">
	//<![CDATA[
		document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.13'><\/script>".replace("HOST", location.hostname));
	//]]>
	</script>
	<?php
}
add_action( 'wp_footer', 'haste_store_browser_sync' );

/**
 * Enqueue haste widgets modules scripts.
 * Enqueue dependency scripts and custom haste widgets modules script in widget
 * screen and customizer.
 */
function haste_store_widgets_modules_assets() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');

	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );

	$colorpicker_l10n = array(
	    'clear' => __( 'Clear' , 'haste-widgets-modules'),
	    'defaultString' => __( 'Default', 'haste-widgets-modules' ),
	    'pick' => __( 'Select Color', 'haste-widgets-modules' ),
	    'current' => __( 'Current Color', 'haste-widgets-modules' ),
	);
	wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n );

	wp_enqueue_script( 'haste-widgets', get_template_directory_uri() . '/core/assets/js/haste-widgets.js', array( 'jquery', 'wp-color-picker', 'media-upload', 'thickbox' ) ) ;
}
add_action( 'customizer_enqueue_scripts', 'haste_store_widgets_modules_assets' );
add_action( 'admin_print_scripts-widgets.php', 'haste_store_widgets_modules_assets' );