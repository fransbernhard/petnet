(function($){ $(function(){

    /*$.getJSON("wp-content/themes/petnet/inc/animals_listing.php", function(data){
        console.log(data);
        console.log(this);
    });*/

    alert('hello');


    $.ajax({  
        url: ajax_object.ajax_url,  
        method: 'POST',  
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        data: {
            action: 'animals_listing',
            's': $('.search-field').val()
        }, 
        beforeSend: function() {

        },
        success:function(data)  { 
           console.log(data);
        },
        complete: function(data) {
        },
        error: function() {
           console.log('error');
        }
    }); 

    $('.search-filter .filter').each(function(index, el) {
        //console.log($(this).children('property').val());
    });

    $('.search-filter .property').each(function(index, el) {
        //console.log($(this).attr('data-value'));
    });


}); })(jQuery);
