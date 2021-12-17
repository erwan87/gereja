$(document).ready(function(){
    $("#mainAkun").change(function(){
        $('#akun').show();
        var mainAkun=$("#mainAkun").val();
        $.ajax({
            type:"post",
            url :"getAkun",
            data:"mainAkun="+mainAkun,
            success:function(data){
                $("#Akun").html(data);
            }
        });
    });

    $("#Akun").change(function(){
        $('#subakun').show();
        // $("#subakun").load(" #subakun > *");
        var Akun=$("#Akun").val();
        console.log(Akun);
        $.ajax({
            type:"post",
            url :"getSubAkunPengeluaran",
            data:"Akun="+Akun,
            success:function(data){
                $("#subAkun").html(data);
            }
        });
    });
});