<?php 

	get_header(); 

	do_action('bazaarlite_header_sidebar', 'header_sidebar_area');

	if ( !bazaarlite_setting('wip_search_layout') || bazaarlite_setting('wip_search_layout') == "masonry" ) {
				
		get_template_part('layouts/search-masonry'); 
		
	} else { 
		
		get_template_part('layouts/search-blog'); 
			
	}

	do_action('bazaarlite_bottom_sidebar_function', 'bottom_sidebar_area' );
	
	get_footer(); 


?>