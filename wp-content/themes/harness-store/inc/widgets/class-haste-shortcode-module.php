<?php
/**
 * Haste_Shortcode_Module class.
 *
 * Facebook like widget.
 *
 * @package  Odin
 * @category Widget
 * @author   WPBrasil
 * @version  2.2.0
 */
class Haste_Shortcode_Module extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'haste_shortcode_module',
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
		$title         = isset( $instance['title'] ) ? $instance['title'] : __('My shortcode', 'harness-store');
		$subtitle      = isset( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$content       = isset( $instance['content'] ) ? $instance['content'] : '';
		$shortcode     = isset( $instance['shortcode'] ) ? $instance['shortcode'] : '';

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
			<label for="<?php echo $this->get_field_id( 'content' ); ?>">
				<?php _e( 'Content', 'harness-store' ); ?>
				<textarea id="<?php echo $this->get_field_id( 'content' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'content' ); ?>" type="text" height="5" value="<?php echo esc_attr( $content ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'shortcode' ); ?>">
				<?php _e( 'WooCommerce shortcode:', 'harness-store' ); ?>
				<input id="<?php echo $this->get_field_id( 'shortcode' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'shortcode' ); ?>" type="text" value="<?php echo esc_attr( $shortcode ); ?>" />
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
		$instance['subtitle']      = ( ! empty( $new_instance['subtitle'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		$instance['content']      = ( ! empty( $new_instance['content'] ) ) ? sanitize_text_field( $new_instance['content'] ) : '';
		$instance['shortcode']     = ( ! empty( $new_instance['shortcode'] ) ) ? sanitize_text_field( $new_instance['shortcode'] ) : '';

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

		echo '<div class="widget-wrapper"><div class="widget-container">';

		echo '<header class="widget-wrapper">';

		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		echo '<p class="subtitle">' . $instance['subtitle'] . '</p>';

		echo '</header>';

		echo '<div class="widget-content-wrapper">';

		echo '<div class="widget-content">' . $instance['content'] . '</div>';

		echo '<div class="widget-shortcode">';

		echo do_shortcode( $instance['shortcode'] );

		echo '</div></div></div></div>';

	}
}

/**
 * Register the Like Box Widget.
 */
function haste_shortcode_module() {
	register_widget( 'Haste_Shortcode_Module' );
}

add_action( 'widgets_init', 'haste_shortcode_module' );
