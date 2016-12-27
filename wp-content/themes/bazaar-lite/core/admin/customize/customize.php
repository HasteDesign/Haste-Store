<?php

if (!function_exists('bazaarlite_customize_panel_function')) {

	function bazaarlite_customize_panel_function() {
		
		$theme_panel = array ( 

			/* FULL IMAGE BACKGROUND */ 

			array(
				
				"label" => __( "Full Image Background",'bazaar-lite'),
				"description" => __( "Do you want to set a full background image? (After the upload, check 'Fixed', from the Background Attachment section)",'bazaar-lite'),
				"id" => "wip_full_image_background",
				"type" => "select",
				"section" => "background_image",
				"options" => array (
				   "off" => __( "No",'bazaar-lite'),
				   "on" => __( "Yes",'bazaar-lite'),
				),
				
				"std" => "off",
			
			),

			/* START SUPPORT SECTION */ 

			array(
			
				"title" => __( "Get support","bazaar-lite"),
				"id" => "bazaarlite-customize-info",
				"type" => "bazaarlite-customize-info",
				"section" => "bazaarlite-customize-info",
				"priority" => "08",

			),

			/* START GENERAL SECTION */ 

			array( 
				
				"title" => __( "Slideshow",'bazaar-lite'),
				"description" => __( "Slideshow",'bazaar-lite'),
				"type" => "panel",
				"id" => "slideshow_panel",
				"priority" => "09",
				
			),

			/* SLIDESHOW */ 

			array( 

				"title" => __( "Slideshow Settings",'bazaar-lite'),
				"type" => "section",
				"panel" => "slideshow_panel",
				"priority" => "10",
				"id" => "slideshow_settings",

			),

			array(
				
				"label" => __( "Slideshow",'bazaar-lite'),
				"description" => __( "Do you want to enable the slideshow?",'bazaar-lite'),
				"id" => "wip_enable_slideshow",
				"type" => "select",
				"section" => "slideshow_settings",
				"options" => array (
				   "off" => __( "No",'bazaar-lite'),
				   "on" => __( "Yes",'bazaar-lite'),
				),
				
				"std" => "on",
			
			),

			array(
				
				"label" => __( "Slideshow Autoplay",'bazaar-lite'),
				"description" => __( "Do you want to enable the slideshow autoplay?",'bazaar-lite'),
				"id" => "wip_slick_autoplay",
				"type" => "select",
				"section" => "slideshow_settings",
				"options" => array (
				   "false" => __( "No",'bazaar-lite'),
				   "true" => __( "Yes",'bazaar-lite'),
				),
				
				"std" => "false",
			
			),

			array(
				
				"label" => __( "Slideshow Dots",'bazaar-lite'),
				"description" => __( "Do you want to view a pagination for the slideshow?",'bazaar-lite'),
				"id" => "wip_slick_dots",
				"type" => "select",
				"section" => "slideshow_settings",
				"options" => array (
				   "false" => __( "No",'bazaar-lite'),
				   "true" => __( "Yes",'bazaar-lite'),
				),
				
				"std" => "true",
			
			),

			array( 

				"label" => __( "Slideshow height",'bazaar-lite'),
				"description" => __( "Set the height of slideshow.",'bazaar-lite'),
				"id" => "wip_slideshow_height",
				"type" => "text",
				"section" => "slideshow_settings",
				"std" => "700px",

			),

			array( 

				"label" => __( "Slideshow mobile height",'bazaar-lite'),
				"description" => __( "Set the height of slideshow, for mobile devices.",'bazaar-lite'),
				"id" => "wip_slideshow_mobile_height",
				"type" => "text",
				"section" => "slideshow_settings",
				"std" => "500px",

			),

			/* #1 SLIDE */ 

			array( 

				"title" => __( "Slide #1",'bazaar-lite'),
				"type" => "section",
				"panel" => "slideshow_panel",
				"priority" => "10",
				"id" => "slideshow_1",

			),

			array( 

				"label" => __( "Image",'bazaar-lite'),
				"description" => __( "Upload the image",'bazaar-lite'),
				"id" => "wip_slideshow_1_image",
				"type" => "upload",
				"section" => "slideshow_1",
				"std" => get_template_directory_uri().'/assets/images/slideshow/img01.jpg',

			),

			array( 

				"label" => __( "Title",'bazaar-lite'),
				"description" => __( "Insert the title of this slide",'bazaar-lite'),
				"id" => "wip_slideshow_1_title",
				"type" => "text",
				"section" => "slideshow_1",
				"std" => "Welcome to Bazaar Lite",

			),

			array( 

				"label" => __( "Call to action",'bazaar-lite'),
				"description" => __( "Insert the call to action of this slide",'bazaar-lite'),
				"id" => "wip_slideshow_1_cta",
				"type" => "text",
				"section" => "slideshow_1",
				"std" => "Get Now",

			),

			array( 

				"label" => __( "Url",'bazaar-lite'),
				"description" => __( "Insert the url of this slide",'bazaar-lite'),
				"id" => "wip_slideshow_1_url",
				"type" => "url",
				"section" => "slideshow_1",
				"std" => "#",

			),

			/* #2 SLIDE */ 

			array( 

				"title" => __( "Slide #2",'bazaar-lite'),
				"type" => "section",
				"panel" => "slideshow_panel",
				"priority" => "10",
				"id" => "slideshow_2",

			),

			array( 

				"label" => __( "Image",'bazaar-lite'),
				"description" => __( "Upload the image",'bazaar-lite'),
				"id" => "wip_slideshow_2_image",
				"type" => "upload",
				"section" => "slideshow_2",
				"std" => get_template_directory_uri().'/assets/images/slideshow/img02.jpg',

			),

			array( 

				"label" => __( "Title",'bazaar-lite'),
				"description" => __( "Insert the title of this slide",'bazaar-lite'),
				"id" => "wip_slideshow_2_title",
				"type" => "text",
				"section" => "slideshow_2",
				"std" => "Welcome to Bazaar Lite",

			),

			array( 

				"label" => __( "Call to action",'bazaar-lite'),
				"description" => __( "Insert the call to action of this slide",'bazaar-lite'),
				"id" => "wip_slideshow_2_cta",
				"type" => "text",
				"section" => "slideshow_2",
				"std" => "Get Now",

			),

			array( 

				"label" => __( "Url",'bazaar-lite'),
				"description" => __( "Insert the url of this slide",'bazaar-lite'),
				"id" => "wip_slideshow_2_url",
				"type" => "url",
				"section" => "slideshow_2",
				"std" => "#",

			),

			/* #3 SLIDE */ 

			array( 

				"title" => __( "Slide #3",'bazaar-lite'),
				"type" => "section",
				"panel" => "slideshow_panel",
				"priority" => "10",
				"id" => "slideshow_3",

			),

			array( 

				"label" => __( "Image",'bazaar-lite'),
				"description" => __( "Upload the image",'bazaar-lite'),
				"id" => "wip_slideshow_3_image",
				"type" => "upload",
				"section" => "slideshow_3",
				"std" => get_template_directory_uri().'/assets/images/slideshow/img03.jpg',

			),

			array( 

				"label" => __( "Title",'bazaar-lite'),
				"description" => __( "Insert the title of this slide",'bazaar-lite'),
				"id" => "wip_slideshow_3_title",
				"type" => "text",
				"section" => "slideshow_3",
				"std" => "Welcome to Bazaar Lite",

			),

			array( 

				"label" => __( "Call to action",'bazaar-lite'),
				"description" => __( "Insert the call to action of this slide",'bazaar-lite'),
				"id" => "wip_slideshow_3_cta",
				"type" => "text",
				"section" => "slideshow_3",
				"std" => "Get Now",

			),

			array( 

				"label" => __( "Url",'bazaar-lite'),
				"description" => __( "Insert the url of this slide",'bazaar-lite'),
				"id" => "wip_slideshow_3_url",
				"type" => "url",
				"section" => "slideshow_3",
				"std" => "#",

			),

			/* START GENERAL SECTION */ 

			array( 
				
				"title" => __( "General",'bazaar-lite'),
				"description" => __( "General",'bazaar-lite'),
				"type" => "panel",
				"id" => "general_panel",
				"priority" => "10",
				
			),

			/* SKINS */ 

			array( 

				"title" => __( "Color Scheme",'bazaar-lite'),
				"type" => "section",
				"panel" => "general_panel",
				"priority" => "11",
				"id" => "colorscheme_section",

			),

			array(
				
				"label" => __( "Predefined Color Schemes",'bazaar-lite'),
				"description" => __( "Choose your Color Scheme",'bazaar-lite'),
				"id" => "wip_skin",
				"type" => "select",
				"section" => "colorscheme_section",
				"options" => array (
				   "black_turquoise" => __( "Black & Turquoise",'bazaar-lite'),
				   "black_orange" => __( "Black & Orange",'bazaar-lite'),
				   "black_blue" => __( "Black & Blue",'bazaar-lite'),
				   "black_red" => __( "Black & Red",'bazaar-lite'),
				   "black_pink" => __( "Black & Pink",'bazaar-lite'),
				   "black_purple" => __( "Black & Purple",'bazaar-lite'),
				   "black_yellow" => __( "Black & Yellow",'bazaar-lite'),
				   "black_green" => __( "Black & Green",'bazaar-lite'),
				   "turquoise" => __( "Turquoise",'bazaar-lite'),
				   "orange" => __( "Orange",'bazaar-lite'),
				   "blue" => __( "Blue",'bazaar-lite'),
				   "red" => __( "Red",'bazaar-lite'),
				   "pink" => __( "Pink",'bazaar-lite'),
				   "purple" => __( "Purple",'bazaar-lite'),
				   "yellow" => __( "Yellow",'bazaar-lite'),
				   "green" => __( "Green",'bazaar-lite'),
				   "white_turquoise" => __( "White & Turquoise",'bazaar-lite'),
				   "white_orange" => __( "White & Orange",'bazaar-lite'),
				   "white_blue" => __( "White & Blue",'bazaar-lite'),
				   "white_red" => __( "White & Red",'bazaar-lite'),
				   "white_pink" => __( "White & Pink",'bazaar-lite'),
				   "white_purple" => __( "White & Purple",'bazaar-lite'),
				   "white_yellow" => __( "White & Yellow",'bazaar-lite'),
				   "white_green" => __( "White & Green",'bazaar-lite'),
				),
				
				"std" => "black_turquoise",
			
			),

			/* PAGE WIDTH */ 

			array( 

				"title" => __( "Page width",'bazaar-lite'),
				"type" => "section",
				"id" => "pagewidth_section",
				"panel" => "general_panel",
				"priority" => "12",

			),

			array( 

				"label" => __( "Screen greater than 768px",'bazaar-lite'),
				"description" => __( "Set a width, for a screen greater than 768 pixel (for example 750 and not 750px ) ",'bazaar-lite'),
				"id" => "wip_screen1",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "750",

			),

			array( 

				"label" => __( "Screen greater than 992px",'bazaar-lite'),
				"description" => __( "Set a width, for a screen greater than 992 pixel (for example 940 and not 940px ) ",'bazaar-lite'),
				"id" => "wip_screen2",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "940",

			),

			array( 

				"label" => __( "Screen greater than 1200px",'bazaar-lite'),
				"description" => __( "Set a width, in px, for a screen greater than 1200 pixel (for example 1170 and not 1170px ) ",'bazaar-lite'),
				"id" => "wip_screen3",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "940",

			),

			/* SETTINGS SECTION */ 

			array( 

				"title" => __( "Settings",'bazaar-lite'),
				"type" => "section",
				"id" => "settings_section",
				"panel" => "general_panel",
				"priority" => "13",

			),

			array(
				
				"label" => __( "Header cart",'bazaar-lite'),
				"description" => __( "Do you want to show the header cart?",'bazaar-lite'),
				"id" => "wip_woocommerce_header_cart",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => __( "No",'bazaar-lite'),
				   "on" => __( "Yes",'bazaar-lite'),
				),
				
				"std" => "off",
			
			),

			array(
				
				"label" => __( "Minimal layout",'bazaar-lite'),
				"description" => __( "Do you want to use a minimal layout, with a white background color?",'bazaar-lite'),
				"id" => "wip_minimal_layout",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => __( "No",'bazaar-lite'),
				   "on" => __( "Yes",'bazaar-lite'),
				),
				
				"std" => "off",
			
			),

			array(
				
				"label" => __( "Infinite scroll",'bazaar-lite'),
				"description" => __( "Do you want to use the infinite scroll, for the articles?",'bazaar-lite'),
				"id" => "wip_infinitescroll_system",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => __( "No",'bazaar-lite'),
				   "on" => __( "Yes",'bazaar-lite'),
				),
				
				"std" => "off",
			
			),

			array(
				
				"label" => __( "Read more button",'bazaar-lite'),
				"description" => __( "Do you want to use a button, for open the posts? (Instead of [&hellip;])",'bazaar-lite'),
				"id" => "wip_readmore_button",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => __( "No",'bazaar-lite'),
				   "on" => __( "Yes",'bazaar-lite'),
				),
				
				"std" => "off",
			
			),

			array( 

				"title" => __( "Styles",'bazaar-lite'),
				"type" => "section",
				"id" => "styles_section",
				"panel" => "general_panel",
				"priority" => "14",

			),

			array( 

				"label" => __( "Custom css",'bazaar-lite'),
				"description" => __( "Insert your custom css code.",'bazaar-lite'),
				"id" => "wip_custom_css_code",
				"type" => "custom_css",
				"section" => "styles_section",
				"std" => "",

			),

			/* LAYOUTS SECTION */ 

			array( 

				"title" => __( "Layouts",'bazaar-lite'),
				"type" => "section",
				"id" => "layouts_section",
				"panel" => "general_panel",
				"priority" => "15",

			),

			array(
				
				"label" => __("Home Blog Layout",'bazaar-lite'),
				"description" => __("If you've set the latest articles, for the homepage, choose a layout.",'bazaar-lite'),
				"id" => "wip_home",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => __( "Full Width",'bazaar-lite'),
				   "left-sidebar" => __( "Left Sidebar",'bazaar-lite'),
				   "right-sidebar" => __( "Right Sidebar",'bazaar-lite'),
				   "masonry" => __( "Masonry","bazaar-lite"),
				),
				
				"std" => "masonry",
			
			),
	

			array(
				
				"label" => __("Category Layout",'bazaar-lite'),
				"description" => __("Select a layout for category pages.",'bazaar-lite'),
				"id" => "wip_category_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => __( "Full Width",'bazaar-lite'),
				   "left-sidebar" => __( "Left Sidebar",'bazaar-lite'),
				   "right-sidebar" => __( "Right Sidebar",'bazaar-lite'),
				   "masonry" => __( "Masonry","bazaar-lite"),
				),
				
				"std" => "masonry",
			
			),
	
			array(
				
				"label" => __("WooCommerce Category Layout",'bazaar-lite'),
				"description" => __("Select a layout for the WooCommerce categories.",'bazaar-lite'),
				"id" => "wip_woocommerce_category_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => __( "Full Width",'bazaar-lite'),
				   "left-sidebar" => __( "Left Sidebar",'bazaar-lite'),
				   "right-sidebar" => __( "Right Sidebar",'bazaar-lite'),
				),
				
				"std" => "right-sidebar",
			
			),
	
			array(
				
				"label" => __("Search Layout",'bazaar-lite'),
				"description" => __("Select a layout for the search page.",'bazaar-lite'),
				"id" => "wip_search_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => __( "Full Width",'bazaar-lite'),
				   "left-sidebar" => __( "Left Sidebar",'bazaar-lite'),
				   "right-sidebar" => __( "Right Sidebar",'bazaar-lite'),
				   "masonry" => __( "Masonry","bazaar-lite"),
				),
				
				"std" => "masonry",
			
			),

			/* THUMBNAILS SECTION */ 

			array( 

				"title" => __( "Thumbnails",'bazaar-lite'),
				"type" => "section",
				"id" => "thumbnails_section",
				"panel" => "general_panel",
				"priority" => "16",

			),

			array( 

				"label" => __( "Blog Thumbnail",'bazaar-lite'),
				"description" => __( "Insert the height for blog thumbnail.",'bazaar-lite'),
				"id" => "wip_blog_thumbinal",
				"type" => "text",
				"section" => "thumbnails_section",
				"std" => "550",

			),

			/* HEADER AREA SECTION */ 

			array( 

				"title" => __( "Header",'bazaar-lite'),
				"type" => "section",
				"id" => "header_section",
				"panel" => "general_panel",
				"priority" => "18",

			),

			array( 

				"label" => __( "Custom Logo",'bazaar-lite'),
				"description" => __( "Upload your custom logo",'bazaar-lite'),
				"id" => "wip_custom_logo",
				"type" => "upload",
				"section" => "header_section",
				"std" => "",

			),

			/* FOOTER AREA SECTION */ 

			array( 

				"title" => __( "Footer",'bazaar-lite'),
				"type" => "section",
				"id" => "footer_section",
				"panel" => "general_panel",
				"priority" => "19",

			),

			array( 

				"label" => __( "Copyright Text",'bazaar-lite'),
				"description" => __( "Insert your copyright text.",'bazaar-lite'),
				"id" => "wip_copyright_text",
				"type" => "textarea",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Facebook Url",'bazaar-lite'),
				"description" => __( "Insert Facebook Url (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_facebook_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Twitter Url",'bazaar-lite'),
				"description" => __( "Insert Twitter Url (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_twitter_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Flickr Url",'bazaar-lite'),
				"description" => __( "Insert Flickr Url (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_flickr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Google Url",'bazaar-lite'),
				"description" => __( "Insert Google Url (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_google_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Linkedin Url",'bazaar-lite'),
				"description" => __( "Insert Linkedin Url (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_linkedin_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Pinterest Url",'bazaar-lite'),
				"description" => __( "Insert Pinterest Url (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_pinterest_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Tumblr Url",'bazaar-lite'),
				"description" => __( "Insert Tumblr Url (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_tumblr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Youtube Url",'bazaar-lite'),
				"description" => __( "Insert Youtube Url (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_youtube_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Skype Url",'bazaar-lite'),
				"description" => __( "Insert Skype ID (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_skype_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Instagram Url",'bazaar-lite'),
				"description" => __( "Insert Instagram Url (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_instagram_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Github Url",'bazaar-lite'),
				"description" => __( "Insert Github Url (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_github_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Xing Url",'bazaar-lite'),
				"description" => __( "Insert Xing Url (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_xing_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "WhatsApp number",'bazaar-lite'),
				"description" => __( "Insert WhatsApp number (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_whatsapp_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Email Address",'bazaar-lite'),
				"description" => __( "Insert Email Address (empty if you want to hide the button)",'bazaar-lite'),
				"id" => "wip_footer_email_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array(
				
				"label" => __( "Feed Rss Button",'bazaar-lite'),
				"description" => __( "Do you want to display the Feed Rss button?",'bazaar-lite'),
				"id" => "wip_footer_rss_button",
				"type" => "select",
				"section" => "footer_section",
				"options" => array (
				   "off" => __( "No",'bazaar-lite'),
				   "on" => __( "Yes",'bazaar-lite'),
				),
				
				"std" => "off",
			
			),

			/* TYPOGRAPHY SECTION */ 

			array( 
				
				"title" => __( "Typography",'bazaar-lite'),
				"description" => __( "Typography",'bazaar-lite'),
				"type" => "panel",
				"id" => "typography_panel",
				"priority" => "11",
				
			),

			/* LOGO */ 

			array( 

				"title" => __( "Logo",'bazaar-lite'),
				"type" => "section",
				"id" => "logo_section",
				"panel" => "typography_panel",
				"priority" => "10",

			),

			array( 

				"label" => __( "Font size",'bazaar-lite'),
				"description" => __( "Insert a size, for logo font (For example, 30px) ",'bazaar-lite'),
				"id" => "wip_logo_font_size",
				"type" => "text",
				"section" => "logo_section",
				"std" => "30px",

			),

			/* MENU */ 

			array( 

				"title" => __( "Menu",'bazaar-lite'),
				"type" => "section",
				"id" => "menu_section",
				"panel" => "typography_panel",
				"priority" => "11",

			),

			array( 

				"label" => __( "Font size",'bazaar-lite'),
				"description" => __( "Insert a size, for menu font (For example, 14px) ",'bazaar-lite'),
				"id" => "wip_menu_font_size",
				"type" => "text",
				"section" => "menu_section",
				"std" => "14px",

			),

			/* CONTENT */ 

			array( 

				"title" => __( "Content",'bazaar-lite'),
				"type" => "section",
				"id" => "content_section",
				"panel" => "typography_panel",
				"priority" => "12",

			),

			array( 

				"label" => __( "Font size",'bazaar-lite'),
				"description" => __( "Insert a size, for content font (For example, 14px) ",'bazaar-lite'),
				"id" => "wip_content_font_size",
				"type" => "text",
				"section" => "content_section",
				"std" => "14px",

			),


			/* HEADLINES */ 

			array( 

				"title" => __( "Headlines",'bazaar-lite'),
				"type" => "section",
				"id" => "headlines_section",
				"panel" => "typography_panel",
				"priority" => "13",

			),

			array( 

				"label" => __( "H1 headline",'bazaar-lite'),
				"description" => __( "Insert a size, for for H1 elements (For example, 24px) ",'bazaar-lite'),
				"id" => "wip_h1_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "24px",

			),

			array( 

				"label" => __( "H2 headline",'bazaar-lite'),
				"description" => __( "Insert a size, for for H2 elements (For example, 22px) ",'bazaar-lite'),
				"id" => "wip_h2_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "22px",

			),

			array( 

				"label" => __( "H3 headline",'bazaar-lite'),
				"description" => __( "Insert a size, for for H3 elements (For example, 20px) ",'bazaar-lite'),
				"id" => "wip_h3_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "20px",

			),

			array( 

				"label" => __( "H4 headline",'bazaar-lite'),
				"description" => __( "Insert a size, for for H4 elements (For example, 18px) ",'bazaar-lite'),
				"id" => "wip_h4_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "18px",

			),

			array( 

				"label" => __( "H5 headline",'bazaar-lite'),
				"description" => __( "Insert a size, for for H5 elements (For example, 16px) ",'bazaar-lite'),
				"id" => "wip_h5_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "16px",

			),

			array( 

				"label" => __( "H6 headline",'bazaar-lite'),
				"description" => __( "Insert a size, for for H6 elements (For example, 14px) ",'bazaar-lite'),
				"id" => "wip_h6_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "14px",

			),
		);
		
		new bazaarlite_customize($theme_panel);
		
	} 
	
	add_action( 'bazaarlite_customize_panel', 'bazaarlite_customize_panel_function', 10, 2 );

}

do_action('bazaarlite_customize_panel');

?>