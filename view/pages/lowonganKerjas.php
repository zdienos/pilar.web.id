
<div class="team-3" style="padding-top: 6%;">

    <div class="container">

    

        
      <h3 class="title" style="margin-bottom: -14px;" >Lowongan Kerja

      </h3>
      

            <hr>
          <br />
<div class="row">

<?php

$sql = "select * from lowongan_kerja where publish='1'";
$rows2 = mysql_query($sql);?>
<?php while ($rows = mysql_fetch_assoc($rows2)) {
  
  if ($rows['posisi'] == 1) {
    $warna = "success";
  }elseif ($rows['posisi'] == 2) {
    $warna = "warning";
  }elseif ($rows['posisi'] == 3) {
    $warna = "rose";
  }elseif ($rows['posisi'] == 4) {
    $warna = "danger";
  }else{
    $warna = "info";
  }

  $dataPosisi = mysql_fetch_array(mysql_query("select * from ref_posisi where id='$rows[posisi]'"));

  $explode = explode('-', $rows['salary']);
    $src = "images/lowonganKerja.jpg";

if ($rows['image_title'] == "") {
  $src = "images/lowonganKerja.jpg";
}else{
   
    $src = "http://cs.pilar.web.id/".$rows['image_title'];
}

     $isi = strip_tags(base64_decode($rows['deskripsi']));

      if (strlen($isi) > 250) {

          $stringCut = substr($isi, 0, 250);

          $isi = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
      }

  ?>
<div class="col-md-4">
<div class="card card-blog">
                    <div class="card-image">
                      <a href="#pablo">
                        <img class="img" src="<?php echo  $src; ?>">
                      </a>
                    <div class="colored-shadow" style="background-image: url('<?php echo  $src; ?>'); opacity: 1;"></div><div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 84.5px; top: 36px; background-color: rgba(0, 0, 0, 0.87); transform: scale(41.25);"></div></div></div>

                    <div class="card-content" style="height: 277px; max-height: 277px;">
                      <h6 class="category text-<?php echo $warna; ?>"><?php echo $dataPosisi['posisi'];?></h6>

                      <h4 class="card-title">
                        <a href="?page=lowonganKerja&id=<?php echo $rows['id'];?>"><?php echo $rows['judul']; ?></a>
                      </h4>
                      <p class="card-description" style="min-height: 140px; min-height: 140px;">
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