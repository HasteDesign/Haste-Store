<?php
/**
 * odin WooCommerce hooks
 *
 * @package HasteStore
 */

/**
 * Remove native styles
 *
 */
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Content wrapper before and after
 * @see  haste_store_before_content()
 * @see  haste_store_after_content()
 * @since  2.2.6
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_main_content', 'haste_store_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'haste_store_after_content', 10 );

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


// remove sidebar for woocommerce pages
add_action( 'get_header', 'remove_shop_sidebar' );
function remove_shop_sidebar() {
    if ( is_shop() && get_theme_mod( 'display_shop_sidebar', true ) == false ) {
      remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    }
}


/**
 * Breadcrumb
 *
 * Use:
 * do_action( 'haste_store_content_top' ); on anywhere for show the breadcrumb
 *
 * @see woocommerce_breadcrumb
 * @since  2.2.6
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
add_action( 'haste_store_content_top', 'woocommerce_breadcrumb', 10 );


/**
 * Filters
 * @see  haste_store_thumbnail_columns()
 * @see  haste_store_products_per_page()
 * @see  haste_store_loop_columns()
 * @see
 * @since  2.2.6
 */
add_filter( 'woocommerce_product_thumbnails_columns', 	'haste_store_thumbnail_columns' );
add_filter( 'loop_shop_per_page', 						'haste_store_products_per_page' );
add_filter( 'loop_shop_columns', 						'haste_store_loop_columns' );
add_filter( 'woocommerce_cross_sells_columns', 'change_cross_sells_columns' );
add_filter( 'woocommerce_cross_sells_total', 'change_cross_sells_product_number' );

/**
 * Related products
 */

 add_filter( 'woocommerce_output_related_products_args', 'haste_related_products_args' );


/**
 * Move single star rating on produtct single
 */
 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
 add_action( 'woocommerce_product_meta_start', 'woocommerce_template_single_rating', 10 );


 /**
  * Move single star rating on loop
  */
  remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
  add_action( 'woocommerce_before_shop_loop_item_title', 'customizer_display_star_rating', 5 );

  function customizer_display_star_rating() {
      if( true == get_theme_mod( 'display_product_rating', true ) ) {
          add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
      }
  }

  /**
   * Out of stock badge
   */

  // Loop
  add_action( 'woocommerce_before_shop_loop_item_title','haste_out_of_stock_badge', 9 );

  // Single
  add_action( 'woocommerce_before_single_product_summary','haste_out_of_stock_badge', 9 );

  /**
   * Out of Stock products order
   */
  add_action( 'pre_get_posts', 'move_out_of_stock_products_to_end' );

/**
 * Option to display or hide buy buttons
 */
 add_action( 'woocommerce_after_shop_loop_item', 'customizer_display_add_to_cart_buttons', 1 );

 function customizer_display_add_to_cart_buttons() {
     if( false == get_theme_mod( 'display_buy_button', true ) ) {
         remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
     }
 }

 /**
  * Option to display or hide the product price
  */
  add_action( 'woocommerce_after_shop_loop_item_title', 'customizer_display_price', 1 );

  function customizer_display_price() {
      if( false == get_theme_mod( 'display_price', true ) ) {
          remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' );
      }
  }
