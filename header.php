<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="wrapper" class="container"><div class="row">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ComidaBoa
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<nav class="navigation-skiplink" role="navigation">
		<a class="navigation-skiplink-link" href="#content"><?php _e( 'Skip to content', 'comida-boa' ); ?></a>
	</nav>

	<header id="header" role="banner">

		<?php get_template_part( 'template-parts/header', 'content' ); ?>

		<?php get_template_part( 'template-parts/header', 'navigation' ); ?>

		<?php get_template_part( 'template-parts/header', 'image' ); ?>
	</header><!-- #header -->

	<div id="wrapper" class="container">
		<div class="row">

			<?php if( !is_front_page() && !is_page_template( 'page-home.php' ) && !is_page_template( 'page-landing.php' ) ) : ?>
				<div class="breadcrumb-wrapper col-md-12">

				<?php do_action( 'haste_store_content_top' ); ?>

				</div>
			<?php endif; ?>
