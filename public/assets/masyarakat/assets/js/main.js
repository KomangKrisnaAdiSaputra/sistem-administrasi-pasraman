(function ($) {
    "use strict";
	
	/*----------------------------
    Responsive menu Active
    ------------------------------ */
	$(".mainmenu ul#primary-menu").slicknav({
		allowParentLinks: true,
		prependTo: '.responsive-menu',
	});
	
	/*----------------------------
    START - Main menu responsive
    ------------------------------ */
	$('.responsive-menu-show').on('click', function(){
		$(this).hide();
		$('.responsive-menu-hidden').show();
		$('.mainmenu ul').slideDown('slow', function(){
            $(this).show();
        });
	});
	$('.responsive-menu-hidden').on('click', function(){
		$(this).hide();
		$('.responsive-menu-show').show();
		$('.mainmenu ul').slideUp('slow', function() {
            $(this).hide();
        });
        $(".navbar-form.form-box").hide();
	});
	
	/*----------------------------
    START - Smooth scroll animation
    ------------------------------ */
	$('.theme2.theme4.hero-area .hero-area-content a.krishok-btn').on('click', function () {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
		&& location.hostname == this.hostname) {
		  var $target = $(this.hash);
		  $target = $target.length && $target
		  || $('[name=' + this.hash.slice(1) +']');
		  if ($target.length) {
			var targetOffset = $target.offset().top;
			$('html,body')
			.animate({scrollTop: targetOffset}, 2000);
		   return false;
		  }
		}
	});
    
	/*-------------------------
	START - search bar toggle
	--------------------------*/
	$(".toggle-pade").on('click', function() {
		$(".navbar-form.form-box").toggle( "slow" );
	});
	$(".review-btn").on('click', function() {
		$(".product-details-form").toggle( "slow" );
		return false;
	});
	$(".view-comments").on('click', function() {
		$(".show-comments").toggleClass('show-comment-area');
		return false;
	});
    
	/*----------------------------
    START - Slider activation
    ------------------------------ */
    $('.sell-area').owlCarousel({
		loop: true,
		autoplay: true,
		autoplayTimeout: 4000,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsive:{
			0:{
				items: 1,
				margin: 10
			},
			576: {
				items: 2,
				margin: 10
			},
			992: {
				items: 3,
				margin: 20,
			},
			1200: {
				items: 4,
				margin: 30
			}
		}
	});
    $('.testimonial-slide').owlCarousel({
		loop: true,
		autoplay: true,
		autoplayTimeout: 4000,
		nav: false,
		dots: true,
		responsive: {
			0:{
				items: 1,
				margin: 0
			},
			767:{
				items: 1,
				margin: 20
			},
			768:{
				items: 2,
				margin: 30
			}
		}
	});
    
    /*----------------------------
    START - Isotope Activation
    ------------------------------ */
    jQuery(".product-item").isotope();
    $(".shopping-product-menu li").on("click", function(){
      $(".shopping-product-menu li").removeClass("active");
      $(this).addClass("active");
      var selector = $(this).attr('data-filter');
      $(".product-item").isotope({
        filter: selector
      })
    });
    
	/*-------------------------
	START - login and registration form
	--------------------------*/
	$(".popup-show").on('click', function() {
		$('.login-form').slideDown('slow', function(){
            $(this).show();
        });
        $(".registration-form").hide();
        $(".navbar-form.form-box").hide();
	});
	$(".registration-form-show").on('click', function() {
		$('.registration-form').slideDown('slow', function(){
            $(this).show();
        });
        $(".login-form").hide();
	});
	$(".login-form-show").on('click', function() {
		$('.login-form').slideDown('slow', function(){
            $(this).show();
        });
        $(".registration-form").hide();
	});
	$(".popup-close").on('click', function() {
		$('.registration-form , .login-form').slideUp('slow', function(){
            $(this).hide();
        });
	});
    
	/*----------------------------
    START - Preloader
    ------------------------------ */
	$(window).on('load', function() {
        $('#preloader').fadeOut('slow', function() {
            $(this).remove();
        });
    });
	
	/*--------------------------
	bxslider active
	---------------------------- */
	$('.item-content').bxSlider({
		pagerCustom: '.item-thumbnail',
		mode: 'fade',
		speed: 1000,
		auto: true
	});
	
    /*----------------------------
    START - WOW JS animation
    ------------------------------ */
	new WOW().init();
    
    /*----------------------------
    START - Google Map Active
    ------------------------------ */
	if ($.fn.gmap3) {
		var center = [-8.539086225518924, 115.3112239814067];
	    $('.google-map')
	      .gmap3({
	        center: center,
	        zoom: 13,
	        scrollwheel: false,
	      })
	      .marker({
	        position: center,
	        icon: 'assets/masyarakat/assets/img/map-marker.png'
	      });
	}
    
    /*----------------------------
    START - magnifier JS animation
    ------------------------------ */
	$('.zoom').zoom();
	$.fn.magnifierRentgen = function() {
		return this.each(function() {
			var th        = $(this),
			dataImage     = th.data("image"),
			dataImageZoom = th.data("image-zoom"),
			dataSize      = th.data("size");
			th
			.addClass("magnifierRentgen")
			.on('resize', function() {
				th.find(".data-image, .magnifier-loupe img").css({
					"width" : th.width()
				})
			})
			.append("<img class='data-image' src='" + dataImage + "'><div class='magnifier-loupe'><img src='" + dataImageZoom + "'>")
				.hover(function() {
					th.find(".magnifier-loupe").stop().fadeIn()
				}, function() {
					th.find(".magnifier-loupe").stop().fadeOut()
				})
				.find(".data-image").css({
					"width" : th.width()
				}).parent().find(".magnifier-loupe").css({
						"width"  : dataSize,
						"height" : dataSize
					})
					.find("img").css({
						"position" : "absolute",
						"width"    : th.width()
					});

			th.mousemove(function(e) {
				var elemPos = {},
					offset  = th.offset();
				elemPos = {
					left : e.pageX - offset.left - dataSize/2,
					top  : e.pageY - offset.top - dataSize/2
				}
				th
				.find(".magnifier-loupe").css({
						"top"  : elemPos["top"],
						"left" : elemPos["left"]
					})
					.find("img").css({
						"top"   : -elemPos["top"],
						"left"  : -elemPos["left"],
						"width" : th.width()
					})
			});
			$(window).on('resize', function() {
				$(".magnifierRentgen").resize();
			});
		});
	};
	$(".divwrap").magnifierRentgen();
})(jQuery);