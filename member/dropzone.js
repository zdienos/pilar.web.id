function getEditorContent(){
     var editors = textboxio.get('#textbox');
     var editor = editors[0];
     return editor.content.get();
 }


function Koreksi()
{

  var textbox  = getEditorContent();
  var aplikasi = $('#aplikasi').val();

  url_support = '/member/?page=support';
  url_login = 'prossess/simpanKoreksi.php';

  document.getElementById('button').textContent = 'Silahkan tunggu ...';
  //Gunakan jquery AJAX
  $.ajax({
    url   : url_login,
    data  : {
              textbox : textbox,
              aplikasi :aplikasi
            },
    type  : 'POST',
    dataType: 'html',
    success : function(pesan){
      var obj = JSON.parse(pesan);
      if(obj.response=='ok'){

        swal({
          type: 'success',
          title: 'Simpan Berhasil',
          showConfirmButton: true,
          timer: 5000
        });
        window.location = url_support;
      }else{

        document.getElementById('button').textContent = 'Submit';
        swal(
          'Data Tidak Lengkap!',
          'Sihlakan IsiData Kembali!',
          'error'
        );
      }
    },
  });
}
