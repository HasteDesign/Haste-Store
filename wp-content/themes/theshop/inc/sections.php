<?php
/**
 * Functions for the homepage sections
 *
 * @package TheShop
 */


if ( ! function_exists( 'theshop_section_products' ) ) :
/**
 * WooCommerce products loop
 *
 */
function theshop_section_products() {
	if (!theshop_woocommerce_active() || !get_theme_mod('products_activate', 1))
		return;

	$title	= get_theme_mod('products_title', 'Latest products');
	$number = get_theme_mod('products_number', '4');
	?>

	<section class="home-section products-loop">
		<div class="container">
			<?php if ($title) : ?>
			<h2 class="section-title"><span><?php echo esc_html($title); ?></span></h2>
			<?php endif; ?>
			<div class="inner-section">
			<?php echo do_shortcode('[recent_products per_page="' . intval($number) . '" columns="3"]'); ?>
			</div>
		</div>
	</section>

	<?php
}
endif;

if ( ! function_exists( 'theshop_section_cta' ) ) :
/**
 * Call to action section
 *
 */
function theshop_section_cta() {

	if (!get_theme_mod('cta_activate', 1))
		return;	

	$text			= get_theme_mod('cta_text', 'Are you ready to see more?');
	$button_title 	= get_theme_mod('cta_button_title', 'VISIT OUR SHOP');
	$button_url 	= get_theme_mod('cta_button_url', '#');
	?>

	<section class="home-section cta-section">
		<div class="container">
			<p class="cta-text"><?php echo wp_kses_post($text); ?></p>
			<a class="button" href="<?php echo esc_url($button_url); ?>"><?php echo esc_html($button_title); ?></a>
		</div>
	</section>

	<?php
}
endif;

if ( ! function_exists( 'theshop_section_cats' ) ) :
/**
 * WooCommerce categories loop
 *
 */
function theshop_section_cats() {
	if (!theshop_woocommerce_active() || !get_theme_mod('cats_activate', 1) )
		return;

	$title	= get_theme_mod('cats_title', 'Product categories');
	$number = get_theme_mod('cats_number', '3');
	?>

	<section class="home-section cats-loop">
		<div class="container">
			<?php if ($title) : ?>
			<h2 class="section-title"><span><?php echo esc_html($title); ?></span></h2>
			<?php endif; ?>
			<div class="inner-section">
			<?php echo do_shortcode('[product_categories number="' . $number . '" parent="0" columns="3"]'); ?>
			</div>
		</div>
	</section>

	<?php
}
endif;

if ( ! function_exists( 'theshop_section_posts' ) ) :
/**
 * WooCommerce categories loop
 *
 */
function theshop_section_posts() {
	
	if (!get_theme_mod('posts_activate', 1) )
		return;

	$title	= get_theme_mod('posts_title', 'Latest posts');
	$query = new WP_Query( array(
		'no_found_rows'       => true,
		'post_status'         => 'publish',
		'posts_per_page'	  => 3
	) );	
	?>

	<section class="home-section posts-loop">
		<div class="container">
			
			<?php if ($title) : ?>
			<h2 class="section-title"><span><?php echo esc_html($title); ?></span></h2>
			<?php endif; ?>

			<div class="inner-section">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="blog-post col-md-4 col-sm-6 col-xs-6">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="post-thumb">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail('theshop-small'); ?>
						</a>			
					</div>	
				<?php endif; ?>						
				<?php the_title( sprintf( '<h4 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
					<div class="entry-summary"><?php the_excerpt(); ?></div>
				</div>
			<?php endwhile; ?>
			</div>
		</div>
	</section>

	<?php
}
endif;

if ( ! function_exists( 'theshop_sections' ) ) :
/**
 * Sections output
 *
 */
function theshop_sections() {
	
	$sections = array();
	$sections[] = get_theme_mod('section_1', 'products');
	$sections[] = get_theme_mod('section_2', 'cta');
	$sections[] = get_theme_mod('section_3', 'cats');
	$sections[] = get_theme_mod('section_4', 'posts');

	foreach ($sections as $section) {
		$section_name = 'theshop_section_' . $section;
		$section_name();
	}

}
endif;