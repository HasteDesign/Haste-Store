
//Menu dropdown animation
jQuery(function($) {
	$('.sub-menu').hide();
	$('.main-navigation .children').hide();
	$('.menu-item').hover( 
		function() {
			$(this).children('.sub-menu').slideDown();
		}, 
		function() {
			$(this).children('.sub-menu').hide();
		}
	);
	$('.main-navigation li').hover( 
		function() {
			$(this).children('.main-navigation .children').slideDown();
		}, 
		function() {
			$(this).children('.main-navigation .children').hide();
		}
	);	
});

//Open social links in a new tab
jQuery(function($) {
     $( '.social-navigation li a' ).attr( 'target','_blank' );
});

//Fit Vids
jQuery(function($) {
    $("body").fitVids();  
});

//Hide header area
jQuery(function($) {
	$(".header-slider ul:empty").parents('.hero-section').hide();
});

//Preloader
jQuery(function($) {
	$('.preloader').css('opacity', 0);
        setTimeout(function() {
            $('.preloader').hide();}, 600
	);   
});

//Mobile menu
jQuery(function($) {
	$('.main-navigation .menu').slicknav({
		label: '<i class="fa fa-bars"></i>',
		prependTo: '.mobile-nav',
		closedSymbol: '&#43;',
		openedSymbol: '&#45;',
		allowParentLinks: true
	});
	$('.info-close').click(function(){
		$(this).parent().fadeOut();
		return false;
	});
});	

//Mobile menu
jQuery(function($) {
	$('.secondary-navigation .menu').slicknav({
		label: '<i class="fa fa-bars"></i>',
		prependTo: '.s-mobile-nav',
		closedSymbol: '&#43;',
		openedSymbol: '&#45;',
		allowParentLinks: true
	});
	$('.info-close').click(function(){
		$(this).parent().fadeOut();
		return false;
	});
});	

//Sliders
jQuery(function($) {
	$(".header-slider ul").owlCarousel({
	    items : 1,
	    singleItem : true,
	    slideSpeed : 300,
	    paginationSpeed : 800,
	    rewindSpeed : 1000,
	    autoPlay : true,
	    navigation : true,
	    navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],	 
	    pagination : false,
	    paginationNumbers: false,	   
	    autoHeight : true,
	 });
});

jQuery(function($) {
	$(".products-loop .products").owlCarousel({
	    items : 3,
	    itemsCustom : false,
	    itemsDesktop : [1199,3],
	    itemsDesktopSmall : [991,3],
	    itemsTablet: [768,2],
	    itemsTabletSmall: false,
	    itemsMobile : [479,1],	 
	    slideSpeed : 300,
	    paginationSpeed : 800,
	    rewindSpeed : 1000,	 
	    autoPlay : true,	 
	    navigation : false,
	    navigationText : ["prev","next"],	 
	    pagination : true,
	    paginationNumbers: false,	   
	    autoHeight : false,
	 });
});