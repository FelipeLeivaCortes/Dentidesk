$(function () {
    $('.responsiveTable').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        columnDefs : [
            {
                "targets":  -1,
                "orderable": false,
            },
            {
                "targets":  -2,
                "orderable": false, 
            },
        ]
    });
} );