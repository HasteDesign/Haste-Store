<?php
/**
 * The sidebar containing the secondary widget area, displays on homepage, archives and posts.
 *
 * If no active widgets in this sidebar, it will shows Recent Posts, Archives and Tag Cloud widgets.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<aside id="home-main-content" class="home-main-content" role="complementary">
	<?php
		if ( ! dynamic_sidebar( 'home-main-content' ) ) {
		}
	?>
</aside><!-- #sidebar -->
