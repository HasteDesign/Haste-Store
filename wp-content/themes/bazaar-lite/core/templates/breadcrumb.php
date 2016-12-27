<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('bazaarlite_get_breadcrumb_function')) {

	function bazaarlite_get_breadcrumb_function() {
		
    if ( !is_home() ) : ?>
    
        <div id="breadcrumb_wrapper">
        
            <div class="container">
            
                <div class="row">
                    
                    <div class="col-md-12">
                    
                        <?php bazaarlite_breadcrumb(); ?>
                        
                    </div>
    
                </div>
                
            </div>
        
        </div>
    
    <?php 
	
		endif; 	
			
	}
	
	add_action( 'bazaarlite_get_breadcrumb', 'bazaarlite_get_breadcrumb_function', 10, 2 );

}

?>