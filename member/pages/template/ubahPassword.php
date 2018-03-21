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
<h3>Ganti Password </h3>
</div>
</div>
<div class="card-block">
<div class="row">
<div class="col-md-10">

<div class="form-group row">
<label for="nama" class="col-md-3 control-label" style="color: black;">Nama Saya</label>
<div class="col-md-9">
<div class="row">
<div class="col-md-12 sm-m-t-10">
<input type="text" class="form-control" readonly value="<?php echo $dataUser['nama']; ?>"  placeholder="Full name" name="nama">
<input type="hidden"  id="id" value="<?php echo $dataUser['username']; ?>">
</div>
</div>
</div>
</div>
<div class="form-group row">
<label class="col-md-3 control-label"  style="color: black;">Password Lama</label>
<div class="col-md-9">
<div class="row">
<div class="col-md-12 sm-m-t-10">
<input type="password"  id="passwordLama"  class="form-control">
</div>
</div>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 control-label" style="color: black;">Password Baru</label>
<div class="col-md-9">
<div class="row">
<div class="col-md-12 sm-m-t-10">
<input type="password" id="passwordBaru"   class="form-control">
</div>
</div>
</div>
</div>


<div class="form-group row">
<label class="col-md-3 control-label" style="color: black;">Konfirmasi Password</label>
<div class="col-md-9">
<div class="row">
<div class="col-md-12 sm-m-t-10">
<input type="password" id="konfirmasiPassword"  class="form-control">
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
<button class="btn btn-success" type="buttton" id="button" onclick="UbahPassword()">Ubah Password</button>
</div>
</div>
</div>
</div>
</div>
</div>