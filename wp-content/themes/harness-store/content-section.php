<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" class="container section">
	<header class="section-header">
		<?php
				the_title( '<h2 class="entry-title section-title">', '</h2>' );
		?>

	</header><!-- .entry-header -->

		<div class="section-content">
			<?php
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'haste-store' ) );
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'haste-store' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- .entry-content -->
</article><!-- #post-## -->
