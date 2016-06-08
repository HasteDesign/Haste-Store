<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('bazaarlite_pagination_function')) {

	function bazaarlite_pagination_function() {
		
		echo '<div class="wp-pagenavi">';
				
		the_posts_pagination( array(
			'mid_size' => 2,
			'prev_text'    => '<i class="fa fa-long-arrow-left"></i>',
			'next_text'    => '<i class="fa fa-long-arrow-right"></i>',
		) );
		
		echo '</div>';
		
	} 

	add_action( 'bazaarlite_pagination', 'bazaarlite_pagination_function', 10, 2 );

}

?>