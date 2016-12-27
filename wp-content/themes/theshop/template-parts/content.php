<?php
/**
 * @package TheShop
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() && ( get_theme_mod( 'index_feat_image' ) != 1 ) ) : ?>
		<div class="entry-thumb">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('theshop-small'); ?></a>
		</div>	
	<?php endif; ?>


	<?php if ( has_post_thumbnail() && ( get_theme_mod( 'index_feat_image' ) != 1 ) ) : ?>
	<div class="inner-content">
	<?php else : ?>
	<div class="inner-content no-thumb">
	<?php endif; ?>	
		<header class="entry-header">
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

			<?php if ( 'post' == get_post_type() && get_theme_mod('hide_meta_index') != 1 ) : ?>
			<div class="entry-meta">
				<?php theshop_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php if ( (get_theme_mod('full_content_home') == 1 && is_home() ) || (get_theme_mod('full_content_archives') == 1 && is_archive() ) ) : ?>
				<?php the_content(); ?>
			<?php else : ?>
				<?php the_excerpt(); ?>
			<?php endif; ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'theshop' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->