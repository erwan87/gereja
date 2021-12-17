// View Datatable Kelas
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

    let table = $("#tablePemasukan").DataTable({
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
        scrollCollapse: true,
        fixedColumns: true,
        fixedHeader: true,
        responsive: true,
        scrollX: true,
        info: false,
        filter: false,
        paginate: true,
        ordering: true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        autoWidth: false,
        fixedColumns: true,
        fixedHeader: true,
        order: [], //Initial no order.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: "jsonPemasukan",
            type: "POST",
        },
        columns: [{
                data: "id_pemasukan",
                className: "text-center",
                orderable: false,
            },
            {
                data: "nama_main_akun",
                className: "text-center",
                orderable: false,
            },
            {
                data: "nama_akun",
                className: "text-center",
                orderable: false,
            },
            {
                data: "nama_sub_akun",
                className: "text-center",
                orderable: false,
            },
            {
                data: "tanggal",
                className: "text-center",
                render: function(data, type, full) {
                    return moment(data).format("DD MMMM YYYY");
                },
            },
            {
                data: "nominal",
                className: "text-left",
                orderable: false,
                render: $.fn.dataTable.render.number(".", ".", 0, "Rp. "),
            },
            {
                data: "id_pemasukan",
                searchable: true,
                sortable: false,
                className: "text-center",
                render: function(id_pemasukan, type, full, meta) {
                    return (
                        '<a href="editPemasukan/' + id_pemasukan + '"> Edit</a> || <a href="deletePemasukan/' + id_pemasukan + '"> Delete</a>'
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