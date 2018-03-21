function Kontak(){
    var username = $("#username").val();
    var email = $("#emails").val();
    var pertanyaan = $("#pertanyaan").val();

    var dataString = 'username='+ username + '&email='+ email + '&pertanyaan='+ pertanyaan;
    if(username==''||email==''||pertanyaan==''){

        swal(
              'Gagal',
              'Data yang anda masukan Tidak Lenkap / Tidak Sesuai',
              'error'
            )
    
    }
    else{

    $.ajax({
    type: "POST",
    url: "chating.php",
    data: dataString,
    cache: false,
    success: function(result){
        swal(
          'Berhasil',
          'Selamat Datang '+ username +' Di Chating Room',
          'success'
        )
      window.open('chat.php','_blank');
    }

    });
       
    $("#username").val("");
     $("#emails").val("");
       $("#pertanyaan").val("");
    
    }
    return false; 

}