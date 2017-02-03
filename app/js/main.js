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

		$('.filter-icon').on('click', function() {
				$('.search-filter').toggleClass('mobile-open');
		});

		$('.menu-item-has-children').on('hover', function(){
				$(this.children).show();
		}).mouseleave(function() {
				$('ul.sub-menu').hide();
		});

		$('.filter-toggle').on('click', function() {
				$('.filter-main').toggleClass('mobile-open');
		});

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

		$(document).on('mousemove', '.range-slider', function(){
				var rangeSlider = function(){
		  			var slider = $('.range-slider'),
	      		range = $('.range-slider__range'),
	      		value = $('.range-slider__value');

		  			slider.each(function(){

				    		value.each(function(){
					      		var value = $(this).prev().attr('value');
					      		$('label').html($('#price').val());
				    		});

				    		range.on('input', function(){
					      		$(this).next(value).html(this.value);
					    	});
		  			});
				};
				rangeSlider();
		});

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
