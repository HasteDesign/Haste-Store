<div class="container">
	
    <div class="row" id="blog" >
    
	<?php if ( ( bazaarlite_template('sidebar') == "left-sidebar" ) || ( bazaarlite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        <div class="<?php echo bazaarlite_template('span') .' '. bazaarlite_template('sidebar'); ?>"> 
       
        	<div class="row"> 
        
    <?php endif; ?>

    <?php
	
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div <?php post_class(); ?> >
    
				<?php do_action('bazaarlite_postformat'); ?>
        
                <div style="clear:both"></div>
            
			</div>
		
		<?php 
		
			endwhile; 

			if ( bazaarlite_setting('wip_infinitescroll_system') == "on" ) :
				
				do_action('bazaarlite_infinitescroll_script','wip_search_layout'); 
						
			endif;
		
			else:  
			
		?>

            <div <?php post_class(); ?> >
        
                <article class="article category">
                        
                    <div class="post-article">
        
                        <h2><?php _e( 'Content not found',"bazaar-lite" ) ?></h2>           
                        
                        <p> <?php _e( 'No article found in this category.','bazaar-lite'); ?> </p>
        
                        <h3> <?php _e( 'What can i do?',"bazaar-lite" ) ?> </h3>           
        
                        <p> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php _e( 'Back to the homepage','bazaar-lite'); ?> </a> </p>
        
                        <p> <?php _e( 'Make a search, from the below form:','bazaar-lite'); ?> </p>
                        
						<?php get_search_form(); ?>
    
                    </div>
         
               </article>
        
            </div>
	
		<?php endif; ?>
        
	<?php if ( ( bazaarlite_template('sidebar') == "left-sidebar" ) || ( bazaarlite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        </div>
        
    </div>
        
    <?php 
	
		endif;
		
		if ( bazaarlite_template('span') == "col-md-8" ) :
					
			do_action('bazaarlite_side_sidebar', 'side_sidebar_area' ); 
					
		endif;

	?>
           
    </div>

	<?php do_action( 'bazaarlite_pagination'); ?>

</div>