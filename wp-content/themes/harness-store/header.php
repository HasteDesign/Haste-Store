<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( ! get_option( 'site_icon' ) ) : ?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<?php endif; ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a id="skippy" class="sr-only sr-only-focusable" href="#content">
		<div class="container">
			<span class="skiplink-text"><?php _e( 'Skip to content', 'harness-store' ); ?></span>
		</div>
	</a>

	<header id="header" role="banner">
		<?php
			$header_image = get_header_image();
			if ( ! empty( $header_image ) ) :
		?>
			<div class="page-header">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo esc_url( $header_image ); ?>" height="<?php esc_attr_e( $header_image->height ); ?>" width="<?php esc_attr_e( $header_image->width ); ?>" alt="" />
				</a>
			</div><!-- .site-header-->
		<?php endif; ?>
		<div id="main-navigation" class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
					<span class="sr-only"><?php _e( 'Toggle navigation', 'harness-store' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="navbar-brand">
						<?php if ( is_home() ) echo '<h1 class="site-title">'; ?>
							<?php odin_the_custom_logo(); ?>
						<?php if ( is_home() ) echo '</h1>'; ?>
					</div>
					<p class="navbar-text site-description hidden-xs"><?php bloginfo( 'description' ); ?></p>
				</div>
				<nav class="collapse navbar-collapse navbar-main-navigation navbar-right" role="navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'depth'          => 2,
								'container'      => false,
								'menu_class'     => 'nav navbar-nav',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					?>
				</nav><!-- .navbar-collapse -->
			</div><!-- .container-->
		</div><!-- #main-navigation-->
	</header><!-- #header -->

	<div id="wrapper" class="container">
		<div class="row">
			<?php
			do_action( 'odin_content_top' );
			?>
