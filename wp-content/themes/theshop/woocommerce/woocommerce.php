<?php
/**
 * Woocommerce compatibility
 *
 * @package TheShop
 */

//Check if Woocommerce is active	
function theshop_woocommerce_active() {
	if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
}

if ( !theshop_woocommerce_active() )
	return;

/**
 * Declare support
 */
add_action( 'after_setup_theme', 'theshop_woocommerce_support' );
function theshop_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/**
 * Remove default WooCommerce CSS
 */
function theshop_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] ); 
    return $enqueue_styles;
}
add_filter( 'woocommerce_enqueue_styles', 'theshop_dequeue_styles' );

/**
 * Enqueue custom CSS for Woocommerce
 */
function theshop_woocommerce_css() {
    wp_enqueue_style( 'theshop-wc-css', get_template_directory_uri() . '/woocommerce/css/wc.min.css' );
}
add_action( 'wp_enqueue_scripts', 'theshop_woocommerce_css', 9 );

/**
 * Update cart
 */
function theshop_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'theshop' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'theshop' ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a> 
	<?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'theshop_header_add_to_cart_fragment' );

/**
 * Add cart link to the menu
 */
function theshop_nav_cart ( $items, $args ) {
    if ( $args->theme_location == 'primary' ) {
		$items .= '<li class="nav-cart"><i class="fa fa-shopping-cart"></i><a class="cart-contents" href="' . WC()->cart->get_cart_url() . '" title="' . __( 'View your shopping cart', 'theshop' ) . '">' . sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'theshop' ), WC()->cart->cart_contents_count ) . '-' . WC()->cart->get_cart_total() . '</a></li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'theshop_nav_cart', 10, 2 );

/**
 * Number of columns per row
 */
function theshop_shop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'theshop_shop_columns');

/**
 * Add and remove actions
 */
function theshop_woo_actions() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    add_action('woocommerce_before_main_content', 'theshop_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'theshop_wrapper_end', 10);
}
add_action('wp','theshop_woo_actions');

/**
 * Theme wrappers
 */
function theshop_wrapper_start() {
    echo '<div id="primary" class="content-area">';
        echo '<main id="main" class="site-main" role="main">';
}

function theshop_wrapper_end() {
        echo '</main>';
    echo '</div>';
}

/**
 * Before shop wrappers
 */
function theshop_before_shop_wrapper() {
    echo '<div class="before-shop clearfix">';
}
add_action( 'woocommerce_before_shop_loop', 'theshop_before_shop_wrapper' , 10 );

function theshop_after_shop_wrapper() {
    echo '</div>';
}
add_action( 'woocommerce_before_shop_loop', 'theshop_after_shop_wrapper' , 40 );

/**
 * Archive titles
 */
function theshop_woo_archive_title() {
    echo '<h3 class="woo-title entry-title">';
    echo woocommerce_page_title();
    echo '</h3>';
}
add_filter( 'woocommerce_show_page_title', 'theshop_woo_archive_title' );