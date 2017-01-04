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

					<div class="col-md-3 footer-widget-area-1">
						<?php
							if ( ! dynamic_sidebar( 'footer-widget-area-1' ) ) {
							}
						?>
					</div>

					<div class="col-md-3 footer-widget-area-2">
						<?php
							if ( ! dynamic_sidebar( 'footer-widget-area-2' ) ) {
							}
						?>
					</div>

					<div class="col-md-3 footer-widget-area-3">
						<?php
							if ( ! dynamic_sidebar( 'footer-widget-area-3' ) ) {
							}
						?>
					</div>

					<div class="col-md-3 footer-widget-area-4">
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
				<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'haste-store' ); ?> | <?php echo sprintf( __( 'Powered by the <a href="%s" rel="nofollow" target="_blank">Odin</a> forces and <a href="%s" rel="nofollow" target="_blank">WordPress</a>.', 'haste-store' ), 'http://wpod.in/', 'http://wordpress.org/' ); ?></p>
			</div><!-- .container -->
		</section>
	</footer><!-- #footer -->

	<?php wp_footer(); ?>
</body>
</html>
