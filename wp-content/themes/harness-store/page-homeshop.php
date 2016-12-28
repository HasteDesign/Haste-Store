<?php
/**
 * Template Name: Home Shop
 *
 * The template for displaying the shop homepage.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header();
?>

	<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
		?>

			<section class="page-section home-jumbotron" <?php if ( has_post_thumbnail() ) { ?> style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>')" <?php } ?>>

				<?php
					// Include the page content template.
					get_template_part( 'content', 'section' );
				?>

			</section>

		<?php
		endwhile;
		?>

		<section class="page-section home-products woocommerce">

			<div class="container">

				<header class="section-title">
					<h2>Produtos</h2>
					<p class="lead">
						Descriçao da seção
					</p>
				</header>

				<ul class="products">
					<?php
					// Implementar: pegar shortcode via customizer para fazer esse loop
					    $q = new WP_Query([
					      'post_type'   =>  'product',
					      'stock'       =>  1,
					      'showposts'   =>  3,
					      'orderby'     =>  'date',
					      'order'       =>  'DESC',
					      'meta_query'  =>  [
					        ['key' => '_featured', 'value' => 'yes' ]
					        ]
					    ]);
					    if ( $q->have_posts() ) :
					        while ( $q->have_posts() ) : $q->the_post(); ?>

							<?php wc_get_template_part( 'content', 'product' ); ?>

						<?php  endwhile;

						wp_reset_query();

						endif;
					?>
				</ul>

			</div>

		</section>

	</main><!-- #main -->

<?php

get_footer();
