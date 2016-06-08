<?php
/**
 * Functions for the header
 *
 * @package TheShop
 */


/**
 * Header promo boxes
 */
if ( ! function_exists( 'theshop_top_promo' ) ) :
function theshop_top_promo() {
	$block_texts 	= array();
	$block_texts[]	= get_theme_mod('block_text_1', 'Free shipping');
	$block_texts[] 	= get_theme_mod('block_text_2', 'Friendly prices');
	$block_texts[] 	= get_theme_mod('block_text_3', 'Always on time');
	$block_icons 	= array();
	$block_icons[]	= get_theme_mod('block_icon_1', 'fa-rocket');
	$block_icons[] 	= get_theme_mod('block_icon_2', 'fa-money');
	$block_icons[] 	= get_theme_mod('block_icon_3', 'fa-clock-o');

	foreach ($block_texts as $index => $block_text) {
		if ($block_text) {
			echo '<div class="promo-box">';
			echo '<i class="fa ' . esc_html($block_icons[$index]) . '"></i>';
			echo '<span>' . esc_html($block_text) . '</span>';
			echo '</div>';
        }
    }
}
endif;

/**
 * Site branding
 */
if ( ! function_exists( 'theshop_branding' ) ) :
function theshop_branding() {
	if ( get_theme_mod('site_logo') ) :
		echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr(get_bloginfo('name')) . '"><img class="site-logo" src="' . esc_url(get_theme_mod('site_logo')) . '" alt="' . esc_attr(get_bloginfo('name')) . '" /></a>'; 
	else :
		echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html(get_bloginfo('name')) . '</a></h1>';
		if ( get_bloginfo( 'description' ) ) {
			echo '<h2 class="site-description">' . esc_html(get_bloginfo( 'description' )) . '</h2>';
		}
	endif;
}
endif;

/**
 * Header slider
 */
if ( ! function_exists( 'theshop_slider' ) ) :
function theshop_slider() {

	$images = array();
	$images[] = get_theme_mod('slider_image_1', get_template_directory_uri() . '/images/1.jpg');
	$images[] = get_theme_mod('slider_image_2', get_template_directory_uri() . '/images/2.jpg');
	$images[] = get_theme_mod('slider_image_3');
	$images[] = get_theme_mod('slider_image_4');
	$images[] = get_theme_mod('slider_image_5');

	$links = array();
	$links[] = get_theme_mod('slider_link_1'); 
	$links[] = get_theme_mod('slider_link_2'); 
	$links[] = get_theme_mod('slider_link_3'); 
	$links[] = get_theme_mod('slider_link_4'); 
	$links[] = get_theme_mod('slider_link_5'); 

	echo '<ul>';
		foreach ($images as $index => $image) {
			if ($image) {
				if ( $links[$index] ) {
        			echo '<li><a href="' . $links[$index] . '"><img class="slide-item" src="' . esc_url($image) . '"/></a></li>';
        		} else {
        			echo '<li><img class="slide-item" src="' . esc_url($image) . '"/></li>';
        		}
        	}
    	}
    echo '</ul>';
}
endif;