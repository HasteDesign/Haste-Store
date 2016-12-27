<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('bazaarlite_header_sidebar_function')) {

	function bazaarlite_header_sidebar_function($sidebar_name) {
		
		if ( is_active_sidebar($sidebar_name) ) : 
			
?>
	
		<section id="header-sidebar">
		
			<div class="container">
			
				<div class="col-md-12" style="padding:0">
				
					<?php dynamic_sidebar($sidebar_name) ?>
									
				</div>
			
			</div>
		
		</section>
		
<?php 
	
		endif; 
		
	}
	
	add_action( 'bazaarlite_header_sidebar','bazaarlite_header_sidebar_function', 10, 2 );

}

?>