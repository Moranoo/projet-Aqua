// Script pour traduire en français le dataTable du CRUD des membres

var table = $('#example').DataTable(
    {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        }
    });