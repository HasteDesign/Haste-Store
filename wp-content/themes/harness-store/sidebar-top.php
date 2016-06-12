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
<?php if ( is_active_sidebar( 'top-sidebar' ) ) : ?>

<a class="collapse-toggle sidebar-collapse-toggle btn btn-default" data-toggle="collapse" href="#sidebar-collapse-top" aria-expanded="false" aria-controls="sidebar-top">
	Filtrar produtos
</a>
<div id="sidebar-collapse-top" class="collapse sidebar-collapse-wrapper">
	<aside id="sidebar-top" class="sidebar-horizontal" role="complementary">

        <?php dynamic_sidebar( 'top-sidebar' ); ?>

	</aside><!-- #sidebar -->
</div>
<?php endif; ?>
