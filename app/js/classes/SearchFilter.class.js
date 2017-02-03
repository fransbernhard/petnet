jQuery(document).ready(function($){

    window.SearchFilter = function(data) {

        this.data = data;

        var searchFilter = {};

        this.getAnimals = function(data) {

            return data;
        };


        this.sendAttrsToObjectOnClick = function() {
            var self = this;

            $('.search-filter').on('click', 'li.property', function(e){
                if (e.target !== this) return;

                $(this).toggleClass('chosen');

                var filterName = $(this).attr('data-field');
                var filterValue = $(this).attr('data-value');
                
                if ( filterValue === 'no' ) {
                    $(this).attr('data-value', 'yes');
                } else if ( filterValue === 'yes' ) {
                    $(this).attr('data-value', 'no');
                }

                filterValue = $(this).attr('data-value');

                if (filterValue === 'cat' || filterValue === 'dog') {
                    $('.filter').each(function(index, el) {

                        if (filterValue === 'cat') {
                            $(this).toggleClass('cat-active');
                        } else if (filterValue === 'dog') {
                            $(this).toggleClass('dog-active');
                        }

                    });
                }

                if($(this).parents('.dropdown').length){
                    filterValue = [];
                    $(this).parent().find('li').each(function(){
                        if($(this).hasClass('chosen')){
                            filterValue.push($(this).attr('data-value'));
                        }
                    });
                }
    
                searchFilter[filterName] = filterValue;
                if(filterValue == "no" || (filterValue.constructor === Array && filterValue.length === 0)){ 
                    // delete "falsey"/empty search keys
                    delete searchFilter[filterName];
                }
                self.compareFilterAndAnimalProps();
            

            });

        };

        this.compareFilterAndAnimalProps = function() {

            console.log("searchFilter",searchFilter);

            var filteredAnimals = data.filter(function(animal){

                var matches = true;

                // loop search criterias
                for(var i in searchFilter){

                    // choose the correct tag
                    var tag = animal.tags.filter(function(tag){
                        return tag.name == i;
                    });
                    tag = tag[0] || {value:[]};

                    var tagValues = tag.value.constructor === Array ? tag.value : [tag.value];
                    var searchValues = searchFilter[i].constructor === Array ? searchFilter[i] : [searchFilter[i]];

                    var found = false;
                    searchValues.forEach(function(searchValue){
                        found = found || tagValues.indexOf(searchValue) >= 0;
                    });

                    matches = matches && found;

                }

                return matches;
            });

            this.showAndHideAnimals(filteredAnimals);

        };

        this.showAndHideAnimals = function(filteredAnimals){
            $('.animal').hide();
            filteredAnimals.forEach(function(animal){
                $('.animal-id-' + animal.id).show();
            });
        };

    };

});

