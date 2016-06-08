<?php

class bazaarlite_customize {

	public $theme_fields;

	public function __construct( $fields = array() ) {

		$this->theme_fields = $fields;

		add_action ('customize_register' , array( &$this, 'customize_panel' ) );
		add_action ('customize_controls_enqueue_scripts' , array( &$this, 'customize_scripts' ) );

	}

    public function customize_scripts() {

		wp_enqueue_style ( 
			'wip_panel', 
			get_template_directory_uri() . '/core/admin/assets/css/customize.css', 
			array(), 
			''
		);

		wp_enqueue_script( 
			  'customizer-preview',
			  get_template_directory_uri().'/core/admin/assets/js/customizer-preview.js',
			  array( 'jquery' ),
			  '1.0.0', 
			  true
		);

		$bazaarlite_details = array(
			'label' => __( 'Upgrade to Bazaar Premium', 'bazaar-lite' ),
			'url' => esc_url('https://www.themeinprogress.com/bazaar-free-ecommerce-wordpress-theme/?aff=panel')
		);
	
		wp_localize_script( 'customizer-preview', 'bazaarlite_details', $bazaarlite_details );
	  
   }
	
   public function customize_panel ( $wp_customize ) {

		global $wp_version;

		$theme_panel = $this->theme_fields ;

		foreach ( $theme_panel as $element ) {
			
			switch ( $element['type'] ) {
					
				case 'panel' :
				
					$wp_customize->add_panel( $element['id'], array(
					
						'title' => $element['title'],
						'priority' => $element['priority'],
						'description' => $element['description'],
						'capability'     => 'edit_theme_options',
					
					) );
			 
				break;
				
				case 'section' :
						
					$wp_customize->add_section( $element['id'], array(
					
						'title' => $element['title'],
						'panel' => $element['panel'],
						'priority' => $element['priority'],
						'capability'     => 'edit_theme_options',
					
					) );
					
				break;

				case 'text' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'sanitize_text_field',
						'default' => $element['std'],
						'capability'     => 'edit_theme_options',

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'upload' :
							
					$wp_customize->add_setting( $element['id'], array(

						'default' => $element['std'],
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'esc_url_raw'

					) );

					$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $element['id'], array(
					
						'label' => $element['label'],
						'mime_type' => 'image',
						'description' => $element['description'],
						'section' => $element['section'],
						'settings' => $element['id'],
					
					)));

				break;

				case 'url' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'esc_url_raw',
						'default' => $element['std'],
						'capability'     => 'edit_theme_options',

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'button' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => array( &$this, 'customize_button_sanize' ),
						'default' => $element['std'],
						'capability'     => 'edit_theme_options',

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => 'url',
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'textarea' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'esc_textarea',
						'default' => $element['std'],
						'capability'     => 'edit_theme_options',

					) );
											 
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'custom_css' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'default' => $element['std'],
						'sanitize_callback'    => 'wp_filter_nohtml_kses',
						'sanitize_js_callback' => 'wp_filter_nohtml_kses',
						'capability'     => 'edit_theme_options',

					) );
											 
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => 'textarea',
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'select' :
							
					$wp_customize->add_setting( $element['id'], array(

						'sanitize_callback' => array( &$this, 'customize_select_sanize' ),
						'default' => $element['std'],
						'capability'     => 'edit_theme_options',

					) );
											 

					$wp_customize->add_control( $element['id'] , array(
						
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
						'choices'  => $element['options'],
									
					) );
							
				break;

				case 'bazaarlite-customize-info' :

					$wp_customize->add_section( $element['id'], array(
					
						'title' => $element['title'],
						'priority' => $element['priority'],
						'capability' => 'edit_theme_options',

					) );

					$wp_customize->add_setting(  $element['id'], array(
						'sanitize_callback' => 'esc_url_raw'
					) );
					 
					$wp_customize->add_control( new BazaarLite_Customize_Info_Control( $wp_customize,  $element['id'] , array(
						'section' => $element['section'],
					) ) );		
										
				break;

			}
			
		}

		if ( $wp_version >= 4.5 ) :
		
			$wp_customize->remove_section( 'header_section');
		
		endif;

		if ( !bazaarlite_is_woocommerce_active() ) :
		
			$wp_customize->remove_control( 'wip_woocommerce_header_cart');
			$wp_customize->remove_control( 'wip_woocommerce_category_layout');
			
		endif;
		
   }

	public function customize_select_sanize ( $value, $setting ) {
		
		$theme_panel = $this->theme_fields ;

		foreach ( $theme_panel as $element ) {
			
			if ( $element['id'] == $setting->id ) :

				if ( array_key_exists($value, $element['options'] ) ) : 
						
					return $value;

				endif;

			endif;
			
		}
		
	}

	public function customize_button_sanize ( $value, $setting ) {
		
		$sanize = array (
		
			'wip_footer_email_button' => 'mailto:',
			'wip_footer_skype_button' => 'skype:',
			'wip_footer_whatsapp_button' => 'tel:',
		
		);

		if ( !strstr ( $value, $sanize[$setting->id]) ) :

			return $sanize[$setting->id] . $value;

		else:

			return esc_url_raw($value, array('skype', 'tel', 'mailto'));

		endif;

	}

}

if ( class_exists( 'WP_Customize_Control' ) ) {

	class BazaarLite_Customize_Info_Control extends WP_Customize_Control {

		public $type = "bazaarlite-customize-info";

		public function render_content() { ?>

			<h2><?php _e('Get support','bazaar-lite');?></h2> 
            
            <div class="inside">
    
                <p><?php _e("If you've opened a new support ticket from <strong>WordPress.org</strong>, please send a reminder to <strong>support@wpinprogress.com</strong>, to get a faster reply.","bazaar-lite");?></p>

                <ul>
                
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/support/theme/'.get_stylesheet() ); ?>" title="<?php _e('Open a new ticket','bazaar-lite');?>" target="_blank"><?php _e('Open a new ticket','bazaar-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'mailto:support@wpinprogress.com' ); ?>" title="<?php _e('Send a reminder','bazaar-lite');?>" target="_blank"><?php _e('Send a reminder','bazaar-lite');?></a></li>
                
                </ul>
    

                <p><?php _e("If you like this theme and support, <strong>I'd appreciate</strong> any of the following:","bazaar-lite");?></p>

                <ul>
                
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/'.get_stylesheet().'#postform' ); ?>" title="<?php _e('Rate this Theme','bazaar-lite');?>" target="_blank"><?php _e('Rate this Theme','bazaar-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'https://www.facebook.com/WpInProgress' ); ?>" title="<?php _e('Like on Facebook','bazaar-lite');?>" target="_blank"><?php _e('Like on Facebook','bazaar-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'http://eepurl.com/SknoL' ); ?>" title="<?php _e('Subscribe our newsletter','bazaar-lite');?>" target="_blank"><?php _e('Subscribe our newsletter','bazaar-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/themes/author/alexvtn/' ); ?>" title="<?php _e('Download our free WordPress themes','bazaar-lite');?>" target="_blank"><?php _e('Download our free WordPress themes','bazaar-lite');?></a></li>
                
                </ul>
    
            </div>
    
		<?php

		}
	
	}

}

?>