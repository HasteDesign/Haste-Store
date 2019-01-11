<div id="top-bar">
	<div id="header-branding">
		<div class="container">
			<?php haste_store_the_custom_logo(); ?>

			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
			<?php else : ?>
				<div class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</div>
			<?php
			endif;
			if ( get_bloginfo( 'description' ) || is_customize_preview() ) : ?>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php endif ?>

			<div class="d-flex justify-content-end">
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
