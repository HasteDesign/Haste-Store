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

		<?php if ( true == get_theme_mod( 'enable-home-cta-btn' ) || true == get_theme_mod( 'enable-home-sec-btn' ) ) : ?>
			<div class="section-content section-buttons">

				<?php if ( true == get_theme_mod( 'enable-home-cta-btn', true ) ) : ?>
					<a href="<?php echo get_theme_mod( 'home-cta-btn-link' ); ?>" class="<?php echo get_theme_mod( 'home-cta-btn-classes' ); ?>">
						<?php echo get_theme_mod( 'home-cta-btn-text' ); ?>
					</a>
				<?php endif; ?>

				<?php if ( true == get_theme_mod( 'enable-home-sec-btn', true ) ) : ?>
					<a href="<?php echo get_theme_mod( 'home-sec-btn-link' ); ?>" class="<?php echo get_theme_mod( 'home-sec-btn-classes' ); ?>">
						<?php echo get_theme_mod( 'home-sec-btn-text' ); ?>
					</a>
				<?php endif; ?>

			</div>
		<?php endif; ?>

</article><!-- #post-## -->
