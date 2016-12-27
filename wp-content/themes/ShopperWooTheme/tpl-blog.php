<?php
/*
	Template Name: Blog
*/
?>
<?php get_header(); ?>	
<section id="content">
	<div class="container">
	
		<div class="single_left">
		
			<div id="posts_cont">
		
				<?php
				$args = array(
					'category_name' => 'blog',
					 'post_type' => 'post',
					 'posts_per_page' => 3,
					 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
					 );
				query_posts($args);
				$x = 0;
				while (have_posts()) : the_post(); ?>     	
					<div class="blog_box <?php if($x == 2) { echo 'blog_box_last'; } ?>">
						<div><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('st-blog-image'); ?></a></div>
						<div class="sb_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
						<div class="sb_price"><?php echo ds_get_excerpt(470); ?></div>
						<p><a href="<?php the_permalink(); ?>" class="read_more">READ MORE</a></p>
					</div><!--//blog_box-->
				
				<?php if ($x == 2) { echo '<div class="blog_box clear"></div>'; $x = -1; } $x++; ?>
				<?php endwhile; ?>
				
				<div class="clear"></div>
			
			</div><!--//posts_cont-->
			
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
			
			<?php wp_reset_query(); ?> 
		
		</div><!--//single_left-->
		
		<?php get_sidebar(); ?>
		
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
    itemSelector : "#posts_cont .blog_box"
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