let pageURL = window.location.href;
let lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);

// View Datatable Detail Keluarga
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

    $("#tableDetKeluarga").DataTable({
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
        paginate: true,
        ordering: false,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        autoWidth: false,
        order: [], //Initial no order.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: "../jsonDetKeluarga/"+lastURLSegment,
            type: "POST",
        },
        columns: [{
                data: "id_keluarga_detail",
                className: "text-center",
                orderable: false,
            },
            {
                data: "nama",
                className: "text-center",
            },
            {
                data: "jk",
                className: "text-center",
            },
            {
                data: "tgl_lahir",
                className: "text-center",
                render: function(data, type, full) {
                    return moment(data).format("DD MMMM YYYY");
                },
            },
            {
                data: "no_telp",
                className: "text-center",
            },
            {
                data: "pendidikan",
                className: "text-center",
            },
            {
                data: "status",
                className: "text-center",
            },
            {
                data: "id_keluarga_detail",
                searchable: true,
                sortable: false,
                className: "text-center",
                render: function(id_keluarga_detail, type, full, meta) {
                    return (
                        '<a href="../editDetKeluarga/' + id_keluarga_detail + '"> Edit</a> || <a href="../deleteDetKeluarga/' + id_keluarga_detail + '"> Delete</a>'
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