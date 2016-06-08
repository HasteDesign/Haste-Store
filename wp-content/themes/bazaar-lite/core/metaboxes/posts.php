<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

$bazaarlite_new_metaboxes = new bazaarlite_metaboxes ('post', array (

array( "name" => "Navigation",  
       "type" => "navigation",  
	   
       "item" => array( 
	   		
			"setting" => __( "Setting","bazaar-lite") , 
			"sidebars" => __( "Sidebars","bazaar-lite") , 
		),
		   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => __( "Setting","bazaar-lite"),
			   "type" => "title",
			  ),
		
		array( "name" => __( "Template","bazaar-lite"),
			   "desc" => __( "Choose a template for this post","bazaar-lite"),
			   "id" => "wip_template",
			   "type" => "select",
			   "options" => array(
				   "full" => __( "Full Width","bazaar-lite"),
				   "left-sidebar" =>  __( "Left Sidebar","bazaar-lite"),
				   "right-sidebar" => __( "Right Sidebar","bazaar-lite"),
			  ),
			  
			   "std" => "right-sidebar",
			   
		),
		
),

array( "type" => "endtab"),

array( "type" => "begintab",
	   "tab" => "sidebars",
	   "element" =>

		array( "name" => __( "Sidebars","bazaar-lite"),
			   "type" => "title",
			  ),

		array( "name" => __( "Header Sidebar","bazaar-lite"),
			   "desc" => __( "Choose a header sidebar","bazaar-lite"),
			   "id" => "wip_header_sidebar",
			   "type" => "select",
			   "std" => "none",
			   "options" => bazaarlite_sidebar_list('header'),
			),

		array( "name" => __( "Sidebar","bazaar-lite"),
			   "desc" => __( "Choose a side sidebar","bazaar-lite"),
			   "id" => "wip_sidebar",
			   "type" => "select",
			   "std" => "Default",
			   "options" => bazaarlite_sidebar_list('side'),
			),

		array( "name" => __( "Bottom Sidebar","bazaar-lite"),
			   "desc" => __( "Choose a bottom sidebar","bazaar-lite"),
			   "id" => "wip_bottom_sidebar",
			   "type" => "select",
			   "std" => "none",
			   "options" => bazaarlite_sidebar_list('bottom'),
			),

		array( "name" => __( "Footer Sidebar","bazaar-lite"),
			   "desc" => __( "Choose a footer sidebar","bazaar-lite"),
			   "id" => "wip_footer_sidebar",
			   "type" => "select",
			   "std" => "none",
			   "options" => bazaarlite_sidebar_list('footer'),
			),

),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>