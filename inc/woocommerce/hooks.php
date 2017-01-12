<?php
/**
 * odin WooCommerce hooks
 *
 * @package odin
 */

/**
 * Remove native styles
 *
 */
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Content wrapper before and after
 * @see  odin_before_content()
 * @see  odin_after_content()
 * @since  2.2.6
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_main_content', 'odin_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'odin_after_content', 10 );

/**
 * Remove sidebar
 *
 * Tip:
 * Case you use this action, change template page for full-width style in inc/woocommerce/functions.php
 *
 * @see woocommerce_sidebars
 * @since  2.2.6
 */
 function remove_sidebar_on_singles() {

 if ( is_single() || is_checkout() || is_cart() || is_product() || is_home() ) {

 	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
 }
}
add_action( 'get_header', 'remove_sidebar_on_singles' );

/**
 * Breadcrumb
 *
 * Use:
 * do_action( 'odin_content_top' ); on anywhere for show the breadcrumb
 *
 * @see woocommerce_breadcrumb
 * @since  2.2.6
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
add_action( 'odin_content_top', 'woocommerce_breadcrumb', 10 );


/**
 * Filters
 * @see  odin_thumbnail_columns()
 * @see  odin_products_per_page()
 * @see  odin_loop_columns()
 * @since  2.2.6
 */
add_filter( 'woocommerce_product_thumbnails_columns', 	'odin_thumbnail_columns' );
add_filter( 'loop_shop_per_page', 						'odin_products_per_page' );
add_filter( 'loop_shop_columns', 						'odin_loop_columns' );


/**
 * Related products
 */

 add_filter( 'woocommerce_output_related_products_args', 'haste_related_products_args' );


/**
 * Shop sections
 */

add_action( 'woocommerce_before_main_content', 'haste_store_featured_products', 30 );


/**
 * Move single star rating on produtct single
 */
 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
 add_action( 'woocommerce_product_meta_start', 'woocommerce_template_single_rating', 10 );


 /**
  * Move single star rating on loop
  */
  remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
  add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
