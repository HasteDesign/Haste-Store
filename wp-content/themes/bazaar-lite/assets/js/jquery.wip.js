jQuery.noConflict()(function($){

/* ===============================================
   Slick slideshow
   ============================================= */

	var autoplay_option = false;
	var dots_option = false;
	
	if ( wip_vars.slick_autoplay === "true" ) {
		autoplay_option = true;
	}
	
	if ( wip_vars.slick_dots === "true" ) {
		dots_option = true;
	}
	
	$('.slick-wrapper').slick({
		adaptiveHeight: true,
		fade: true,
		arrows:false,
		autoplay:  autoplay_option,
		dots:  dots_option,
	});

/* ===============================================
   iOs devices
   ============================================= */

	function is_ios() {
	
		return (
	
			(navigator.platform.indexOf("iPhone") !== -1) ||
			(navigator.platform.indexOf("iPad") !== -1) ||
			(navigator.platform.indexOf("iPod") !== -1)
	
		);
	
	}
	
	if (is_ios() ) {
		
		$('.slick-image').addClass('ios_device');

	}

/* ===============================================
   Woocommerce Header Cart
   ============================================= */

	$('section.header-cart').hover(
		
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeIn(100);
		}, 
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeOut(400);		
		}
			
	);

/* ===============================================
   Header
   =============================================== */

	function wip_header() {
	
		var body_width = $(window).width();
		var header_h = $('#header-wrapper .row').innerHeight();
		var menu_h = $('#nav#mainmenu ul li a').innerHeight();

		if ( body_width >= 992 ){
		
			$('#header-wrapper, #header').css({'height':header_h});
			$('#logo a').css({'height':menu_h + 'px' });
			
		} else {
			$('#header-wrapper, #header').css({'height':'auto'});
		}
		
	}
	
	$( document ).ready(wip_header);
	$( window ).resize(wip_header);

/* ===============================================
   Footer
   =============================================== */

	function wip_footer() {
	
		var footer_h = $('#footer').innerHeight();
		$('#wrapper').css({'padding-bottom':footer_h + 5});
	
	}
	
	$( document ).ready(wip_footer);
	$( window ).resize(wip_footer);

/* ===============================================
   MAIN MENU
   =============================================== */

	if ( $('nav#mainmenu ul:first .current-menu-item').length ) { 
	
		$('nav#mainmenu ul:first').tinyNav({
			active: 'current-menu-item',
		});

	} else {
	
		$('nav#mainmenu ul:first').tinyNav({
			header: 'Select an item',
		});

	}

	$('nav#mainmenu li').hover(
		
		function () {
			$(this).children('ul').stop(true, true).fadeIn(100);
		}, 
		function () {
			$(this).children('ul').stop(true, true).fadeOut(400);		
		}
			
	);

/* ===============================================
   Scroll to Top Plugin
   =============================================== */

	$(window).scroll(function() {
		
		if( $(window).scrollTop() > 400 ) {
			
			$('#back-to-top').fadeIn(500);
			
			} else {
			
			$('#back-to-top').fadeOut(500);
		}
		
	});

	$('#back-to-top').click(function(){
		$.scrollTo(0,'slow');
		return false;
	});

/* ===============================================
   Overlay code
   =============================================== */

	$('.overlay-image.shortcode-thumb').hover(function(){
		
		var imgwidth = $(this).children('img').width();
		var imgheight = $(this).children('img').height();
		$(this).children('.zoom').css({'width':imgwidth,'height':imgheight});	
		$(this).children('.link').css({'width':imgwidth,'height':imgheight});		
		$(this).css({'width':imgwidth+10});		
		
		$('.overlay',this).animate({ opacity : 0.6 },{queue:false});
		}, 
		function() {
		$('.overlay',this).animate({ opacity: 0.0 },{queue:false});
	
	});

	$('.blog-grid div.pin-article').hover(function() {
			
		var imgw = $('.overlay',this).prev().width(); 
		var imgh = $('.overlay',this).prev().height();

		$('.overlay',this).css({'width':imgw,'height':imgh});	
		$('.overlay',this).animate({ opacity : 1.0 },{queue:false});
	
		$('img',this).addClass('hoverimage');
		
	}, function() {
			
		$('.overlay',this).animate({ opacity: 0.0 },{queue:false});

		$('img',this).removeClass('hoverimage');

	});

	$('.gallery img').hover(function(){
		$(this).animate({ opacity: 0.50 },{queue:false});
	}, 
	function() {
		$(this).animate({ opacity: 1.00 },{queue:false});
	});
	
/* ===============================================
   Prettyphoto code
   =============================================== */

	$("a[rel^='prettyPhoto']").prettyPhoto({
	
		animationSpeed:'fast',
		slideshow:5000,
		theme:'pp_default',
		show_title:false,
		overlay_gallery: false,
		social_tools: false
		
	});
	
	$('.swipebox').swipebox();

	
/* ===============================================
   Comments
   =============================================== */

	$("body.minimal-layout .comments-container a.comment-reply-link").click(function() {

		$('#respond').css({'margin-top':'0px', 'margin-bottom':'-30px'});
		$('#respond').parents('.children').next('.post-article').css({'padding-top':'40px'});
		
	});

});          