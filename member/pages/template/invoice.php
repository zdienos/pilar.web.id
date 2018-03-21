<div class=" container-fluid   container-fixed-lg">

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

<div class="card card-default m-t-20">
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