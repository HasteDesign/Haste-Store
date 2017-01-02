<?php
/**
 * Haste_Image_Button_Module class.
 *
 * Facebook like widget.
 *
 * @package  Odin
 * @category Widget
 * @author   WPBrasil
 * @version  2.2.0
 */
class Haste_Image_Button_Module extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'haste_image_button_module',
			__( 'Haste Text and Image Module', 'harness-store' ),
			array( 'description' => __( 'Displays featured text and image, with few options.', 'harness-store' ), )
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
		$title         = isset( $instance['title'] ) ? $instance['title'] : __('My module title', 'harness-store');
		$subtitle      = isset( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$content       = isset( $instance['content'] ) ? $instance['content'] : '';
		$align         = isset( $instance['align'] ) ? $instance['align'] : '';
		$padding       = isset( $instance['padding'] ) ? $instance['padding'] : 0;
		$image         = isset( $instance['image'] ) ? $instance['image'] : '';
		$img_offset_v  = isset( $instance['img_offset_v'] ) ? $instance['img_offset_v'] : 0;
		$img_offset_h  = isset( $instance['img_offset_h'] ) ? $instance['img_offset_h'] : 0;
		$cover 		   = isset( $instance['cover'] ) ? $instance['cover'] : 1;
		$bg_color      = isset( $instance['bg_color'] ) ? $instance['bg_color'] : '#eeeeee';

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
			<label for="<?php echo $this->get_field_id( 'align' ); ?>">

				<?php _e( 'Content alignment', 'harness-store' ); ?>

				<select class='widefat' id="<?php echo $this->get_field_id('align'); ?>"
					name="<?php echo $this->get_field_name( 'align' ); ?>" type="text">
					<option
						value='content-center'
						<?php echo ( $align =='center' ) ? 'selected' : ''; ?>>
						<?php _e( 'Text centered, image on background', 'harness-store' ); ?>
					</option>
					<option
						value='content-right'
						<?php echo ( $align =='content-left-image-right' ) ? 'selected' : ''; ?>>
						<?php _e( 'Text on left, image on right', 'harness-store' ); ?>
					</option>
					<option
						value='content-left'
						<?php echo ( $align =='content-right-image-left' ) ? 'selected' : ''; ?>>
						<?php _e( 'Text on left, image on right', 'harness-store' ); ?>
					</option>
				</select>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'padding' ); ?>">
				<?php _e( 'Area padding (%)', 'harness-store' ); ?>
				<input id="<?php echo $this->get_field_id( 'padding' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'padding' ); ?>" type="number" min="0" max="100" value="<?php echo esc_attr( $padding ); ?>" />
			</label>
		</p>
		<p class="upload-img">
			<div class='image-preview-wrapper'>
				<img id='image-preview' src='<?php echo esc_attr( $image ); ?>' width='100%' height='100' style='max-height: 100px; width: 100px;'>
			</div>
			<label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:', 'harness-store' ); ?></label>
			<input class="image_attachment_id" name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_attr( $image ); ?>" />
			<input class="upload_image_button" type="button" value="<?php _e( 'Upload image', 'harness-store' ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'img_offset_v' ); ?>">
				<?php _e( 'Image vertical offset (from -50% to 50%)', 'harness-store' ); ?>
				<input id="<?php echo $this->get_field_id( 'img_offset_v' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'img_offset_v' ); ?>" type="number" min="-50" max="50" value="<?php echo esc_attr( $img_offset_v ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'img_offset_h' ); ?>">
				<?php _e( 'Image horizontal offset (from -50% to 50%)', 'harness-store' ); ?>
				<input id="<?php echo $this->get_field_id( 'img_offset_h' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'img_offset_h' ); ?>" type="number" min="-50" max="50" value="<?php echo esc_attr( $img_offset_h ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'cover' ); ?>">
				<input id="<?php echo $this->get_field_id( 'cover' ); ?>" name="<?php echo $this->get_field_name( 'cover' ); ?>" type="checkbox" value="1" <?php checked( 1, $cover, true ); ?> /> <?php _e( 'Expand image to cover the entire module area', 'harness-store' ); ?>
			</label>
		</p>
		<p>
            <label for="<?php echo $this->get_field_id( 'bg_color' ); ?>">
				<?php _e( 'Background Color', 'harness-store' ); ?>
	            <input class="haste-color-picker" type="text" id="<?php echo $this->get_field_id( 'bg_color' ); ?>" name="<?php echo $this->get_field_name( 'bg_color' ); ?>" value="<?php echo esc_attr( $instance['bg_color'] ); ?>" />
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
$instance['title']		= ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
$instance['subtitle']	= ( ! empty( $new_instance['subtitle'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
$instance['content']	= ( ! empty( $new_instance['content'] ) ) ? sanitize_text_field( $new_instance['content'] ) : '';
$instance['padding']	= ( ! empty( $new_instance['padding'] ) ) ? intval( $new_instance['padding'] ) : 0;
$instance['image']	= ( ! empty( $new_instance['image'] ) ) ? esc_url( $new_instance['image'] ) : '';
$instance['img_offset_v']	= ( ! empty( $new_instance['img_offset_v'] ) ) ? intval( $new_instance['img_offset_v'] ) : 0;
$instance['img_offset_h']	= ( ! empty( $new_instance['img_offset_h'] ) ) ? intval( $new_instance['img_offset_h'] ) : 0;
$instance['cover'] = ( ! empty( $new_instance['cover'] ) ) ? intval( $new_instance['cover'] ) : 0;
$instance['bg_color']	= ( ! empty( $new_instance['bg_color'] ) ) ? esc_attr( $new_instance['bg_color'] ) : '#eeeeee';

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

		echo $args['before_widget'];

		// Image settings
			$pos_v 	= 50 - ( isset( $instance['img_offset_v'] ) ? $instance['img_offset_v'] : 0 ). "%";

			$pos_h 	= 50 - ( isset( $instance['img_offset_h'] ) ? $instance['img_offset_h'] : 0 ) . "%";

		echo '<div class="widget-wrapper"';

		if ( isset( $instance['bg_color'] ) ) :
			echo 'style="background-color: ' . $instance['bg_color'] . '; ' ;
		endif;

		if ( isset( $instance['img_offset_v'] ) || isset( $instance['img_offset_h'] ) ) :
			echo 'background-position: ' . $pos_v . ' ' . $pos_h . '; ' ;
		endif;

		if ( isset( $instance['cover'] ) ) {
			echo 'background-size: cover; ';
		}

		if ( isset( $instance['padding'] ) ) :
			echo 'padding-top: ' . $instance['padding'] . '%; padding-bottom: ' . $instance['padding'] . '%; ' ;
		endif;

		if ( isset( $instance['image'] )) {
			echo 'background-image: url(\'' . esc_url( $instance['image'] ) . '\'); ';
		}

		echo '">';

		echo '<div class="widget-container">';

		echo '<div class="widget-content-wrapper">';

		echo '<header class="widget-header">';

		$title = apply_filters( 'widget_title', $instance['title'] );

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		if ( isset( $instance['subtitle'] ) ) :
			echo '<p class="subtitle">' . $instance['subtitle'] . '</p>';
		endif;

		echo '</header>';

		if ( isset( $instance['content'] ) ) :
			echo '<div class="widget-content">' . $instance['content'] . '</div>';
		endif;

		echo '</div>';

		echo '<div class="widget-shortcode">';

		if ( isset( $instance['shortcode'] ) ) :
			echo do_shortcode( $instance['shortcode'] );
		endif;

		echo '</div></div></div>';

		echo $args['after_widget'];
	}
}

/**
 * Register the Like Box Widget.
 */
function haste_image_button_module() {
	register_widget( 'Haste_Image_Button_Module' );
}

add_action( 'widgets_init', 'haste_image_button_module' );
