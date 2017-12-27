$(document).ready(function() {
	$(window).on('load', function () {
			var $preloader = $('#page-preloader'),
				$spinner   = $preloader.find('.spinner');
			$spinner.fadeOut();
			$preloader.delay(5).fadeOut('slow');
		});
	
var options = {
		offset: 200
	}
var header = new Headhesive('.site-header', options);

var
	speed = 500,
	$scrollTop = $('<a href="#" class="scrollTop hidden-xs"><i class="fa fa-angle-up" aria-hidden="true"></i></a>').appendTo('body');

	$scrollTop.click(function(e){
		e.preventDefault();

		$( 'html:not(:animated),body:not(:animated)' ).animate({ scrollTop: 0}, speed );
	});
	
	function show_scrollTop(){
		( $(window).scrollTop() > 500 ) ? $scrollTop.stop().fadeIn(500) : $scrollTop.stop().fadeOut(500);
	}
	$(window).scroll( function(){ show_scrollTop(); } );
	show_scrollTop();

	var owl = $(".owl-carousel").owlCarousel({
		items: 1,
		loop:true,
		nav:true,
		navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
		smartSpeed: 700,
		pagination: true,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		addClassActive: true,
		singleItem: true,
		mouseDrag: false,
	}).data('owlCarousel');

	$('.owl-item').click(function(){
		owl.next();
	})

	setInterval(function(){
		owl.next();
	}, 6000);


});

(function($) {
    $.fn.countTo = function(options) {
        // merge the default plugin settings with the custom options
        options = $.extend({}, $.fn.countTo.defaults, options || {});

        // how many times to update the value, and how much to increment the value on each update
        var loops = Math.ceil(options.speed / options.refreshInterval),
            increment = (options.to - options.from) / loops;

        return $(this).each(function() {
            var _this = this,
                loopCount = 0,
                value = options.from,
                interval = setInterval(updateTimer, options.refreshInterval);

            function updateTimer() {
                value += increment;
                loopCount++;
                $(_this).html(value.toFixed(options.decimals));

                if (typeof(options.onUpdate) == 'function') {
                    options.onUpdate.call(_this, value);
                }

                if (loopCount >= loops) {
                    clearInterval(interval);
                    value = options.to;

                    if (typeof(options.onComplete) == 'function') {
                        options.onComplete.call(_this, value);
                    }
                }
            }
        });
    };

})(jQuery);