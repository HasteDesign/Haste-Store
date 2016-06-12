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

<div class="dropdown">
	<button type="button" class="btn btn-default dropdown-toggle sidebar-collapse-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Filtrar produtos
        <span class="caret"></span>
    </button>

	<div class="dropdown-menu sidebar-dropdown-wrapper">
		<aside id="sidebar-dropdown" class="sidebar sidebar-dropdown" role="complementary">

	        <?php dynamic_sidebar( 'top-sidebar' ); ?>

		</aside><!-- #sidebar -->
	</div>
</div>
<?php endif; ?>
