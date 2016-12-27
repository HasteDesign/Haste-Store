<?php

/*-----------------------------------------------------------------------------------*/
/* POST CLASS */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('bazaarlite_post_class')) {

	function bazaarlite_post_class($classes) {	

		$masonry  = 'post-container masonry-element col-md-4';
		$standard = 'post-container col-md-12';

		if ( bazaarlite_is_woocommerce_active('is_cart') ) :
		
			$classes[] = 'woocommerce_cart_page';
				
		endif;

		if ( !bazaarlite_is_single() && is_home() ) {
			
			if ( !bazaarlite_setting('wip_home') || bazaarlite_setting('wip_home') == "masonry" ) {

				$classes[] = $masonry;

			} else {

				$classes[] = $standard;

			}
			
		} else if ( !bazaarlite_is_single() && bazaarlite_get_archive_title() ) {
			
			if ( !bazaarlite_setting('wip_category_layout') || bazaarlite_setting('wip_category_layout') == "masonry" ) {

				$classes[] = $masonry;

			} else {

				$classes[] = $standard;

			}
			
		} else if ( !bazaarlite_is_single() && is_search() ) {
			
			if ( !bazaarlite_setting('wip_search_layout') || bazaarlite_setting('wip_search_layout') == "masonry" ) {

				$classes[] = $masonry;

			} else {

				$classes[] = $standard;

			}
			
		} else if ( bazaarlite_is_single() && !bazaarlite_is_woocommerce_active('is_product') ) {

			$classes[] = 'post-container col-md-12';

		}
	
		return $classes;
		
	}
	
	add_filter('post_class', 'bazaarlite_post_class');

}

/*-----------------------------------------------------------------------------------*/
/* GET ARCHIVE TITLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_get_archive_title')) {

	function bazaarlite_get_archive_title() {
		
		if ( get_the_archive_title()  && ( get_the_archive_title() <> __( 'Archives', 'bazaar-lite' )) && (!bazaarlite_is_woocommerce_active('is_woocommerce')) ) :
		
			return get_the_archive_title();
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* IS SINGLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_is_single')) {

	function bazaarlite_is_single() {
		
		if ( is_single() || is_page() || is_singular('portfolio') ) :
		
			return true;
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* TAG TITLE */
/*-----------------------------------------------------------------------------------*/  

if (!function_exists('bazaarlite_addtitle')) {

	function bazaarlite_addtitle() {
		
?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php

	}

	add_action( 'wp_head', 'bazaarlite_addtitle' );

}

/*-----------------------------------------------------------------------------------*/
/* BODY CLASSES */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('bazaarlite_body_classes_function')) {

	function bazaarlite_body_classes_function( $classes ) {

		global $wp_customize;

		if ( bazaarlite_setting('wip_infinitescroll_system') == "on" ) :
		
			$classes[] = 'infinitescroll';
				
		endif;

		if ( isset( $wp_customize ) ) :

			$classes[] = 'customizer_active';
				
		endif;

		if ( bazaarlite_setting('wip_minimal_layout') == "on" ) :
		
			$classes[] = 'minimal-layout';
				
		endif;

		return $classes;

	}
	
	add_filter( 'body_class', 'bazaarlite_body_classes_function' );

}

/*-----------------------------------------------------------------------------------*/
/* SIDEBAR LIST */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_sidebar_list')) {

	function bazaarlite_sidebar_list($sidebar_type) {
	
		if ( $sidebar_type == "side" ) :

			$default = array( $sidebar_type."_sidebar_area" => "Default" );

		else:

			$default = array("none" => "None", $sidebar_type."_sidebar_area" => "Default");

		endif;
		
		return $default;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* GET PAGED */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_paged')) {

	function bazaarlite_paged() {
		
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
		
		return $paged;
		
	}

}

?>