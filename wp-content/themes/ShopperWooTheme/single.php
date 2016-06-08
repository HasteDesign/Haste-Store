<?php get_header(); ?>	
<section id="content">
	<div class="container">
	
		<div class="single_left">
			<div class="single_post_cont">
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
					<h1 class="single_title"><?php the_title(); ?></h1>
					
					<div class="single_inside_content">
					
						<?php the_content(); ?>
						
					</div><!--//single_inside_content-->
					
					<br /><br />
					
					<?php comments_template(); ?>										
					
						
					
				<?php endwhile; else: ?>
				
					<h3>Sorry, no posts matched your criteria.</h3>
				<?php endif; ?>            					
			
			</div><!--//single_post_cont-->
		
		</div><!--//single_left-->
		
		<?php get_sidebar(); ?>
		
		<div class="clear"></div>
		
	</div><!--//container-->
</section><!--//content-->
<?php get_footer(); ?> 		