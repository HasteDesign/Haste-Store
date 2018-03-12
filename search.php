<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Haste Store
 * @since 2.2.0
 */

get_header(); ?>

<main id="content" class="<?php echo get_theme_mod( 'display_blog_sidebar', true )? haste_store_classes_page_sidebar() : haste_store_classes_page_full(); ?>" tabindex="-1" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'haste-store' ), get_search_query() ); ?></h1>
				</header><!-- .page-header -->

					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							/*
							 * Include the post format-specific template for the content. If you want to
							 * use this in a child theme, then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						// Post navigation.
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
