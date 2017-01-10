jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();



	/**
	// WooCommerce Custom Variations
	// ===========================================================
	*/

	$('.variations').after('<div class="h_custom_variations"></div>');
	//Create custom variations
	$('.variations tr').each(function(index, el) {
		var $select = $(this).find('select');
		var ul = $('<ul></ul>');
		var div_variation = $('<div class="h_custom_variation"></div>');
		var select_id = $select.attr('id');

		ul.attr('id', 'h_' + select_id);
		ul.attr('class', 'h_select_id h_var_set');

		//If the variation is color
		if (select_id.indexOf('color','cor') > -1) {
			ul.addClass('h_color_variation');
		}

		$select.find('option').each(function() {
			var current_value = $(this).attr('value');
			if (current_value !== '') {
				var li = $('<li></li>');
				var a = $('<a href="#"></a>');
				a.attr('data-value', current_value);
				a.text($(this).text());
				//If the variation is color
				if (select_id.indexOf('color') > -1) {
					a.prepend($('<i></i>').css('background-color', current_value).addClass('h_' + current_value));
				}
				li.append(a);
				li.addClass('h_var_item');
				ul.append(li);
				a.addClass('btn btn-default');
			}
		});
		div_variation.append($('<h4></h4>').text($(el).find('.label').text()));
		div_variation.append(ul);
		$('.h_custom_variations').append(div_variation);
	});
	$('body').on('click', '.h_custom_variation ul li a', function(event) {
		event.preventDefault();
		var option_val = $(this).attr('data-value');
		var slect_id = $(this).parents('.h_select_id').attr('id');
		slect_id = slect_id.replace('h_', '');
		$('#'+slect_id + ' option').each(function(index, el) {
			$(el).removeAttr('selected');
		});
		$('#'+slect_id + ' option[value="' + option_val + '"]').prop('selected', true).attr('selected', 'selected');
		//$("#"+slect_id).val(option_val);
		$('#'+slect_id).change();

		$(this).parents('.h_select_id').find('a').removeClass('current active');
		$(this).addClass('current active');
	});
	/*
	//===========================================================
	*/

});
