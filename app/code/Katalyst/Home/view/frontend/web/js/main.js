require(['jquery', 'jquery/ui', 'owlcarousel'],function($){
    $(window).load(function() {
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			items: 1,
			loop: true,
			margin: 0,
			autoplay: true,
			autoplayTimeout: 4000,
			autoplayHoverPause: false
		});
    });
});
