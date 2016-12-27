<?php 

	get_header(); 
	
	do_action('bazaarlite_header_sidebar', 'header_sidebar_area');

?>

<div class="container">
	
    <div class="row">
    
        <article class="post-container col-md-12">
          	
            <div class="post-article post-title">
            
            	<?php do_action('bazaarlite_get_title','standard'); ?>
            
            </div>
			
            <div class="post-article">
            
			<?php 
			
				while ( have_posts() ) : the_post(); 
			
					if (wp_attachment_is_image($post->id)) :
						
						$att_image = wp_get_attachment_image_src( $post->id, "blog");
           
					?>
                            
                        <a rel="prettyPhoto" href="<?php echo esc_url(wp_get_attachment_url($post->id)); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php echo esc_attr(get_the_title()); ?>" /></a>
                            
					<?php else: ?>
                        
                        <a href="<?php echo esc_url(wp_get_attachment_url($post->id)); ?>" title="<?php echo esc_attr(get_the_title()); ?>"> <?php the_title(); ?>  </a>
        
					<?php endif; ?>
        	
            </div>
    
			<?php 
			
				endwhile; 
				
			?>

        </article>
        
	</div>
    
</div>


<?php 
	
	do_action('bazaarlite_bottom_sidebar', 'bottom_sidebar_area' );
	
	get_footer(); 

?>