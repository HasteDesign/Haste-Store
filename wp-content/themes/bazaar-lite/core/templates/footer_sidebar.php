<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('bazaarlite_footer_sidebar_function')) {

	function bazaarlite_footer_sidebar_function() {

		$sidebarname = "";

		if ( is_home() || bazaarlite_get_archive_title() || is_search() ) {

			$sidebarname = "footer_sidebar_area";
			
		} else if ( bazaarlite_postmeta('wip_footer_sidebar') ) {
			
			$sidebarname = bazaarlite_postmeta('wip_footer_sidebar');
			
		}
	
		if ( is_active_sidebar($sidebarname) ) : 
	
?>

        <section id="footer-widgets">
                
            <div class="container">

                <section class="row widgets">
                                    
                    <?php dynamic_sidebar($sidebarname) ?>
                                    
                </section>

            </div>
    
        </section>

<?php 
	
		endif; 
		
	}
	
	add_action( 'bazaarlite_footer_sidebar','bazaarlite_footer_sidebar_function', 10, 2 );

}

?>