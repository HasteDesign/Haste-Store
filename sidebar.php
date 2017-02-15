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

<aside id="sidebar" class="sidebar <?php echo odin_classes_page_sidebar_aside(); ?>" role="complementary">
	<?php
		if ( is_woocommerce_activated() && is_woocommerce() ) {

			dynamic_sidebar( 'woo-sidebar' );

		} else {
			if ( ! dynamic_sidebar( 'main-sidebar' ) ) {
				the_widget( 'WP_Widget_Archives', array( 'count' => 0, 'dropdown' => 1 ) );
			}
		}
	?>
</aside><!-- #sidebar -->
