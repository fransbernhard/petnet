jQuery(document).ready(function($){

    window.RenderHTML = function() {

        this.renderTag = function(tag, name, value, label) {
            var dataAttrs = 'class="property" data-field="' + name + '" data-value="' + value + '"';
            return '<' + tag + ' ' + dataAttrs + '>' + label + '</' + tag + '>';
        };

        this.renderContainer = function(tag, className, output) {
           return '<' + tag + ' ' + 'class="' + className + '">' + output + '</' + tag + '>';
        };

        this.render = function(tag, output) {
           return '<' + tag + '>' + output + '</' + tag + '>';
        };

    };

});
