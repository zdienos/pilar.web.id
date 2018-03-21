



<?php

$general_setting = mysql_fetch_array(mysql_query("SELECT * FROM general_setting where id='5'"));
?>

<div class="team-3" style="padding-top: 1%; background: <?php echo $general_setting['option_value']; ?>;">

    <div class="container">

    

        
      <h3 class="title" style="margin-bottom: -14px;">PRODUK
      <span style="float: right;">
         <a data-toggle="tooltip" data-placement="left" data-original-title="Lihat Selanjutnya" href="?page=produks" style="font-size:  15px;color: #3c4858;text-decoration: none;" ><i class="material-icons">queue_play_next</i></a>
      </span>

      </h3>
      <hr style="border: 1px solid #56606d;">
          <br />
<div class="row">

<?php

$sql = "SELECT * from produk where status='1' order by nomor_urut ASC limit 3";
$rows2 = mysql_query($sql);?>
<?php while ($rows = mysql_fetch_assoc($rows2)) {
    $src = "images/acara.jpg";


     $isi = strip_tags(base64_decode($rows['deskripsi']));

      if (strlen($isi) > 100) {

          $stringCut = substr($isi, 0, 200);

          $isi = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
      }

  ?>
<div class="col-md-4">
<div class="card card-blog">
                    <div class="card-image">
                      <a href="#pablo">
                        <img class="img" src="http://cs.pilar.web.id/<?php echo $rows['image_title']; ?>">
                      </a>
                    <div class="colored-shadow" style="background-image: url('http://cs.pilar.web.id/<?php echo $rows['image_title']; ?>'); opacity: 1;"></div><div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 84.5px; top: 36px; background-color: rgba(0, 0, 0, 0.87); transform: scale(41.25);"></div></div></div>

                    <div class="card-content" style="height: 220px;">

                      <h4 class="card-title">
                        <a href="?page=produk&id=<?php echo$rows['id'];?>"><?php echo $rows['nama_produk']; ?></a>
                      </h4>
                      <p class="card-description">
                             <?php echo $isi;
                 ?>
                      </p>
                      <div class="footer">
                                        <div class="author">
                                            <a href="#">
                                               
                                               <span></span>
                                            </a>
                                        </div>
                                    </div>
                    </div>
                  </div>

     






            </div>
            <?php }?>
          </div>
        </div>
      </div>



    </div>
    </div>