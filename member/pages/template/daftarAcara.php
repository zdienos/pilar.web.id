<script type="text/javascript" src='js/Acara.js'></script>
<style type="text/css">
  .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background: #f8f8f8;
    color: rgb(98, 98, 98);
    border: 1px solid #a7a2a2;
}
.form-control{
  border: 1px solid #a7a2a2;
}
#head{
  background-color: #10cfbd!important;
  color: white;
  font-weight: bold;
}
.table.table-hover tbody tr:hover td {
    background: #daeffd;
}
.table tbody tr td{
  padding: .75rem;
}

</style>

<?php
$getId = @$_GET['id'];
$data = mysql_fetch_array(mysql_query("SELECT * FROM acara where id='$getId'"));
     $isi = strip_tags(base64_decode($data['deskripsi']));
      if (strlen($isi) > 150) {
          $stringCut = substr($isi, 0,250);
          $isi = substr($stringCut, 0, strrpos($stringCut, ' '));
      }
      $kuota = $data['kuota'] - $data['reversed'];


$getIdUser= sqlArray(sqlQuery("select * from users where username = '".$_SESSION['username']."'"));
$idUser = $getIdUser['id'];
$getStatusRegistered = sqlArray(sqlQuery("select * from reservasi_acara where id_acara = '".$_GET['id']."' and id_user = '$idUser'"));
if((sqlNumRow(sqlQuery("select * from reservasi_acara where id_acara = '".$_GET['id']."' and id_user = '$idUser'")) != 0 && $getStatusRegistered['status'] !='2') || $getStatusRegistered['status'] == 1){
  $statusBuktiTransfer = 'active';
  $tabPendaftaran = "";
  $tabPembayaran = "#tab2";
  $tabKonfirmasi = "";
}elseif($getStatusRegistered['status'] == 2){
  $statusFinish = 'active';
  $tabPendaftaran = "";
  $tabPembayaran = "";
  $tabKonfirmasi = "#tab3";
}else{
  $statusDaftar = "active";
  $tabPendaftaran = "#tab1";
  $tabPembayaran = "";
  $tabKonfirmasi = "";
}

?>


<div class=" container-fluid   container-fixed-lg">


<div id="rootwizard" class="m-t-50">

<ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
<li class="nav-item">
<a class="active" data-toggle="tab" href="<?php echo $tabPendaftaran  ?>" role="tab"><i class="fa fa-address-card tab-icon"></i> <span>Pendaftaran</span></a>
</li>
<li class="nav-item">
<a class="" disabled data-toggle="tab" href="<?php echo $tabPembayaran ?>" role="tab"><i class="fa fa-credit-card tab-icon"></i> <span>Konfirmasi</span></a>
</li>
</ul>

<div class="tab-content">
<div class="tab-pane padding-20 sm-no-padding <?php echo $statusDaftar; ?> slide-left" id="tab1">
<div class="row row-same-height">
<div class="card card-transparent">
<div class="card-header ">
<div class="card-title"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $data['lokasi']; ?>
</div>
</div>
<div class="card-block">
<div class="row">
<div class="col-md-10">
<h3>Acara <?php echo $data['nama_acara']; ?></h3>
<p><?php echo $isi; ?>
</p>
<br>
<p class="small hint-text">
<a href="http://pilar.web.id/?page=viewAcara&id=<?php echo $data['id']; ?>&koordinat=<?php echo $data['koordinat']; ?>" class="btn btn-success btn-cons"> Lihat Acara Selengkapnya</a></p>
<form id="form-work" class="form-horizontal" role="form" autocomplete="off" novalidate="novalidate">
<div class="form-group row">
<label for="nama" class="col-md-3 control-label" style="color: black;">Nama Saya</label>
<div class="col-md-9">
<div class="row">
<div class="col-md-12">
<input type="text" class="form-control" id="nama" value="<?php echo $dataUser['nama']; ?>" readonly placeholder="Full name" name="name" required="" aria-required="true">
<input type="hidden" class="form-control" id="id" value="<?php echo $dataUser['id']; ?>">
<input type="hidden" class="form-control" id="idAcara" value="<?php echo $getId; ?>">
</div>
</div>
</div>
</div>
<div class="form-group row">
<label class="col-md-3 control-label" style="color: black;">Data Diri</label>
<div class="col-md-9">
<div class="row">
<div class="col-md-5">
<input type="text" id="email" readonly value="<?php echo $dataUser['email']; ?>"  class="form-control" required="" aria-required="true">
</div>
<div class="col-md-5 sm-m-t-10">
<input type="text" id="instansi" readonly value="<?php echo $dataUser['instansi']; ?>"  class="form-control">
</div>
</div>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 control-label" style="color: black;">-</label>
<div class="col-md-9">
<div class="row">
<div class="col-md-12">
<label class="col-md-12 control-label" style="color: black;">Harga Partisipasi / Orang</label>
<input type="text" readonly value="<?php echo numberFormat($data['harga_tiket']); ?>" id="hargaTiket"  class="form-control" required="" aria-required="true">

