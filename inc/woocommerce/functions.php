<?php
/**
 * General functions used to integrate this theme with WooCommerce.
 *
 * @package odin
 */

if ( ! function_exists( 'odin_before_content' ) ) {
	/**
	 * Before Content
	 * Wraps all WooCommerce content in wrappers which match the theme markup
	 * @since   2.2.6
	 * @return  void
	 */
	function odin_before_content() {

		if ( is_single() || is_home() || ( is_woocommerce_activated() && is_checkout() || is_cart() || is_product() ) )  {
		?>
		<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
		<?php

		} else {

		?>
		<main id="content" class="<?php echo odin_classes_page_sidebar(); ?>" tabindex="-1" role="main">
		<?php

		}
	}
}

if ( ! function_exists( 'odin_after_content' ) ) {
	/**
	 * After Content
	 * Closes the wrapping divs
	 * @since   2.2.6
	 * @return  void
	 */
	function odin_after_content() {
		?>
		</main><!-- #main -->
		<?php
	}
}

/**
 * Default loop columns on product archives
 * @return integer products per row
 * @since  2.2.6
 */
function odin_loop_columns() {
	return apply_filters( 'odin_loop_columns', get_theme_mod( 'shop_columns', 4 ) ); // 4 products per row
}

/**
 * Product gallery thumnail columns
 * @return integer number of columns
 * @since  2.2.6
 */
function odin_thumbnail_columns() {
	return intval( apply_filters( 'odin_product_thumbnail_columns', 4 ) );
}

/**
 * Products per page
 * @return integer number of products
 * @since  2.2.6
 */
function odin_products_per_page() {
	return intval( apply_filters( 'odin_products_per_page', get_theme_mod( 'shop_products_per_page', 12 ) ) );
}

/**
 * Haste Store shop addons
 * =============================================
 */

 /**
  * Call a shortcode function by tag name.
  *
  * @since  1.4.6
  *
  * @param string $tag     The shortcode whose function to call.
  * @param array  $atts    The attributes to pass to the shortcode function. Optional.
  * @param array  $content The shortcode's content. Default is null (none).
  *
  * @return string|bool False on failure, the result of the shortcode on success.
  */
 function haste_store_do_shortcode( $tag, array $atts = array(), $content = null ) {
 	global $shortcode_tags;

 	if ( ! isset( $shortcode_tags[ $tag ] ) ) {
 		return false;
 	}

 	return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
 }



/**
 * Related products
 */

function haste_related_products_args( $args ) {
	$args['posts_per_page'] = get_theme_mod( 'shop_columns', 4 ); // 4 related products
	$args['columns'] = get_theme_mod( 'shop_columns', 4 ); // arranged in 2 columns
	return $args;
}

/**
 * Change the number of columns displayed in cart cross sells area
 * @param  int $columns number of product columns to be displayed in cart cross sells
 * @return int          [description]
 */
function change_cross_sells_columns( $columns ) {
	return 2;
}

/**
 * Change the number of products to be displayed in cross sells area
 * @param  int $n_products number of products to be displayed in cross sells
 * @return int
 */
function change_cross_sells_product_number( $n_products ) {
    return 2;
}

/**
 * Out of Stock
 */
function move_out_of_stock_products_to_end( $q ) {
	// checks whether it is product query or skip next steps
	if ( ( ! isset( $q->query_vars['wc_query'] ) || ! isset( $q->query_vars['post_type'] ) )
	    || ( $q->query_vars['wc_query'] != 'product_query' && $q->query_vars['post_type'] != 'product' )
	    || is_admin() ) {
			return;
	}

	// this code just adds postmeta table into search query
	$q->set( 'meta_query', array(array(
		'key' => '_stock_status',
		'value' => '',
		'compare' => 'NOT IN'
	)));

	// filter to handle final post request
	add_filter( 'posts_request', 'add_stock_status_in_request' );

	// filter to handle additional post fields in select statement
	add_filter( 'posts_fields', 'add_stock_status_in_post_fields', 10, 2);

	remove_action( 'pre_get_posts', 'move_out_of_stock_products_to_end' );
}

function add_stock_status_in_post_fields( $fields, $query ) {
	$fields .= ", IF(mt1.meta_value = 'instock', 10, 5) as stock_status";
	remove_filter('posts_fields', 'add_stock_status_in_post_fields');
	return $fields;
}

function add_stock_status_in_request( $input ) {
	if ( preg_match("@\((.*?)\.meta_key = '_stock_status'@i", $input, $table_name ) ) {
		$input = str_ireplace("mt1.", $table_name[1] . '.', $input);
	}
	$input = str_ireplace("ORDER BY", "ORDER BY stock_status DESC,", $input);
	return $input;
}
