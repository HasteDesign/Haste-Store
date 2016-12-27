<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('bazaarlite_after_content_function')) {

	function bazaarlite_after_content_function( $type = "" ) {
	
		if ( ! bazaarlite_is_single() ) :
			
			the_excerpt();
	
		else: 
			
			if ( $type == "post" ) {
	
				echo '<div class="line"><div class="post-info">'; 
	
					echo '<span class="genericon genericon-time"></span>' . get_the_date(); 
					
					echo '<span class="genericon genericon-category"></span>'; the_category(', ');
					
					the_tags( '<span class="genericon genericon-tag"></span>' , ', ');
					
				echo '</div></div>';
		
			} 
		
			the_content();
	
			echo '<div class="clear"></div>';

			if ( !bazaarlite_is_woocommerce_active('is_cart') ) :
			
				if ( bazaarlite_postmeta('wip_view_social_buttons') == "on" ) :

					do_action('bazaarlite_socialshare');

				endif;
			
			endif;
			
		endif;
		 
	} 
	
	add_action( 'bazaarlite_after_content', 'bazaarlite_after_content_function', 10, 2 );

}

?>