<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */


if (!function_exists('bazaarlite_thumbnail_function')) {

	function bazaarlite_thumbnail_function($id, $view = "off") {

		global $post;
		
		if ( ( (is_single()) || (is_page()) )  && (!is_page_template() ) ) {
		
			if ( '' != get_the_post_thumbnail() ) { 
			
			?>
			
            <section class="media-wrapper">
            
				<div class="pin-container">
					
					<?php the_post_thumbnail($id); ?>

				</div>
					
				<?php echo bazaarlite_posticon($view); ?>

            </section>
			
			<?php } 
	
		} else {
		
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'bazaar-lite-thumbnail');
			
			if (!empty($thumb)) :
			
		?>

            <section class="media-wrapper">

                <div class="pin-container">
                    
                    <div class="overlay-image blog-thumb">
                        
                        <img src="<?php echo $thumb[0]; ?>" class="attachment-blog wp-post-image" alt="<?php esc_attr_e( 'post image', 'bazaar-lite' ); ?>" title="<?php esc_attr_e( 'post image', 'bazaar-lite' ); ?>"> 
                        <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="overlay link"></a>
                        
                    </div>
            
                </div>

				<?php echo bazaarlite_posticon($view); ?>

            </section>

		<?php
		
		endif;
		
		}
	
	}

	add_action( 'bazaarlite_thumbnail', 'bazaarlite_thumbnail_function', 10, 2 );

}

?>