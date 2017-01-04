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

		if ( is_single() || is_checkout() || is_cart() || is_product() || is_home() ) {
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
	return apply_filters( 'odin_loop_columns', 4 ); // 4 products per row
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
	return intval( apply_filters( 'odin_products_per_page', 12 ) );
}

/**
 * Harness shop addons
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
 function harness_do_shortcode( $tag, array $atts = array(), $content = null ) {
 	global $shortcode_tags;

 	if ( ! isset( $shortcode_tags[ $tag ] ) ) {
 		return false;
 	}

 	return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
 }





/**
 * Harnes shop categories
 */

 function harness_product_categories( $args ) {

	 if ( is_woocommerce_activated() ) {

		 $args = apply_filters( 'harness_product_categories_args', array(
			 'limit' 			=> 2,
			 'columns' 			=> 2,
			 'child_categories' 	=> 0,
			 'orderby' 			=> 'name',
			 'title'				=> __( 'Shop by Category', 'haste-store' ),
		 ) );

		 echo '<section class="product-section product-categories">';

		 echo '<div class="page-header"><h2 class="page-title">' . wp_kses_post( $args['title'] ) . '</h2></div>';

		 echo harness_do_shortcode( 'product_categories', array(
			 'number'  => intval( $args['limit'] ),
			 'columns' => intval( $args['columns'] ),
			 'orderby' => esc_attr( $args['orderby'] ),
			 'parent'  => esc_attr( $args['child_categories'] ),
		 ) );

		 echo '</section>';
	 }
 }


 /**
  * Harnes featured products
  */

  function harness_featured_products( $args ) {

 	 if ( is_woocommerce_activated() & is_front_page() & !is_paged() ) :

 		 $args = apply_filters( 'harness_featured_products_args', array(
 			 'limit' 			=> 3,
 			 'columns' 			=> 3,
 			 'orderby' 			=> 'name',
			 'order'			=> 'desc',
 			 'title'				=> __( 'Featured products', 'haste-store' )
 		 ) );

 		 echo '<section class="product-section featured-products">';

 		 echo '<div class="page-header"><h2 class="page-title">' . wp_kses_post( $args['title'] ) . '</h2></div>';

 		 echo harness_do_shortcode( 'featured_products', array(
 			 'per_page'=> intval( $args['limit'] ),
 			 'columns' => intval( $args['columns'] ),
 			 'orderby' => esc_attr( $args['orderby'] ),
			 'order'   => esc_attr( $args['order'] ),
 		 ) );

 		 echo '</section>';
 endif;
 	 }


	/**
	 * Harness top sidebar
	 */

	 function harness_get_sidebar_top() {
		 get_sidebar('top');
	 }
