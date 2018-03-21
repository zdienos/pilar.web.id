<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<style type="text/css">
	.card-avatar, .card-testimonial .card-avatar {
    max-width: 130px;
    max-height: 130px;
    margin: -50px auto 0;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}

.modal-content {
    box-shadow: none !important;
    border-radius: 6px;
    border: none;
    background: #f5deb300;
}

</style>
 <div class="team-3">

    <div class="container">
				
<div class="row" align="center">
<?php 
  $dataKontolEhKontak = mysql_fetch_array(mysql_query("SELECT * From kontak_web"));
 ?>
							<div class="col-md-8 col-md-offset-2">
                        <h2 class="title">Apa itu Pilar Wahana Artha?</h2>
                        <h5 class="description"><?php echo $dataKontolEhKontak['tentang']; ?>.</h5>
                    </div>

    				<div class="col-md-4" style="margin-top: -5%;">
    					<div class="info">
    						<div class="icon icon-info">
    							<i class="material-icons">verified_user</i>
    						</div>
    						<h4 class="info-title">Program Akurat</h4>
    						<p>Dengan Team terbaik yang kami miliki, Membuat sebuah program bukan sebuah hal yang besar bagi kami.</p>
    					</div>
    				</div>

    				<div class="col-md-4" style="margin-top: -5%;">
    					<div class="info">
    						<div class="icon icon-success">
    							<i class="material-icons">bug_report</i>
    						</div>
    						<h4 class="info-title">100% Tidak ada Bugs</h4>
    						<p>Dengan Team terbaik yang kami miliki, Bahkan sebuah bugs tidak akan hadir di program kami, karna kami yakin bahwa hal yang menakutkan adalah Kematian.</p>
    					</div>
    				</div>

    				<div class="col-md-4" style="margin-top: -5%;">
    					<div class="info">
    						<div class="icon icon-rose">
    							<i class="material-icons">favorite</i>
    						</div>
    						<h4 class="info-title">Kepuasan Tersendiri</h4>
    						<p>Membuat Sebuah Program adalah kepuasan tersendiri bagi kami, Karena ketika kami melihat Pelangan Sangat puas  dengan kerja keras kami, Semua masalah yang kami hadapi Setelah Membuat program Hilang.</p>
    					</div>
    				</div>

                </div>

<br>
<br>
				    <h3 class="title">Team Kami</h3>
				    <hr>
          <h5 class="description">Kami Tau Bahwa Disetiap Kerja Keras kami, pasti ada sebuah Team didalam nya,  berikut ini adalah team Terbaik yang kami miliki.</h5>


