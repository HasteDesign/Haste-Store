<nav id="navigation-top" class="navbar navbar-expand-md navbar-light" role="navigation">
	<div class="container">
		<div class="row">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-label"><?php _e( 'Menu', 'haste-store' ); ?></span>
			</button>

			<?php if ( wp_is_mobile() ) { ?>

				<button class="btn btn-link btn-collapse-search collapsed" type="button" data-toggle="collapse" data-target="#search-collapse" aria-expanded="false" aria-controls="search-collapse">
					<span class="open">

					</span>
					<span class="close-up">

					</span>
				</button>
				<div class="collapse w-100" id="search-collapse">
					<div class="search-collapse-wrapper">
						<?php get_product_search_form(); ?>
					</div>
				</div>

			<?php } ?>

			<div class="collapse navbar-collapse" id="main-menu">

				<?php
					wp_nav_menu( array(
							'theme_location' => 'main-menu',
							'depth'          => 2,
							'container'      => false,
							'menu_class'     => 'navbar-nav w-100 nav-fill menu',
							'fallback_cb'    => 'Haste_Store_Bootstrap_Nav_Walker::fallback',
							'walker'         => new Haste_Store_Bootstrap_Nav_Walker(),
					) );
				?>

				<?php if ( wp_is_mobile() ) { ?>
					<div class="mobile-nav">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'top-bar-menu',
						'depth'          => 1,
						'container'      => false,
						'menu_class'     => 'navbar-nav w-100 nav-fill menu',
						'fallback_cb'    => 'Haste_Store_Bootstrap_Nav_Walker::fallback',
						'walker'         => new Haste_Store_Bootstrap_Nav_Walker(),
					) );
					?>
					</div>
				<?php } ?>
			</div><!-- .navbar-collapse -->
		</div><!-- .row -->
	</div><!-- .container -->
</nav>
