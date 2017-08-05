<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/category/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */


	$post_class;

	if ( !is_single() ) {
		$post_class = 'loop';
	} else {
		$post_class = 'single';
	};

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
	<header class="entry-header">

		<?php
			if ( !is_single() ) :
		?>
			<a class="entry-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php endif; ?>

		<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail(); ?>
		<?php endif; ?>

		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title">', '</h2>' );
			endif;
		?>

		<?php
			if ( !is_single() ) :
		?>
			</a>
		<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php odin_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( true == get_theme_mod( 'display_post_content', true ) ) : ?>
		<?php if ( is_search() ) : ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
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
		<?php endif; ?>
	<?php endif; ?>

	<?php
		if ( is_single() ) :
	?>
		<footer class="entry-meta">
			<p><?php the_tags( '<span class="tag-links">' . __( 'Tagged as:', 'haste-store' ) . ' ', '', '</span>' ); ?></p>

			<?php if ( true == get_theme_mod( 'display_post_author', true ) ) : ?>
				<div class="author-box vcard row">
					<div class="col-md-2 author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 96, '' , '' , array( 'class' => 'img-circle') ); ?>
					</div>

					<div class="col-md-10 author-description">
						<h2><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author(); ?></a></h2>
						<?php echo get_the_author_meta( 'description' ); ?>
					</div>
				</div>
			<?php endif; ?>

		</footer>
	<?php endif; ?>
</article><!-- #post-## -->
