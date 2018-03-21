
    <style>
       #map {
        height: 400px;
        width: 100%;
       }

       .jssocials-shares * {
    box-sizing: border-box;
    color: white !important;
}
    </style>
<div class="section-space" style="height: 45px;"> </div>
    <div id="map"></div>
    <?php
        $id = $_GET['id'];

        if(sqlNumRow(sqlQuery("select * from popular where id_item = '$id' and kategori = 'ACARA' ")) == 0){
          $dataPopular = array(
                              'id_item' => $id,
                              'kategori' => "ACARA",
                              'jumlah_viewer' => 1,
                            );
          sqlQuery(sqlInsert("popular",$dataPopular));
        }else{
          if(sqlNumRow(sqlQuery("select * from ref_viewer where id_item = '$id' and kategori = 'ACARA' and session_id = '$id_session'")) == 0){
              $dataViewer = array(
                          'id_item' => $id,
                          'kategori' => "ACARA",
                          'session_id' => $id_session
              );
              sqlQuery(sqlInsert("ref_viewer",$dataViewer));
              sqlQuery("update popular set jumlah_viewer = jumlah_viewer + 1 where id_item = '$id' and kategori='ACARA' ");
          }
        }
        $data = mysql_fetch_array(mysql_query("SELECT * FROM acara where id='$id'"));

              $tanggal =  date('Y-m-d');
      $jam = date('H:i');

      $tanggalJam = str_replace('-','', $tanggal);
          $tanggalJams = str_replace('-','', $data['tanggal']);
      if ($tanggalJam > $tanggalJams) {
        $url = '';
      }else{
       $getId  = $_GET['id'];
        
        if ($_SESSION['username'] == "" && $data['status_pendaftaran'] == '2') {
        $HrefDaftar = '';
        $HrefKonfirmasi = '';
        $HrefUndangan = '';
        }
        elseif ($_SESSION['username'] == "" && $data['status_pendaftaran'] == '1') {
          $urlDaftar = "member/login.php?id=$getId&kategori=daftar";
          $urlKonfirmasi = "member/login.php?id=$getId&kategori=konfirmasi";
          $getFileAcara = mysql_fetch_array(mysql_query("select * from acara where id = '$getId'"));
          $fileUndangan = "http://cs.pilar.web.id/".$getFileAcara['undangan'];


           $HrefDaftar = '<a href="'.$urlDaftar.'" class="btn btn-rose">Daftar</a>';
        $HrefKonfirmasi = '';
        $HrefUndangan = '';

        }
        else{
            $urlDaftar = "member/index.php?page=daftarAcara&id=$getId";
          $urlKonfirmasi = "member/index.php?page=daftarAcara&id=$getId";
          $getFileAcara = mysql_fetch_array(mysql_query("select * from acara where id = '$getId'"));
          $fileUndangan = "http://cs.pilar.web.id/".$getFileAcara['undangan'];

        $HrefDaftar = '<a href="'.$urlDaftar.'" class="btn btn-rose">Daftar</a>';
        $HrefKonfirmasi = '<a href="'.$urlKonfirmasi.'" class="btn btn-info">Konfirmasi</a>';
        $HrefUndangan = '<a href="'.$fileUndangan.'" class="btn btn-warning" download>Download Undangan</a>';
        }
       
      }



              $isi = strip_tags(base64_decode($data['deskripsi']));

      if (strlen($isi) > 100) {

          $stringCut = substr($isi, 0, 100);

          $isi = substr($stringCut, 0, strrpos($stringCut, ' ')); 
      }

    ?>
    <div class="main main-raised">
    <div class="contact-content">
        <div class="container" style="padding-bottom: 6%;margin-bottom: 4%;">

        <div class="row">
           <div class="col-md-12">
           <h2 class="title"><?php echo $data['nama_acara']; ?></h2>
            <?php echo date("d M, Y", strtotime($data['tanggal'])); ?> | <?php echo $data['jam']; ?><br><br>
            Share : <div id="shareRoundIcons"></div>
           <meta content='<?php echo $data['nama_acara']; ?>' name='TITLE'/>
           <meta content="<?php echo "http://cs.pilar.web.id/".$data['image_title']; ?>" property="og:image"/>

           <meta property="og:description"   content="<?php echo $isi; ?>" />
          
             <p class="description"><h4><?php echo base64_decode($data['deskripsi']); ?></h4><br><br>
            </p>
           </div>
              <?php echo $HrefDaftar; ?>
              <?php echo $HrefKonfirmasi; ?>
              <?php echo $HrefUndangan; ?>
           </div>


   <br>
                    <br>
    <?php
$koordinat = $_GET['koordinat'];
$explodeKoordinat = explode(',',$koordinat);
$lat = $explodeKoordinat[0];
$lng = $explodeKoordinat[1];
    ?>
          <div class="section section-comments">
     
                   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12&appId=472614983078608&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>  

  <div class="fb-comments" data-href="http://pilar.web.id/?page=viewAcara&id=5&koordinat=<?php echo $lat; ?>,<?php echo $lng; ?>" data-numposts="5"></div>


      </div>
                <br>
            </div>
    </div>
    </div>

    <script>
       function initMap() {
        var uluru = {lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }

    </script>
  <script type="text/javascript">
$( document ).ready(function() {

      $("#shareRoundIcons").jsSocials({
    url: "http://pilar.web.id/index.php?page=viewAcara&id=<?php echo $id; ?>&koordinat=<?php echo $lat; ?>,<?php echo $lng; ?>",
      showLabel: false,
      showCount: false,
      shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest"]
  });

});



  </script>


       

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWzO08UA98rIkVoMPtWNqPx_DmgSq9Dhg&callback=initMap">
    </script>
