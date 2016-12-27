<?php 

function bazaarlite_css_custom() { 

	echo '<style type="text/css">';
	
/* =================== BODY STYLE =================== */

	if ( get_theme_mod('wip_full_image_background') == "on" )
		echo "body {  -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}"; 

/* =================== END BODY STYLE =================== */

/* =================== BEGIN PAGE WIDTH =================== */

	if (bazaarlite_setting('wip_screen1')) {
	
		echo "@media (min-width:768px){.container{width:".esc_html(bazaarlite_setting('wip_screen1'))."px}}"; 
		echo "@media (min-width:768px){.container.block{width:" . (esc_html(bazaarlite_setting('wip_screen1'))-10) . "px}}"; 
		echo "@media (min-width:768px){.container.grid-container{width:" . (esc_html(bazaarlite_setting('wip_screen1'))-20) . "px}}"; 
	}
	
	if (bazaarlite_setting('wip_screen2')) {
		
		echo "@media (min-width:992px){.container{width:".esc_html(bazaarlite_setting('wip_screen2'))."px}}"; 
		echo "@media (min-width:992px){.container.block{width:" . (esc_html(bazaarlite_setting('wip_screen2'))-10) . "px}}"; 
		echo "@media (min-width:768px){.container.grid-container{width:" . (esc_html(bazaarlite_setting('wip_screen2'))-20) . "px}}"; 
	}
	
	if (bazaarlite_setting('wip_screen3'))  {
		
		echo "@media (min-width:1200px){.container{width:".esc_html(bazaarlite_setting('wip_screen3'))."px}}"; 
		echo "@media (min-width:1200px){.container.block{width:" . (esc_html(bazaarlite_setting('wip_screen3'))-10) . "px}}"; 
		echo "@media (min-width:768px){.container.grid-container{width:" . (esc_html(bazaarlite_setting('wip_screen3'))-20) . "px}}"; 
	}
	
/* =================== END PAGE WIDTH =================== */

/* =================== BEGIN LOGO STYLE =================== */

	/* Logo Font Size */
	if ( bazaarlite_setting('wip_logo_font_size')) 
		echo "#logo a { font-size:".esc_html(bazaarlite_setting('wip_logo_font_size'))."; } ";  
	
/* =================== END LOGO STYLE =================== */

/* =================== BEGIN SLIDESHOW =================== */

	/* Desktop height */
	
	if ( bazaarlite_setting('wip_slideshow_height')) :
	
		echo ".slick-wrapper { max-height:".esc_html(bazaarlite_setting('wip_slideshow_height'))."; } ";  
		echo ".slick-wrapper .slick-image { height:".esc_html(bazaarlite_setting('wip_slideshow_height'))."; } ";  
	
	endif;
	
	/* Mobile height */
	
	if ( bazaarlite_setting('wip_slideshow_mobile_height')) :
	
		echo "@media screen and (min-width : 0px) and (max-width : 992px) {";  
		echo ".slick-wrapper { max-height:".esc_html(bazaarlite_setting('wip_slideshow_mobile_height'))."; } ";  
		echo ".slick-wrapper .slick-image { height:".esc_html(bazaarlite_setting('wip_slideshow_mobile_height'))."; } ";  
		echo "}";  
	
	endif;
	
/* =================== END SLIDESHOW =================== */

/* =================== BEGIN NAV STYLE =================== */
	
	if (bazaarlite_setting('wip_menu_font_size')) :
	
		echo "nav#mainmenu ul li a, .header-cart { font-size:" . esc_html(bazaarlite_setting('wip_menu_font_size')) . ";}"; 
		echo "nav#mainmenu ul ul li a { font-size:" . ( str_replace("px", "", esc_html(bazaarlite_setting('wip_menu_font_size'))) - 2 ) . "px;}"; 
	
	endif;

/* =================== END NAV STYLE =================== */

/* =================== BEGIN CONTENT STYLE =================== */

	if (bazaarlite_setting('wip_content_font_size')) 
		echo ".post-article p, .post-article li, .post-article address, .post-article dd, .post-article blockquote, .post-article td, .post-article th, .textwidget, .toggle_container h5.element  { font-size:".esc_html(bazaarlite_setting('wip_content_font_size'))."}"; 
	

/* =================== END CONTENT STYLE =================== */

/* =================== START TITLE STYLE =================== */

	if (bazaarlite_setting('wip_h1_font_size')) 
		echo "h1 {font-size:".esc_html(bazaarlite_setting('wip_h1_font_size'))."; }"; 
	if (bazaarlite_setting('wip_h2_font_size')) 
		echo "h2 { font-size:".esc_html(bazaarlite_setting('wip_h2_font_size'))."; }"; 
	if (bazaarlite_setting('wip_h3_font_size')) 
		echo "h3 { font-size:".esc_html(bazaarlite_setting('wip_h3_font_size'))."; }"; 
	if (bazaarlite_setting('wip_h4_font_size')) 
		echo "h4 { font-size:".esc_html(bazaarlite_setting('wip_h4_font_size'))."; }"; 
	if (bazaarlite_setting('wip_h5_font_size')) 
		echo "h5 { font-size:".esc_html(bazaarlite_setting('wip_h5_font_size'))."; }"; 
	if (bazaarlite_setting('wip_h6_font_size')) 
		echo "h6 { font-size:".esc_html(bazaarlite_setting('wip_h6_font_size'))."; }"; 


/* =================== END TITLE STYLE =================== */

	if (bazaarlite_setting('wip_custom_css_code'))
		
		echo esc_html(bazaarlite_setting('wip_custom_css_code')); 

	echo '</style>';

}

add_action('wp_head', 'bazaarlite_css_custom');

?>