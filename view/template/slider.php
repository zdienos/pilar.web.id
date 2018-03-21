<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
<style type="text/css">
  .panel .panel-heading a:hover, .panel .panel-heading a:active, .panel .panel-heading a[aria-expanded="true"] {
    color: #e0cf7b;
}
.panel .panel-heading a {
    color: white;
}
#particles-js {
  position: relative;
  width: 100%;
  height: 100%;
}
#wowslider-container1 a.ws_next {
    display: none;
}
#wowslider-container1 a.ws_prev {
    display: none;
}
canvas {
  display: block;
  vertical-align: bottom;
}
</style>

<?php

$general_setting = mysql_fetch_array(mysql_query("SELECT * FROM general_setting where id='8'"));
$general_settingT = mysql_fetch_array(mysql_query("SELECT * FROM general_setting where id='11'"));
$general_settingD = mysql_fetch_array(mysql_query("SELECT * FROM general_setting where id='12'"));
?>

<div class="team-3"  style="background: <?php echo $general_setting['option_value'] ; ?>; padding-bottom: 1%;">
  <div id="particles-js" style="position: absolute;height: 424px;margin-top: -4%;"></div>
  <div class="container" >
  
      <div class="row" >

        <div class="col-md-6">

  <div id="wowslider-container1">
  <div class="ws_images">
  
  <ul>

  <?php
    $no ="";
    $sliderQuery = mysql_query("SELECT * FROM slider where status='1'");
    
    while ($data = mysql_fetch_array($sliderQuery)) {
  ?>

    <li><img src="http://cs.pilar.web.id/<?php echo $data['gambar'];?>" alt="" title="" id="wows1_<?php echo $data['id'];?>"/></li>
  <?php
        
    }
   $no = "";
  ?>

  </ul>

  </div>
  
  </div>  


                  <!-- Wrapper for slides -->
            




                  <!-- Controls -->
       
 
        </div>

        <div class="col-md-6">

                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingOne">
                                  <span>
                                      <h3 class="panel-title" style="font-size: 21px;font-style:;color: #ffb612;">
                                      POPULAR
                                      </h3>
                                  </span>
                              </div>
                              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                <?php
                                $popular = mysql_query("SELECT * FROM popular order by jumlah_viewer DESC limit 2");
while ($dataPopular = mysql_fetch_array($popular)) {
if ($dataPopular['kategori'] == "ACARA") {
  $deskripsi = "SS ";
  $data = mysql_fetch_array(mysql_query("SELECT * FROM acara where id='".$dataPopular['id_item']."'"));

                                         $isi = strip_tags(base64_decode($data['deskripsi']));

                                        if (strlen($isi) > 250) {

                                            $stringCut = substr($isi, 0, 150);

                                            $isi = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                        }
                                        $deskripsi .= $isi;

$judul = $data['nama_acara'];
        $link = '<a href="?page=viewAcara&id='.$data['id'].'" style="border-radius:  3px;" class="label label-info">
                                    Baca Selengkapnya
                                </a>';
                                        
}elseif ($dataPopular['kategori'] == "INFORMASI") {
  $data = mysql_fetch_array(mysql_query("SELECT * FROM informasi where id='".$dataPopular['id_item']."'"));

                                           $isi = strip_tags(base64_decode($data['isi_informasi']));

                                        if (strlen($isi) > 250) {

                                            $stringCut = substr($isi, 0, 150);

                                            $isi = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                        }

                                        $judul = $data['judul'];
                                                $link = '<a href="?page=informasi&id='.$data['id'].'" style="border-radius:  3px;" class="label label-info">
                                    Baca Selengkapnya
                                </a>';
   $deskripsi = $isi;
}elseif ($dataPopular['kategori'] == "LOWONGAN KERJA") {
  $data = mysql_fetch_array(mysql_query("SELECT * FROM lowongan_kerja where id='".$dataPopular['id_item']."'"));

                                             $isi = strip_tags(base64_decode($data['deskripsi']));

                                        if (strlen($isi) > 250) {

                                            $stringCut = substr($isi, 0, 150);

                                            $isi = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                        }
                                         $deskripsi .= $isi;
                                          $judul = $data['judul'];
                                               $link = '<a href="?page=lowonganKerja&id='.$data['id'].'" style="border-radius:  3px;" class="label label-info">
                                    Baca Selengkapnya
                                </a>';
}else{
   $data = mysql_fetch_array(mysql_query("SELECT * FROM produk where id='".$dataPopular['id_item']."'"));

                                                $isi = strip_tags(base64_decode($data['deskripsi']));

                                        if (strlen($isi) > 250) {

                                            $stringCut = substr($isi, 0, 150);

                                            $isi = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                        }
                                           $deskripsi = $isi;
                                            $judul = $data['nama_produk'];
                                            $link = '<a href="?page=produk&id='.$data['id'].'" style="border-radius:  3px;" class="label label-info">
                                    Baca Selengkapnya
                                </a>';
}

                                ?>
                                 <span style="color: <?php echo $general_settingT['option_value']; ?>;border-bottom: 0.5px solid;"><b><?php echo $judul; ?></b></span>
                                <p  style="color: <?php echo $general_settingD['option_value']; ?>;">
                                  <?php echo $deskripsi; ?>
                                </p>

                                <?php echo $link; ?>

                                <br>
                                <br>
                               <?php } ?>
                                </div>
                              </div>
                            </div>
                            
                            

           </div>
                            </div>
                          
                        </div>



        </div>
<?php

$dataEffect = mysql_fetch_array(mysql_query("SELECT * FROM setting_slider "));

?>

  <script type="text/javascript" src="engine1/wowslider.js"></script>
  <script type="text/javascript" src="engine1/script.js"></script>

  <script type="text/javascript">
    jQuery("#wowslider-container1").wowSlider({effect:"<?php echo $dataEffect['effect']; ?>",prev:"",next:"",duration:<?php echo $dataEffect['duration']*100; ?>,delay:<?php echo $dataEffect['delay']*100; ?>,width:640,height:360,autoPlay:true,autoPlayVideo:false,playPause:true,stopOnHover:false,loop:false,bullets:1,caption:true,captionEffect:"parallax",controls:true,controlsThumb:false,responsive:1,fullScreen:false,gestures:2,onBeforeStep:0,images:0});
  </script>


<!-- 
  turn,shift,louvers,cube_over,tv,lines,bubbles,dribbles,glass_parallax,parallax,brick,collage,seven,kenburns,cube,blur,book,rotate,domino,slices,blast,blinds,basic,basic_linear,fade,fly,flip,page,stack,stack_vertical -->