<?php
/**
 * Template Name: Banner
 *
 * The template for displaying the homepage.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header();
?>

	<main id="content" class="col-md-12" tabindex="-1" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
			?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<section class="page-section home-banners <?php echo get_theme_mod( 'home-content-section-height', 'full-height' ); ?>"
			<?php if ( has_post_thumbnail() ) { ?>
				style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>')"
			<?php } ?>>

			<div class="section-wrapper">

				<?php
					// Include the page content template.
					get_template_part( 'content', 'banner' );
				?>

			</div>
		</section>

		<section class="content-section entry-content container">
				<?php
					the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'haste-store' ) );
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'haste-store' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
				?>
		</section><!-- .entry-content -->

	</article>
			<?php
				endwhile;
			?>

	</main><!-- #main -->

<?php

get_footer();
