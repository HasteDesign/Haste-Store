<?php
/**
 * Template Name: Home Shop
 *
 * The template for displaying the shop homepage.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header();
?>

	<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">

		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
		?>

			<section class="page-section home-jumbotron"
			<?php if ( has_post_thumbnail() ) { ?>
				style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>')"
			<?php } ?>>

			<div class="section-wrapper">

				<?php
					// Include the page content template.
					get_template_part( 'content', 'section' );
				?>

			</div>

			</section>

		<?php
			endwhile;
		?>


		<?php get_sidebar('home'); ?>

	</main><!-- #main -->

<?php

get_footer();
