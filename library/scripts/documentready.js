jQuery(document).ready(function($){

	$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
	$(function() {
		$('.home-nav .menu-item').each(function() {
			$(this).hover(
				function() {
						$(this).find('.illustration').stop().animate({ opacity: 1, left:"+=50" }, 300);
					    $(this).find('.tool-tip').stop().animate({ opacity: 1}, 450);
				},
			   function() {
                   var positionillu = $.data(this, 'position-illu');
                   var positiontool = $.data(this, 'position-tool-tip');
				   $(this).find('.illustration').stop().animate({ opacity: 0, left: "-=15" }, 300);
                   $(this).find('.tool-tip').stop().animate({ opacity: 0 }, 450);
						  
                        });
			         });
                });

});
