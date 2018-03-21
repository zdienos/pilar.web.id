<div class="container-fluid padding-25 sm-padding-10">

<div class="row">



<?php


$sql = mysql_query("SELECT * from acara");
  
while ($data = mysql_fetch_array($sql)) {
   $isi = strip_tags(base64_decode($data['deskripsi']));
      if (strlen($isi) > 150) {
          $stringCut = substr($isi, 0,250);
          $isi = substr($stringCut, 0, strrpos($stringCut, ' '));
      }

      $dataUsers = mysql_fetch_array(mysql_query("SELECT * FROM users where username='".$_SESSION['username']."'"));

$dataReservasi = mysql_fetch_array(mysql_query("SELECT * FROM reservasi_acara where id_user='$dataUsers[id]'"));

if ($dataReservasi['id_acara'] == $data['id']) {
 $alert = '<span class="label font-montserrat fs-11" style="background-color: #b30c3c; color: white;">Di Ikuti</span>';
}else{
$alert = '<span class="label font-montserrat fs-11" style="background-color: #0cb36c; color: white;">Terbaru</span>';
}
 if (str_replace('-','', $data['tanggal']) < str_replace('-','', date('Y-m-d'))) {
   $content = '';
 }else{
  $content = '

              <div class="col-sm-4 m-b-10">
              <div class="ar-1-1">

              <div class="widget-2 card no-border bg-primary widget widget-loader-circle-lg no-margin" style="background: #1d6562 !important;">
              <div class="card-header ">
              <div class="card-controls">
              <ul>
              <li><a href="" class="card-refresh" data-toggle="refresh"><i class="card-icon card-icon-refresh-lg-white"></i></a>
              </li>
              </ul>
              </div>
              </div>
              
              <div class="card-block">
              <div class="pull-bottom bottom-left bottom-right padding-25">
              '.$alert.'
              <br>
              <a href="?page=daftarAcara&id='.$data['id'].'">
              <h3 class="text-white" style="text-shadow: 2px 2px 8px #000000;font-size: 29px;">'.$data['nama_acara'].'</h3>
            
              <p class="text-white">
              '.$isi.'
              </p>
              </a>
              </div>
              </div>

              </div>

              </div>
              </div>

              ';
 }
echo $content;

}
?>

</div>
</div>
