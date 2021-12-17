$(document).ready(function(){

    var mainAkun=2;
    $.ajax({
        type:"post",
        url :"../getAkun1",
        data:"mainAkun="+mainAkun,
        success:function(data){
            $("#Akun").html(data);
        }
    });

    // Tampilkan Ketika Akun Pilihan 2
    $("#Akun").change(function(){
        $('#subakun').show();
        // var Akun=$("#Akun").val();
        var Akun=2;
        if(this.value==2){
            $.ajax({
                type:"post",
                url :"../getSubAkunLing",
                data:"Akun="+Akun,
                success:function(data){
                    $("#subAkun").html(data);
                }
            });
        }else{
            $.ajax({
                type:"post",
                url :"../getSubAkun",
                data:"Akun="+Akun,
                success:function(data){
                    $("#subAkun").html(data);
                }
            });
        }
        $.ajax({
            type:"post",
            url :"../getSubAkun",
            data:"Akun="+Akun,
            success:function(data){
                $("#subAkun").html(data);
            }
        });
    });
});