/*
Author       : Abubakar Siddique
Template Name: Medison - Medical, Dental Clinic HTML Template.
Version      : 1.0
*/
(function($)
{
	"use strict";
	
	// Preloader
	$(window).on('load', function() {
		preloader();
	})
	
	// JQuery for page scrolling feature - requires JQuery Easing plugin
	$(document).on('ready', function () {
		$('a.page-scroll').on('click', function(event) {
			$('.nav li').removeClass('active');
			$(this).parent().addClass('active');
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top-69
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
		 
		$('body').scrollspy({ 
			target: '#navbar',
			offset: 70
		}) 
		$(".navbar-nav li a").on('click', function(event) {
			$("#navbar").trigger("offcanvas.toggle");
		});
		
		// Custom select box
		$('.select-option').chosen({disable_search_threshold:10});
		
		// Datepicker
		$( ".date-pic" ).datepicker({
			todayBtn: "linked",
			keyboardNavigation: false,
			forceParse: false,
			calendarWeeks: true,
			autoclose: true,
			format: 'mm/dd/yyyy'
		});
		
		// Timepicker
        $(".timepicker").timepicker({
        	showInputs: false
        });
		 
		// Animation section
		 if($('.wow').length){
			var wow = new WOW(
			  {
				boxClass:     'wow',      // animated element css class (default is wow)
				animateClass: 'animated', // animation css class (default is animated)
				offset:       0,          // distance to the element when triggering the animation (default is 0)
				mobile:       true,       // trigger animations on mobile devices (default is true)
				live:         true       // act on asynchronously loaded content (default is true)
			  }
			);
			wow.init();
		}
		
		// Portfolio 
		$('.portfolio_items').mixItUp();
		$('a.fancybox').fancybox();
		
		// Youtube Video
		$('.player').mb_YTPlayer();
		
		// CounterUp 
		$('.counter').counterUp({
			delay: 10,
			time: 2000
		});
		
		// Back to top 
		$(".back-top").hide();
		
		$('.back-top a').on('click', function(event) {
			$('body,html').animate({scrollTop:0},800);
			return false;
		});
	});
	
	$(window).on('scroll', function() {
	// Progressbar
	
		$(".single-progressbar").each(function() {
			var base = $(this);
			var windowHeight = $(window).height();
			var itemPos = base.offset().top;
			var scrollpos = $(window).scrollTop() + windowHeight - 100;
			if (itemPos <= scrollpos) {
				var auptcoun = base.find(".progress-bar").attr("aria-valuenow");
				base.find(".progress-bar").css({
					"width": auptcoun + "%"
				});
				var str = base.find(".skill-per").text();
				var res = str.replace("%", "");
				if (res == 0) {
					$({
						countNumber: 0
					}).animate({
						countNumber: auptcoun
					}, {
						duration: 1500,
						easing: 'linear',
						step: function() {
							base.find(".skill-per").text(Math.ceil(this.countNumber) + "%");
						}
					});
				}
			}
		});	
	
	// Back to top 
		if($(this).scrollTop()>150){
			$('.back-top').fadeIn();
		}
		else{
			$('.back-top').fadeOut();
		}
		
		
	});
	
	// Preload
	function preloader(){
		$(".preloaderimg").fadeOut();
		$(".preloader").delay(200).fadeOut("slow").delay(200, function(){
			$(this).remove();
		});
	}
	
	// Slider Caption Animation
	
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	
	// Variables on page load 
	var $myCarousel = $('#banner'),
		$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
		
	// Initialize carousel 
	$myCarousel.carousel();
	
	// Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);
	
	// Pause carousel  
	$myCarousel.carousel('pause');
	
	
	// Other slides to be animated on carousel slide event 
	$myCarousel.on('slide.bs.carousel', function (e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
	});  
	
})(jQuery);	
	
