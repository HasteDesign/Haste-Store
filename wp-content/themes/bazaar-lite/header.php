<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >

<div id="wrapper">
	
    <div id="header-wrapper">
    
        <header id="header">
        
            <div class="container">
            
                <div class="row">
                
                    <div class="col-md-2">
            
                        <div id="logo">
                        
							<?php bazaarlite_get_logo(); ?> 
                                            
                        </div>
                        
                    </div>

					<?php 
						
						if ( bazaarlite_is_woocommerce_active() && bazaarlite_setting('wip_woocommerce_header_cart') == "on" ) :
							
							$menu_class="col-md-9";
							
							echo '<div class="col-md-1 right">';
		
								bazaarlite_header_cart();
							
							echo '</div>';
							
						else:
	
							$menu_class="col-md-10";

						endif;

					?>

                    <div class="<?php echo $menu_class; ?>">

                        <nav id="mainmenu" class="<?php echo bazaarlite_setting('wip_menu_layout'); ?>">
                            
                            <?php wp_nav_menu( array('theme_location' => 'main-menu', 'container' => 'false','depth' => 3  )); ?>
                        
                        </nav>
                        	
                    </div>
                    
                </div>
                
            </div>  
            
        </header>
    
    </div>
    
<?php 

	if ( is_front_page() ) {

		if ( bazaarlite_setting('wip_enable_slideshow') == 'on' || !bazaarlite_setting('wip_enable_slideshow') ) : 
		
?>
	
		<div class="slick-wrapper">
	
			<div class="slick-image" style="background-image:url('<?php echo esc_url(bazaarlite_setting('wip_slideshow_1_image', get_template_directory_uri().'/assets/images/slideshow/img01.jpg'))?>')">
			
				<p class="slick-title"><?php echo esc_html(bazaarlite_setting('wip_slideshow_1_title','Welcome to Bazaar Lite'))?></p>
				<a class="button" href="<?php echo esc_url(bazaarlite_setting('wip_slideshow_1_url','#'))?>"><?php echo esc_html(bazaarlite_setting('wip_slideshow_1_cta','Get Now'))?></a>
		   
			</div>
		
			<div class="slick-image" style="background-image:url('<?php echo esc_url(bazaarlite_setting('wip_slideshow_2_image', get_template_directory_uri().'/assets/images/slideshow/img02.jpg'))?>')">
			
				<p class="slick-title"><?php echo esc_html(bazaarlite_setting('wip_slideshow_2_title','Welcome to Bazaar Lite'))?></p>
				<a class="button" href="<?php echo esc_url(bazaarlite_setting('wip_slideshow_2_url','#'))?>"><?php echo esc_html(bazaarlite_setting('wip_slideshow_2_cta','Get Now'))?></a>
		   
			</div>
		
			<div class="slick-image" style="background-image:url('<?php echo esc_url(bazaarlite_setting('wip_slideshow_3_image', get_template_directory_uri().'/assets/images/slideshow/img03.jpg'))?>')">
			
				<p class="slick-title"><?php echo esc_html(bazaarlite_setting('wip_slideshow_3_title','Welcome to Bazaar Lite'))?></p>
				<a class="button" href="<?php echo esc_url(bazaarlite_setting('wip_slideshow_3_url','#'))?>"><?php echo esc_html(bazaarlite_setting('wip_slideshow_3_cta','Get Now'))?></a>
		   
			</div>
		
		</div>
	
<?php
	
		endif;
	
	} else {
	
		do_action('bazaarlite_get_breadcrumb'); 

	}
	
?>