<?php
/**
 * Haste_Woo_Products class.
 *
 * Facebook like widget.
 *
 * @package  Odin
 * @category Widget
 * @author   WPBrasil
 * @version  2.2.0
 */
class Haste_Woo_Products extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'haste_woo_products',
			__( 'Haste Woo Products', 'harness-store' ),
			array( 'description' => __( 'Displays WooCommerce products', 'harness-store' ), )
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param  array $instance Previously saved values from database.
	 *
	 * @return string          Widget options form.
	 */
	public function form( $instance ) {
		$title         = isset( $instance['title'] ) ? $instance['title'] : __('Featured products', 'harness-store');
		$subtitle      = isset( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$shortcode     = isset( $instance['shortcode'] ) ? $instance['shortcode'] : '';
		$columns       = isset( $instance['height'] ) ? $instance['height'] : 1;

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title:', 'harness-store' ); ?>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>">
				<?php _e( 'Subtitle', 'harness-store' ); ?>
				<input id="<?php echo $this->get_field_id( 'subtitle' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'shortcode' ); ?>">
				<?php _e( 'WooCommerce shortcode:', 'harness-store' ); ?>
				<input id="<?php echo $this->get_field_id( 'shortcode' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'shortcode' ); ?>" type="text" value="<?php echo intval( $shortcode ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'columns' ); ?>">
				<?php _e( 'Products columns:', 'harness-store' ); ?>
				<input id="<?php echo $this->get_field_id( 'columns' ); ?>" name="<?php echo $this->get_field_name( 'columns' ); ?>" type="number" min="1" max="12" value="<?php echo intval( $columns ); ?>" />
			</label>
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param  array $new_instance Values just sent to be saved.
	 * @param  array $old_instance Previously saved values from database.
	 *
	 * @return array               Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle']      = ( ! empty( $new_instance['subtitle'] ) ) ? esc_url( $new_instance['subtitle'] ) : '';
		$instance['columns']       = ( ! empty( $new_instance['columns'] ) ) ? intval( $new_instance['columns'] ) : 1;
		$instance['shortcode']     = ( ! empty( $new_instance['shortcode'] ) ) ? intval( $new_instance['shortcode'] ) : '';

		return $instance;
	}

	/**
	 * Outputs the content of the widget.
	 *
	 * @param  array  $args      Widget arguments.
	 * @param  array  $instance  Widget options.
	 *
	 * @return string            Facebook like box.
	 */
	public function widget( $args, $instance ) {

		echo '<section class="page-section haste-woo-products">';
		echo '<div class="container">';

			do_shortcode( $instance['shortcode'] );

		echo '</div>';
		echo '</section>';

	}
}

/**
 * Register the Like Box Widget.
 */
function haste_woo_products() {
	register_widget( 'Haste_Woo_Products' );
}

add_action( 'widgets_init', 'haste_woo_products' );
