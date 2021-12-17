$(function() {
	$(".tgl_misa").datepicker({
		format: "dd MM yyyy",
		autoclose: true,
		todayHighlight: true,
	});
});
$("#hidetempat").hide(); // Sembunyikan dulu combobox Tempat nya
$("#hidePenanggungJawab").hide(); // Sembunyikan dulu combobox Penanggung Jawab nya
$("#hideUmat").hide(); // Sembunyikan dulu Textarea Umat
$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#loading").hide();
    $("#lingkungan").change(function(){ // Ketika user mengganti atau memilih data provinsi
      $("#loading").show(); // Tampilkan loadingnya
		$.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "../Master/getMajelis", // Isi dengan url/path file php yang dituju
        data: {id_lingkungan : $("#lingkungan").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
			if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
			}
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          		$("#loading").hide(); // Sembunyikan loadingnya
				$("#hidetempat").show();
				$("#hidePenanggungJawab").show();
				$("#hideUmat").show();
				// lalu munculkan kembali combobox kotanya
				$("#tempat").html(response.list_penanggungjawab);
				$("#penanggungJawab").html(response.list_penanggungjawab);
				$("#umat").html(response.list_umat);
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
			}
		});
	});
});