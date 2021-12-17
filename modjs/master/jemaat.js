// View Datatable Jemaat
$(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
        return {
            iStart: oSettings._iDisplayStart,
            iEnd: oSettings.fnDisplayEnd(),
            iLength: oSettings._iDisplayLength,
            iTotal: oSettings.fnRecordsTotal(),
            iFilteredTotal: oSettings.fnRecordsDisplay(),
            iPage: Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            iTotalPages: Math.ceil(
                oSettings.fnRecordsDisplay() / oSettings._iDisplayLength
            ),
        };
    };

    $("#tableJemaat").DataTable({
        initComplete: function() {
            var api = this.api();
            $("#datatables input")
                .off(".DT")
                .on("keyup.DT", function(e) {
                    if (e.keyCode == 13) {
                        api.search(this.value).draw();
                    }
                });
        },
        oLanguage: {
            sProcessing: "loading...",
        },
        dom: 'Bfrtip',
        buttons: [
            'print'
        ],
        scrollCollapse: true,
        fixedColumns: true,
        fixedHeader: true,
        responsive: true,
        info: true,
        filter: true,
        scrollX: true,
        paginate: true,
        ordering: true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        autoWidth: false,
        order: [], //Initial no order.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: "jsonJemaat",
            type: "POST",
        },
        columns: [{
                data: "id_jemaat",
                className: "text-center",
                orderable: false,
                searchable: false,
            },
            {
                data: "nama_jemaat",
                className: "text-center",
                searchable: false,
            },
            {
                data: "alamat",
                className: "text-center",
                orderable: false,
                searchable: false,
            },
            {
                data: "tempat_lahir",
                className: "text-center",
                orderable: false,
                searchable: false,
            },
            {
                data: "tgl_lahir",
                className: "text-center",
                orderable: false,
                searchable: false,
                render: function(data, type, full) {
                    return moment(data).format("DD MMMM YYYY");
                },
            },
            {
                data: "no_telp",
                className: "text-center",
                orderable: false,
                searchable: false,
            },
            {
                data: "jenis_kelamin",
                className: "text-center",
                orderable: false,
                searchable: false,
            },
            {
                data: "email",
                className: "text-center",
                orderable: false,
                searchable: false,
            },
            {
                data: "nama_lingkungan",
                className: "text-center",
            },
            {
                data: "id_jemaat",
                searchable: true,
                sortable: false,
                searchable: false,
                className: "text-center",
                render: function(id_jemaat, type, full, meta) {
                    return (
                        '<a href="editJemaat/' + id_jemaat + '"> Edit</a> || <a href="deleteJemaat/' + id_jemaat + '"> Delete</a>'
                    );
                },
            },
        ],

        order: [
            [0, "asc"]
        ],
        rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $("td:eq(0)", row).html(index);
        },
    });
});