(function(){
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
            {},
            {},
            {},
            {},
            {},
            { data: 'action', searchable: false, orderable: false}
        ]
    });
})();