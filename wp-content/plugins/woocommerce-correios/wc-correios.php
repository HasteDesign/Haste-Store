<?php
/**
 * Update main file for legacy from installations.
 *
 * @package WooCommerce_Correios
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Update the main file.
$active_plugins = get_option( 'active_plugins', array() );

foreach ( $active_plugins as $key => $active_plugin ) {
	if ( strstr( $active_plugin, '/wc-correios.php' ) ) {
		$active_plugins[ $key ] = str_replace( '/wc-correios.php', '/woocommerce-correios.php', $active_plugin );
	}
}

update_option( 'active_plugins', $active_plugins );
