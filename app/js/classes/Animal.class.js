jQuery(document).ready(function($){

    window.Animal = function(data) {
        var output = '';
        this.data = data;

        this.init = function() {

            var self = this;

            data.forEach(function(animal) {
                self.getProperties(animal);
            });

            return output;
        };

        this.getProperties = function(animal) {

            var render = new RenderHTML();

            output += '<article class="animal animal-id-'+animal.id+'">';
            if(animal.img && animal.img[0]) {
                output += '<div class="featured-image" style="background-image: url( '+ animal.img[0] +' )"></div>';
            }
            output += '<header class="animal-info">';
            output += '<a href="/?page_id='+ animal.id +'"><h2>'+ animal.title +'</h2></a>';
            output += '<h4 class="seller-info">' + animal.user + ' ' + animal.date + '</h4>';
            if (animal.description) {
                output += render.renderContainer('p', 'animal-excerpt', this.getExcerpt(animal));
            }
            if (animal.tags) {
                output += render.renderContainer('ul', 'animal-tags', this.getTags(animal));
            }
            output += '</header>';
            output += '<div class="city-price">';
            output += '<h5 class="city"><span>' + animal.city.address + '</span></h5>';
            output += '<h5 class="price"><span>' + animal.price + ' :-</span></h5>';
            output += '</div>';
            output += '</article>';

        };

        this.getExcerpt = function(animal) {
            var str = animal.description;
            if(str.length > 100) str = str.substring(0,100) + '...';

            return str;
        };

        this.getTags = function(animal) {
            var render = new RenderHTML();
            var animalTags = '';
            for (var prop in animal.tags) {

                var tag = animal.tags[prop];
                var label = tag.value === 'yes' ? tag.name : tag.value;

                if (Array.isArray(tag.value)) {
                    tag.value.forEach(function(value){
                        animalTags += render.renderTag('li', tag.name, value, value);
                    });
                } else if (tag.value !== 'no') {
                    animalTags += render.renderTag('li', tag.name, tag.value, label);
                } 
            }
            return animalTags;
        };

    };

});
