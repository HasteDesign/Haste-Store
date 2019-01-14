<div id="header-content">
	<div class="container">
		<div class="row">
			<div class="header-branding col-md-6 d-flex flex-row nav-link">
				<?php haste_store_the_custom_logo(); ?>

				<?php if ( get_bloginfo( 'description' ) || is_customize_preview() ) : ?>
					<p class="site-description mx-3"><?php bloginfo( 'description' ); ?></p>
				<?php endif ?>
			</div>

			<div class="d-flex justify-content-end col-md-6">
				<div class="top-nav">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'top-menu',
						'depth'          => 1,
						'container'      => false,
						'menu_class'     => 'nav justify-content-end',
						'fallback_cb'    => 'Haste_Store_Bootstrap_Nav_Walker::fallback',
						'walker'         => new Haste_Store_Bootstrap_Nav_Walker(),
					) );
					?>
				</div>
				<?php if ( is_user_logged_in() ) { ?>
					<div class="top-info">
						<span class="navbar-text">

						</span>

					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
