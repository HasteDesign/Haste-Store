<?php
/**
 * The template for displaying video attachments.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

		<main id="content" class="<?php echo get_theme_mod( 'display_posts_sidebar', true )? odin_classes_page_sidebar() : odin_classes_page_full(); ?>" tabindex="-1" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
					<div class="entry-content entry-attachment">
						<?php echo wp_video_shortcode( array( 'src' => wp_get_attachment_url() ) ); ?>

						<p><strong><?php _e( 'URL:', 'haste-store' ); ?></strong> <a href="<?php echo wp_get_attachment_url(); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><span><?php echo basename( wp_get_attachment_url() ); ?></span></a></p>

						<?php the_content(); ?>

						<?php if ( ! empty( $post->post_parent ) ) : ?>
							<ul class="pager page-title">
								<li class="previous"><a href="<?php echo get_permalink( $post->post_parent ); ?>" title="<?php echo esc_attr( sprintf( __( 'Back to %s', 'haste-store' ), strip_tags( get_the_title( $post->post_parent ) ) ) ); ?>"><?php printf( __( '<span class="meta-nav">&larr;</span> %s', 'haste-store' ), get_the_title( $post->post_parent ) ); ?></a></li>
							</ul><!-- .pager -->
						<?php endif; ?>
					</div><!-- .entry-content -->
				</article>
			<?php endwhile; ?>

		</main><!-- main -->

<?php

if ( true == get_theme_mod( 'display_blog_sidebar', true ) ) :

	get_sidebar();

endif;

get_footer();
