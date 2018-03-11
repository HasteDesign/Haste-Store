<?php

/**
 * Custom Read More Link
 */
function modify_read_more_link( $more_link_text ) {
    return '<p><a class="more-link btn btn-primary" href="' . get_permalink() . '">' . __('Read more &rarr;', 'haste-store').'</a></p>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/**
 * Add to cart button classes
 */
function button_class_add_to_cart_link( $classes, $product ) {
	$button = 	sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				esc_attr( $product->get_id() ),
				esc_attr( $product->get_sku() ),
				esc_attr( $classes . ' btn-wc btn btn-primary' ),
				esc_html( $product->add_to_cart_text() )
			);

	return $button;
}
add_filter( 'woocommerce_loop_add_to_cart_link', 'button_class_add_to_cart_link', 10, 2 );