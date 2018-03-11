<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Haste Store
 * @since 2.2.0
 */

get_header(); ?>

		<main id="content" class="<?php echo get_theme_mod( 'display_posts_sidebar', true )? haste_store_classes_page_sidebar() : haste_store_classes_page_full(); ?>" tabindex="-1" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			?>
		</main><!-- #main -->

<?php

if ( true == get_theme_mod( 'display_posts_sidebar', true ) ) :

	get_sidebar();

endif;

get_footer();
