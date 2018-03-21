<!--
<?php

$id = @$_GET['id'];
$id_session = session_id();

$rows = mysql_fetch_array(mysql_query("SELECT * FROM produk where id='$id'"));

if(sqlNumRow(sqlQuery("select * from popular where id_item = '$id' and kategori = 'PRODUK' ")) == 0){
  $dataPopular = array(
                      'id_item' => $id,
                      'kategori' => "PRODUK",
                      'jumlah_viewer' => 1,
                    );
  sqlQuery(sqlInsert("popular",$dataPopular));
}else{
  if(sqlNumRow(sqlQuery("select * from ref_viewer where id_item = '$id' and kategori = 'PRODUK' and session_id = '$id_session'")) == 0){
      $dataViewer = array(
                  'id_item' => $id,
                  'kategori' => "PRODUK",
                  'session_id' => $id_session
      );
      sqlQuery(sqlInsert("ref_viewer",$dataViewer));
      sqlQuery("update popular set jumlah_viewer = jumlah_viewer + 1 where id_item = '$id' and kategori='PRODUK' ");
  }
}





  ?>

	<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?php echo $rows[image_title]; ?>');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<h1 class="title"><?php echo $rows['nama_produk']; ?></h1>
          <h4> <?php echo date("D M, Y", strtotime($rows['tanggal'])); ?></h4>
				</div>
			</div>
		</div>
	</div>

	<div class="main main-raised" style="margin-bottom: 5%;">
		<div class="container" style="padding-top: 45px;">
          <?php echo $rows['deskripsi']; ?>
    </div>
    </div>



 -->






<?php

$id = @$_GET['id'];
$id_session = session_id();

$rows = mysql_fetch_array(mysql_query("SELECT * FROM produk where id='$id' and status ='1'"));
    $array = json_decode($rows['screen_shot']) ;
  ?>
<style type="text/css">
.jssocials-shares * {
    box-sizing: border-box;
    color: white !important;
}
</style>

<div class="team-3">

    <div class="container">
 	  <h3 class="title"><?php echo $rows['nama_produk']; ?></h3>

    <div class="row">
    <div class="col-md-8">
            <div class="card-image" style="box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);border: 1px solid #3e3e3e;">
		<a href="#pablo">
			<img class="img img-raised" src="http://cs.pilar.web.id/<?php echo $rows['image_title']; ?>" style="width: 100%;height: 420px;">
		</a>
		<div class="ripple-container"></div>
	</div>
     </div>

<div class="col-md-4">
		<div class="card card-blog" style="margin-top: 10%;">

			<div class="card-content">
				<h6 class="category text-info">Share</h6>
				<h4 class="card-title">
					<a href="#">Jangan Lupa untuk Share Produk Kami</a>
				</h4>
				<p class="card-description">

                    <meta content='<?php echo $rows['nama_produk']; ?>' name='TITLE'>
           <meta content="http://cs.pilar.web.id/<?php echo $rows['image_title']; ?>" property="og:image">
           <meta property="og:description"   content="<?php echo base64_decode($rows['nama_produk']); ?>" >

					<div id="shareRoundIcons"></div>
				</p>

				                      <div class="footer">


                                    </div>

			</div>



		</div>

      <div class="row">
        <div class="col-md-12">
  <div class="author">
                  <button style="border-radius:  8px;font-size: 17px;font-weight:  bold;" class="btn btn-rose btn-raised btn-round btn-block" data-toggle="modal" data-target="#myModal<?php echo $rows['id']; ?>">
                 <i class="material-icons">camera_enhance</i>
                          ScreenShot
                      <div class="ripple-container"></div></button>
  </div>
     </div>
      </div>

      <div class="row">
        <div class="col-md-12">
           <div class="author">
                <a target="_blank" href="<?php echo $rows['link_demo']; ?>" class="btn btn-warning" style="width: 100%;border-radius: 7px;font-weight: bold;font-size: 16px;"><i class="material-icons">remove_red_eye</i> DEMO</a>                
           </div>
        </div>
      </div>
              

	</div>
    </div>
    <div class="container" style="padding-top: 3%;padding-bottom: 3%;">
      <h4 class="title">Deskripsi Produk : </h4>
<div class="row">

		<div class="col-md-12">

			<p class="description">
				<?php echo base64_decode($rows['deskripsi']); ?>
			</p>
		</div>

	</div>

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

  <div class="fb-comments" data-href="http://pilar.web.id/?page=produk&id=<?php echo $id; ?>" data-numposts="5"></div>


      </div>
                <br>
                
</div>
</div>
      </div>



  <script type="text/javascript">
$( document ).ready(function() {

	    $("#shareRoundIcons").jsSocials({
	  url: "http://pilar.web.id/?page=produk&id=<?php echo $id; ?>",
	    showLabel: false,
	    showCount: false,
	    shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest"]
	});

});



  </script>



 
<div class="modal fade" id="myModal<?php echo $rows['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width: 96%;">
        <div class="modal-content" >
           
            <div class="modal-body" style="padding:  1%;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons" style="background:  red;color: white;">clear</i>
                </button>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                                 <div class="card card-raised card-carousel" style='margin-bottom: 0px;'>
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <div class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                    <?php 

          for ($i = 0; $i < count($array); $i++) {
            if ($no =="") {
                 echo '<div class="item active">
                                 <img src="http://cs.pilar.web.id/'.$array[$i]->fileName.'" alt="Awesome Image" >
                                 <div class="carousel-caption" style="padding-bottom: 0%;">
                                     <h4 >'.$array[$i]->desc.' </h4>
                                 </div>
                             </div>';
            }else{
                   echo '<div class="item">
                                 <img src="http://cs.pilar.web.id/'.$array[$i]->fileName.'" alt="Awesome Image" >
                                 <div class="carousel-caption" style="padding-bottom: 0%;">
                                     <h4 >'.$array[$i]->desc.'</h4>
                                 </div>
                             </div>';
            }

            $no = "monyet";
           
?>
           
        
         <?php
         
            }
$no ="";
            ?>
                         
                                    </div>

                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                        <i class="material-icons">keyboard_arrow_left</i>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
  
            </div>
        </div>
    </div>
</div>

