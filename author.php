<?php
/**
 * The template for displaying Author archive pages.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Haste Store
 * @since 2.2.0
 */

get_header(); ?>

	<main id="content" class="<?php echo get_theme_mod( 'display_blog_sidebar', true )? haste_store_classes_page_sidebar() : haste_store_classes_page_full(); ?>" tabindex="-1" role="main">

			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );

						/*
						 * Queue the first post, that way we know what author
						 * we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop properly
						 * with a call to rewind_posts().
						 */
						the_post();
					?>
					<?php if ( get_the_author_meta( 'description' ) ) : ?>
						<div class="author-box vcard row">
							<div class="col-md-2 author-avatar">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 96, '' , '' , array( 'class' => 'img-circle') ); ?>
							</div>
							<div class="col-md-10 author-description">
								<?php the_author_meta( 'description' ); ?>
							</div>
						</div><!-- .author-biography -->
					<?php endif; ?>
				</header><!-- .archive-header -->

				<?php
						/*
						 * Since we called the_post() above, we need to rewind
						 * the loop back to the beginning that way we can run
						 * the loop properly, in full.
						 */
						rewind_posts();

						// Start the Loop.
						while ( have_posts() ) : the_post();

							/*
							 * Include the post format-specific template for the content. If you want to
							 * use this in a child theme, then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						// Page navigation.
						haste_store_paging_nav();

					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'template-parts/content', 'none' );

				endif;
			?>

	</main><!-- #main -->

<?php

if ( true == get_theme_mod( 'display_blog_sidebar', true ) ) :

	get_sidebar();

endif;

get_footer();
