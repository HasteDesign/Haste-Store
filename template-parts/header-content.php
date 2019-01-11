<div id="header-content">
	<div class="container">
		<div class="row header-content-wrapper">
			<div class="header-main-menu">
				<nav id="navigation-top" class="navbar navbar-expand-md navbar-light" role="navigation">

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
							<span class="navbar-toggler-label"><?php _e( 'Menu', 'haste-store' ); ?></span>
						</button>

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
						</div><!-- .navbar-collapse -->

				</nav>
			</div>

			<div class="header-actions col-md-5">

				<?php if ( ! wp_is_mobile() ) { ?>
					<?php if ( is_user_logged_in() ) { ?>

						<div class="header-action">
							<a class="btn btn-link" href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" title="<?php _e( 'Minha conta', 'hastestore' ); ?>">

							</a>
						</div>

					<?php } else { ?>

						<div class="header-action">
							<a class="btn btn-link btn-2-lines" href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" title="<?php _e( 'Entrar ou cadastrar', 'hastestore' ); ?>">

								<span><?php _e( 'Entrar ou cadastrar-se', 'hastestore' ); ?></span>
							</a>
						</div>

					<?php } ?>

					<div class="header-action">
						<a class="btn btn-link" href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>" title="<?php _e( 'Meus pedidos', 'hastestore' ); ?>">

							<?php _e( 'Meus pedidos', 'hastestore' ); ?>
						</a>
					</div>
				<?php } ?>

				<div class="header-action">

				</div>
			</div>
		</div>

	</div>
</div>
