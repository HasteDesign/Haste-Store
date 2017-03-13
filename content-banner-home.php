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
		<h2 class="entry-title section-title">

		<?php if ( true == get_theme_mod( 'home-content-section-title', get_the_title() ) ) :
				echo get_theme_mod( 'home-content-section-title', get_the_title() );
			else :
				the_title();
			endif ;?>

		</h2>
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

		<?php if ( true == get_theme_mod( 'enable-home-1st-btn', true ) || true == get_theme_mod( 'enable-home-sec-btn', true ) ) : ?>
			<div class="section-buttons">

				<?php if ( true == get_theme_mod( 'enable-home-1st-btn', true ) ) : ?>
					<a href="<?php echo get_theme_mod( 'home-1st-btn-link', '#' ); ?>" class="btn-1st <?php echo get_theme_mod( 'home-1st-btn-classes', 'btn btn-success' ); ?>">
						<?php echo get_theme_mod( 'home-1st-btn-text', esc_attr__( 'View', 'haste-store' ) ); ?>
					</a>
				<?php endif; ?>

				<?php if ( true == get_theme_mod( 'enable-home-2nd-btn', true ) ) : ?>
					<a href="<?php echo esc_url( get_theme_mod( 'home-2nd-btn-link', '#' ) ); ?>" class="btn-2nd <?php echo esc_attr( get_theme_mod( 'home-2nd-btn-classes', 'btn btn-outline' ) ); ?>">
						<?php echo esc_attr( get_theme_mod( 'home-2nd-btn-text', __( 'Tell me more', 'haste-store' ) ) ); ?>
					</a>
				<?php endif; ?>

			</div>
		<?php endif; ?>

</article><!-- #post-## -->
