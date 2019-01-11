<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Haste Store
 * @since 2.2.0
 */

get_header(); ?>

	<main id="content" tabindex="-1" role="main">

			<?php if ( true == get_theme_mod( 'display_blog_title', true ) ) : ?>
				<header class="page-header">

					<h1 class="page-title">
						<?php if ( true == get_theme_mod( 'blog_title', __('Blog', 'haste-store') ) ) :
							echo get_theme_mod( 'blog_title', __('Blog', 'haste-store') );
						else : ?>
							<?php _e('Blog', 'haste-store')?>
						<?php endif ;?>
					</h1>
					<?php if ( true == get_theme_mod( 'blog_description', false ) ) :?>
						<p><?php echo get_theme_mod( 'blog_description', false ); ?></p>
					<?php endif ;?>

				</header><!-- .page-header -->
			<?php endif ;?>

			<?php if ( have_posts() ) : ?>

				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<?php
								// Start the Loop.
								while ( have_posts() ) : the_post();
										/*
										* Include the post format-specific template for the content. If you want to
										* use this in a child theme, then include a file called called content-___.php
										* (where ___ is the post format) and that will be used instead.
										*/
										if ( is_single() ) :

											get_template_part( 'template-parts/content', 'section' );

										else :

											get_template_part ( 'template-parts/content', get_post_format() );

										endif;

								endwhile;

								// Post navigation.
								haste_store_paging_nav();

								else :
									// If no content, include the "No posts found" template.
									get_template_part( 'template-parts/content', 'none' );

								endif;
							?>
						</div>

							<?php
								if ( true == get_theme_mod( 'display_blog_sidebar', true ) ) :
									get_sidebar();
								endif;
							?>
					</div>
				</div>

	</main><!-- #content -->

<?php



get_footer();
