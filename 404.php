<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Haste Store
 * @since 2.2.0
 */

get_header(); ?>

	<main id="content" class="<?php echo haste_store_classes_page_full(); ?>" tabindex="-1" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'haste-store' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'haste-store' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->

	</main><!-- #main -->

<?php
get_footer();
