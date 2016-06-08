<?php get_header(); ?>	

<section id="content">
	<div class="container woocommerce">
	
		<?php
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		
		global $woocommerce_loop, $woocommerce;
		$meta_query = $woocommerce->query->get_meta_query();
		$args = array(
			'post_type'	=> 'product',
			'post_status' => 'publish',
			'ignore_sticky_posts'	=> 1,
			'post__not_in' => $slider_arr,
			'posts_per_page' => 9, 
			'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),

		);	
		
		//$products = new WP_Query( $args );
		query_posts( $args );
		
			if ( have_posts() ) : $x = 0; ?>
				
				<div id="posts_cont">
			
					<?php while ( have_posts() ) : the_post(); ?>			
						<?php woocommerce_get_template_part( 'content', 'product-home' ); ?>
						<?php if ($x == 2) { echo '<div class="home_small_box clear"></div>'; $x = -1; } ?>
					
					<?php $x++; endwhile; // end of the loop. ?>
					
				</div><!--//posts_cont-->
			<?php //woocommerce_product_loop_end(); ?>
			
			<div class="load_more_cont">
				<div align="center"><div class="load_more_text">
				<?php
				ob_start();
				//next_posts_link('<img src="' . get_bloginfo('stylesheet_directory') . '/images/loading-button.png" />');
				next_posts_link('LOAD MORE PRODUCT');
				$buffer = ob_get_contents();
				ob_end_clean();
				if(!empty($buffer)) echo $buffer;
				?>
				</div></div>
			</div><!--//load_more_cont-->          			
			<?php
			global $wp_query;
			//echo '**' . $wp_query->max_num_pages . '**';	
			$max_pages = $wp_query->max_num_pages;
			?>			
			<div id="max_pages_id" style="display: none;"><?php echo ceil($wp_query->found_posts / 9); //echo $max_pages-1; ?></div>					
		
		<?php endif;
		wp_reset_query();
		//wp_reset_postdata();	
	
	?>				
		<div class="clear"></div>
		
	</div><!--//container-->
</section><!--//content-->
<script type="text/javascript">
$(document).ready(
function($){
	$('.load_more_text a').click(function() {
		$(this).css('visibility','hidden');
		//alert('test');
	});
var curPage = 1;
var pagesNum = $("#max_pages_id").html();   // Number of pages	
if(pagesNum == 1)
	$('.load_more_text a').css('display','none');
  $('#posts_cont').infinitescroll({
 
    navSelector  : "div.load_more_text",            
		   // selector for the paged navigation (it will be hidden)
    nextSelector : "div.load_more_text a:first",    
		   // selector for the NEXT link (to page 2)
    itemSelector : "#posts_cont .home_small_box",
    behavior: "twitter",
    maxPage: <?php echo $max_pages; ?>    
		   // selector for all items you'll retrieve
  },function(arrayOfNewElems){
  
  $('#posts_cont').append('<div class="clear"></div>');
  		$('.load_more_text a').css('visibility','visible');
            curPage++;
//            alert(curPage + '**' + pagesNum);
            if(curPage == pagesNum) {
                //$(window).unbind('.infscr');
                $('.load_more_text a').css('display','none');
            } else {}  		  
  
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