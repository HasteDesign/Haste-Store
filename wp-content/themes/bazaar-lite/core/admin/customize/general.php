<?php

if (!function_exists('bazaarlite_admin_init')) {

	function bazaarlite_admin_init() {
		
		global $wp_version, $pagenow;

		$file_dir = get_template_directory_uri()."/core/admin/assets/";

		if ( $pagenow == "post-new.php" || $pagenow == "post.php" ) :

			wp_enqueue_style ( 'bazaarlite_style', $file_dir.'css/theme.css' ); 
			wp_enqueue_script( 'bazaarlite_script', $file_dir.'js/theme.js',array('jquery'),'',TRUE ); 
			
			wp_enqueue_script( "jquery-ui-core");
			wp_enqueue_script( "jquery-ui-tabs");
		
		endif;
	
		wp_enqueue_style ( 'bazaarlite_notice', $file_dir.'css/notice.css' ); 

	}
	
	add_action('admin_enqueue_scripts', 'bazaarlite_admin_init');

}

?>