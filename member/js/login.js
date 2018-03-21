function Login()
{

  var username = $('#username').val();
  var password = $('#password').val();
    var idAcara = $('#idAcara').val();
      var kategori = $('#kategori').val();
  url_member = '/member';
  url_login = 'prossess/login.php';

  document.getElementById('button').textContent = 'Silahkan tunggu ...';
  //Gunakan jquery AJAX
  $.ajax({
    url   : url_login,
    data  : 'username='+username+'&password='+password+'&idAcara='+idAcara+'&kategori='+kategori,
    type  : 'POST',
    dataType: 'html',
    success : function(pesan){
      var obj = JSON.parse(pesan);
      if(obj.response=='ok'){

        swal({
          type: 'success',
          title: 'Login Berhasil',
          showConfirmButton: true,
          timer: 5000
        });
        window.location = url_member;

      }else if(obj.response=='okDaftar'){

        swal({
          type: 'success',
          title: 'Login Berhasil',
          showConfirmButton: true,
          timer: 5000
        });
        window.location = '/member/?page=daftarAcara&id='+idAcara;

      }else if(obj.response=='okKonfirmasi'){

        swal({
          type: 'success',
          title: 'Login Berhasil',
          showConfirmButton: true,
          timer: 5000
        });
        window.location = '/member/?page=daftarAcara&id='+idAcara;

      }else if(obj.response=='okUndangan'){

        swal({
          type: 'success',
          title: 'Login Berhasil',
          showConfirmButton: true,
          timer: 5000
        });
        window.location = '/member/?page=undangan&id='+idAcara;

      }else if(obj.response=='okSupport'){

        swal({
          type: 'success',
          title: 'Login Berhasil',
          showConfirmButton: true,
          timer: 5000
        });
        window.location = '/member/?page=support';

      }else if (obj.response=='tidak') {
      document.getElementById('button').textContent = 'Masuk';
        swal(
          'Data Salah!',
          'Sihlakan Isi Data Dengan Benar!',
          'error'
        );
      }
      else{

        document.getElementById('button').textContent = 'Masuk';
        swal(
          'Data Tidak Lengkap!',
          'Sihlakan IsiData Kembali!',
          'error'
        );
      }
    },
  });
}
