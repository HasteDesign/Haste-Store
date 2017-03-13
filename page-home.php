<?php
/**
 * Template Name: Home
 *
 * The template for displaying the homepage.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header();
?>

	<main id="content" class="col-md-12" tabindex="-1" role="main">

		<?php if ( true == get_theme_mod( 'enable-home-content-section', true ) ) : ?>

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
			?>

				<section class="page-section home-banners <?php echo get_theme_mod( 'home-content-section-height', 'full-height' ); ?>"
				<?php if ( has_post_thumbnail() ) { ?>
					style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>')"
				<?php } ?>>

				<div class="section-wrapper">

					<?php
						// Include the page content template.
						get_template_part( 'content', 'banner-home' );
					?>

				</div>

				</section>

			<?php
				endwhile;
			?>

		<?php endif; ?>

		<?php get_sidebar('home'); ?>

	</main><!-- #main -->

<?php

get_footer();
