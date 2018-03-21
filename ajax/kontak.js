function Kontak(){
    var nama = $("#nama").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var pesan = $("#pesan").val();

    var dataString = 'nama='+ nama + '&email='+ email + '&phone='+ phone + '&pesan='+ pesan;
    if(nama==''||email==''||phone==''||pesan==''){

        swal(
              'Gagal',
              'Data yang anda masukan Tidak Lenkap / Tidak Sesuai',
              'error'
            )
    
    }
    else{

    $.ajax({
    type: "POST",
    url: "?page=Prosess&action=Kontak",
    data: dataString,
    cache: false,
    success: function(result){
        swal(
          'Berhasil',
          'Pesan Sudah terkirim, untuk Pemberitahuan selanjutnya check di Email.!',
          'success'
        )
    }
    });
       
    $("#nama").val("");
     $("#email").val("");
      $("#phone").val("");
       $("#pesan").val("");
    
    }
    return false; 

}