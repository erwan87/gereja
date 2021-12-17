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

    let table = $("#tablePendeta").DataTable({
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
        ordering: false,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        autoWidth: false,
        // fixedColumns: true,
        fixedHeader: true,
        order: [], //Initial no order.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: "jsonPendeta",
            type: "POST",
        },
        columns: [{
                data: "id_pendeta",
                className: "text-center",
                orderable: false,
            },
            {
                data: "nama_pendeta",
                className: "text-center",
            },
            {
                data: "alamat",
                className: "text-center",
            },
            {
                data: "no_telp",
                className: "text-center",
            },
            {
                data: "email",
                className: "text-center",
            },
            {
                data: "id_pendeta",
                searchable: true,
                sortable: false,
                className: "text-center",
                render: function(id_pendeta, type, full, meta) {
                    return (
                        '<a href="editPendeta/' + id_pendeta + '"> Edit</a> || <a href="deletePendeta/' + id_pendeta + '"> Delete</a>'
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
    table.columns.adjust().draw();
});


// View Datatable Mata Pelajaran
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

    $("#tableMapelPengajar").DataTable({
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
        info: false,
        filter: false,
        scrollX: true,
        paginate: false,
        ordering: false,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        autoWidth: false,
        order: [], //Initial no order.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: "pengajar/jsonMapel",
            type: "POST",
        },
        columns: [{
                data: "id_mengajar",
                className: "text-center",
                orderable: false,
            },
            {
                data: "mapel",
                className: "text-center",
            },
            {
                data: "keterangan",
                className: "text-center",
            },
            {
                data: "nama_lengkap",
                className: "text-center",
            },
            {
                data: "deskripsi",
                className: "text-center",
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