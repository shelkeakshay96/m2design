require(['jquery', 'jquery/ui', 'bannerslider'],function($){
    $(window).load(function() {
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			items: 1,
			loop: true,
			margin: 0,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: false
		});
    });
});
