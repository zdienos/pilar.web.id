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
</style>

<?php

$general_setting = mysql_fetch_array(mysql_query("SELECT * FROM general_setting where id='9'"));
?>

 <div class="team-3" style="background: <?php echo $general_setting['option_value']; ?>; padding-top: 0%;">

    <div class="container">
				
<div class="row" align="center">
<?php 
  $dataKontolEhKontak = mysql_fetch_array(mysql_query("SELECT * From kontak_web"));
 ?>
							<div class="col-md-8 col-md-offset-2" style="margin-bottom: -7%;">
                        <h2 class="title">Apa itu Pilar Wahana Artha?</h2>
                        <h5 class="description" style="color:#f5f5f5;"><?php echo $dataKontolEhKontak['tentang']; ?>.</h5>
                    </div>

    				<div class="col-md-4">
    					<div class="info">
    						<div class="icon icon-info">
    							<i class="material-icons">verified_user</i>
    						</div>
    						<h4 class="info-title">Program Akurat</h4>
    						<p style="color:#f5f5f5;">Dengan Team terbaik yang kami miliki, Membuat sebuah program bukan sebuah hal yang besar bagi kami.</p>
    					</div>
    				</div>

    				<div class="col-md-4">
    					<div class="info">
    						<div class="icon icon-success">
    							<i class="material-icons">bug_report</i>
    						</div>
    						<h4 class="info-title">100% Tidak ada Bugs</h4>
    						<p style="color:#f5f5f5;">Dengan Team terbaik yang kami miliki, Bahkan sebuah bugs tidak akan hadir di program kami, karna kami yakin bahwa hal yang menakutkan adalah Kematian.</p>
    					</div>
    				</div>

    				<div class="col-md-4">
    					<div class="info">
    						<div class="icon icon-rose">
    							<i class="material-icons">favorite</i>
    						</div>
    						<h4 class="info-title">Kepuasan Tersendiri</h4>
    						<p style="color:#f5f5f5;">Membuat Sebuah Program adalah kepuasan tersendiri bagi kami, Karena ketika kami melihat Pelangan Sangat puas  dengan kerja keras kami, Semua masalah yang kami hadapi Setelah Membuat program Hilang.</p>
    					</div>
    				</div>

                </div>

</div>
</div>