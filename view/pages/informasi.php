
<?php

$id = @$_GET['id'];
$id_session = session_id();

$rows = mysql_fetch_array(mysql_query("SELECT * FROM informasi where id='$id'"));

$pembaca = mysql_num_rows(mysql_query("SELECT * FROM pembaca_informasi where id_informasi='$id' And session_id='$id_session'"));
if ($pembaca == 0) {
  mysql_query("UPDATE informasi set jumlah_baca='$rows[jumlah_baca]'+1 where id='$id'");
  mysql_query("INSERT into pembaca_informasi values('','$id','$id_session')");
}
if(sqlNumRow(sqlQuery("select * from popular where id_item = '$id' and kategori = 'INFORMASI' ")) == 0){
  $dataPopular = array(
                      'id_item' => $id,
                      'kategori' => "INFORMASI",
                      'jumlah_viewer' => 1,
                    );
  sqlQuery(sqlInsert("popular",$dataPopular));
}else{
  if(sqlNumRow(sqlQuery("select * from ref_viewer where id_item = '$id' and kategori = 'INFORMASI' and session_id = '$id_session'")) == 0){
      $dataViewer = array(
                  'id_item' => $id,
                  'kategori' => "INFORMASI",
                  'session_id' => $id_session
      );
      sqlQuery(sqlInsert("ref_viewer",$dataViewer));
      sqlQuery("update popular set jumlah_viewer = jumlah_viewer + 1 where id_item = '$id' and kategori='INFORMASI' ");
  }
}

    $src = "images/default.jpg";
    $string = html_entity_decode(base64_decode($rows['isi_informasi']));
    if( strpos( $string, 'img' ) !== false ) {
       $doc = new DOMDocument();
       libxml_use_internal_errors(true);
       $doc->loadHTML( $string );
       $xpath = new DOMXPath($doc);
       $imgs = $xpath->query("//img");
       $img = $imgs->item(0);
       $src = $img->getAttribute("src");
     }


        $isi = strip_tags(base64_decode($rows['isi_informasi']));

      if (strlen($isi) > 100) {

          $stringCut = substr($isi, 0, 100);

          $isi = substr($stringCut, 0, strrpos($stringCut, ' ')); 
      }

$penulis = mysql_fetch_array(mysql_query("SELECT * FROM users where id='$rows[penulis]'"));
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
					<h1 class="title"><?php echo $rows['judul']; ?></h1>
          <h4> <?php echo $penulis['nama'] ?> |  <?php echo date("D M, Y", strtotime($rows['tanggal_create'])); ?></h4>

            <meta content='<?php echo $rows['judul']; ?>' name='TITLE'/>
           <meta content="<?php echo $src; ?>" property="og:image"/>
           <meta property="og:description"   content="<?php echo  $isi; ?>" />
          Share : <div id="shareRoundIcons"></div>
				</div>
			</div>
		</div>
	</div>
  <script type="text/javascript">
$( document ).ready(function() {

      $("#shareRoundIcons").jsSocials({
    url: "http://pilar.web.id/index.php?page=informasi&id=<?php echo $id; ?>",
      showLabel: false,
      showCount: false,
      shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest"]
  });

});



  </script>
	<div class="main main-raised" style="margin-bottom: 5%;">
		<div class="container" style="padding-top: 45px;">
          <?php echo base64_decode($rows['isi_informasi']); ?>


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

  <div class="fb-comments" data-href="http://pilar.web.id/?page=informasi&id=<?php echo $id; ?>" data-numposts="5"></div>


      </div>
                <br>
    </div>
    </div>
