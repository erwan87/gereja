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

    // Tampilkan Ketika Akun Pilihan 2
    $("#Akun").change(function(){
        $('#subakun').show();
        var Akun=$("#Akun").val();
        if(this.value==2){
            $("#subakun").load(" #subakun > *");
            $.ajax({
                type:"post",
                url :"getSubAkunLing",
                data1:"Akun="+this.value,
                success:function(data1){
                    $("#subAkun").html(data1);
                }
            });
            // console.log('ini'+this.value);
        }else if(this.value==1){
            $.ajax({
                type:"post",
                url :"getSubAkun",
                data:"Akun="+Akun,
                success:function(data){
                    $("#subAkun").html(data);
                }
            });
        }else{
            // console.log('itu'+this.value);
            $.ajax({
                type:"post",
                url :"getSubAkun3",
                data:"Akun="+Akun,
                success:function(data){
                    $("#subAkun").html(data);
                }
            });
        }
        $.ajax({
            type:"post",
            url :"getSubAkun",
            data:"Akun="+Akun,
            success:function(data){
                $("#subAkun").html(data);
            }
        });
    });
});