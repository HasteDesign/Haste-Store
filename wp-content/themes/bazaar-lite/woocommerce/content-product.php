<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop ;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

?>

<article class="product-container masonry-element col-md-4">

	<div class="product-thumbnail">
        
        <?php echo woocommerce_get_product_thumbnail(); ?>
        
	</div>

    <div class="product-content">
    
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
        
			<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
        
 			<h3 class="product-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
                
			<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
        
        
		<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	
    </div>
    
</article>