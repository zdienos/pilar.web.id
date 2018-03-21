<?php 
 $getId = @$_GET['id'];
$data = mysql_fetch_array(mysql_query("SELECT * from lowongan_kerja where id='$getId'"));

 if ($data['image_title'] == "") {
  $src = "images/lowonganKerja.jpg";
}else{
   
    $src = "http://cs.pilar.web.id/".$data['image_title'];
}

 ?>
    <style>
       .jssocials-shares * {
    box-sizing: border-box;
    color: white !important;
}
    </style>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('<?php echo $src; ?>');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
        <?php
         $getId = @$_GET['id'];
         if(sqlNumRow(sqlQuery("select * from popular where id_item = '$getId' and kategori = 'LOWONGAN KERJA' ")) == 0){
           $dataPopular = array(
                               'id_item' => $getId,
                               'kategori' => "LOWONGAN KERJA",
                               'jumlah_viewer' => 1,
                             );
           sqlQuery(sqlInsert("popular",$dataPopular));
         }else{
           if(sqlNumRow(sqlQuery("select * from ref_viewer where id_item = '$getId' and kategori = 'LOWONGAN KERJA' and session_id = '$id_session'")) == 0){
               $dataViewer = array(
                           'id_item' => $getId,
                           'kategori' => "LOWONGAN KERJA",
                           'session_id' => $id_session
               );
               sqlQuery(sqlInsert("ref_viewer",$dataViewer));
               sqlQuery("update popular set jumlah_viewer = jumlah_viewer + 1 where id_item = '$getId' and kategori='LOWONGAN KERJA' ");
           }
         }
          $data = mysql_fetch_array(mysql_query("SELECT * from lowongan_kerja where id='$getId'"));



              $isi = strip_tags(base64_decode($data['deskripsi']));

      if (strlen($isi) > 100) {

          $stringCut = substr($isi, 0, 100);

          $isi = substr($stringCut, 0, strrpos($stringCut, ' ')); 
      }

        ?>
          <h2 class="title"><?php echo $data['judul']; ?></h2>
          <h4> Tanggal  <?php echo date("d M, Y", strtotime($data['tanggal_buat'])); ?></h4>
          <br />

           <meta content='<?php echo $data['judul']; ?>' name='TITLE'/>
           <meta content="http://cs.pilar.web.id/<?php echo $data['image_title']; ?>" property="og:image"/>
           <meta property="og:description"   content="<?php echo  $isi; ?>" />

          Share : <div id="shareRoundIcons"></div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
$( document ).ready(function() {

      $("#shareRoundIcons").jsSocials({
    url: "http://pilar.web.id/index.php?page=lowonganKerja&id=<?php echo $getId; ?>",
      showLabel: false,
      showCount: false,
      shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest"]
  });

});



  </script>

          <?php
           $jenis_kelamin = "";
           if ($data['usia'] == "1") {
             $jenis_kelamin = "Laki-laki";
           }
           else if ($data['usia'] == "2") {
             $jenis_kelamin = "Perempuan";
           }
           else{
             $jenis_kelamin = "Laki-laki / Perempuan";
           }

           $usia = explode('-', $data['usia']);
           $gaji = explode('-', $data['salary']);
           $pengalaman = explode('-', $data['pengalaman']);

           $pendidikan = explode(';', $data['pendidikan']);


            for ($i=0; $i < sizeof($pendidikan); $i++) {

              $dataPendidikan =  mysql_fetch_array(mysql_query("SELECT * from ref_pendidikan where id='$pendidikan[$i]'"));
              $arrayPendidikan[] = $dataPendidikan['tingkat'];
            }
$dataKantor = mysql_fetch_array(mysql_query("SELECT * FROM kontak_web"));
$posisi = mysql_fetch_array(mysql_query("SELECT * FROM ref_posisi where id='$data[posisi]'"));
          ?>

  <div class="main main-raised" style="margin-bottom:  4%;">
    <div class="container">
            <div class="section section-text">
                <div class="row">
            <div class="col-md-8 col-md-offset-2">

