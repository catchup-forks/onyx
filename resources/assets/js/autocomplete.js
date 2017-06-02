(function(Vue, $){
    var input;
    window.autocomplete = function(inputElement, outputElement, searchUrl, selectionElement){
        var output = new Vue({
            el: outputElement,
            data: { results: {} }
        });

        input = new Vue({
            el: inputElement,
            data: { query: '' },
            methods: {
                processSearch: function(){
                    $.ajax({
                        url: searchUrl,
                        type: 'POST',
                        data: { query: this.query },
                        success: function(response){
                            output.results = response.results;
                        },
                        error: function(xhr){
                            console.log(xhr.responseText);
                        }
                    });
                }
            }
        });

        $('body').on('click', outputElement+' li.dropdown-item', function(){
            if(selectionElement !== undefined){
                $(selectionElement).val($(this).attr('data-id'));
            }
            $(inputElement).val($(this).text());
            output.results = {};
        });
    };

    window.setInputValue = function(value){
        input.query = value;
    };
})(Vue, jQuery);