<input type="hidden" readonly value="<?php echo numberFormat($data['harga_kamar']); ?>" id="hargaKamar" class="form-control">
<input type="hidden" readonly value="<?php echo numberFormat($data['extra_bed']); ?>" id="hargaBed" class="form-control">

</div>



</div>
</div>
</div>


<div class="form-group row">
<label class="col-md-3 control-label" style="color: black;">-</label>
<div class="col-md-9">
<div class="row">
<div class="col-md-12">
<label class="col-md-12 control-label" style="color: black;">Jumlah Perserta Daftar</label>
<input type="number" min="0" value="1" onkeyup="hitung()" onchange="hitung()" id="jlmAngota"   class="form-control" required="" aria-required="true">
<input type="hidden" min="0" value="0" onkeyup="hitung()" onchange="hitung()" id="jlmKamar" class="form-control">
<input type="hidden" min="0" value="0" onkeyup="hitung()" onchange="hitung()" id="jlmBed" class="form-control">
</div>



</div>
</div>
</div>

<div class="form-group row">
<label for="fname" class="col-md-3 control-label" style="color: black;">Total Pembayaran</label>
<div class="col-md-9">
<div class="row">
<div class="col-md-12">
<input type="text" class="form-control" id="total" value="<?php echo numberFormat($data['harga_tiket']); ?>" readonly  name="name" required="" aria-required="true">
</div>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-md-3">
<p>Jika anda yakin tekan tombol Ikuti Acara. </p>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
<ul class="pager wizard no-style">
<li class="next">
<button class="btn btn-success btn-cons btn-animated from-left fa fa-save pull-right" type="button" onclick="Acara()">
<span>Ikuti Acara</span>
</button>
</li>
<li class="previous">

</li>
</ul>
</div>


</div>


<div class="tab-pane slide-left padding-20 sm-no-padding <?php echo $statusBuktiTransfer; ?>" id="tab2">
<div class="row row-same-height">

<div class="card card-transparent">
<div class="card-header ">

</div>

<?php 

$getId = @$_GET['id'];
$data = mysql_fetch_array(mysql_query("SELECT * FROM acara where id='$getId'"));
     $isi = strip_tags(base64_decode($data['deskripsi']));
      if (strlen($isi) > 150) {
          $stringCut = substr($isi, 0,250);
          $isi = substr($stringCut, 0, strrpos($stringCut, ' '));
      }
      $kuota = $data['kuota'] - $data['reversed'];


$getIdUser= sqlArray(sqlQuery("select * from users where username = '".$_SESSION['username']."'"));
$idUser = $getIdUser['id'];
$getStatusRegistered = mysql_fetch_array(mysql_query("SELECT * from reservasi_acara where id_acara = '".$_GET['id']."' and id_user = '$idUser'"));


$dataWeb = mysql_fetch_array(mysql_query('SELECT * FROM kontak_web'));
 ?>

<div class="row">

<div class="col-lg-12">

<div class="card card-default">
<div class="card-header ">

</div>
<div class="card-block">
<div class="row">
  <div class="col-lg-12">
    <div class="card-block">
<div class="invoice padding-50 sm-padding-10">
<div>
<div class="pull-left">
<img width="235" height="47" alt="" class="invoice-logo" data-src-retina="assets/img/invoice/squarespace2x.png" data-src="assets/img/invoice/squarespace.png" src="assets/img/invoice/squarespace.png">
<address class="m-t-10">
PT. Pilar Wahana Artha
<br><?php echo $dataWeb['telepon']; ?>.
<br>
</address>
</div>
<div class="pull-right sm-m-t-20">
<h2 class="font-montserrat all-caps hint-text">Invoice</h2>
</div>
<div class="clearfix"></div>
</div>
<br>
<br>
<div class="col-12">
<div class="row">
<div class="col-lg-9 col-sm-height sm-no-padding">
<p class="small no-margin">Invoice Untuk</p>
<h5 class="semi-bold m-t-0"><?php echo $getIdUser['nama']; ?></h5>
<address>
<strong>Instansi.</strong>
<br>
<?php echo $getIdUser['instansi']; ?>
</address>
</div>
<div class="col-lg-3 sm-no-padding sm-p-b-20 d-flex align-items-end justify-content-between">
<div>
<div class="font-montserrat bold all-caps">Invoice No :</div>
<div class="font-montserrat bold all-caps">Invoice date :</div>
<div class="clearfix"></div>
</div>
<div class="text-right">
<div class=""><?php echo $getStatusRegistered['nomor_invoice']; ?></div>
<div class=""><?php echo date("d M, Y", strtotime($getStatusRegistered['tanggal_daftar'])); ?></div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
<div class="table-responsive table-invoice">
<table class="table m-t-50">
<thead>
<tr>
<th class="">Nama Acara</th>
<th class="text-center">Jumah Orang</th>
<th class="text-center">Harga Partisipasi</th>
<th class="text-right">Total</th>
</tr>
</thead>
<tbody>
<tr>
<td class="">
<p class="text-black"><?php echo $data['nama_acara']; ?></p>
</td>
<td class="text-center"><?php echo $getStatusRegistered['jumlah_orang']; ?></td>
<td class="text-center"><?php echo $data['harga_tiket']; ?></td>
<td class="text-right"><?php echo numberFormat($getStatusRegistered['jumlah_orang'] * $data['harga_tiket']); ?></td>
</tr>
</tbody>
</table>
</div>
<br>
<br>
<br>
<br>
<div class="p-l-15 p-r-15">
<div class="row b-a b-grey">

