<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

		</div><!-- .row -->
	</div><!-- #wrapper -->

	<footer id="footer" role="contentinfo">
		<?php if ( ! is_page_template( 'page-landing.php' ) ) : ?>
			<section class="footer-widgets sidebar">
				<div class="container">
					<div class="row">

						<div class="footer-widget-area-1 col-md-3 col-sm-6 col-xs-12">
							<?php
								if ( ! dynamic_sidebar( 'footer-widget-area-1' ) ) {
								}
							?>
						</div>

						<div class="footer-widget-area-2 col-md-3 col-sm-6 col-xs-12">
							<?php
								if ( ! dynamic_sidebar( 'footer-widget-area-2' ) ) {
								}
							?>
						</div>

						<div class="footer-widget-area-3 col-md-3 col-sm-6 col-xs-12">
							<?php
								if ( ! dynamic_sidebar( 'footer-widget-area-3' ) ) {
								}
							?>
						</div>

						<div class="footer-widget-area-4 col-md-3 col-sm-6 col-xs-12">
							<?php
								if ( ! dynamic_sidebar( 'footer-widget-area-4' ) ) {
								}
							?>
						</div>

					</div>
				</div>
			</section>
		<?php endif; // if is landing ?>

		<section class="footer-colophon">
			<div class="container">
				<div class="col-md-6 copy">
					&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'haste-store' ); ?>
				</div>
				<div class="col-md-6 credits">
					<a href="<?php echo esc_url( get_theme_mod( 'site-credits-link', 'http://www.hastedesign.com.br' ) ); ?>">
						<?php echo esc_attr( get_theme_mod( 'site-credits-text', __( 'Proudly powered by Haste Store and WordPress', 'haste-store' ) ) ); ?>
					</a>
				</div>
			</div><!-- .container -->
		</section>
	</footer><!-- #footer -->

	<?php wp_footer(); ?>
</body>
</html>
