jQuery(document).ready(function($){


	function animalFilter() {

		//searchVal = searchVal || "";

		$.ajax({
			type: "GET",
			url: '/wp-content/themes/petnet/inc/json_getAnimals.php',
			dataType: 'json',
			contentType: 'application/json; charset=utf-8',
			// data: {
			// 	s: searchVal
			// },
			//beforeSend:
			success: function(data){
				var searchFilter = new SearchFilter(data);
	            searchFilter.sendAttrsToObjectOnClick();

	            searchFilter.getAnimals(data);

      			var animal = new Animal(data);
			    $('.animal-listing').html(animal.init());

			},
			error: function() {
				console.log('Something went wrong');
			}
		});
	}
	animalFilter();
	//var searchTimeout;
	// $('.search-field').keyup(function(){
	// 	var val = $(this).val();
	// 	clearTimeout(searchTimeout);
	// 	searchTimeout = setTimeout(function(){
	// 		animalFilter(val);
	// 	},300);
	// });


});
