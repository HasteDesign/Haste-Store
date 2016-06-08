$(document).ready(function() {
	
    $('.flicker-example').flicker({
        dot_navigation: false
    });    
    $('#header_menu_id').slicknav();    
	$('.header_spacing').css('height', $('#header').outerHeight() + 'px');
    $('.fullplate').css('height', ($(window).height() - $('#header').outerHeight()) + 'px');
        $('.header_menu li').hover(
            function () {
                $('ul:first', this).css('display','block');
     
            }, 
            function () {
                $('ul:first', this).css('display','none');         
            }
        );               			
    $(".scroller").on("click",function(){
        //$(".webplate-content").animate({scrollTop:d},1e3,"easeInOutCubic");
        $("html, body").animate({ scrollTop: $('.fullplate').outerHeight() }, "slow");
        //alert('test');
    });         
});
$(window).load(function() {
	$('.header_spacing').css('height', $('#header').outerHeight() + 'px');
    $('.fullplate').css('height', ($(window).height() - $('#header').outerHeight()) + 'px');
});
$(window).scroll(function() {
    $('.header_spacing').css('height', $('#header').outerHeight() + 'px');
});
$(window).resize(function() {
    $('.header_spacing').css('height', $('#header').outerHeight() + 'px');
});