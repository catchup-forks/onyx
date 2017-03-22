(function(){
    $('body').on('draw.dt', function(){
        $('.dataTables_length').css('padding-left', '20px').find('select').add('.dataTables_filter input')
            .addClass('form-control').css({
                display: 'inline-block',
                width: 'initial'
            });
        $('.dataTables_info').css('padding-left', '20px');
        $('.dataTables_filter, .dataTables_paginate').css('padding-right', '20px');
        $('.paginate_button').addClass('btn btn-outline-primary');
    });
})();
