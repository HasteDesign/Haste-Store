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
		<section class="home-jumbotron jumbotron">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			?>
		</section>

		<section class="home-products woocommerce">
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

		</section>

	</main><!-- #main -->

<?php

get_footer();
