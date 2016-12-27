<?php
 
if( !class_exists( 'bazaarlite_admin_notice' ) ) {

	class bazaarlite_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( !get_user_meta( get_current_user_id(), 'bazaarlite_notice_userid_' . get_current_user_id() , TRUE ) ) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

			add_action( 'switch_theme', array( $this, 'update_dismiss' ) );

		}

		/**
		 * Update notice.
		 */

		public function update_dismiss() {
			delete_metadata( 'user', null, 'bazaarlite_notice_userid_' . get_current_user_id(), null, true );
		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {
		
			if ( isset( $_GET['bazaarlite-dismiss'] ) ) {
		
				update_user_meta( get_current_user_id(), 'bazaarlite_notice_userid_' . get_current_user_id() , $_GET['bazaarlite-dismiss'] );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
		?>
			
            <div class="update-nag notice bazaarlite-notice">
            
            	<div class="bazaarlite-noticedescription">
					<strong><?php _e( 'Upgrade to the premium version of Bazaar, to enable an extensive option panel, 600+ Google Fonts, unlimited sidebars, portfolio and much more.', 'bazaar-lite' ); ?></strong><br/>
					<?php printf( '<a href="%1$s" class="dismiss-notice">'. __( 'Dismiss this notice', 'bazaar-lite' ) .'</a>', esc_url( '?bazaarlite-dismiss=1' ) ); ?>
                </div>
                
                <a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/bazaar-free-ecommerce-wordpress-theme/?ref=2&campaign=bazaar-notice' ); ?>" class="button"><?php _e( 'Upgrade to Bazaar Premium', 'bazaar-lite' ); ?></a>
                <div class="clear"></div>

            </div>
		
		<?php
		
		}

	}

}

new bazaarlite_admin_notice();

?>