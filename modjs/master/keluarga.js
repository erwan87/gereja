// View Datatable Keluarga
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

    $("#tableKeluarga").DataTable({
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
            url: "jsonKeluarga",
            type: "POST",
        },
        columns: [{
                data: "id_keluarga",
                className: "text-center",
                orderable: false,
            },
            {
                data: "nama",
                className: "text-center",
                orderable: false,
            },
            {
                data: "alamat",
                className: "text-center",
                orderable: false,
            },
            {
                data: "no_telp",
                className: "text-center",
                orderable: false,
            },
            {
                data: "nama_lingkungan",
                className: "text-center",
            },
            {
                data: "nama_wilayah",
                className: "text-center",
                orderable: false,
            },
            {
                data: "id_keluarga",
                searchable: true,
                sortable: false,
                className: "text-center",
                render: function(id_keluarga, type, full, meta) {
                    return (
                        '<a href="editKeluarga/' + id_keluarga + '"> Edit</a> || <a href="deleteKeluarga/' + id_keluarga + '"> Delete</a> || <a href="detKeluarga/' + id_keluarga + '">Detail KK</a>'
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