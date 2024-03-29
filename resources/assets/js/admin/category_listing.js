(function(){
    initMenu(urls.listing);

    var categoryUpdatedAt = $('#category-updated-at');

    var table = $('#category-listing').DataTable({
        order: [[1, 'asc']],
        columns: [
            { data: 'select', searchable: false, orderable: false },
            { data: 'full_name', name: 'locales.name'},
            { data: 'for', name: 'type', orderable: false },
            { data: 'products_count', name: 'products_count', searchable: false },
            { data: 'items_count', name: 'items_count', searchable: false },
            { data: 'updated_at', name: 'updated_at', searchable: false },
            { data: 'action', searchable: false, orderable: false}
        ],
        serverSide: true,
        ajax: {
            url : urls.listing,
            type: 'POST',
            data: {
                trashed: function(){ return $('#trashed').val(); },
                updated_at: function(){ return categoryUpdatedAt.val(); }
            }
        }
    });

    var filters = new Vue({
        el: '#filters',
        methods: {
            filterName: function(){ table.column(1).search($('#category-name').val()).draw(); },
            filterFor: function(){ table.column(2).search($('#for').val()).draw(); },
            filterTrashed: function(){ table.draw(); },
            filterUpdatedAt: function(){ table.draw(); },
            clearFilter: function(){
                $('#filters').find('input, #for').val('');
                $('#trashed').val('0');
                table.columns().search('').draw();
            }
        }
    });

    categoryUpdatedAt = $('#category-updated-at');
    categoryUpdatedAt.daterangepicker({
        showDropdowns: true,
        autoUpdateInput: false,
        opens: 'left',
        locale: {
            cancelLabel: 'Clear'
        }
    }).on('apply.daterangepicker', function(e, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
        filters.filterUpdatedAt();
    }).on('cancel.daterangepicker', function() {
        $(this).val('');
        filters.clearFilter();
    });
})();