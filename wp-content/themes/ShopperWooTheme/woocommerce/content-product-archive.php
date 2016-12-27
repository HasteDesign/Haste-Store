<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates

 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $product, $woocommerce_loop;
// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;
// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
// Ensure visibility
if ( ! $product->is_visible() )
	return;
// Increase loop count
$woocommerce_loop['loop']++;
global $x;
// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<li <?php //post_class( $classes ); ?> class="home_small_box <?php if($x == 2) { echo 'home_small_box_last'; } ?>">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	<?php //echo '**' . $x . '**'; ?>
	<div>
	<a href="<?php the_permalink(); ?>">
		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
			do_action( 'woocommerce_before_shop_loop_item_title' );
			//echo get_the_post_thumbnail( $post->ID, 'product-image' )
			if ( has_post_thumbnail() ) {
				//echo get_the_post_thumbnail( get_the_ID(), array(370,370) );			
				echo get_the_post_thumbnail( get_the_ID(), 'home-small-box' );					
			}			
		?>
	</a>
	</div>
		<div class="sb_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		
		<div class="sb_price">
		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
		</div>
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
</li>
<?php if ($x == 3) { echo '<div class="clear home_small_box"></div>'; } ?>