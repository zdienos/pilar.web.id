//
// function hitung() {
//     var jlmAngota = eval($('#jlmAngota').val());
//     var jlmKamar = eval($('#jlmKamar').val());
//     var jlmBed = eval($('#jlmBed').val());
//     var hargaAngota = eval($('#hargaAngota').val());
//     var hargaKamar = eval($('#hargaKamar').val());
//     var hargaBed = eval($('#hargaBed').val());
//
//     var total = eval($('#total').val());
//
//     var jumlahTotal = parseInt(total) + (parseInt(hargaAngota) * parseInt(jlmAngota)) + (parseInt(hargaKamar) * parseInt(jlmKamar)) + (parseInt(hargaBed) * parseInt(jlmBed));
//
//     document.getElementById('total').value = jumlahTotal;
//
// }
function suksesAlert(pesan){
      swal({
      title: pesan,
      type: "success"
      }).then(function() {
          window.location = 'http://pilar.web.id/member/';
      });
  }

function suksesAlertDaftar(pesan){
      swal({
      title: pesan,
      type: "success"
      }).then(function() {
          window.location = 'http://pilar.web.id/member/';
          window.open('http://pilar.web.id/member/index.php?page=Invoice&id='+$("#idAcara").val(),'_blank');
      });
  }

function errorAlert(pesan){
    swal({
    title: pesan,
    type: "warning"
    }).then(function() {
    });
}

function Acara(){
  $.ajax({
    type:'POST',
    data : {
      idUser : $("#id").val(),
      idAcara : $("#idAcara").val(),
      jumlahOrang : $("#jlmAngota").val(),
      jumlahKamar : $("#jlmKamar").val(),
      jumlahExtraBed : $("#jlmBed").val(),
    },
    url: 'prossess/acara.php?tipe=submit',
    success: function(data) {
      var resp = eval('(' + data + ')');
      if(resp.err==''){
        suksesAlertDaftar("Acara Dikuti , Check Email Anda Terimakasih");
      }else{
        errorAlert(resp.err);
      }
    }
  });
}
function saveBuktiTransfer(){
  $.ajax({
    type:'POST',
    data : {
      idReservasi : $("#idReservasi").val(),
      baseImage : $("#baseImage").val(),
      nomor_invoice : $("#nomor_invoice").val(),
    },
    url: 'prossess/acara.php?tipe=buktiTransfer',
    success: function(data) {
      var resp = eval('(' + data + ')');
      if(resp.err==''){
        suksesAlert("Data Terkirim");
      }else{
        errorAlert(resp.err);
      }
    }
  });
}
function hitung(){
  $.ajax({
    type:'POST',
    data : {
      idUser : $("#id").val(),
      idAcara : $("#idAcara").val(),
      jumlahOrang : $("#jlmAngota").val(),
      jumlahKamar : $("#jlmKamar").val(),
      jumlahExtraBed : $("#jlmBed").val(),
    },
    url: 'prossess/acara.php?tipe=hitung',
    success: function(data) {
      var resp = eval('(' + data + ')');
      if(resp.err==''){
        $("#total").val(resp.content.total);
      }else{
        errorAlert(resp.err);
      }
    }
  });
}

function imageChanged(){
  var me= this;
  var filesSelected = document.getElementById("buktiTransfer").files;
  if (filesSelected.length > 0)
  {
    var fileToLoad = filesSelected[0];
    var fileReader = new FileReader();
    fileReader.onload = function(fileLoadedEvent)
    {
      $("#tempPicture").attr('src',fileLoadedEvent.target.result);
      $("#baseImage").val(fileLoadedEvent.target.result);

    };

    fileReader.readAsDataURL(fileToLoad);
  }
}
