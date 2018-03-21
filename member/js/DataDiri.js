function UbahProfile()
{
  var id = $('#id').val();
  var nama = $('#nama').val();
  var instansi = $('#instansi').val();
  var email = $('#email').val();
  var nomor = $('#nomor').val();
  var alamat = $('#alamat').val();

  url_member = '/member';
  url_login = 'prossess/Profile.php';

  document.getElementById('button').textContent = 'Silahkan tunggu ...';
  //Gunakan jquery AJAX
  $.ajax({
    url   : url_login,
    data  : 'nama='+nama+'&instansi='+instansi+'&email='+email+'&nomor='+nomor+'&alamat='+alamat+'&id='+id,
    type  : 'POST',
    dataType: 'html',
    success : function(pesan){
      var obj = JSON.parse(pesan);
      if(obj.response=='ok'){

        swal({
          type: 'success',
          title: 'Ubah Profile Sukses',
          showConfirmButton: true,
          timer: 5000
        });
        window.location = url_member;

      }else if (obj.response=='tidak') {
      document.getElementById('button').textContent = 'Ubah Profile';
        swal(
          'Data Salah!',
          'Sihlakan Isi Data Dengan Benar!',
          'error'
        );
      }
      else{

        document.getElementById('button').textContent = 'Ubah Profile';
        swal(
          'Data Tidak Lengkap!',
          'Sihlakan IsiData Kembali!',
          'error'
        );
      }
    },
  });
}



function UbahPassword()
{
  var id = $('#id').val();
  var passwordLama = $('#passwordLama').val();
  var passwordBaru = $('#passwordBaru').val();
  var konfirmasiPassword = $('#konfirmasiPassword').val();

  url_member = '/member';
  urlubahPassword = 'prossess/ubahPassword.php';

  document.getElementById('button').textContent = 'Silahkan tunggu ...';
  //Gunakan jquery AJAX
  $.ajax({
    url   : urlubahPassword,
    data  : 'passwordLama='+passwordLama+'&passwordBaru='+passwordBaru+'&konfirmasiPassword='+konfirmasiPassword+'&id='+id,
    type  : 'POST',
    dataType: 'html',
    success : function(pesan){
      var obj = JSON.parse(pesan);
      if(obj.response=='ok'){

        swal({
          type: 'success',
          title: 'Ubah Password Sukses',
          showConfirmButton: true,
          timer: 5000
        });

            window.location = url_member;

      }else if (obj.response=='tidakBenar') {
      document.getElementById('button').textContent = 'Ubah Password';
        swal(
          'Password Lama Salah!',
          'Sihlakan Isi Data Dengan Benar!',
          'error'
        );
      }else if (obj.response=='tidakSama') {
      document.getElementById('button').textContent = 'Ubah Password';
        swal(
          'Password Baru Tidak Sama!',
          'Sihlakan Isi Data Dengan Benar!',
          'error'
        );
      }
      else{

        document.getElementById('button').textContent = 'Ubah Password';
        swal(
          'Data Tidak Lengkap!',
          'Sihlakan IsiData Kembali!',
          'error'
        );
      }
    },
  });
}



