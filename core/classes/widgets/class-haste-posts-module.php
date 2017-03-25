<?php
/**
* Haste_Posts_Module class.
*
* @package  Haste-Widgets-Modules
* @category Widget
* @author   Anyssa Ferreira
* @version  1.0
*/
class Haste_Posts_Module extends WP_Widget {

	/**
	* Register widget with WordPress.
	*/
	public function __construct() {
		parent::__construct(
			'haste_posts_module',
			__( 'Haste Posts Module', 'haste-widgets-modules' ),
			array( 'description' => __( 'Display blog posts.', 'haste-widgets-modules' ), 'customize_selective_refresh' => true, )
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
		$title         	= isset( $instance['title'] ) ? $instance['title'] : __('My module title', 'haste-widgets-modules');
		$subtitle      	= isset( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$posts_per_page = isset( $instance['posts_per_page'] ) ? $instance['posts_per_page'] : 4;
		$category		= isset( $instance['category'] ) ? $instance['category'] : '';
		$keyword		= isset( $instance['keyword'] ) ? $instance['keyword'] : '';
		$order_by		= isset( $instance['order_by'] ) ? $instance['order_by'] : 'date';
		$order			= isset( $instance['order'] ) ? $instance['order'] : 'DESC';
		$posts_classes	= isset( $instance['posts_classes'] ) ? $instance['posts_classes'] : '';
		$display_thumb	= isset( $instance['display_thumb'] ) ? $instance['display_thumb'] : 1;
		$display_excerpt= isset( $instance['display_excerpt'] ) ? $instance['display_excerpt'] : 0;
		$display_date	= isset( $instance['display_date'] ) ? $instance['display_date'] : 1;


		?>
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
			<label for="<?php echo $this->get_field_id( 'posts_per_page' ); ?>">
				<?php _e( 'Number of posts to display (use -1 to show all posts)', 'haste-widgets-modules' ); ?>
				<input id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="number" min="-1" max="50" value="<?php echo esc_attr( $posts_per_page ); ?>" />
			</label>
		</p>
		<h3><?php _e( 'Post selection criteria', 'haste-widgets-modules' ); ?></h3>
		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>">
				<?php _e( 'From a category (category slug)', 'haste-widgets-modules' ); ?>
				<input id="<?php echo $this->get_field_id( 'category' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'category' ); ?>" type="text" value="<?php echo esc_attr( $category ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'keyword' ); ?>">
				<?php _e( 'From keyword', 'haste-widgets-modules' ); ?>
				<input id="<?php echo $this->get_field_id( 'keyword' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'keyword' ); ?>" type="text" value="<?php echo esc_attr( $keyword ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'order_by' ); ?>">

				<?php _e( 'Order posts by', 'haste-widgets-modules' ); ?>

				<select class='widefat' id="<?php echo $this->get_field_id('order_by'); ?>"
					name="<?php echo $this->get_field_name( 'order_by' ); ?>">
					<option
						value='date'
						<?php echo ( $order_by == 'date' ) ? 'selected' : ''; ?>>
						<?php _e( 'Date', 'haste-widgets-modules' ); ?>
					</option>
					<option
						value='title'
						<?php echo ( $order_by == 'title' ) ? 'selected' : ''; ?>>
						<?php _e( 'Title', 'haste-widgets-modules' ); ?>
					</option>
					<option
						value='rand'
						<?php echo ( $order_by == 'rand' ) ? 'selected' : ''; ?>>
						<?php _e( 'Random', 'haste-widgets-modules' ); ?>
					</option>
				</select>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'order' ); ?>">

				<?php _e( 'Order', 'haste-widgets-modules' ); ?>

				<select class='widefat' id="<?php echo $this->get_field_id('order'); ?>"
					name="<?php echo $this->get_field_name( 'order' ); ?>">
					<option
						value='DESC'
						<?php echo ( $order == 'DESC' ) ? 'selected' : ''; ?>>
						<?php _e( 'Descending', 'haste-widgets-modules' ); ?>
					</option>
					<option
						value='ASC'
						<?php echo ( $order == 'ASC' ) ? 'selected' : ''; ?>>
						<?php _e( 'Ascending', 'haste-widgets-modules' ); ?>
					</option>
				</select>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'posts_classes' ); ?>">
				<?php _e( 'CSS posts classes', 'haste-widgets-modules' ); ?>
				<input id="<?php echo $this->get_field_id( 'posts_classes' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'posts_classes' ); ?>" type="text" value="<?php echo esc_attr( $posts_classes ); ?>" />
			</label>
		</p>
		<h3><?php _e( 'Post display options', 'haste-widgets-modules' ); ?></h3>
		<p>
			<label for="<?php echo $this->get_field_id( 'display_thumb' ); ?>">
				<input id="<?php echo $this->get_field_id( 'display_thumb' ); ?>" name="<?php echo $this->get_field_name( 'display_thumb' ); ?>" type="checkbox" value="1" <?php checked( 1, $display_thumb, true ); ?> /> <?php _e( 'Display post thumbnails', 'haste-widgets-modules' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'display_excerpt' ); ?>">
				<input id="<?php echo $this->get_field_id( 'display_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'display_excerpt' ); ?>" type="checkbox" value="1" <?php checked( 1, $display_excerpt, true ); ?> /> <?php _e( 'Display post excerpts', 'haste-widgets-modules' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'display_date' ); ?>">
				<input id="<?php echo $this->get_field_id( 'display_date' ); ?>" name="<?php echo $this->get_field_name( 'display_date' ); ?>" type="checkbox" value="1" <?php checked( 1, $display_date, true ); ?> /> <?php _e( 'Display post dates', 'haste-widgets-modules' ); ?>
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
		$instance['title']         	= ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle']         	= ( ! empty( $new_instance['subtitle'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		$instance['posts_per_page']	= ( ! empty( $new_instance['posts_per_page'] ) ) ? intval( $new_instance['posts_per_page'] ) : '';
		$instance['category']		= ( ! empty( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';
		$instance['keyword']		= ( ! empty( $new_instance['keyword'] ) ) ? sanitize_text_field( $new_instance['keyword'] ) : '';
		$instance['order_by']		= ( ! empty( $new_instance['order_by'] ) ) ? sanitize_text_field( $new_instance['order_by'] ) : '';
		$instance['order']			= ( ! empty( $new_instance['order'] ) ) ? sanitize_text_field( $new_instance['order'] ) : '';
		$instance['posts_classes']	= ( ! empty( $new_instance['posts_classes'] ) ) ? sanitize_text_field( $new_instance['posts_classes'] ) : '';
		$instance['display_thumb'] = ( ! empty( $new_instance['display_thumb'] ) ) ? intval( $new_instance['display_thumb'] ) : 0;
		$instance['display_excerpt'] = ( ! empty( $new_instance['display_excerpt'] ) ) ? intval( $new_instance['display_excerpt'] ) : 0;
		$instance['display_date'] = ( ! empty( $new_instance['display_date'] ) ) ? intval( $new_instance['display_date'] ) : 0;

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
        $title         	= isset( $instance['title'] ) ? $instance['title'] : __( 'My module title', 'haste-widgets-modules' );
        $subtitle      	= isset( $instance['subtitle'] ) ? $instance['subtitle'] : '';
        $posts_per_page = isset( $instance['posts_per_page'] ) ? $instance['posts_per_page'] : 4;
        $category		= isset( $instance['category'] ) ? $instance['category'] : '';
        $keyword		= isset( $instance['keyword'] ) ? $instance['keyword'] : '';
        $order_by		= isset( $instance['order_by'] ) ? $instance['order_by'] : 'date';
        $order			= isset( $instance['order'] ) ? $instance['order'] : 'DESC';
        $posts_classes	= isset( $instance['posts_classes'] ) ? $instance['posts_classes'] : '';
        $display_thumb	= isset( $instance['display_thumb'] ) ? $instance['display_thumb'] : 1;
        $display_excerpt= isset( $instance['display_excerpt'] ) ? $instance['display_excerpt'] : 0;
        $display_date	= isset( $instance['display_date'] ) ? $instance['display_date'] : 1;

		echo $args['before_widget'];

		echo '<div class="widget-wrapper"><div class="widget-container">';

		echo '<header class="widget-header">';

		$title = apply_filters( 'widget_title', $title );

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if ( ! empty( $subtitle ) ) {
			echo '<p class="subtitle">' . $subtitle . '</p>';
		}

		echo '</header>';


		echo '<div class="widget-posts">';

			// The Query
			$queryargs = array(
				'post_type' 	=> 'post',
				'posts_per_page'=> $posts_per_page,
				'order_by'		=> $order_by,
				'order'			=> $order,
			);


			if ( ! empty( $category ) ) :
				$queryargs['tax_query'] = array(
						array(
							'taxonomy' => 'category',
							'field'    => 'slug',
							'terms'    => array( $category ),
						)
				);
			endif;

			if ( ! empty( $keyword ) ) :
				$queryargs['s'] = $keyword;
			endif;

			$haste_query = new WP_Query( $queryargs );

			// The Loop
			if ( $haste_query->have_posts() ) : while ( $haste_query->have_posts() ) : $haste_query->the_post();

				echo '<div class="widget-post haste-widget-post ' . $posts_classes . '">';

					if ( ! empty( $display_thumb ) && $display_thumb && has_post_thumbnail() ) :

                        echo '<div class="widget-post-thumbail">';
						the_post_thumbnail();
						echo '</div>';

					endif;

					echo '<div class="widget-post-content">';

						the_title('<h3 class="widget-post-title">','</h3>');

						if ( !empty( $display_date ) && $display_date ) :

							echo '<div class="widget-post-date">';
							the_date();
							echo '</div>';

						endif;

						if ( !empty( $display_excerpt ) && $display_excerpt ) :

							echo '<div class="widget-post-excerpt">';
							the_excerpt();
							echo '</div>';

						endif;

					echo '</div>';

				echo '</div>';

			endwhile;

			wp_reset_postdata();

			else :
				 _e( 'Sorry, no posts matched your criteria.', 'haste-widgets-modules' );

			endif;

		echo '</div></div></div>';

		echo $args['after_widget'];

	}
}

/**
* Register the Like Box Widget.
*/
function haste_posts_module() {
	register_widget( 'Haste_Posts_Module' );
}

add_action( 'widgets_init', 'haste_posts_module' );
