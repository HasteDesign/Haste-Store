jQuery(document).ready(function($) {
    /**
     * Color Picker
     */

    /**
     * Initialize color picker on field with selector .wp-color-picker
     * @param  {object} widget [description]
     */
    function initColorPicker( widget ) {
        widget.find( '.wp-color-picker' ).wpColorPicker( {
                change: _.throttle( function() { // For Customizer
                        $(this).trigger( 'change' );
                }, 3000 )
        });
    }

    /**
     * Calls the initColorPicker function when new widget is added
     * @param  {object} event
     * @param  {object} widget
     */
    function onFormUpdate( event, widget ) {
        initColorPicker( widget );
    }

    /**
     * Clear the image field and image preview
     * @param  {object} event
     * @param  {object} widget
     */
    function clearImageField( event ) {
        // Use 'this' to hold wich widget was clicked
        $widget_button = $( this );

        $( $widget_button ).siblings( '.image-preview-wrapper' ).find( '.image-preview' ).attr( 'src', '' );
        $( $widget_button ).siblings( '.image_attachment_id' ).val( '' );
    }


    // Events
    $( document ).on( 'widget-added widget-updated', onFormUpdate );
    $( document ).on( 'click', '.clear_image_button', clearImageField );

    $( document ).ready( function() {
        $( '#widgets-right .widget:has(.wp-color-picker)' ).each( function () {
                initColorPicker( $( this ) );
        } );
    } );

    /**
     * Media Upload
     */

    // Uploading files
    var file_frame;
    var wp_media_post_id = wp.media.model.settings.post.url; // Store the old id
    var set_to_post_id; // Set this

    $( document ).on( 'click', '.upload_image_button', function( event ) {
        // Use 'this' to hold wich widget was clicked
        $widget_button = $( this );

        event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( file_frame ) {
			// Set the post ID to what we want
			file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
			// Open frame
			file_frame.open();
			return;
		} else {
			// Set the wp.media post id so the uploader grabs the ID we want when initialised
			wp.media.model.settings.post.id = set_to_post_id;
		}

		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
			title: 'Select a image to upload',
			button: {
				text: 'Use this image',
			},
			multiple: false	// Set to true to allow multiple files to be selected
		});

		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {
			// We set multiple to false so only get one image from the uploader
			attachment = file_frame.state().get('selection').first().toJSON();

			// Do something with attachment.id and/or attachment.url here
			// Access widget fields trough $widget_button, using siblings()
			$( $widget_button ).siblings( '.image-preview-wrapper' ).find( '.image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
			$( $widget_button ).siblings( '.image_attachment_id' ).val( attachment.url );

            $( $widget_button ).siblings( '.image_attachment_id' ).trigger( 'change' );

		});

		// Finally, open the modal
		file_frame.open();
	});
});