<?php 
  $query = mysql_query("SELECT * From team where publish='1' order by nomor_urut");

  while ($data = mysql_fetch_array($query)) {
  
  $posisi = mysql_fetch_array(mysql_query("SELECT * FROM ref_posisi where id='$data[posisi]'"));
  $warna = "";

  if ($data['posisi'] == 4 || $data['posisi'] == 10) {
  	$warna = "info";
  	$warnas = "linear-gradient(60deg, #26c6da, #0097a7)";
  }elseif ($data['posisi'] == 2) {
  	$warnas = "linear-gradient(60deg, #57ac5b, #398f3d)";
  	$warna = "success";
  }elseif ($data['posisi'] == 5) {
  	$warnas = "linear-gradient(60deg, #ffa726, #f57c00)";
  	$warna = "warning";
  }elseif ($data['posisi'] == 7) {
  	$warnas = "linear-gradient(60deg, #ef5350, #d32f2f)";
  	$warna = "danger";
  }elseif ($data['posisi'] == 9) {
  	$warnas = "linear-gradient(60deg, #ec407a, #c2185b)";
  	$warna = "rose";
  }else{
$warnas = "linear-gradient(60deg, #ab47bc, #7b1fa2)";
  	$warna = "primary";
  }

  if ($data['foto'] == "") {
    $foto = "http://pilar.web.id/member/img/avatar.png";
  }else{
    $foto = "http://cs.pilar.web.id/".$data['foto'];
  }
 ?>


				<div class="col-md-6 col-lg-4">

<div class="card card-profile" style="text-align: center; background: <?php echo $warnas; ?>;">
						<div class="card-avatar">
							<a href="#pablo">
								<img class="img" src="<?php echo $foto; ?>"  data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>">
							</a>
						</div>

						<div class="card-content content-<?php echo $warna; ?>">
							<h4 class="card-title"><?php echo $data['nama']; ?></h4>
							<h6 class="category text-muted"><?php echo $posisi['posisi']; ?></h6>

							<p class="card-description" style="min-height: 96px;">
							
								Email : <?php echo $data['email']; ?>

								<br>
								 <?php echo base64_decode($data['tentang']); ?>
							</p>
<?php

                        $array = array();
                        $sql = mysql_query("SELECT * FROM team where id = '".$data['id']."'");
                        $row = mysql_fetch_array($sql);

                        $array = json_decode($row['sosial_media']) ;
                             

                      ?>

							<div class="footer">
<a target="_blank" href="https://<?php echo $array->google; ?>" class="btn btn-just-icon btn-round btn-google">
														<i class="fa fa-google"></i>
													</a>
													<a target="_blank" href="http://twitter.com/<?php echo $array->twiter; ?>" class="btn btn-just-icon btn-round btn-twitter">
														<i class="fa fa-twitter"></i>
													</a>
													<a target="_blank" href="http://instagram.com/<?php echo $array->instagram; ?>" class="btn btn-just-icon btn-round btn-google" style="background-color: #c1183f;">
														<i class="fa fa-instagram"></i>
													</a>
													<a target="_blank" href="http://linkedin.com/<?php echo $array->linkedin; ?>" class="btn btn-just-icon btn-round btn-linkedin">
														<i class="fa fa-linkedin"></i>
													</a>
													<a target="_blank" href="http://facebook.com/<?php echo $array->facebook; ?>" class="btn btn-just-icon btn-round btn-facebook">
														<i class="fa fa-facebook"></i>
													</a>
							</div>
						</div>
					</div>
							<!-- 	<div class="rotating-card-container manual-flip" style="height: 341px;margin-bottom: 30px;margin-top: 16%;">

									<div class="card card-rotate">

										<div class="front" style="height: 359px;width: 360px;background-color: #a5dfe4;">
											<div class="card-content content-<?php echo $warna; ?>">

										<div class="card-avatar">
	    								<a href="#">
	    									<img class="img" src="<?php echo $data['foto']; ?>">
	    								</a>
	    							</div>

												<h4 class="card-title" align="center">
													<a href="#"><?php echo $data['nama']; ?></a>

												</h4>
												<span style="text-align: center;"><?php echo $posisi['posisi']; ?></span>
												<br>
												<p class="card-description">
													<?php echo $data['tentang']; ?>
												</p>
												<div class="footer text-center">
													<button type="button" name="button" class="btn btn-success btn-fill btn-round btn-rotate">
														<i class="material-icons">refresh</i> Selengkapnya
													<div class="ripple-container"></div></button>
												</div>
											</div>
										</div>

										<div class="back" style="height: 328px; width: 360px;">
											<div class="card-content">
												<br>
												<h5 class="card-title">
													Lahir <?php echo $data['tempat_lahir']; ?> - Tanggal <?php echo date('d, M Y', strtotime($data['tanggal_lahir'])); ?> 
												</h5>
												<p class="card-description">
													Alamat : <?php echo $data['alamat']; ?> 
												</p>

<?php

                        $array = array();
                        $sql = mysql_query("SELECT * FROM team");
                        $row = mysql_fetch_array($sql);

                        $array = json_decode($row['sosial_media']) ;
                             

                      ?>

												<div  class="footer text-center">
													<a target="_blank" href="https://<?php echo $array->google; ?>" class="btn btn-just-icon btn-round btn-google">
														<i class="fa fa-google"></i>
													</a>
													<a target="_blank" href="https://<?php echo $array->twiter; ?>" class="btn btn-just-icon btn-round btn-twitter">
														<i class="fa fa-twitter"></i>
													</a>
													<a target="_blank" href="https://<?php echo $array->instagram; ?>" class="btn btn-just-icon btn-round btn-google" style="background-color: #c1183f;">
														<i class="fa fa-instagram"></i>
													</a>
													<a target="_blank" href="https://<?php echo $array->linkedin; ?>" class="btn btn-just-icon btn-round btn-linkedin">
														<i class="fa fa-linkedin"></i>
													</a>
													<a target="_blank" href="https://<?php echo $array->facebook; ?>" class="btn btn-just-icon btn-round btn-facebook">
														<i class="fa fa-facebook"></i>
													</a>
												</div>
												<br>
												<button type="button" name="button" class="btn btn-simple btn-round btn-rotate">
													<i class="material-icons">refresh</i> Kembali
												<div class="ripple-container"></div></button>

											</div>
										</div>

									</div>
								</div> -->
							</div>


  <div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-12  modal fade" id="myModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width: 100%;">
        <div class="modal-content">
        
            <div class="modal-body">
            <div class="row">
                <div class="col-md-12 col-sm-12  col-lg-6">
                	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons" style="background: #ff1b1b;color: white;">clear</i>
                </button>
                                 <div class="card card-raised card-carousel">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <div class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">

                                    <div class="item active">
                                 <img src="<?php echo $foto; ?>" alt="Awesome Image" >
                                 <div class="carousel-caption" style="padding-bottom: 0%;">
                                     <h4 ></h4>
                                 </div>
                             </div>




                                    </div>

                                    <!-- Controls -->
                                
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>


<?php
  }
?>


			</div>

   </div>
 </div>





