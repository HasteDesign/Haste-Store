jQuery( document ).ready( function( $ ) {
	// Get the main WC image as a variable
	var wcih_main_imgage = $( 'a.woocommerce-main-image img' ).attr( 'srcset' );
	// This is what will happen when you hover a product thumb
	$( '.thumbnails a img' ).hover(
		// Swap out the main image with the thumb
		function() {	    	
		var photo_fullsize = $( this ).attr( 'srcset' );
			$( '.woocommerce-main-image img' ).attr( 'srcset', photo_fullsize );
		},
		// Return the main image to the original
	  	function() {
			$( '.woocommerce-main-image img' ).attr( 'srcset', wcih_main_imgage );
		}
	);
});