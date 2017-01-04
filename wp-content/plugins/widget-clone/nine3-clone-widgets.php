<?php
/**
 * Plugin Name: Widget Clone
 * Version: 1.1
 * Plugin URI: http://93digital.co.uk/
 * Description: Easily duplicate or clone a widget with all of its settings in just one click.
 * Author: 93digital
 * Author URI: https://93digital.co.uk/
 * Text Domain: widget-clone
 * Domain Path: /languages/
 * License: GPL v3
 */

/**
 * Widget Clone
 * Copyright (C) 2015, 93digital - support@93digital.co.uk
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * @package Nine3 Clone Widgets
 */
class Nine3_Clone_Widgets {
	function __construct() {
		add_filter( 'admin_head', array( $this, 'clone_script'  )  );
	}

	function clone_script() {
		global $pagenow;

		if( $pagenow != 'widgets.php' )
			return;
?>
<script>
(function($) {
	if(!window.Nine3) window.Nine3 = {};

	Nine3.CloneWidgets = {
		init: function() {
			$('body').on('click', '.widget-control-actions .clone-me', Nine3.CloneWidgets.Clone);
			Nine3.CloneWidgets.Bind();
		},

		Bind: function() {
			$('#widgets-right').off('DOMSubtreeModified', Nine3.CloneWidgets.Bind);
			$('.widget-control-actions:not(.nine3-cloneable)').each(function() {
				var $widget = $(this);

				var $clone = $( '<a>' );
				var clone = $clone.get()[0];
				$clone.addClass( 'clone-me nine3-clone-action' )
							.attr( 'title', 'Clone this Widget' )
							.attr( 'href', '#' )
							.html( 'Clone' );


				$widget.addClass('nine3-cloneable');
				$clone.insertAfter( $widget.find( '.alignleft .widget-control-remove') );

				//Separator |
				clone.insertAdjacentHTML( 'beforebegin', ' | ' );
			});

			$('#widgets-right').on('DOMSubtreeModified', Nine3.CloneWidgets.Bind);
		},

		Clone: function(ev) {
			var $original = $(this).parents('.widget');
			var $widget = $original.clone();

			// Find this widget's ID base. Find its number, duplicate.
			var idbase = $widget.find('input[name="id_base"]').val();
			var number = $widget.find('input[name="widget_number"]').val();
			var mnumber = $widget.find('input[name="multi_number"]').val();
			var highest = 0;

			$('input.widget-id[value|="' + idbase + '"]').each(function() {
				var match = this.value.match(/-(\d+)$/);
				if(match && parseInt(match[1]) > highest)
					highest = parseInt(match[1]);
			});

			var newnum = highest + 1;

			$widget.find('.widget-content').find('input,select,textarea').each(function() {
				if($(this).attr('name'))
					$(this).attr('name', $(this).attr('name').replace(number, newnum));
			});

			// assign a unique id to this widget:
			var highest = 0;
			$('.widget').each(function() {
				var match = this.id.match(/^widget-(\d+)/);

				if(match && parseInt(match[1]) > highest)
					highest = parseInt(match[1]);
			});
			var newid = highest + 1;

			// Figure out the value of add_new from the source widget:
			var add = $('#widget-list .id_base[value="' + idbase + '"]').siblings('.add_new').val();
			$widget[0].id = 'widget-' + newid + '_' + idbase + '-' + newnum;
			$widget.find('input.widget-id').val(idbase+'-'+newnum);
			$widget.find('input.widget_number').val(newnum);
			$widget.hide();
			$original.after($widget);
			$widget.fadeIn();

			// Not exactly sure what multi_number is used for.
			$widget.find('.multi_number').val(newnum);

			wpWidgets.save($widget, 0, 0, 1);

			ev.stopPropagation();
			ev.preventDefault();
		}
	}

	$(Nine3.CloneWidgets.init);
})(jQuery);

</script>
<?php
	}
}

new Nine3_Clone_Widgets();
