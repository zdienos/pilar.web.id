<?php

$general_setting = mysql_fetch_array(mysql_query("SELECT * FROM general_setting where id='6'"));
?>

<div class="team-3" style="padding-top: 6%;">

    <div class="container">

    

        
      <h3 class="title" style="margin-bottom: -14px;">ACARA

      </h3>
      <hr>
          <br />
<div class="row">

<?php

$sql = "select * from acara where publish='1' order by nomor_urut ASC limit 3 ";
$rows2 = mysql_query($sql);?>
<?php while ($rows = mysql_fetch_assoc($rows2)) {
    
if ($rows['image_title'] == "") {
  $src = "images/acara.jpg";
}else{
   
    $src = "http://cs.pilar.web.id/".$rows['image_title'];
}

     $isi = strip_tags(base64_decode($rows['deskripsi']));

      if (strlen($isi) > 250) {

          $stringCut = substr($isi, 0, 250);

          $isi = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
      }

    $tanggal = date('Y-m-d');
        $tanggalJam = str_replace('-','', $tanggal);
          $tanggalJams = str_replace('-','', $rows['tanggal']);
      if ($rows['status_pendaftaran'] == '2') {
        $status = 'NEXT';
        $warna = '#e2ca0f';
      }
      elseif ($tanggalJam > $tanggalJams) {
        $status = 'CLOSE';
         $warna = '#e20f32';
      }
      else{
        $status = 'OPEN';
        $warna = '#0fe22b';
      }


  ?>
<div class="col-md-4">
<div class="card card-blog">
                    <div class="card-image">
                      <a href="#pablo">
                         <span class="pull-right label label-rose rose" style="z-index:  12;position: absolute;font-size: 11px;padding:  1%;float:  right;color: white !important;padding-left: 2%;border-radius: 0px;background: #00000087;">
                      <?php echo $status; ?> <i class="material-icons" style="font-size:  11px; margin-top: -12%;color: <?php echo $warna; ?>;">fiber_manual_record</i>
                    </span>
                        <img class="img" src="<?php echo $src; ?>" style="border-top-left-radius: 0px;">
                      </a>
                    <div class="colored-shadow" style="background-image: url('<?php echo $src; ?>'); opacity: 1;"></div><div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 84.5px; top: 36px; background-color: rgba(0, 0, 0, 0.87); transform: scale(41.25);"></div></div></div>

                    <div class="card-content" style="min-height: 230px;">
                      <h4 class="card-title">
                        <a href="?page=viewAcara&id=<?php echo $rows['id'];?>&koordinat=<?php echo $rows['koordinat'];?>"><?php echo $rows['nama_acara']; ?></a>
                      </h4>
                      
                      <p class="card-description">
                             <?php echo $isi;
                 ?>
                      </p>

                    </div>
                  </div>

     






            </div>
            <?php }?>
          </div>
        </div>
      </div>



    </div>
    </div>