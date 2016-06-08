<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates

 */



if (!defined('ABSPATH')) { exit; } // Exit if accessed directly



get_header('shop'); ?>



<div class="container">

<style type="text/css">#sidebar { display: none; } .woocommerce-pagination { display: none; }</style>



	<?php

		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */

		do_action('woocommerce_before_main_content');

	?>



		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>


			<div class="archive_header_left">
				<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
				<?php do_action( 'woocommerce_before_shop_loop' ); ?>
			</div>



		<?php endif; ?>



		<?php do_action( 'woocommerce_archive_description' ); ?>



		

		<?php if ( have_posts() ) : ?>



			<div style="float: right;" class="archive_header_right">

			<?php

				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */

				do_action( 'woocommerce_before_shop_loop' );

			?>

			</div>
			<div class="clear"></div>



			<?php woocommerce_product_loop_start(); ?>



				<?php woocommerce_product_subcategories(); ?>

				<?php global $x; ?>

				<?php $x = 0;

				global $wp_query;
				
				if ($_REQUEST['orderby'] == 'price') {
					$args = array_merge( $wp_query->query, array( 'posts_per_page' => 9, 'orderby' => 'meta_value_num', 'order' => 'asc', 'meta_key' => '_price' ) );
				} elseif ($_REQUEST['orderby'] == 'price-desc') {
					$args = array_merge( $wp_query->query, array( 'posts_per_page' => 9, 'orderby' => 'meta_value_num', 'order' => 'desc', 'meta_key' => '_price' ) );
				} else {
					$args = array_merge( $wp_query->query, array( 'posts_per_page' => 9 ) );
				}

				query_posts( $args );     

				?>

				

				<div id="posts_cont">

				

					<?php while ( have_posts() ) : the_post(); ?>

						

						<?php woocommerce_get_template_part( 'content', 'product-archive' ); ?>

						<?php if ($x == 2) { $x = -1; } ?>

						<?php $x++; ?>

					<?php endwhile; // end of the loop. ?>

					<div class="clear"></div>

					

				</div><!--//posts_cont-->



			<?php woocommerce_product_loop_end(); ?>

			

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
					<div class="clear"></div>

			<?php

				/**

				 * woocommerce_after_shop_loop hook

				 *

				 * @hooked woocommerce_pagination - 10

				 */

				do_action( 'woocommerce_after_shop_loop' );

			?>



		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>



			<?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>



		<?php endif; ?>



	<?php

		/**

		 * woocommerce_after_main_content hook

		 *

		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)

		 */

		do_action('woocommerce_after_main_content');

	?>



	<?php

		/**

		 * woocommerce_sidebar hook

		 *

		 * @hooked woocommerce_get_sidebar - 10

		 */

		do_action('woocommerce_sidebar');

	?>

</div>

<?php get_footer('shop'); ?>







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