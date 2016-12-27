<?php

/**
 * Wp in Progress
 * 
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* Woocommerce is active */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'bazaarlite_is_woocommerce_active' ) ) {
	
	function bazaarlite_is_woocommerce_active( $type = "" ) {
	
        global $woocommerce;

        if ( isset( $woocommerce ) ) {
			
			if ( !$type || call_user_func($type) ) {
            
				return true;
			
			}
			
		}
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* THEME SETTINGS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_setting')) {

	function bazaarlite_setting($id, $default = "" ) {

		$bazaarlite_setting = get_theme_mod($id);
			
		if( $bazaarlite_setting ):
		
			return $bazaarlite_setting;
		
		else:
		
			return $default;
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* POST META */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_postmeta')) {

	function bazaarlite_postmeta($id) {
	
		global $post, $wp_query;

		$content_ID = $post->ID;
	
		if( bazaarlite_is_woocommerce_active('is_shop') ) {
	
			$content_ID = get_option('woocommerce_shop_page_id');
	
		}

		$val = get_post_meta( $content_ID , $id, TRUE);
		
		if( isset($val) ) {
			
			return $val;
			
		} else {
				
			return '';
			
		}
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* THUMBNAILS */
/*-----------------------------------------------------------------------------------*/         

if (!function_exists('bazaarlite_get_width')) {

	function bazaarlite_get_width() {
		
		if ( bazaarlite_setting('wip_screen3') ):
			return bazaarlite_setting('wip_screen3');
		else:
			return "940";
		endif;
	
	}

}

if (!function_exists('bazaarlite_get_height')) {

	function bazaarlite_get_height() {
		
		if ( bazaarlite_setting('wip_thumbnails') ):
			return bazaarlite_setting('wip_thumbnails');
		else:
			return "600";
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/*RESPONSIVE EMBED */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_embed_html')) {
	
	function bazaarlite_embed_html( $html ) {
		return '<div class="embed-container">' . $html . '</div>';
	}
	 
	add_filter( 'embed_oembed_html', 'bazaarlite_embed_html', 10, 3 );
	add_filter( 'video_embed_html', 'bazaarlite_embed_html' );
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('bazaarlite_setup')) {

	function bazaarlite_setup() {

		global $content_width;

		if ( ! isset( $content_width ) )
			$content_width = bazaarlite_get_width();
	
		add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link','status','chat','image' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );

		add_theme_support( 'custom-logo');

		add_image_size( 'bazaar-lite-thumbnail', bazaarlite_get_width(), bazaarlite_get_height(), TRUE ); 
		add_image_size( 'bazaar-lite-product', 500,500, TRUE ); 
	
		register_nav_menu( 'main-menu', 'Main menu' );

		load_theme_textdomain('bazaar-lite', get_template_directory() . '/languages');
		
		add_theme_support( 'custom-background', array(
			'default-color' => 'fafafa',
		) );
		
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-plugin-activation.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-customize.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-metaboxes.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-notice.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/admin/customize/customize.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/admin/customize/general.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/after-content.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/before-content.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/bottom_sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/breadcrumb.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/footer_sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/header_sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/masonry.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/media.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/pagination.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/post-formats.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/side_sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/social_buttons.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/title.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/scripts/infinitescroll.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/scripts/infinitescroll_masonry.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/scripts/masonry.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/functions_generals.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/functions_required_plugins.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/functions_style.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/functions_templates.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/functions_widgets.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/functions_woocommerce.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/pages.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/posts.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/product.php' );
		
	}

	add_action( 'after_setup_theme', 'bazaarlite_setup' );

}

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_scripts_styles')) {

	function bazaarlite_scripts_styles() {

		wp_enqueue_style( 'bazaar-style', get_stylesheet_uri(), array() );

		wp_enqueue_style ( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
		wp_enqueue_style ( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );
		wp_enqueue_style ( 'genericons', get_template_directory_uri() . '/assets/css/genericons.css' );
		wp_enqueue_style ( 'bazaar-lite-minimal_layout', get_template_directory_uri() . '/assets/css/minimal_layout.css' );
		wp_enqueue_style ( 'prettyPhoto', get_template_directory_uri() . '/assets/css/prettyPhoto.css' );
		wp_enqueue_style ( 'slick', get_template_directory_uri() . '/assets/css/slick.css' );
		wp_enqueue_style ( 'swipebox', get_template_directory_uri() . '/assets/css/swipebox.css' );
		wp_enqueue_style ( 'bazaar-lite-template', get_template_directory_uri() . '/assets/css/template.css' );
		wp_enqueue_style ( 'bazaar-lite-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );
	
		if ( ( get_theme_mod('wip_skin') ) && ( get_theme_mod('wip_skin') <> "black_turquoise" ) ):
	
			wp_enqueue_style( 'bazaar-lite-' . get_theme_mod('wip_skin') , get_template_directory_uri() . '/assets/skins/' . get_theme_mod('wip_skin') . '.css' ); 
	
		endif;
		
		wp_enqueue_style( 'bazaar-lite-google-fonts', '//fonts.googleapis.com/css?family=Montserrat:300,400,600,700|Yesteryear' );
		
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
		wp_enqueue_script( "jquery-ui-core");
		wp_enqueue_script( "jquery-ui-tabs");
		wp_enqueue_script( "masonry");


		wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.js' , array('jquery'), FALSE, TRUE ); 
		wp_enqueue_script( 'jquery-imagesloaded', get_template_directory_uri() . '/assets/js/jquery.imagesloaded.js' , array('jquery'), FALSE, TRUE ); 
		wp_enqueue_script( 'jquery-infinitescroll', get_template_directory_uri() . '/assets/js/jquery.infinitescroll.js' , array('jquery'), FALSE, TRUE ); 
		wp_enqueue_script( 'jquery-modernizr', get_template_directory_uri() . '/assets/js/jquery.modernizr.js' , array('jquery'), FALSE, TRUE ); 
		wp_enqueue_script( 'jquery-prettyPhoto', get_template_directory_uri() . '/assets/js/jquery.prettyPhoto.js' , array('jquery'), FALSE, TRUE ); 
		wp_enqueue_script( 'jquery-scrollTo', get_template_directory_uri() . '/assets/js/jquery.scrollTo.js' , array('jquery'), FALSE, TRUE ); 
		wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/jquery.slick.js' , array('jquery'), FALSE, TRUE ); 
		wp_enqueue_script( 'jquery-swipebox', get_template_directory_uri() . '/assets/js/jquery.swipebox.js' , array('jquery'), FALSE, TRUE ); 
		wp_enqueue_script( 'jquery-tinynav', get_template_directory_uri() . '/assets/js/jquery.tinynav.js' , array('jquery'), FALSE, TRUE ); 
		wp_enqueue_script( 'bazaar-lite-jquery.wip', get_template_directory_uri() . '/assets/js/jquery.wip.js' , array('jquery'), FALSE, TRUE ); 

		$wip_vars = array(
			'slick_autoplay' => bazaarlite_setting('wip_slick_autoplay', 'false'),
			'slick_dots' => bazaarlite_setting('wip_slick_dots', 'true'),
		);

		wp_localize_script( 'bazaar-lite-jquery.wip', 'wip_vars', $wip_vars );

		wp_enqueue_script ( 'bazaar-lite-html5',get_template_directory_uri().'/assets/scripts/html5.js');
		wp_script_add_data ( 'bazaar-lite-html5', 'conditional', 'IE 8' );
		
		wp_enqueue_script ( 'bazaar-lite-selectivizr',get_template_directory_uri().'/assets/scripts/selectivizr-min.js');
		wp_script_add_data ( 'bazaar-lite-selectivizr', 'conditional', 'IE 8' );

	}
	
	add_action( 'wp_enqueue_scripts', 'bazaarlite_scripts_styles', 11 );

}

?>