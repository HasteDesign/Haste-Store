( function( $ ) {

	$('.preview-notice').append('<a class="getpremium" target="_blank" href="' + bazaarlite_details.url + '">' + bazaarlite_details.label + '</a>'); 
	$('.preview-notice').on("click",function(a){a.stopPropagation()});

} )( jQuery );   