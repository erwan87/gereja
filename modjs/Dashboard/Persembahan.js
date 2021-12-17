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

    let table = $("#tablePersembahan").DataTable({
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
        paginate: false,
        ordering: false,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        autoWidth: false,
        // fixedColumns: true,
        fixedHeader: true,
        order: [], //Initial no order.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: "jsonPersembahan",
            type: "POST",
        },
        columns: [{
                data: "id_persembahan",
                className: "text-center",
                orderable: false,
            },
            // {
            //     data: "tgl",
            //     className: "text-center",
            //     render: function(data, type, full) {
            //         return moment(data).format("DD MMMM YYYY");
            //     },
            // },
            {
                data: "nama_jemaat",
                className: "text-center",
            },
            {
                data: "nama_jenis_persembahan",
                className: "text-center",
            },
            {
                data: "id_persembahan",
                searchable: true,
                sortable: false,
                className: "text-center",
                render: function(id_persembahan, type, full, meta) {
                    return (
                        '<a href="editPersembahan/' + id_persembahan + '"> Edit</a> || <a href="deletePersembahan/' + id_persembahan + '"> Delete</a>'
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