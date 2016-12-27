<?php get_header(); ?>	
<section id="content">
	<div class="container">
	
		<?php if(is_category()) { ?>
			<h1 class="category_title"><?php printf( __( '%s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
		<?php } ?>
		
		<div id="posts_cont">
		
			<?php
			global $wp_query;
			$args = array_merge( $wp_query->query, array( 'posts_per_page' => 12 ) );
			query_posts( $args );        
			$x = 0;
			while (have_posts()) : the_post(); ?>       
				<div class="home_small_box <?php if ($x == 2) { echo 'home_small_box_last'; } ?>">
					<div><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-small-box'); ?></a></div>
					
				</div><!--//home_small_box-->		
			
			<?php if ($x == 2) { echo '<div class="clear home_small_box"></div>'; $x = -1; } $x++; ?>
			<?php endwhile; ?>		
			
		</div><!--//posts_cont-->
		
		<div class="clear"></div>
		
		<div class="load_more_cont">
			<div align="center"><div class="load_more_text">
			<?php
			ob_start();
			next_posts_link('<img src="' . get_bloginfo('stylesheet_directory') . '/images/loading-button.png" />');
			$buffer = ob_get_contents();
			ob_end_clean();
			if(!empty($buffer)) echo $buffer;
			?>
			</div></div>
		</div><!--//load_more_cont-->          		
		<div class="clear"></div>		
		
	</div><!--//container-->
</section><!--//content-->
<script type="text/javascript">
$(document).ready(
function($){
  $('#posts_cont').infinitescroll({
 
    navSelector  : "div.load_more_text",            
		   // selector for the paged navigation (it will be hidden)
    nextSelector : "div.load_more_text a:first",    
		   // selector for the NEXT link (to page 2)
    itemSelector : "#posts_cont .home_small_box"
		   // selector for all items you'll retrieve
  },function(arrayOfNewElems){
  
  $('#posts_cont').append('<div class="clear"></div>');
  
      //$('.home_post_cont img').hover_caption();
 
     // optional callback when new content is successfully loaded in.
 
     // keyword `this` will refer to the new DOM content that was just added.
     // as of 1.5, `this` matches the element you called the plugin on (e.g. #content)
     //                   all the new elements that were found are passed in as an array
 
  });  
}  
);
</script>	
<?php get_footer(); ?> 	