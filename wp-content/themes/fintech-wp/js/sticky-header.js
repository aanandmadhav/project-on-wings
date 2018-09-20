jQuery(document).ready(function($) {
	"use strict"; 
	
	$('body').addClass('sticky-header');

	// Sticky header
	$(window).scroll(function() {
		var scrolled = $(this).scrollTop(),
		headerOffset = $('#site-header').offset().top;
				
		if(scrolled > headerOffset) {
			$('#header-wrapper').addClass('header-sticky');
			$('#header-wrapper').css({ 'top' : '0px' });
		} else {
			$('#header-wrapper').removeClass('header-sticky');
			$('#header-wrapper').css({ 'top' : '' });
		}
		
	});
	
	
	// Trigger scroll
	setTimeout( function(){ 
		$(window).scroll();
	}, 500 );
	
});