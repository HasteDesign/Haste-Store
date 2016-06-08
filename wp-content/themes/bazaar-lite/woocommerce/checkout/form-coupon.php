<?php
/**
 * Checkout coupon form
 *
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! WC()->cart->coupons_enabled() ) {
    return;
}

?>

<div class="coupon-form-checkout">

    <p class="coupon_link">
   
        <?php echo apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon? ', 'bazaar-lite' ) . '<a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'bazaar-lite' ) . '</a>' ); ?>
   
    </p>

    <form class="checkout_coupon" method="post" style="display:none">

        <p class="form-row form-row-wide">
            <input type="text" name="coupon_code" class="input-text" placeholder="<?php _e( 'Coupon code', 'bazaar-lite' ); ?>" id="coupon_code" value="" />
        </p>

        <p class="form-row form-row-wide input-button">
            <input type="submit" class="button" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'bazaar-lite' ); ?>" />
        </p>

        <div class="clear"></div>
    
    </form>

</div>