<!--              <h4 class="title" style="text-align:right; color: #1cde86; font-size: 15px;">
              Gaji : Rp. <?php echo number_format($gaji[0], 2, ',', '.')." - Rp. ".number_format($gaji[1], 3, ',', '.');  ?> </h4> -->

              <p>
              <h5 class="title" ><?php echo $posisi['posisi']; ?></h5>
                <h3 class="title" style="margin-top: -13px;font-size: 15px;color: #125db3;margin-left: 15px;">Spesifikasi</h3>
            <blockquote style="padding-left: 0%;padding-top: 0%;padding-bottom: 0%;/*! margin-left: 2%; */margin-top: -3%;margin-left: 17px;">
              <h5 style="font-size: 16px;">
              <ul>
                <?php echo $data['spesifikasi']; ?>
              </ul>
              </h5>
            </blockquote>

            <br>
                <h3 class="title" style="margin-top: -13px;font-size: 15px;color: #125db3;margin-left: 15px;">Tingkat Pendidikan</h3>
            <blockquote style="padding-left: 0%;padding-top: 0%;padding-bottom: 0%;/*! margin-left: 2%; */margin-top: -3%;margin-left: 17px;">
              <h5 style="font-size: 16px;">
              <ul>
               <li> <?php echo join('/ ', $arrayPendidikan) ?></li>
              </ul>
              </h5>
            </blockquote>

      <h3 class="title" style="margin-top: -13px;font-size: 15px;color: #125db3;margin-left: 15px;">Jam Kerja</h3>
            <blockquote style="padding-left: 0%;padding-top: 0%;padding-bottom: 0%;/*! margin-left: 2%; */margin-top: -3%;margin-left: 17px;">
              <h5 style="font-size: 16px;">
              <ul>
               <li> <?php echo $data['jam_kerja']; ?></li>
              </ul>
              </h5>
            </blockquote>

            <br>
      <h3 class="title" style="margin-top: -13px;font-size: 15px;color: #125db3;margin-left: 15px;">Pengalaman</h3>
            <blockquote style="padding-left: 0%;padding-top: 0%;padding-bottom: 0%;/*! margin-left: 2%; */margin-top: -3%;margin-left: 17px;">
              <h5 style="font-size: 16px;">
              <ul>
               <li> <?php echo $pengalaman[0].' Sampai '.$pengalaman[1].' Tahun'; ?></li>
              </ul>
              </h5>
            </blockquote>
              <br>

                    <h3 class="title" style="margin-top: -13px;font-size: 15px;color: #125db3;margin-left: 15px;">Kebutuhan</h3>
            <blockquote style="padding-left: 0%;padding-top: 0%;padding-bottom: 0%;/*! margin-left: 2%; */margin-top: -3%;margin-left: 17px;">
              <h5 style="font-size: 16px;">
              <ul>
               <li> <?php echo $jenis_kelamin.' Usia '.$usia[0].' Sampai '.$usia[1].' Tahun'; ?></li>
              </ul>
              </h5>
            </blockquote>
              <br>

 




            <br /> <br />


          </div>






          <div class="col-md-8 col-md-offset-2">
            <h3 class="title">Deskripsi:</h3>
            <p>
              <?php echo base64_decode($data['deskripsi']); ?>
            </p>

            </div>

          <div class="col-md-8 col-md-offset-2">
          <br>
            <p>
              <a href="lamaran/lamaran.php?&id=<?php echo $getId; ?>" class="btn btn-rose">Kirim Lamaran</a>
            </p>
          <br>
                    <br>

          <div class="section section-comments">
     
                   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12&appId=472614983078608&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>  

  <div class="fb-comments" data-href="http://pilar.web.id/?page=lowonganKerja&id=<?php echo $id; ?>" data-numposts="5"></div>


      </div>
                <br>

            </div>

        </div>
      </div>


     <script type="text/javascript">
            $(document).ready(function() {
            $("#flexiselDemo1").flexisel({
              visibleItems: 4,
                itemsToScroll: 1,
                animationSpeed: 400,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint:480,
                            visibleItems: 3
                        },
                        landscape: {
                            changePoint:640,
                            visibleItems: 3
                        },
                        tablet: {
                            changePoint:768,
                            visibleItems: 3
                        }
                    }
                });
            });
   </script>




        </div>
    </div>
