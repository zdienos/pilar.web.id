
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../images/Logo/logoP.png">
	<link rel="icon" type="image/png" href="../images/Logo/logoP.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Pilar Wahana Artha</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="keywords" content="pilar wahana artha, pilar web id, pt pilar wahana artha, wahana artha, atisisbada, atisisbada jawabarat, atisisbada garut, atisisbada serang, atisisbada kabupaten bandung, atisisbada jawabarat, pilar bandung=, pilar indonesia, pilar web, pilar company, pilar company website, pilar about, pilar home">
  <meta name="description" content="pt pilar adalah perusahaan yang bergerak di bidang IT ,dan berlokasi di Bandung, Jawa Barat.">
    <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="PT| PILAR WAHANA ARTHA">
  <meta name="description" content="pt pilar adalah perusahaan yang bergerak di bidang IT ,dan berlokasi di Bandung, Jawa Barat.">
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />
</head>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="../ajax/lamaran.js" type="text/javascript"></script>

<body>
	<div class="image-container set-full-height" style="background-image: url('assets/img/wizard-profile.jpg')">
	    <!--   Creative Tim Branding   -->


		<!--  Made With Material Kit  -->
		<a href="http://pilar.web.id/" class="made-with-mk">
			<div class="brand"><i class="material-icons">home</i></div>
			<div class="made-with"><strong>KEMBALI</strong></div>
		</a>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="blue" id="wizardProfile">
		                    <form action="" method="">
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
<?php
  include '../config/config.php';
  $getId = @$_GET['id'];
  $data = mysql_fetch_array(mysql_query("SELECT * from lowongan_kerja where id='$getId'"));

?>
		                    	<div class="wizard-header">
		                        	<h4 class="wizard-title">
		                        	   <?php echo $data['judul']; ?>
		                        	</h4>
									<h5>Lengkapi Form dibawah ini  dengan Benar.</h5>
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#about" data-toggle="tab">Data Pribadi</a></li>
			                            <li><a href="#address" data-toggle="tab">Selengkapnya</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="about">
		                              <div class="row">
		                                	<h4 class="info-text"> Isi Data Dengan Benar</h4>
		                                	<div class="col-sm-4 col-sm-offset-1">
		                                    	<div class="picture-container">
		                                        	<div class="picture">
                                        				<img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
		                                            	<input type="file" id="wizard-picture">
		                                        	</div>
		                                        	<h6>Pilih Gambar</h6>
		                                    	</div>
		                                	</div>
		                                	<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
													<div class="form-group label-floating">
			                                          <label class="control-label">First Name <small>(required)</small></label>
			                                          <input name="firstname" id='namaDepan' type="text" class="form-control">
			                                          <input name="id" id='id' type="hidden"
			                                          value="<?php echo $_GET['id'] ?>" class="form-control">
			                                        </div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
													<div class="form-group label-floating">
													  <label class="control-label">Last Name <small>(required)</small></label>
													  <input name="lastname" id="namaBelakang" type="text" class="form-control">
													</div>
												</div>
		                                	</div>
		                                	<div class="col-sm-10 col-sm-offset-1">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Email <small>(required)</small></label>
			                                            <input name="email" id='email' type="email" class="form-control">
			                                        </div>
												</div>
		                                	</div>
		                            	</div>
		                            </div>

		                            <div class="tab-pane" id="address">
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <h4 class="info-text"> Isi Data Diri Anda? </h4>
		                                    </div>
		                                    <div class="col-sm-4 col-sm-offset-1">
	                                        	<div class="form-group label-floating">
	                                        		<label class="control-label">Nomer Telepon</label>
	                                    			<input type="text" id="nomer" class="form-control">
	                                        	</div>
		                                    </div>
																			<div class="col-sm-6">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Pendidikan Akhir</label>
	                                            	<select id="pendidikan" name="country" class="form-control">
																										<option disabled="" selected=""></option>
<?php

$pendidikan= $data['pendidikan'];

$explodePendidikan = explode(';', $pendidikan);
foreach($explodePendidikan as $hasilPendidikan)
{

	$dataPendidikan =mysql_fetch_array(mysql_query("SELECT * From ref_pendidikan where id='$hasilPendidikan'"));
?>
  																				<option value="<?php echo $dataPendidikan['id']; ?>"> <?php echo $dataPendidikan['tingkat']; ?> </option>
<?php

}
?>

	                                            	</select>
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-10 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Alamat</label>
		                                            <input id="alamat" type="text" class="form-control">
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-10 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Tentang Anda</label>
		                                            <textarea id="tentang" class="form-control" rows="5"></textarea>
		                                        </div>
		                                    </div>

<div class="col-sm-10 col-sm-offset-1">
<div class="form-group form-file-upload is-fileinput">
								<input type="file" onchange="imageChanged();" id="inputFile2" multiple="">
								<div class="input-group">
									<input type="text" id="cvs" readonly="" class="form-control" placeholder="Upload CV">
									<span class="input-group-btn input-group-s">
										<button type="button" class="btn btn-just-icon btn-round btn-primary">
											<i class="material-icons">attach_file</i>
										</button>
									</span>
								</div>
							<span class="material-input"></span></div>
	<input type="hidden" id='cv' >

</div>

		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
		                                <input type='button' onclick="Lamaran()"  class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div><!-- end row -->
	    </div> <!--  big container -->


	</div>

</body>
	<!--   Core JS Files   -->
    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>

</html>
