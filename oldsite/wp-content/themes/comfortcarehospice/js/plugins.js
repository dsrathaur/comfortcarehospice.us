$(document).ready(function(){

	$("nav ul li a:has('br')").addClass('lineheight');

	// Global Variables
	var toggle_primary_button    = $('.nav-toggle-button'),  
		toggle_primary_icon    	 = $('.nav-toggle-button i'),  
		toggle_secondary_button  = $('nav li span'),  
		toggle_secondary_icon    = $('nav li span i'),  
		primary_menu        	 = $('nav'),   
		secondary_menu   		 = $('nav ul ul'),
		window_width			 = $(window).width();  
 
	//Multi-line Tab
	toggle_secondary_button.each(function(){
		$(this).click(function(){
			$(this).parent("li").children("ul").toggle();
			$(this).children().toggleClass("fa-caret-up").toggleClass("fa-caret-down");;
		});
	});
		
	// Basic functionality for nav-toggle-button
	$(toggle_primary_button).click(function(){
		primary_menu.slideToggle();		
		toggle_primary_icon.toggleClass("fa-times").toggleClass("fa-navicon");
	});
	
	// Add class to tab having drop down
	$( "nav li:has(ul)").find('span i').addClass("fa-caret-down");		
	
	// Reset all configs when width > 760
	$(window).resize(function(){  
		
		if(window_width > 960) { 
			primary_menu.removeAttr('style');  
			toggle_primary_icon.removeClass("fa-times").addClass("fa-navicon");
			
			secondary_menu.removeAttr('style'); 
			toggle_secondary_icon.removeClass("fa-caret-up").addClass("fa-caret-down");			
		}
	});	
   
    $('.rslides').responsiveSlides({ 
	  speed: 500,            // Integer: Speed of the transition, in milliseconds
	  timeout: 5000,          // Integer: Time between slide transitions, in milliseconds
	});
	
    $('.toggle-con .toggle-question').click(function(){
		$(this).siblings('.toggle-det').toggle('slow');
		$(this).toggleClass('be');
	});

});

	