<div class="col-md-12 text-right bg-master-darker col-sm-height padding-15 d-flex flex-column justify-content-center align-items-end">
<h5 class="font-montserrat all-caps small no-margin hint-text text-white bold">Total</h5>
<h1 class="no-margin text-white"><?php echo numberFormat($getStatusRegistered['jumlah_orang'] * $data['harga_tiket']); ?></h1>
</div>
</div>
</div>
<hr>

</div>
</div>
  </div>
</div>
<!-- <?php
  $getDataAcara = sqlArray(sqlQuery("select * from acara where id ='".$_GET['id']."'"));
  $getDataReservasi = sqlArray(sqlQuery("select * from reservasi_acara where id_user = '".$idUser."' and id_acara = '".$_GET['id']."'"));
  $totalTiket = $getDataReservasi['jumlah_orang']  * $getDataAcara['harga_tiket'];
  $totalKamar = $getDataReservasi['jumlah_kamar']  * $getDataAcara['harga_kamar'] * $getDataAcara['lama_acara'];
  $totalExtraBed = $getDataReservasi['extra_bed']  * $getDataAcara['extra_bed'] * $getDataAcara['lama_acara'];
  $totalBayar = $totalTiket + $totalKamar + $totalExtraBed;
  $baseImage = $getDataReservasi['bukti_transfer'];
?>

<h4 class="pull-right">Nomor Invoice Anda : <b><?php echo $getDataReservasi['nomor_invoice'] ?></b></h4>

<div class="table-responsive">

<table class="table table-bordered table-hover">
<tr>
  <td id="head">ITEM</td>
  <td id="head">JUMLAH</td>
  <td id="head">HARGA</td>
  <td id="head">TOTAL</td>
</tr>
<tr>
  <td>Paket</td>
  <td align='right'><?php echo $getDataReservasi['jumlah_orang'] ?></td>
  <td align='right'><?php echo numberFormat($getDataAcara['harga_tiket']) ?></td>
  <td align='right'><?php echo numberFormat($totalTiket) ?></td>
</tr>

<tr>
  <td></td>
  <td align='right'></td>
  <td align='right'></td>
  <td align='right'><?php echo numberFormat($totalBayar) ?></td>
</tr>
</table>
</div> -->
<br>
<div class="row">
  <div  class="col-md-2">Nomor Invoice</div>
    <div  class="col-md-2" >
     <input type="text" name='nomor_invoice' id ='nomor_invoice' value="<?php echo $getStatusRegistered['nomor_invoice']; ?>" style="margin-left: -47%;">
    </div>
</div>
<br>
<div class="gallery-item ">
<img id='tempPicture' class="image-responsive-height" src ='<?php echo $baseImage ?>'>
<input type="hidden" name='baseImage' id ='baseImage' value='<?php echo $baseImage ?>'>
<input type="hidden" name='idReservasi' id ='idReservasi' value='<?php echo $getDataReservasi['id'] ?>'>
</div>
   <input type="file" id='buktiTransfer'  accept='image/x-png,image/gif,image/jpeg'  onchange="imageChanged();">





</div>
</div>

</div>
</div>

</div>
</div>

<div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
<ul class="pager wizard no-style">
<li class="next">
<button class="btn btn-success btn-cons btn-animated from-left fa fa-save pull-right" onclick=saveBuktiTransfer(); type="button" >
<span>Simpan</span>
</button>
</li>
</ul>
</div>

</div>
<div class="tab-pane slide-left padding-20 sm-no-padding <?php echo $statusFinish; ?>" id="tab4">
<h1>Thank you.</h1>
</div>


</div>
</div>




</div>
