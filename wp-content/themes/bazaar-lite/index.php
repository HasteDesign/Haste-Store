<?php 

	get_header();

	do_action('bazaarlite_header_sidebar', 'header_sidebar_area');

	if ( !bazaarlite_setting('wip_home') || bazaarlite_setting('wip_home') == "masonry" ) {
				
		get_template_part('layouts/home-masonry'); 
		
	} else { 
		
		get_template_part('layouts/home-blog'); 
			
	}

	do_action('bazaarlite_bottom_sidebar_function', 'bottom_sidebar_area' );
	
	get_footer(); 

?>