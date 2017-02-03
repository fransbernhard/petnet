jQuery(document).ready(function($){

	// move ugly style tag - added in body by the um plugin
	$('body style').prependTo('head');
	// show the body after this prevent flickering with wrong styling
	// (requires the body to be previously hidden by css)
	$('body').show();


	//open the mobile panel

 	$('.menu-toggle').on('click', function() {
		$('.main-navigation').toggleClass('mobile-open');
	});


	$('.menu-item-has-children').on('hover', function(){
		$(this.children).show();
	}).mouseleave(function() {
		$('ul.sub-menu').hide();
	});

	// Parallax Effect
	// Cache the Window object
	var $window = $(window);

	// Parallax Backgrounds

	/*$('div[data-type="background"]').each(function(){
		var $bgobj = $(this); // assigning the object

		$(window).scroll(function() {

			// Scroll the background at var speed
			// the yPos is a negative value because we're scrolling it UP!
			var yPos = -($window.scrollTop() / $bgobj.data('speed'));

			// Put together our final background position
			var coords = '50% '+ yPos + 'px';

			// Move the background
			$bgobj.css({ backgroundPosition: coords });

		}); // end window scroll
	});*/

	// FAQs Toggle
 	$('.question').click(function(){
	    $(this).next('p').slideToggle('500');
	    $(this).toggleClass('open');
	});

// Search-filter Toggle

	$('.filter.dropdown h3').click(function(){
	    $(this).next('.dropdown ul').slideToggle('500');
	    $(this).toggleClass('open');
	});

 //  $('.filter.toggle li').click(function(){
 //     $(this).toggleClass('open');
	// });



	// Scroll to Top
	var ROOT = $('html, body');

    $('.scroll-to-top').click(function() {
	    ROOT.animate({
	        scrollTop: $( $.attr(this, 'href') ).offset().top
	    }, 600);
	    return false;
	});

	// Add 'for' attribute to acf input fields

	$value = $('.acf-form input');
	$value.each(function(item) {
		//console.log(this);
		$(this).parent('label').attr('for', $(this).attr('id'));
		//console.log($(this).parent('label'));

		$('input:checkbox').change(function(){
		    if($(this).is(":checked")) {
		    	$(this).parent('label').addClass('selected');
		    } else {
		        $(this).parent('label').removeClass('selected');
		    }
		});
	});






});
