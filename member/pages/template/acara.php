<style type="text/css">
  
</style>

<div class=" container-fluid   container-fixed-lg bg-white">

<div class="card card-transparent">
<div class="card-header ">
<div class="card-title">Semua Acara
</div>
<div class="pull-right">
<div class="col-xs-12">
<input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
</div>
</div>
<div class="clearfix"></div>
</div>
<div class="card-block">
<table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
<thead>
<tr>
<th>Nama Acara</th>
<th>Tanggal Acara</th>
<th>Deskripsi</th>
<th>Status</th>
<th>Harga / Paket</th>
</tr>
</thead>
<tbody>
<?php
  $sql = mysql_query("SELECT * FROM acara");
  while ($data = mysql_fetch_array($sql)) {
   $isi = strip_tags(base64_decode($data['deskripsi']));
      if (strlen($isi) > 150) {
          $stringCut = substr($isi, 0,200);
          $isi = substr($stringCut, 0, strrpos($stringCut, ' '));
      }

      $dataUsers = mysql_fetch_array(mysql_query("SELECT * FROM users where username='".$_SESSION['username']."'"));

$dataReservasi = mysql_fetch_array(mysql_query("SELECT * FROM reservasi_acara where id_user='$dataUsers[id]'"));

if ($dataReservasi['id_acara'] == $data['id']) {
 $alert = '<span class="label font-montserrat fs-11" style="background-color: #b30c3c; color: white;">Di Ikuti</span>';
}else{
$alert = '<span class="label font-montserrat fs-11" style="background-color: #0cb36c; color: white;">Belum Di Ikuti</span>';
}


 if (str_replace('-','', $data['tanggal']) > str_replace('-','', date('Y-m-d'))) {
?>
<tr>
<td class="v-align-middle semi-bold">
<p><?php echo $data['nama_acara']; ?></p>
</td>
<td class="v-align-middle">
  <?php echo date("d M, Y", strtotime($data['tanggal'])); ?> | <?php echo $data['jam']; ?> 
</td>
<td class="v-align-middle">
<p><?php echo $isi; ?></p>
</td>
<td class="v-align-middle">
<p><?php echo $alert; ?></p>
</td>
<td class="v-align-middle">
<p><?php echo numberFormat($data['harga_tiket']); ?></p>
</td>
</tr>
<?php 
  }
}
   ?>
</tbody>
</table>
</div>
</div>

</div>