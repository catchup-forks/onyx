(function($){
    window.imageInput = function(container, defaultImage, oldImage){
        var fileReader = new FileReader();

        $('body').on('click', container+' .btn-sm.btn-success', function(){
            $(this).closest(container).find('input[type="file"]').trigger('click');
        }).on('click', container+' .btn-sm.btn-danger', function(){
            var containerInstance = $(this).closest(container);
            containerInstance.find('input[type="file"]').val('');
            containerInstance.find('img').attr('src', defaultImage);
            containerInstance.find('[name^="update_image"]').val(1);
        }).on('click', container+' .btn-sm.btn-warning', function(){
            var containerInstance = $(this).closest(container);
            containerInstance.find('input[type="file"]').val('');
            containerInstance.find('img').attr('src', oldImage);
            containerInstance.find('[name^="update_image"]').val(0);
        }).on('change', container+' input[type="file"]', function(){
            var files = $(this)[0].files;
            var containerInstance = $(this).closest(container);
            if(files.length > 0)
                fileReader.readAsDataURL(files[0]);
            else
                containerInstance.find('img').attr('src', defaultImage);
            containerInstance.find('[name^="update_image"]').val(1);
        });

        fileReader.onload = function(){
            $(container).find('img').attr('src', fileReader.result);
        }
    };
})(jQuery);