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
		$text_color    = isset( $instance['text_color'] ) ? $instance['text_color'] : '';
		$btn_text      = isset( $instance['btn_text'] ) ? $instance['btn_text'] : '';
		$btn_link      = isset( $instance['btn_link'] ) ? $instance['btn_link'] : '#';
		$btn_class     = isset( $instance['btn_class'] ) ? $instance['btn_class'] : '';
		$align         = isset( $instance['align'] ) ? $instance['align'] : '';
		$padding       = isset( $instance['padding'] ) ? $instance['padding'] : 0;
		$image         = isset( $instance['image'] ) ? $instance['image'] : '';
		$img_pos_v     = isset( $instance['img_pos_v'] ) ? $instance['img_pos_v'] : 50;
		$img_pos_h     = isset( $instance['img_pos_h'] ) ? $instance['img_pos_h'] : 50;
		$img_size      = isset( $instance['img_size'] ) ? $instance['img_size'] : 100;
		$cover 		   = isset( $instance['cover'] ) ? $instance['cover'] : 1;
		$bg_repeat     = isset( $instance['bg_repeat'] ) ? $instance['bg_repeat'] : '';
		$bg_color      = isset( $instance['bg_color'] ) ? $instance['bg_color'] : '#eeeeee';

		?>
		<h3><?php _e( 'Content options', 'harness-store' ); ?></h3>
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
				<textarea id="<?php echo $this->get_field_id( 'content' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'content' ); ?>" rows="5"><?php echo esc_attr( $content ); ?></textarea>
			</label>
		</p>
		<script>
			(function( $ ) {
			    // Add Color Picker to all inputs that have 'color-field' class
			    $(function() {
			    	$('.wp-color-picker').wpColorPicker();
			    });
			})( jQuery );
		</script>
		<p>
            <label for="<?php echo $this->get_field_id( 'text_color' ); ?>">
				<?php _e( 'Text Color', 'harness-store' ); ?>
			</label>
            <input class="wp-color-picker widefat" type="text" id="<?php echo $this->get_field_id( 'text_color' ); ?>" name="<?php echo $this->get_field_name( 'text_color' ); ?>" value="<?php echo esc_attr( $instance['text_color'] ); ?>" />
        </p>
		<p>
			<label for="<?php echo $this->get_field_id( 'btn_text' ); ?>">
				<?php _e( 'Button text', 'harness-store' ); ?>
				<input id="<?php echo $this->get_field_id( 'btn_text' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'btn_text' ); ?>" type="text" value="<?php echo esc_attr( $btn_text ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'btn_link' ); ?>"><?php _e( 'Button link:', 'harness-store' ); ?>
				<input name="<?php echo $this->get_field_name( 'btn_link' ); ?>" id="<?php echo $this->get_field_id( 'btn_link' ); ?>" class="widefat" type="text" value="<?php echo esc_attr( $btn_link ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'btn_class' ); ?>">
				<?php _e( 'Subtitle', 'harness-store' ); ?>
				<input id="<?php echo $this->get_field_id( 'btn_class' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'btn_class' ); ?>" type="text" value="<?php echo esc_attr( $btn_class ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'align' ); ?>">

				<?php _e( 'Content alignment', 'harness-store' ); ?>

				<select class='widefat' id="<?php echo $this->get_field_id('align'); ?>"
					name="<?php echo $this->get_field_name( 'align' ); ?>" type="text">
					<option
						value='content-center'
						<?php echo ( $align == 'content-center' ) ? 'selected' : ''; ?>>
						<?php _e( 'Content centered, image on background', 'harness-store' ); ?>
					</option>
					<option
						value='content-left'
						<?php echo ( $align == 'content-left' ) ? 'selected' : ''; ?>>
						<?php _e( 'Content on left, image on right', 'harness-store' ); ?>
					</option>
					<option
						value='content-right'
						<?php echo ( $align == 'content-right' ) ? 'selected' : ''; ?>>
						<?php _e( 'Content on right, image on left', 'harness-store' ); ?>
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
		<hr />
		<h3><?php _e( 'Background options', 'harness-store' ); ?></h3>
		<p class="upload-img">
			<div class='image-preview-wrapper'>
				<img id='image-preview' src='<?php echo esc_attr( $image ); ?>' width='100%' height='100' style='max-height: 100px; width: 100px;'>
			</div>
			<label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:', 'harness-store' ); ?></label>
			<input class="image_attachment_id widefat" name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" type="text" size="36"  value="<?php echo esc_attr( $image ); ?>" />
			<input class="upload_image_button" type="button" value="<?php _e( 'Upload image', 'harness-store' ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'img_pos_v' ); ?>">
				<?php _e( 'Image vertical position (%)', 'harness-store' ); ?>
				<input id="<?php echo $this->get_field_id( 'img_pos_v' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'img_pos_v' ); ?>" type="number" min="-50" max="150" value="<?php echo esc_attr( $img_pos_v ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'img_pos_h' ); ?>">
				<?php _e( 'Image horizontal position (%)', 'harness-store' ); ?>
				<input id="<?php echo $this->get_field_id( 'img_pos_h' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'img_pos_h' ); ?>" type="number" min="-50" max="150" value="<?php echo esc_attr( $img_pos_h ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'img_size' ); ?>">
				<?php _e( 'Image size (%)', 'harness-store' ); ?>
				<input id="<?php echo $this->get_field_id( 'img_size' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'img_size' ); ?>" type="number" min="-50" max="150" value="<?php echo esc_attr( $img_size ); ?>" />
			</label>
			<label for="<?php echo $this->get_field_id( 'cover' ); ?>">
				<input id="<?php echo $this->get_field_id( 'cover' ); ?>" name="<?php echo $this->get_field_name( 'cover' ); ?>" type="checkbox" value="1" <?php checked( 1, $cover, true ); ?> /> <?php _e( 'Expand image to cover the entire module area', 'harness-store' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'bg_repeat' ); ?>">

				<?php _e( 'Background image repeat', 'harness-store' ); ?>

				<select class='widefat' id="<?php echo $this->get_field_id('bg_repeat'); ?>"
					name="<?php echo $this->get_field_name( 'bg_repeat' ); ?>" type="text">
					<option
						value='no-repeat'
						<?php echo ( $align =='no-repeat' ) ? 'selected' : ''; ?>>
						<?php _e( 'No repeat', 'harness-store' ); ?>
					</option>
					<option
						value='repeat'
						<?php echo ( $align =='repeat' ) ? 'selected' : ''; ?>>
						<?php _e( 'Vertical and horizontal repeat', 'harness-store' ); ?>
					</option>
					<option
						value='repeat-x'
						<?php echo ( $align =='repeat-x' ) ? 'selected' : ''; ?>>
						<?php _e( 'Horizontal repeat', 'harness-store' ); ?>
					</option>
					<option
						value='repeat-y'
						<?php echo ( $align =='repeat-y' ) ? 'selected' : ''; ?>>
						<?php _e( 'Vertical repeat', 'harness-store' ); ?>
					</option>
				</select>
			</label>
		</p>
		<p>
            <label for="<?php echo $this->get_field_id( 'bg_color' ); ?>">
				<?php _e( 'Background Color', 'harness-store' ); ?>
			</label>
            <input class="wp-color-picker widefat" type="text" id="<?php echo $this->get_field_id( 'bg_color' ); ?>" name="<?php echo $this->get_field_name( 'bg_color' ); ?>" value="<?php echo esc_attr( $instance['bg_color'] ); ?>" />
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
		$instance['text_color']	= ( ! empty( $new_instance['text_color'] ) ) ? esc_attr( $new_instance['text_color'] ) : '';
		$instance['btn_text']	= ( ! empty( $new_instance['btn_text'] ) ) ? sanitize_text_field( $new_instance['btn_text'] ) : '';
		$instance['btn_link']	= ( ! empty( $new_instance['btn_link'] ) ) ? esc_url( $new_instance['btn_link'] ) : '#';
		$instance['btn_class']	= ( ! empty( $new_instance['btn_class'] ) ) ? sanitize_text_field( $new_instance['btn_class'] ) : '';
		$instance['align']  	= ( ! empty( $new_instance['align'] ) ) ? sanitize_text_field( $new_instance['align'] ) : '';
		$instance['padding']	= ( ! empty( $new_instance['padding'] ) ) ? intval( $new_instance['padding'] ) : 0;
		$instance['image']	    = ( ! empty( $new_instance['image'] ) ) ? esc_url( $new_instance['image'] ) : '';
		$instance['img_pos_v']	= ( ! empty( $new_instance['img_pos_v'] ) ) ? intval( $new_instance['img_pos_v'] ) : 0;
		$instance['img_pos_h']	= ( ! empty( $new_instance['img_pos_h'] ) ) ? intval( $new_instance['img_pos_h'] ) : 0;
		$instance['img_size']	= ( ! empty( $new_instance['img_size'] ) ) ? intval( $new_instance['img_size'] ) : 100;
		$instance['cover'] = ( ! empty( $new_instance['cover'] ) ) ? intval( $new_instance['cover'] ) : 0;
		$instance['bg_repeat']  	= ( ! empty( $new_instance['bg_repeat'] ) ) ? sanitize_text_field( $new_instance['bg_repeat'] ) : 'repeat';
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

		echo '<div class="widget-wrapper"';

		if ( isset( $instance['bg_color'] ) ) :
			echo 'style="background-color: ' . $instance['bg_color'] . '; ' ;
		endif;

		echo 'background-position: ' . $instance['img_pos_h'] . '% ' . $instance['img_pos_v'] . '%; ' ;

		if ( isset( $instance['cover'] ) && $instance['cover'] == true ) {
			echo 'background-size: cover; ';
		} else {
			echo 'background-size: ' . $instance['img_size'] . '% ;';
		}

		if ( isset( $instance['bg_repeat'] ) ) {
			echo 'background-repeat: ' . $instance['bg_repeat'] . '; ' ;
		}

		if ( isset( $instance['image'] )) {
			echo 'background-image: url(\'' . esc_url( $instance['image'] ) . '\'); ';
		}

		if ( isset( $instance['padding'] ) ) :
			echo 'padding-top: ' . $instance['padding'] . '%; padding-bottom: ' . $instance['padding'] . '%; ' ;
		endif;

		if ( isset( $instance['text_color'] ) ) :
			echo 'color: ' . $instance['text_color'] . '; ' ;
		endif;

		echo '">';

		echo '<div class="widget-container">';

		echo '<div class="widget-content-wrapper';

		if ( isset( $instance['align'] ) ) {
			echo ' ' . $instance['align'] ;
		}

		echo '">';

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
			echo '<div class="widget-content">' . wpautop( do_shortcode( $instance['content'] ) ) . '</div>';
		endif;

		if ( isset( $instance['btn_text'] ) ) :
			echo '<a href="' . $instance['btn_link'] . '" ';

			if ( isset( $instance['btn_class'] ) ) :
				echo 'class="' . $instance['btn_class'] . '"';
			endif;

			echo ">";

			echo $instance['btn_text'];

			echo '</a>';

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
