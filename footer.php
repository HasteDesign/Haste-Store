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

		<section class="footer-colophon">
			<div class="container">
				&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'haste-store' ); ?> | <?php echo sprintf( __( 'Powered by <a href="%s" rel="nofollow" target="_blank">Haste Store</a> and <a href="%s" rel="nofollow" target="_blank">WordPress</a>.', 'haste-store' ), 'http://www.hastedesign.com.br/', 'http://wordpress.org/' ); ?>
			</div><!-- .container -->
		</section>
	</footer><!-- #footer -->

	<?php wp_footer(); ?>
</body>
</html>
