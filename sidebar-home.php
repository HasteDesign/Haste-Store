<?php
/**
 * The sidebar containing the secondary widget area, displays on homepage, archives and posts.
 *
 * If no active widgets in this sidebar, it will shows Recent Posts, Archives and Tag Cloud widgets.
 *
 * @package Haste Store
 * @since 2.2.0
 */
?>

<?php if ( is_active_sidebar( 'home-main-content' ) ) : ?>
	<section id="home-main-content" class="home-main-content" role="complementary">
		<?php
			dynamic_sidebar( 'home-main-content' );
		?>
	</section><!-- #sidebar -->
<?php endif; ?>
