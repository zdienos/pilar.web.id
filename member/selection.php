<?php
include 'config/config.php';
session_start();
$getId  = $_GET['id'];
if ($_SESSION['username'] == "") {
	$urlDaftar = "login.php?id=$getId&kategori=daftar";
	$urlKonfirmasi = "login.php?id=$getId&kategori=konfirmasi";
	$getFileAcara = mysql_fetch_array(mysql_query("select * from acara where id = '$getId'"));
	$fileUndangan = "http://".$getFileAcara['undangan'];
}else{
  	$urlDaftar = "index.php?page=daftarAcara&id=$getId";
	$urlKonfirmasi = "index.php?page=daftarAcara&id=$getId";
	$getFileAcara = mysql_fetch_array(mysql_query("select * from acara where id = '$getId'"));
	$fileUndangan = "http://cs.pilar.web.id/".$getFileAcara['undangan'];
}
?>
<!DOCTYPE html>
<html>


<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Member | Pilar Wahana Artha</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
<script src="../../../../cdn-cgi/apps/head/vAzQ3pO_LVF9Y_-CSxLP87NslSA.js"></script><link rel="apple-touch-icon" href="img/logoP.png">
<link rel="apple-touch-icon" sizes="76x76" href="img/logoP.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/logoP.png">
<link rel="apple-touch-icon" sizes="152x152" href="img/logoP.png">
  <link rel="icon" type="image/png" href="img/logoP.png">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="description" />
<meta content="" name="author" />
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
<link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
<link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.5/sweetalert2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
    }
    </script>
</head>
<body class="fixed-header " style="background: linear-gradient(to top left, #33ccff 0%, #0095b7 100%);">


<div class="page-content-wrapper" style="padding-top: 5%;padding-bottom: 1%;">

<div class="content sm-gutter">

<div class=" container-fluid   container-fixed-lg">

<div class="card card-transparent" >
	<div class="row">
		<div class="col-lg-4 sm-no-padding">
			<a href="<?php echo $urlDaftar; ?>">
				<div class="card card-transparent" style="text-align: center;">
				<div class="card-block no-padding">
				<div id="card-advance" class="card card-default" style="border-radius: 12px;">
				<div class="card-header  ">
				</div>
				<div class="card-block">
				<h3>
				<span class="semi-bold">Daftar</span></h3>
				<p><img src="img/daftar.png" style="width: 100%;"></p>
				<br>
				<div>

				<div class="inline m-l-10" style="font-size: 15px;color: black;">
				<p class="small hint-text m-t-5">Klik Daftar Acara
				<br>Bila Anda Belum Mendaftarkan Acara</p>
				</div>

				</div>
				</div>
				</div>
				</div>
				</div>
			</a>
</div>

		<div class="col-lg-4 sm-no-padding">
			<a href="<?php echo $urlKonfirmasi; ?>">
				<div class="card card-transparent" style="text-align: center;">
				<div class="card-block no-padding">
				<div id="card-advance" class="card card-default" style="border-radius: 12px;">
				<div class="card-header  ">
				</div>
				<div class="card-block">
				<h3>
				<span class="semi-bold">Konfirmasi Pembayaran</span></h3>
				<p><img src="img/konfirmasi.png" style="width: 100%;"></p>
				<br>
				<div>

				<div class="inline m-l-10" style="font-size: 15px;color: black;">
				<p class="small hint-text m-t-5">Klik Konfirmasi Acara
				<br>Jika ANDA ..... </p>
				</div>

				</div>
				</div>
				</div>
				</div>
				</div>
			</a>
</div>

		<div class="col-lg-4 sm-no-padding">
			<a href="<?php echo $fileUndangan; ?>">
				<div class="card card-transparent" style="text-align: center;">
				<div class="card-block no-padding">
				<div id="card-advance" class="card card-default" style="border-radius: 12px;">
				<div class="card-header  ">
				</div>
				<div class="card-block">
				<h3>
				<span class="semi-bold">Download Undangan</span></h3>
				<p><img src="img/undang.png" style="width: 100%;"></p>
				<br>
				<div>

				<div class="inline m-l-10" style="font-size: 15px;color: black;">
				<p class="small hint-text m-t-5">Klik Undangan Acara
				<br>Untuk Mengambil Undangan</p>
				</div>

				</div>
				</div>
				</div>
				</div>
				</div>
			</a>
</div>
	</div>

</div>
</div>
</div>
</div>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.5/sweetalert2.js" type="text/javascript"></script>
<script src="assets/plugins/modernizr.custom.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/plugins/tether/js/tether.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-actual/jquery.actual.min.js"></script>
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script type="text/javascript" src="assets/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript" src="assets/plugins/classie/classie.js"></script>
<script src="assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

<script src="pages/js/pages.min.js"></script>
</body>


</html>
