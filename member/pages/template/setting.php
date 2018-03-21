<script type="text/javascript" src='js/DataDiri.js'></script>
<style type="text/css">
  .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background: #f8f8f8;
    color: rgb(98, 98, 98);
    border: 1px solid #a7a2a2;
}
.form-control{
  border: 1px solid #a7a2a2;
}

</style>

<?php
$getId = @$_GET['id'];
$data = mysql_fetch_array(mysql_query("SELECT * FROM acara where id='$getId'"));
     $isi = strip_tags($data['deskripsi']);

      if (strlen($isi) > 150) {

          $stringCut = substr($isi, 0,250);

          $isi = substr($stringCut, 0, strrpos($stringCut, ' ')); 
      }

      $kuota = $data['kuota'] - $data['reversed'];
?>




<div class=" container-fluid   container-fixed-lg">

<div class="card card-transparent">
<div class="card-header ">
<h3>UBAH DATA PRIBADI </h3>
</div>
</div>
<div class="card-block">
<div class="row">
<div class="col-md-10">

<form id="form-work" class="form-horizontal" role="form" autocomplete="off" novalidate="novalidate">
<div class="form-group row">
<label for="nama" class="col-md-3 control-label" style="color: black;">Nama Saya</label>
<div class="col-md-9">
<div class="row">
<div class="col-md-12 sm-m-t-10">
<input type="text" class="form-control" id="nama" value="<?php echo $dataUser['nama']; ?>"  placeholder="Full name" name="nama" required="" aria-required="true">
<input type="hidden"  id="id" value="<?php echo $dataUser['id']; ?>">
</div>
</div>
</div>
</div>
<div class="form-group row">
<label class="col-md-3 control-label" style="color: black;">Instansi</label>
<div class="col-md-9">
<div class="row">
<div class="col-md-12 sm-m-t-10">
<?php 
    $queryAplikasi = mysql_query("SELECT * FROM ref_pemda where id='$dataUser[instansi]'");

  $data = mysql_fetch_array($queryAplikasi);
?>

<input type="text" id="instansi" readonly value="<?php echo $data['nama']; ?>"  class="form-control">
</div>
</div>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 control-label" style="color: black;">-</label>
<div class="col-md-9">
<div class="row">
<div class="col-md-6">
<label class="col-md-12 control-label" style="color: black;">Alamat Email</label>
<input type="text"  value="<?php echo $dataUser['email']; ?>" id="email"  class="form-control" required="" aria-required="true">
</div>
<div class="col-md-6 sm-m-t-10">
<label class="col-md-12 control-label" style="color: black;">Nomor Telepon</label>
<input type="text"  value="<?php echo $dataUser['telepon']; ?>" id="nomor" class="form-control">
</div>
</div>
</div>
</div>



<div class="form-group row">
<label for="fname" class="col-md-3 control-label" style="color: black;">Alamat </label>
<div class="col-md-9">
<div class="row">
<div class="col-md-12 sm-m-t-10">
<input type="text" class="form-control" value="<?php echo $dataUser['alamat']; ?>" id='alamat' name="alamat" required="" aria-required="true">
</div>
</div>
</div>
</div>

<br>
<div class="row">
<div class="col-md-3">
<p>Jika anda yakin tekan tombol Ubah. </p>
</div>
<div class="col-md-9">
<button class="btn btn-success" type="submit" id="button" onclick="UbahProfile()">Ubah Profile</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>