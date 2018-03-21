function Lamaran(){
    var namaDepan = $("#namaDepan").val();
    var namaBelakang = $("#namaBelakang").val();
    var email = $("#email").val();
    var nomer = $("#nomer").val();
    var posisi = $("#posisi").val();
    var alamat = $("#alamat").val();
    var pendidikan = $("#pendidikan").val();
    var tentang = $("#tentang").val();
     var id = $("#id").val();

    var cv = $("#cv").val();


    if(namaDepan==''|| namaBelakang==''|| email==''||nomer==''||posisi=='' ||alamat==''
      ||pendidikan=='' ||tentang=='' ||cv==''){

        swal(
              'Gagal',
              'Data yang anda masukan Tidak Lengkap / Tidak Sesuai',
              'error'
            )

    }
    else{
      var dataString = 'namaDepan='+ namaDepan + '&namaBelakang='+
       namaBelakang + '&email='+ email + '&nomer='+ nomer +
        '&posisi='+ posisi +'&alamat='+ alamat + '&pendidikan='+ pendidikan +
         '&tentang='+ tentang + '&cv='+ cv + '&id='+ id ;
         swal({
            title: "Kirim lamaran ?",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
          }, function () {
                  $.ajax({
                  type: "POST",
                  url: "prossesLamaran.php",
                  data: {
                            namaDepan : namaDepan,
                            namaBelakang : namaBelakang,
                            email : email,
                            nomer : nomer,
                            posisi : posisi,
                            alamat : alamat,
                            pendidikan : pendidikan,
                            tentang : tentang,
                            cv : cv,
                            id : id,
                        },
                  success: function(result){
                      // swal(
                      //   'Berhasil',
                      //   'Lamaran Terkirim, kami akan menghubungi secepatnya jika anda memenuhi kriteria kami',
                      //   'success'
                      // );

                      swal({
                            title: "Berhasil",
                            text: "Lamaran Terkirim, kami akan menghubungi secepatnya jika anda memenuhi kriteria kami",
                            type: "success",
                          }, function () {

                            swal("Nice!", "You wrote: success");
                            window.location = "http://pilar.web.id";
                          });



                  }
                  });
          });



    }
    return false;

}


function imageChanged(){
  var me= this;
  var filesSelected = document.getElementById("inputFile2").files;
  if (filesSelected.length > 0)
  {
    var fileToLoad = filesSelected[0];

    var fileReader = new FileReader();

    fileReader.onload = function(fileLoadedEvent)
    {
      var textAreaFileContents = document.getElementById
      (
        "cv"
      );

      textAreaFileContents.value = fileLoadedEvent.target.result;
    };

    fileReader.readAsDataURL(fileToLoad);
  }
}
