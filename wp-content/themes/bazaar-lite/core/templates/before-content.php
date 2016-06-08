<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('bazaarlite_before_content_function')) {

	function bazaarlite_before_content_function() {

		if ( ! bazaarlite_is_single() ) {

			echo '<div class="post-article post-title">';
				
				do_action('bazaarlite_get_title', 'blog' ); 
				
			echo '</div>';

		} else {
	
			echo '<div class="post-article post-title">';

			if ( !bazaarlite_is_woocommerce_active('is_cart') ) :

				if ( is_single() || is_page() ) :
						 
					do_action('bazaarlite_get_title','post');
						
				else :
				
					do_action('bazaarlite_get_title','blog'); 
						 
				endif;

			endif;

			echo '</div>';
			
		}
		
	} 
	
	add_action( 'bazaarlite_before_content', 'bazaarlite_before_content_function', 10, 2 );

}

?>