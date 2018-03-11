<?php
/**
 * Custom template tags used to integrate this theme with WooCommerce.
 *
 * @package HasteStore
 */

if ( ! function_exists( 'haste_store_cart_link' ) ) {

	/**
	 * Cart Link
	 * Displayed a link to the cart including the number of items present and the cart total
	 *
	 * @since  2.2.6
	 *
	 * @param  array $settings Settings
	 *
	 * @return array           Settings
	 */
	function haste_store_cart_link() {
		if ( is_cart() ) {
			$class = 'current-menu-item active';
		} else {
			$class = '';
		}
		?>
		<li class="<?php echo esc_attr( $class ); ?> cart-link">
			<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'haste-store' ); ?>">
				<?php echo wp_kses_data( WC()->cart->get_cart_total() ); ?> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'haste-store' ), WC()->cart->get_cart_contents_count() ) );?></span>
			</a>
		</li>
		<?php
	}
}

if ( ! function_exists( 'haste_store_product_search' ) ) {

	/**
	 * Display Product Search
	 *
	 * @since 2.2.6
	 *
	 * @uses  is_woocommerce_activated() check if WooCommerce is activated
	 */
	function haste_store_product_search() {
		if ( is_woocommerce_activated() ) { ?>
			<div class="site-search">
				<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
			</div>
		<?php
		}
	}
}

if ( ! function_exists( 'haste_store_header_cart' ) ) {

	/**
	 * Display Header Cart
	 *
	 * @since 2.2.6
	 *
	 * @uses  is_woocommerce_activated() check if WooCommerce is activated
	 */
	function haste_store_header_cart() {
		if ( is_woocommerce_activated() ) { ?>
			<ul class="header-cart menu dropdown-menu">
				<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>

				<?php if ( is_cart() || is_checkout() ){
						echo '<div class="cart-info">' . __( 'You are at', 'haste-store' );
						echo '<h3>';
						 	the_title();
						echo '</h3></div>';
					}
				?>

			</ul>
		<?php
		}
	}
}

/**
 * Out of stock badge
 */

 function haste_out_of_stock_badge() {
	global $product;
  	if ( ! $product->is_in_stock() ) {
		 echo '<span class="out-of-stock-badge">'. __( 'Out of stock', 'haste-store' ) .'</span>';
	}
 }
