
<link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
<link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css" />


<div class="card card-transparent">
<div class="card-header ">
<div class="card-title">KOREKSI APLIKASI PEMDA
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
   <a href="?page=tambahKoreksi"><button class="btn btn-success"><i class="fa fa-plus"></i> TAMBAH KOREKSI</button></a>
<thead>
<tr>
<th style="width: 6%;">NO</th>
<th>PEMDA</th>
<th>DESCRIPTION</th>
<th>APLIKASI</th>
<th>STATUS</th>
<th>OPSI</th>
</tr>
</thead>
<tbody>
  <?php
      $getDataUser = mysql_fetch_array(mysql_query("select * from users where username='".$_SESSION['username']."'"));
      $idPemda = $getDataUser['instansi'];
     $query = mysql_query("SELECT * FROM koreksi_aplikasi where id_pemda ='$idPemda'");
      $no = 1;
     while ($data = mysql_fetch_array($query)) {

     $dataAplikasi = mysql_fetch_array(mysql_query("SELECT * FROM produk where id='$data[id_aplikasi]'"));
     $dataPemda = mysql_fetch_array(mysql_query("SELECT * FROM ref_pemda where id='$dataUser[instansi]'"));


         $isi = strip_tags(base64_decode($data['description']));

      if (strlen($isi) > 250) {

          $stringCut = substr($isi, 0, 250);

          $isi = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
      }


     if ($data['status'] == 0) {
        $status = '<p><span href="#" class="label font-montserrat fs-11" style="background: #ff8282;color: white !important;width: 60%;"><i class="fa fa-share"></i> Koreksi Terkirim</span></p>';
     }else if ($data['status'] == 1) {
        $status = '<p><span href="#" class="label font-montserrat fs-11" style="background: #ffb682;color: white !important;width: 60%;"><i class="fa fa-spinner fa-spin"></i> Sedang DiProsess</span></p>';
     }else{
        $status = '<p><span href="#" class="label font-montserrat fs-11" style="background: #22bd67;color: white !important;width: 60%;"><i class="fa fa-check"></i> Koreksi Selesai</span></p>';
     }


  ?>
<tr>
<td class="v-align-middle semi-bold">
<p><?php echo $no; ?></p>
</td>
<td class="v-align-middle">
  <?php echo $dataPemda['nama']; ?>
</td>
<td class="v-align-middle">
<p><?php echo $isi; ?></td>
<td class="v-align-middle">
<p><?php echo   $dataAplikasi['nama_produk']; ?></p>
</td>
<td class="v-align-middle">
<?php echo $status; ?>
</td>

<td class="v-align-middle">
 <a target="_blank" href="/member/pages/template/viewKoreksi.php?id=<?php echo $data['id']; ?>"><button class="btn btn-info"><i class="fa fa-eye"></i> LIHAT</button></a>
</td>

</tr>
<?php
$no++;
}
?>
</tbody>
</table>
</div>
</div>
