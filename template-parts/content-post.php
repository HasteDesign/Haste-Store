<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kiguchi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</header>

	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-thumb">
			<?php the_post_thumbnail('medium-large'); ?>
		</div>
	<?php endif; ?>

	<?php if ( ! is_search() ) : ?>
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
	<?php else : ?>
		<div class="entry-content">
			<?php
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'kiguchi' ) );
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'kiguchi' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</div>
	<?php endif; ?>

	<footer class="entry-footer">
		<p class="tag-links"><?php the_author(); ?> - <?php the_time('m/j/y') ?> - <?php the_category(', ') ?></p>
		<?php echo get_the_tag_list( sprintf( '<p>', __( 'Tags', 'textdomain' ) ), ', ', '</p>' ); ?>
	</footer>
</article><!-- #post-## -->
