<?php
/**
 * @package TheShop
 */


//Dynamic styles
function theshop_custom_styles($custom) {

	$custom = '';

	$menu_style = get_theme_mod('menu_style','inline');
	if ($menu_style == 'centered') {
		$custom .= ".site-header .container { display: block;}"."\n";
		$custom .= ".site-branding { width: 100%; text-align: center;margin-bottom:15px;padding-left:15px;}"."\n";
		$custom .= ".main-navigation { width: 100%;float: none;clear:both;}"."\n";
		$custom .= ".main-navigation ul { float: none;text-align:center;}"."\n";
		$custom .= ".main-navigation li { float: none; display: inline-block;}"."\n";
		$custom .= ".main-navigation ul ul li { display: block; text-align: left;}"."\n";
	}
	//Logo size
	$logo_size = get_theme_mod( 'logo_size', '80' );
	$custom .= ".site-logo { max-height:" . intval($logo_size) . "px; }"."\n";

	//Menu padding
	$menu_padding = get_theme_mod( 'branding_padding', '30' );
	$custom .= ".site-header { padding:" . intval($menu_padding) . "px 0; }"."\n";

	//Slider
	if ( get_theme_mod('side_menu') ) {
		$custom .= ".header-slider {padding:0;width:100%;}"."\n";
		$custom .= ".hero-section {display:block;}"."\n";
	}

	//Sections styling        
    $products_bg_color 	= get_theme_mod('products_bg_color', '#fff');
    $cta_bg_color 		= get_theme_mod('cta_bg_color', '#2C292A');
    $cats_bg_color 		= get_theme_mod('cats_bg_color', '#f7f7f7');
    $posts_bg_color 	= get_theme_mod('posts_bg_color', '#fff');
    $products_color 	= get_theme_mod('products_color');
    $cta_color 			= get_theme_mod('cta_color', '#fff');
    $cats_color 		= get_theme_mod('cats_color');
    $posts_color 		= get_theme_mod('posts_color');

	$custom .= ".products-loop { background-color:" . esc_attr($products_bg_color) . "}"."\n";
	$custom .= ".cta-section { background-color:" . esc_attr($cta_bg_color) . "}"."\n";
	$custom .= ".cats-loop { background-color:" . esc_attr($cats_bg_color) . "}"."\n";
	$custom .= ".posts-loop { background-color:" . esc_attr($posts_bg_color) . "}"."\n";
	$custom .= ".products-loop, .products-loop .section-title, .products-loop h3, .products-loop .woocommerce ul.products li.product .price { color:" . esc_attr($products_color) . "}"."\n";
	$custom .= ".cta-section { color:" . esc_attr($cta_color) . "}"."\n";
	$custom .= ".cats-loop, .cats-loop .section-title { color:" . esc_attr($cats_color) . "}"."\n";
	$custom .= ".posts-loop, .posts-loop .section-title, .posts-loop .post-title a { color:" . esc_attr($posts_color) . "}"."\n";

	//Primary color
	$primary_color = get_theme_mod( 'primary_color', '#9FAFF1' );
	if ( $primary_color != '#9FAFF1' ) {
		$custom .= ".woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button, .woocommerce div.product p.price,.woocommerce div.product span.price,.woocommerce .woocommerce-info:before,.woocommerce .woocommerce-message:before,.woocommerce .woocommerce-message:before,.preloader .preloader-inner,.entry-title a:hover,.woocommerce .star-rating span,a, a:hover, .main-navigation a:hover { color:" . esc_attr($primary_color) . "}"."\n";
		$custom .= ".add_to_cart_button::before,.cart-button::before,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce span.onsale,.owl-theme .owl-controls .owl-page span,li.nav-cart,.widget-title::after,.post-navigation a,.posts-navigation a,.secondary-navigation li:hover,.secondary-navigation ul ul,button, .button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"] { background-color:" . esc_attr($primary_color) . "}"."\n";
		$custom .= ".woocommerce .woocommerce-info,.woocommerce .woocommerce-message,.woocommerce .woocommerce-error,.woocommerce .woocommerce-info,.woocommerce .woocommerce-message,.main-navigation ul ul { border-top-color:" . esc_attr($primary_color) . ";}"."\n";	
		$custom .= ".woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover { border-color:" . esc_attr($primary_color) . ";}"."\n";	

	}
	//Body
	$body_text = get_theme_mod( 'body_text_color', '#4c4c4c' );
	$custom .= "body, .widget a { color:" . esc_attr($body_text) . "}"."\n";
	
	//Menu
	$menu_bg = get_theme_mod( 'menu_bg', '#fff' );
	$custom .= ".site-header { background-color:" . esc_attr($menu_bg) . "}"."\n";
	
	//Menu items
	$menu_color = get_theme_mod( 'menu_color', '#1c1c1c' );
	$custom .= ".main-navigation a { color:" . esc_attr($menu_color) . "}"."\n";

	//Site title
	$site_title = get_theme_mod( 'site_title_color', '#1c1c1c' );
	$custom .= ".site-title a, .site-title a:hover { color:" . esc_attr($site_title) . "}"."\n";
	
	//Site desc
	$site_desc = get_theme_mod( 'site_desc_color', '#767676' );
	$custom .= ".site-description { color:" . esc_attr($site_desc) . "}"."\n";
	
	//Fonts
	$body_fonts = get_theme_mod('body_font_family');	
	$headings_fonts = get_theme_mod('headings_font_family');
	if ( $body_fonts !='' ) {
		$custom .= "body, .main-navigation ul ul li { font-family:" . $body_fonts . ";}"."\n";
	}
	if ( $headings_fonts !='' ) {
		$custom .= "h1, h2, h3, h4, h5, h6, .main-navigation li, .promo-box span { font-family:" . $headings_fonts . ";}"."\n";
	}
    //Site title
    $site_title_size = get_theme_mod( 'site_title_size', '36' );
    if ( get_theme_mod( 'site_title_size' )) {
        $custom .= ".site-title { font-size:" . intval($site_title_size) . "px; }"."\n";
    }
    //Site description
    $site_desc_size = get_theme_mod( 'site_desc_size', '14' );
    if ( get_theme_mod( 'site_desc_size' )) {
        $custom .= ".site-description { font-size:" . intval($site_desc_size) . "px; }"."\n";
    }	    	
	//H1 size
	$h1_size = get_theme_mod( 'h1_size' );
	if ( get_theme_mod( 'h1_size' )) {
		$custom .= "h1 { font-size:" . intval($h1_size) . "px; }"."\n";
	}
    //H2 size
    $h2_size = get_theme_mod( 'h2_size' );
    if ( get_theme_mod( 'h2_size' )) {
        $custom .= "h2 { font-size:" . intval($h2_size) . "px; }"."\n";
    }
    //H3 size
    $h3_size = get_theme_mod( 'h3_size' );
    if ( get_theme_mod( 'h3_size' )) {
        $custom .= "h3 { font-size:" . intval($h3_size) . "px; }"."\n";
    }
    //H4 size
    $h4_size = get_theme_mod( 'h4_size' );
    if ( get_theme_mod( 'h4_size' )) {
        $custom .= "h4 { font-size:" . intval($h4_size) . "px; }"."\n";
    }
    //H5 size
    $h5_size = get_theme_mod( 'h5_size' );
    if ( get_theme_mod( 'h5_size' )) {
        $custom .= "h5 { font-size:" . intval($h5_size) . "px; }"."\n";
    }
    //H6 size
    $h6_size = get_theme_mod( 'h6_size' );
    if ( get_theme_mod( 'h6_size' )) {
        $custom .= "h6 { font-size:" . intval($h6_size) . "px; }"."\n";
    }
    //Body size
    $body_size = get_theme_mod( 'body_size' );
    if ( get_theme_mod( 'body_size' )) {
        $custom .= "body { font-size:" . intval($body_size) . "px; }"."\n";
    }

	//Output all the styles
	wp_add_inline_style( 'theshop-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'theshop_custom_styles' );