// View Datatable Kegiatan Lingkungan
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

    let table = $("#tableTglMisa").DataTable({
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
        scrollX: true,
        info: true,
        filter: true,
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
            url: "jsonKegiatanLingkungan",
            type: "POST",
        },
        columns: [{
                data: "id_kegiatan_lingkungan",
                className: "text-center",
                orderable: false,
                searchable: false,
            },
            {
                data: "tgl_kegiatan",
                className: "text-center",
                searchable: false,
                render: function(data, type, full) {
                    if (moment(data).format("dddd")==="Sunday"){
                        return 'Minggu';
                    } else if (moment(data).format("dddd")==="Monday"){
                        return 'Senin';
                    } else if (moment(data).format("dddd")==="Tuesday"){
                        return 'Selasa';
                    } else if (moment(data).format("dddd")==="Wednesday"){
                        return 'Rabu';
                    } else if (moment(data).format("dddd")==="Thursday"){
                        return 'Kamis';
                    } else if (moment(data).format("dddd")==="Friday"){
                        return 'Jumat';
                    }else{
                        return 'Sabtu';
                    }
                },
            },
            {
                data: "tgl_kegiatan",
                className: "text-center",
                searchable: false,
                render: function(data, type, full) {
                    return moment(data).format("DD MMMM YYYY");
                },
            },
            {
                data: "nama_lingkungan",
                className: "text-center",
                searchable: true,
            },
            {
                data: "nama_jemaat",
                className: "text-center",
                searchable: false,
            },
            {
                data: "nama",
                className: "text-center",
                searchable: false,
            },
            {
                data: "nama_wilayah",
                className: "text-center",
            },
            {
                data: "id_kegiatan_lingkungan",
                searchable: false,
                sortable: false,
                className: "text-center",
                render: function(id_kegiatan_lingkungan, type, full, meta) {
                    return (
                        '<a href="editKegiatanLingkungan/' + id_kegiatan_lingkungan + '"> Edit</a> || <a href="deleteKegiatanLingkungan/' + id_kegiatan_lingkungan + '"> Delete</a>'
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