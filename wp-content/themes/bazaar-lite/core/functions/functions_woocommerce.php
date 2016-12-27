<?php


/*-----------------------------------------------------------------------------------*/
/* Woocommerce Hooks */
/*-----------------------------------------------------------------------------------*/ 
	
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

/*-----------------------------------------------------------------------------------*/
/* Woocommerce remove breadcrumbs */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'bazaarlite_remove_breadcrumbs' ) ) {

	function bazaarlite_remove_breadcrumbs() {
    	
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	
	}

	add_action( 'init', 'bazaarlite_remove_breadcrumbs' );

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce header cart */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'bazaarlite_header_cart' ) ) {

	function bazaarlite_header_cart() { ?>

        <section class="header-cart">
        
            <a class="cart-contents" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php esc_attr_e( 'View your shopping cart','bazaar-lite' ); ?>">
                
                <i class="fa fa-shopping-cart"></i> 
                <span class="cart-count"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->cart_contents_count, 'bazaar-lite' ), WC()->cart->cart_contents_count ); ?></span>
    
            </a>
                        
            <div class="header-cart-widget">
            
                <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
            
            </div>
            
        </section>
    
<?php

	}
	
}

if ( ! function_exists( 'bazaarlite_cart_link_fragment' ) ) {

	function bazaarlite_cart_link_fragment( $fragments ) {
	
		ob_start();

?>
		<a class="cart-contents" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php esc_attr_e( 'View your shopping cart','bazaar-lite' ); ?>">
            
			<i class="fa fa-shopping-cart"></i> 
			<span class="cart-count"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->cart_contents_count, 'bazaar-lite' ), WC()->cart->cart_contents_count ); ?></span>

		</a>
        
<?php

		$fragments['a.cart-contents'] = ob_get_clean();
		
		return $fragments;
	
	}
	
	add_filter( 'woocommerce_add_to_cart_fragments', 'bazaarlite_cart_link_fragment' );

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce template */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_woocommerce_before_main_content')) {

	function bazaarlite_woocommerce_before_main_content() { 
	
		if ( is_product() ) {
			
			$classes = "product-wrapper" ;
	
		} else {
	
			$classes = "product-wrapper products-list" ;
	
		}

		if ( (is_shop() || is_product()) && (bazaarlite_postmeta('wip_header_sidebar') && bazaarlite_postmeta('wip_header_sidebar') <> "none") ):

			do_action('bazaarlite_header_sidebar', bazaarlite_postmeta('wip_header_sidebar'));
		
		endif;
	
?>
	
	<div class="container">
	
		<div class="row">
		
			<div class="<?php echo bazaarlite_template('span') . " " . bazaarlite_template('sidebar') . " " . $classes; ?>" >
	
<?php
	
	}
	
	add_action('woocommerce_before_main_content', 'bazaarlite_woocommerce_before_main_content', 10);

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce template */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_woocommerce_after_main_content')) {
	
	function bazaarlite_woocommerce_after_main_content() { ?>
	
			</div>
			
			<?php 
			
				if ( bazaarlite_template('span') == "col-md-8" ) :

					do_action('bazaarlite_side_sidebar', 'side_sidebar_area'); 
					
				endif;
				
			?>
	
		</div>
		
	</div>
    
<?php
	
		do_action('bazaarlite_masonry_script');

		if ( (is_shop() || is_product()) && (bazaarlite_postmeta('wip_bottom_sidebar') && bazaarlite_postmeta('wip_bottom_sidebar') <> "none") ):

			do_action('bazaarlite_header_sidebar', bazaarlite_postmeta('wip_bottom_sidebar'));
		
		endif;

	}
	
	add_action('woocommerce_after_main_content', 'bazaarlite_woocommerce_after_main_content', 10);

}

?>