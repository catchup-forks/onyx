(function(){
    initMenu(urls.listing);

    $('#category-updated-at').daterangepicker({
        showDropdowns: true,
        opens: 'left',
        locale: {
            format: 'YYYY-MM-DD'
        }
    });

    $('#category-listing').DataTable({
        order: [[1, 'asc']],
        columns: [
            { data: 'select', searchable: false, orderable: false },
            { data: 'full_name', name: 'locales.name'},
            { data: 'for', name: 'type', orderable: false },
            { data: 'products_count', name: 'products_count' },
            { data: 'items_count', name: 'items_count' },
            { data: 'updated_at', name: 'updated_at', searchable: false },
            { data: 'action', searchable: false, orderable: false}
        ],
        serverSide: true,
        ajax: {
            url : urls.listing,
            type: 'POST'
        }
    });
})();