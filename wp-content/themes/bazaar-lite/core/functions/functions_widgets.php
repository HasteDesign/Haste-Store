<?php

if (!function_exists('bazaarlite_loadwidgets')) {

	function bazaarlite_loadwidgets() {

		register_sidebar(array(
		
			'name' => __('Sidebar','bazaar-lite'),
			'id'   => 'side_sidebar_area',
			'description'   => __('This sidebar will be shown at the side of content','bazaar-lite'),
			'before_widget' => '<div id="%1$s" class="post-article widget-box %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title-container"><h3 class="title">',
			'after_title'   => '</h3></div>'
		
		));

		register_sidebar(array(

			'name' => __('Header Sidebar','bazaar-lite'),
			'description'   => __('This sidebar will be shown before the content','bazaar-lite'),
			'id'   => 'header_sidebar_area',
			'before_widget' => '<div id="%1$s" class="post-container"><div class="post-article widget-box %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="title-container"><h3 class="title">',
			'after_title'   => '</h3></div>'
		
		));
	
		register_sidebar(array(

			'name' => __('Bottom Sidebar','bazaar-lite'),
			'description'   => __('This sidebar will be shown after the content','bazaar-lite'),
			'id'   => 'bottom_sidebar_area',
			'before_widget' => '<div class="col-md-4"><div id="%1$s" class="post-container"><div class="post-article widget-box %2$s">',
			'after_widget'  => '</div></div></div>',
			'before_title'  => '<div class="title-container"><h3 class="title">',
			'after_title'   => '</h3></div>'
		
		));
		
		register_sidebar(array(

			'name' => __('Footer Sidebar','bazaar-lite'),
			'description'   => __('This sidebar will be shown at the bottom of page','bazaar-lite'),
			'id'   => 'footer_sidebar_area',
			'before_widget' => '<div id="%1$s" class="col-md-4 widget-box %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title-container"><h4 class="title">',
			'after_title'   => '</h4></div>'
		
		));

	}

	add_action( 'widgets_init', 'bazaarlite_loadwidgets' );

}

?>