<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('bazaarlite_side_sidebar_function')) {

	function bazaarlite_side_sidebar_function( $sidebarname = "side_sidebar_area" ) {
		
?>
		
        <div class="col-md-4">
                
			<div class="row">
            
				<div id="sidebar" class="post-container col-md-12">
                        
					<div class="sidebar-box">

					<?php 
					
						if ( is_active_sidebar($sidebarname)) { 
						
							dynamic_sidebar($sidebarname);
						
						} else { 
								
							the_widget( 'WP_Widget_Archives','',
							array('before_widget' => '<div class="post-article widget-box">',
								  'after_widget'  => '</div>',
								  'before_title'  => '<div class="title-container"><h3 class="title">',
								  'after_title'   => '</h3></div>'
							));
			
							the_widget( 'WP_Widget_Calendar',
							array("title"=> __('Calendar',"bazaar-lite")),
							array('before_widget' => '<div class="post-article widget-box">',
								  'after_widget'  => '</div>',
								  'before_title'  => '<div class="title-container"><h3 class="title">',
								  'after_title'   => '</h3></div>'
							));
			
							the_widget( 'WP_Widget_Categories','',
							array('before_widget' => '<div class="post-article widget-box">',
								  'after_widget'  => '</div>',
								  'before_title'  => '<div class="title-container"><h3 class="title">',
								  'after_title'   => '</h3></div>'
							));
						
						} 
					
					?>
                        
					</div>
                        
				</div>
            
			</div>
                    
		</div>
		
<?php 
	
		
	}
	
	add_action( 'bazaarlite_side_sidebar','bazaarlite_side_sidebar_function', 10, 2 );

}

?>