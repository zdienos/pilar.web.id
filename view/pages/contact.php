
<script src="ajax/kontak.js" type="text/javascript"></script>

  <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
<div class="section-space"></div>
    <div id="map"></div>


<div class="main main-raised">
		<div class="contact-content" style="margin-bottom: 4%;">
    		<div class="container">
            	<h2 class="title">Kirim Pesan, Ke Kontak Kami</h2>
				<div class="row" style="padding-bottom:6%;">
					<div class="col-md-6">
						<p class="description">Tinggalkan Pesan anda di kolom kontak kami,Terimakasih.<br><br>
						</p>

							<div class="form-group label-floating is-empty">
								<label class="control-label">Nama Lengkap</label>
								<input type="text" id="nama" name="nama" class="form-control">
							<span class="material-input"></span></div>
							<div class="form-group label-floating is-empty">
								<label class="control-label">Alamat Email</label>
								<input type="email" id="email" name="email" class="form-control">
							<span class="material-input"></span></div>
							<div class="form-group label-floating is-empty">
								<label class="control-label">No. Telpn</label>
								<input type="text" id="phone" name="phone" class="form-control">
							<span class="material-input"></span></div>
							<div class="form-group label-floating is-empty">
								<label class="control-label">Tulis Pesan</label>
								<textarea name="pesan" class="form-control" id="pesan" rows="6"></textarea>
							<span class="material-input"></span></div>
							<div class="submit text-center">
								<input id="submit" onclick="Kontak()" type="button" class="btn btn-social btn-fill btn-linkedin" value="Kirim Sekarang">
							</div>

					</div>
                	<div class="col-md-4 col-md-offset-2">
    		        	<div class="info info-horizontal">
    						<div class="icon icon-danger">
    							<i class="material-icons">pin_drop</i>
    						</div>
    						<div class="description">
    							<h4 class="info-title">Alamat Perusahan Kami</h4>
    							<p> Jl. Junaedi No.6, Sukamaju,<br>
                                     Cibeunying Kidul, Kota Bandung,<br>
                                     Jawa Barat 40121
    							</p>
    						</div>
    		        	</div>

                <?php
                  $dataKontak =mysql_fetch_array(mysql_query("SELECT * FROM kontak_web"));
                ?>
                        <div class="info info-horizontal" style="margin-top: -17%;">
    						<div class="icon icon-info">
    							<i class="material-icons">phone</i>
    						</div>
    						<div class="description">
    							<h4 class="info-title">Kontak Kami/ Media Sosial</h4>
    							<p> <?php echo $dataKontak['nama_perusahaan']; ?><br>
                                   <?php echo $dataKontak['telepon']." - ".$dataKontak['email']; ?><br>
                      <?php

                        $array = array();
                        $sql = mysql_query("SELECT * FROM kontak_web");
                        $row = mysql_fetch_array($sql);

                        $array = json_decode($row['media_sosial']) ;
                             

                      ?>
                      <div class="row">

                        <div class="col-md-2">
                        <a target="_blank" href="<?php  echo $array->facebook; ?>" class="btn btn-just-icon btn-round btn-facebook">
                            <i class="fa fa-facebook"> </i>
                        <div class="ripple-container"></div>
                        </a>
                         
                        </div>
                        
                        <div class="col-md-2">

                        <a target="_blank" href="<?php  echo $array->twiter; ?>" class="btn btn-just-icon btn-round btn-twitter">
                            <i class="fa fa-twitter"> </i>
                        <div class="ripple-container"></div>
                        </a>

                        </div>

                        <div class="col-md-2">
                        <a target="_blank" href=" <?php  echo $array->instagram; ?>" class="btn btn-just-icon btn-round btn-google" style="background-color: #ce435c;">
                            <i class="fa fa-instagram"> </i>
                        <div class="ripple-container"></div>
                        </a>
                         
                        </div>

                        <div class="col-md-2">
                        <a target="_blank" href="<?php  echo $array->gmail; ?>" class="btn btn-just-icon btn-round btn-google">
                            <i class="fa fa-google"> </i>
                        <div class="ripple-container"></div>
                        </a>
                         
                        </div>

                      </div>
    							</p>
    						</div>
    		        	</div>
				    </div>
               </div>
            </div>
		</div>
    </div>

        <script>
       function initMap() {
        var uluru = {lat: -6.907590999900138, lng: 107.6354706287384};
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

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWzO08UA98rIkVoMPtWNqPx_DmgSq9Dhg&callback=initMap">
    </script>