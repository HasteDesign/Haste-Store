<?php
/**
 * Haste_Content_Image_Module class.
 *
 * Facebook like widget.
 *
 * @package  Haste-Widgets-Modules
 * @category Widget
 * @author   Anyssa Ferreira
 * @version  1.0
 */
class Haste_Content_Image_Module extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'haste_content_image_module',
			__( 'Haste Content and Image Module', 'haste-widgets-modules' ),
			array( 'description' => __( 'Displays title, content (shotcodes included), a button and image as background, with few options.', 'haste-widgets-modules' ), 'customize_selective_refresh' => true, )
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
		$title         = isset( $instance['title'] ) ? $instance['title'] : __('My module title', 'haste-widgets-modules');
		$subtitle      = isset( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$content       = isset( $instance['content'] ) ? $instance['content'] : '';
		$text_color    = isset( $instance['text_color'] ) ? $instance['text_color'] : '';
		$btn_text      = isset( $instance['btn_text'] ) ? $instance['btn_text'] : '';
		$btn_link      = isset( $instance['btn_link'] ) ? $instance['btn_link'] : '#';
		$btn_class     = isset( $instance['btn_class'] ) ? $instance['btn_class'] : '';
		$align         = isset( $instance['align'] ) ? $instance['align'] : 'content-center';
		$padding       = isset( $instance['padding'] ) ? $instance['padding'] : 5;
		$image         = isset( $instance['image'] ) ? $instance['image'] : '';
		$img_pos_v     = isset( $instance['img_pos_v'] ) ? $instance['img_pos_v'] : 50;
		$img_pos_h     = isset( $instance['img_pos_h'] ) ? $instance['img_pos_h'] : 50;
		$img_size      = isset( $instance['img_size'] ) ? $instance['img_size'] : 100;
		$cover 		   = isset( $instance['cover'] ) ? $instance['cover'] : 0;
		$bg_fix 	   = isset( $instance['bg_fix'] ) ? $instance['bg_fix'] : 0;
		$bg_repeat     = isset( $instance['bg_repeat'] ) ? $instance['bg_repeat'] : '';
		$bg_color      = isset( $instance['bg_color'] ) ? $instance['bg_color'] : '#eeeeee';

		?>
		<h3><?php _e( 'Content options', 'haste-widgets-modules' ); ?></h3>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title:', 'haste-widgets-modules' ); ?>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>">
				<?php _e( 'Subtitle', 'haste-widgets-modules' ); ?>
				<input id="<?php echo $this->get_field_id( 'subtitle' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'content' ); ?>">
				<?php _e( 'Content', 'haste-widgets-modules' ); ?>
				<textarea id="<?php echo $this->get_field_id( 'content' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'content' ); ?>" rows="5"><?php echo esc_attr( $content ); ?></textarea>
			</label>
		</p>
		<p>
            <label for="<?php echo $this->get_field_id( 'text_color' ); ?>">
				<?php _e( 'Text Color', 'haste-widgets-modules' ); ?>
			</label>
            <input class="wp-color-picker widefat" type="text" id="<?php echo $this->get_field_id( 'text_color' ); ?>" name="<?php echo $this->get_field_name( 'text_color' ); ?>" value="<?php echo esc_attr( $text_color ); ?>" />
        </p>
		<p>
			<label for="<?php echo $this->get_field_id( 'btn_text' ); ?>">
				<?php _e( 'Button text', 'haste-widgets-modules' ); ?>
				<input id="<?php echo $this->get_field_id( 'btn_text' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'btn_text' ); ?>" type="text" value="<?php echo esc_attr( $btn_text ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'btn_link' ); ?>"><?php _e( 'Button link:', 'haste-widgets-modules' ); ?>
				<input name="<?php echo $this->get_field_name( 'btn_link' ); ?>" id="<?php echo $this->get_field_id( 'btn_link' ); ?>" class="widefat" type="text" value="<?php echo esc_attr( $btn_link ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'btn_class' ); ?>">
				<?php _e( 'Button CSS classes', 'haste-widgets-modules' ); ?>
				<input id="<?php echo $this->get_field_id( 'btn_class' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'btn_class' ); ?>" type="text" value="<?php echo esc_attr( $btn_class ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'align' ); ?>">

				<?php _e( 'Content alignment', 'haste-widgets-modules' ); ?>

				<select class='widefat' id="<?php echo $this->get_field_id('align'); ?>"
					name="<?php echo $this->get_field_name( 'align' ); ?>" type="text">
					<option
						value='content-center'
						<?php echo ( $align == 'content-center' ) ? 'selected' : ''; ?>>
						<?php _e( 'Content centered', 'haste-widgets-modules' ); ?>
					</option>
					<option
						value='content-left'
						<?php echo ( $align == 'content-left' ) ? 'selected' : ''; ?>>
						<?php _e( 'Content on left', 'haste-widgets-modules' ); ?>
					</option>
					<option
						value='content-right'
						<?php echo ( $align == 'content-right' ) ? 'selected' : ''; ?>>
						<?php _e( 'Content on right', 'haste-widgets-modules' ); ?>
					</option>
				</select>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'padding' ); ?>">
				<?php _e( 'Area padding (%)', 'haste-widgets-modules' ); ?>
				<input id="<?php echo $this->get_field_id( 'padding' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'padding' ); ?>" type="number" min="0" max="100" value="<?php echo esc_attr( $padding ); ?>" />
			</label>
		</p>
		<hr />
		<h3><?php _e( 'Background options', 'haste-widgets-modules' ); ?></h3>
		<p class="upload-img">
			<div class='image-preview-wrapper'>
				<img class='image-preview' src='<?php echo esc_attr( $image ); ?>' width='100%' height='100' style='max-height: 100px; width: 100px;'>
			</div>
			<label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:', 'haste-widgets-modules' ); ?></label>
			<input class="image_attachment_id widefat" name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" type="text" size="36"  value="<?php echo esc_attr( $image ); ?>" />
			<input class="upload_image_button" type="button" value="<?php _e( 'Set image ', 'haste-widgets-modules' ); ?>" />
			<input class="clear_image_button" type="button" value="<?php _e( 'Remove', 'haste-widgets-modules' ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'img_pos_v' ); ?>">
				<?php _e( 'Image vertical position (%)', 'haste-widgets-modules' ); ?>
				<input id="<?php echo $this->get_field_id( 'img_pos_v' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'img_pos_v' ); ?>" type="number" min="-50" max="150" value="<?php echo esc_attr( $img_pos_v ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'img_pos_h' ); ?>">
				<?php _e( 'Image horizontal position (%)', 'haste-widgets-modules' ); ?>
				<input id="<?php echo $this->get_field_id( 'img_pos_h' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'img_pos_h' ); ?>" type="number" min="-50" max="150" value="<?php echo esc_attr( $img_pos_h ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'img_size' ); ?>">
				<?php _e( 'Image size (%)', 'haste-widgets-modules' ); ?>
				<input id="<?php echo $this->get_field_id( 'img_size' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'img_size' ); ?>" type="number" min="-50" max="150" value="<?php echo esc_attr( $img_size ); ?>" />
			</label>
			<label for="<?php echo $this->get_field_id( 'cover' ); ?>">
				<input id="<?php echo $this->get_field_id( 'cover' ); ?>" name="<?php echo $this->get_field_name( 'cover' ); ?>" type="checkbox" value="1" <?php checked( 1, $cover, true ); ?> /> <?php _e( 'Expand image to cover the entire module area', 'haste-widgets-modules' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'bg_fix' ); ?>">
				<input id="<?php echo $this->get_field_id( 'bg_fix' ); ?>" name="<?php echo $this->get_field_name( 'bg_fix' ); ?>" type="checkbox" value="1" <?php checked( 1, $cover, true ); ?> /> <?php _e( 'Fix the background image', 'haste-widgets-modules' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'bg_repeat' ); ?>">

				<?php _e( 'Background image repeat', 'haste-widgets-modules' ); ?>

				<select class='widefat' id="<?php echo $this->get_field_id('bg_repeat'); ?>"
					name="<?php echo $this->get_field_name( 'bg_repeat' ); ?>" type="text">
					<option
						value='no-repeat'
						<?php echo ( $align =='no-repeat' ) ? 'selected' : ''; ?>>
						<?php _e( 'No repeat', 'haste-widgets-modules' ); ?>
					</option>
					<option
						value='repeat'
						<?php echo ( $align =='repeat' ) ? 'selected' : ''; ?>>
						<?php _e( 'Vertical and horizontal repeat', 'haste-widgets-modules' ); ?>
					</option>
					<option
						value='repeat-x'
						<?php echo ( $align =='repeat-x' ) ? 'selected' : ''; ?>>
						<?php _e( 'Horizontal repeat', 'haste-widgets-modules' ); ?>
					</option>
					<option
						value='repeat-y'
						<?php echo ( $align =='repeat-y' ) ? 'selected' : ''; ?>>
						<?php _e( 'Vertical repeat', 'haste-widgets-modules' ); ?>
					</option>
				</select>
			</label>
		</p>
		<p>
            <label for="<?php echo $this->get_field_id( 'bg_color' ); ?>">
				<?php _e( 'Background Color', 'haste-widgets-modules' ); ?>
			</label>
            <input class="wp-color-picker widefat" type="text" id="<?php echo $this->get_field_id( 'bg_color' ); ?>" name="<?php echo $this->get_field_name( 'bg_color' ); ?>" value="<?php echo esc_attr( $bg_color ); ?>" />
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
		$instance['align']  	= ( ! empty( $new_instance['align'] ) ) ? sanitize_text_field( $new_instance['align'] ) : 'content-center';
		$instance['padding']	= ( ! empty( $new_instance['padding'] ) ) ? intval( $new_instance['padding'] ) : 5;
		$instance['image']	    = ( ! empty( $new_instance['image'] ) ) ? esc_url( $new_instance['image'] ) : '';
		$instance['img_pos_v']	= ( ! empty( $new_instance['img_pos_v'] ) ) ? intval( $new_instance['img_pos_v'] ) : 0;
		$instance['img_pos_h']	= ( ! empty( $new_instance['img_pos_h'] ) ) ? intval( $new_instance['img_pos_h'] ) : 0;
		$instance['img_size']	= ( ! empty( $new_instance['img_size'] ) ) ? intval( $new_instance['img_size'] ) : 100;
		$instance['cover'] 		= ( ! empty( $new_instance['cover'] ) ) ? intval( $new_instance['cover'] ) : 0;
		$instance['bg_fix'] 	= ( ! empty( $new_instance['bg_fix'] ) ) ? intval( $new_instance['bg_fix'] ) : 0;
		$instance['bg_repeat']  = ( ! empty( $new_instance['bg_repeat'] ) ) ? sanitize_text_field( $new_instance['bg_repeat'] ) : 'repeat';
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
		$title         = isset( $instance['title'] ) ? $instance['title'] : __( 'My module title', 'haste-widgets-modules' );
		$subtitle      = isset( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$content       = isset( $instance['content'] ) ? $instance['content'] : '';
		$text_color    = isset( $instance['text_color'] ) ? $instance['text_color'] : '';
		$btn_text      = isset( $instance['btn_text'] ) ? $instance['btn_text'] : '';
		$btn_link      = isset( $instance['btn_link'] ) ? $instance['btn_link'] : '#';
		$btn_class     = isset( $instance['btn_class'] ) ? $instance['btn_class'] : '';
		$align         = isset( $instance['align'] ) ? $instance['align'] : 'content-center';
		$padding       = isset( $instance['padding'] ) ? $instance['padding'] : 5;
		$image         = isset( $instance['image'] ) ? $instance['image'] : '';
		$img_pos_v     = isset( $instance['img_pos_v'] ) ? $instance['img_pos_v'] : 50;
		$img_pos_h     = isset( $instance['img_pos_h'] ) ? $instance['img_pos_h'] : 50;
		$img_size      = isset( $instance['img_size'] ) ? $instance['img_size'] : 100;
		$cover 		   = isset( $instance['cover'] ) ? $instance['cover'] : 0;
		$bg_fix 	   = isset( $instance['bg_fix'] ) ? $instance['bg_fix'] : 0;
		$bg_repeat     = isset( $instance['bg_repeat'] ) ? $instance['bg_repeat'] : '';
		$bg_color      = isset( $instance['bg_color'] ) ? $instance['bg_color'] : '#eeeeee';

		echo $args['before_widget'];

		echo '<div class="widget-wrapper"';

		echo 'style="background-color: ' . $bg_color . '; ' ;

		echo 'background-position: ' . $img_pos_h . '% ' . $img_pos_v . '%; ' ;

		if ( ! empty( $cover ) && $cover == true ) {
			echo 'background-size: cover; ';
		} else {
			echo 'background-size: ' . $img_size . '% ;';
		}

		if ( ! empty( $bg_fix ) && $bg_fix == true ) {
			echo 'background-attachment: fixed; ';
		}

		if ( ! empty( $bg_repeat ) ) {
			echo 'background-repeat: ' . $bg_repeat . '; ' ;
		}

		if ( ! empty( $image ) ) {
			echo 'background-image: url(\'' . esc_url( $image ) . '\'); ';
		}

		echo 'padding-top: ' . $padding . '%; padding-bottom: ' . $padding . '%; ' ;

		if ( ! empty( $text_color ) ) :
			echo 'color: ' . $text_color . '; ' ;
		endif;

		echo '">';

		echo '<div class="widget-container">';

		echo '<div class="widget-content-wrapper';

		if ( ! empty( $align ) ) {
			echo ' ' . $align;
		}

		echo '">';

		echo '<header class="widget-header">';

		$title = apply_filters( 'widget_title', $title );

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		if ( ! empty( $subtitle ) ) :
			echo '<p class="subtitle">' . $subtitle . '</p>';
		endif;

		echo '</header>';

		if ( ! empty( $content ) ) :
			echo '<div class="widget-content">' . do_shortcode( $content ) . '</div>';
		endif;

		if ( ! empty( $btn_text ) ) :
			echo '<a href="' . $btn_link . '" ';

			if ( ! empty( $btn_class ) ) :
				echo 'class="' . $btn_class . '"';
			endif;

			echo ">";

			if( ! empty( $btn_text ) ) :
				echo $btn_text;
			endif;

			echo '</a>';

		endif;

		echo '</div></div></div>';

		echo $args['after_widget'];
	}
}

/**
 * Register the Like Box Widget.
 */
function haste_content_image_module() {
	register_widget( 'Haste_Content_Image_Module' );
}

add_action( 'widgets_init', 'haste_content_image_module' );
