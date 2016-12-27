<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package TheShop
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="preloader">
    <div class="preloader-inner">
    	<?php $preloader = get_theme_mod('preloader_text', 'Loading&hellip;'); ?>
    	<?php echo esc_html($preloader); ?>
    </div>
</div>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'theshop' ); ?></a>
	
	<header id="masthead" class="site-header clearfix" role="banner">
		<div class="container">
			<div class="site-branding col-md-4">
				<?php theshop_branding(); ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation col-md-8" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
			<nav class="mobile-nav"></nav>
		</div>
	</header><!-- #masthead -->
	
	<?php if ( !is_home() ) : ?>
	<div class="header-promo">
		<div class="container">
			<?php theshop_top_promo(); ?>
		</div>
	</div>	
	<?php endif; ?>	

	<?php
	$header_front = get_theme_mod('header_active_front', 'full');
	$header_site = get_theme_mod('header_active_site', 'top-bar');
	?>
	<?php if ( !is_home() && (is_front_page() && $header_front == 'full') || (!is_front_page() && $header_site == 'full') ) : ?>
	<div class="hero-section clearfix">
		<?php if (!get_theme_mod('side_menu')) : ?>
		<nav id="secondary-nav" class="secondary-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'fallback_cb' => 'theshop_menu_fallback' ) ); ?>
			<div class="s-mobile-nav"></div>
		</nav>
		<?php endif; ?>	
		<div class="header-slider">
			<?php theshop_slider(); ?>
		</div>
	</div>
	<?php endif; ?>

	<div id="content" class="site-content">
	<?php if ( !is_page_template('page-templates/page_front-page.php') ) : ?>
	<div class="container content-wrapper">
	<?php endif; ?>		