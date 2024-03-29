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
                    var autocompleteClear = $(inputElement).next().next();
                    if(this.query != ''){
                        autocompleteClear.css('display', '');
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
                    } else
                        autocompleteClear.trigger('click');
                }
            }
        });

        $('body').on('click', outputElement+' li.dropdown-item', function(){
            if(selectionElement !== undefined){
                $(selectionElement).val($(this).attr('data-id'));
            }
            $(inputElement).val($(this).text());
            output.results = {};
        }).on('click', '.autocomplete-clear', function(){
            $(this).css('display', 'none').prev().val('').prev().val('');
        });
    };

    window.setInputValue = function(value){
        input.query = value;
    };
})(Vue, jQuery);
