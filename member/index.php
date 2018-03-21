<?php
include 'config/config.php';

if ($_SESSION['username'] != "") {

$dataUser = mysql_fetch_array(mysql_query("SELECT * FROM users where username = '".$_SESSION['username']."'"));

$jumlahAcara = mysql_fetch_array(mysql_query("SELECT count(id_user) from reservasi_acara where id_user = '".$dataUser['id']."'"));
?>
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Member | Pilar Wahana Artha</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
<script src="../../../../cdn-cgi/apps/head/vAzQ3pO_LVF9Y_-CSxLP87NslSA.js"></script><link rel="apple-touch-icon" href="pages/ico/60.png">
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
<link href="assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/mapplic/css/mapplic.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/rickshaw/rickshaw.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/plugins/jquery-metrojs/MetroJs.css" rel="stylesheet" type="text/css" media="screen" />
<link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
<link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/ion-slider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/ion-slider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />

<link href="assets/plugins/jquery-nouislider/jquery.nouislider.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.css" type="text/css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.5/sweetalert2.css" rel="stylesheet" type="text/css" />
</head>
<style type="text/css">
  .widget-2:after {
    background-image: none;
}
</style>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
<body class="fixed-header dashboard" onload="instantiateTextbox();">

<nav class="page-sidebar" data-pages="sidebar">

<div class="sidebar-overlay-slide from-top" id="appMenu">
<div class="row">
<div class="col-xs-6 no-padding">
<a href="#" class="p-l-40"><img src="assets/img/demo/social_app.svg" alt="socail">
</a>
</div>
<div class="col-xs-6 no-padding">
<a href="#" class="p-l-10"><img src="assets/img/demo/email_app.svg" alt="socail">
</a>
</div>
</div>
<div class="row">
<div class="col-xs-6 m-t-20 no-padding">
<a href="#" class="p-l-40"><img src="assets/img/demo/calendar_app.svg" alt="socail">
</a>
</div>
<div class="col-xs-6 m-t-20 no-padding">
<a href="#" class="p-l-10"><img src="assets/img/demo/add_more.svg" alt="socail">
</a>
</div>
</div>
</div>


<div class="sidebar-header">
Pilar Wahana Artha
<div class="sidebar-header-controls">
<button type="button" class="btn btn-link hidden-md-down" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
</button>
</div>
</div>


 <div class="sidebar-menu">

<ul class="menu-items">
<li class="m-t-30 ">
<a href="index.php" class="detailed">
<span class="title">Dashboard</span>
</a>
<span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
</li>
<li class="">
<a href="?page=acara" class="detailed">
<span class="title">Acara</span>
</a>
<span class="icon-thumbnail"><i class="pg-mail"></i></span>
</li>
<li>
<a href="?page=jadwal"><span class="title">Schedule</span></a>
<span class="icon-thumbnail"><i class="pg-calender"></i></span>
</li>

<li>
<a href="?page=support"><span class="title">Koreksi Bugs</span></a>
<span class="icon-thumbnail"><i class="fa fa-bug"></i></span>
</li>

<li>
<a href="javascript:;"><span class="title">Setting</span>
<span class=" arrow"></span></a>
<span class="icon-thumbnail"><i class="fa fa-cogs"></i></span>
<ul class="sub-menu">
<li class="">
<a href="?page=setting">Ubah Profile</a>
<span class="icon-thumbnail">P</span>
</li>
<li class="">
<a href="?page=ubahPassword" >Ubah Password</a>
<span class="icon-thumbnail">P</span>
</li>
</ul>
</li>

</ul>
<div class="clearfix"></div>
</div>

</nav>



<div class="page-container ">

<div class="header ">

<a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar">
</a>

<div class="" style="margin-left: 5%;">
<div class="brand inline   ">
<img src="img/logo.png" alt="logo" data-src="img/logo.png" data-src-retina="img/logo.png" >
</div>

<ul class="hidden-md-down notification-list no-margin hidden-sm-down b-grey b-l b-r no-style p-l-30 p-r-20">
<li class="p-r-10 inline">
<div class="dropdown">
<a href="javascript:;" id="notification-center" class="header-icon pg pg-world" data-toggle="dropdown">
<span class="bubble" style="text-align: center;font-size: 10px;"><?php echo $jumlahAcara['count(id_user)']; ?></span>
</a>

<div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">

<div class="notification-panel">

<div class="notification-body scrollable">

<?php 

$tanggal =  date('Y-m-d');
$jam = date('H:i');


$concat = $tanggal.'-'.$jam;

$sql = mysql_query("SELECT *,concat(tanggal_acara,'-',jam_acara) from reservasi_acara where
 concat(tanggal_acara,'-',jam_acara)  > '$concat' and id_user = '$dataUser[id]' order by concat(tanggal_acara,'-',jam_acara) Asc ");

while ($dataResAcara = mysql_fetch_array($sql)) {
 
$dataAcara = mysql_fetch_array(mysql_query("SELECT * FROM acara where id='".$dataResAcara['id_acara']."'"));

$explode = explode(',', $dataAcara['lokasi']);

$koordiant = explode(',', $dataAcara['koordiant']);

     $isi = strip_tags(base64_decode($dataAcara['deskripsi']));

      if (strlen($isi) > 150) {

          $stringCut = substr($isi, 0,100);

          $isi = substr($stringCut, 0, strrpos($stringCut, ' ')); 
      }
 ?>


<div class="notification-item unread clearfix">

<div class="heading open">
<a target='_blank' href="http://pilar.web.id/?page=viewAcara&id=<?php echo $dataAcara['id'];?>&koordinat=<?php echo $dataAcara['koordinat'];?>" class="text-complete pull-left">
<i class="pg-map fs-16 m-r-10"></i>
<span class="bold"><?php echo $explode[0].','.$explode[1]; ?></span>
</a>
<div class="pull-right">
<div class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">
<div><i class="fa fa-angle-left"></i>
</div>
</div>
<span class=" time"><?php echo date("d M, Y", strtotime($dataAcara['tanggal'])); ?></span>
</div>
<div class="more-details">
<div class="more-details-inner">
<h5 class="semi-bold fs-16">“ <?php echo $isi; ?> ”</h5>
</div>
</div>
</div>


<div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
 <a href="#" class="mark"></a>
</div>

</div>
<?php 
 # code...
}
 ?>






</div>


<div class="notification-footer text-center">
<a href="#" class="">Read all notifications</a>
<a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
<i class="pg-refresh_new"></i>
</a>
</div>

</div>

 </div>

</div>
</li>

</ul>

</div>
<div class="d-flex align-items-center">

<div class="pull-left p-r-10 fs-14 font-heading hidden-md-down">
<span class="semi-bold"><?php echo $dataUser['nama']; ?></span>
</div>
<div class="dropdown pull-right hidden-md-down">
<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="thumbnail-wrapper d32 circular inline">
<img src="assets/img/profiles/avatar.jpg" alt="" data-src="img/avatar.png" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="32" height="32">
</span>
</button>
<div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
<a href="#" class="dropdown-item"><i class="pg-settings_small"></i> Settings</a>
<a href="logout.php" class="clearfix bg-master-lighter dropdown-item">
<span class="pull-left">Logout</span>
<span class="pull-right"><i class="pg-power"></i></span>
</a>
</div>
</div>


</div>
</div>


<div class="page-content-wrapper ">

<div class="content sm-gutter">

<?php
$page = @$_GET['page'];
$action = @$_GET['action'];
if ($page == "informasi") {
  include "view/pages/informasi.php";
  } 
else if ($page == "daftarAcara") {
  include "pages/template/daftarAcara.php";
  }

else if ($page == "acara") {
    include "pages/template/acara.php";
}

else if ($page == "jadwal") {
  include "pages/template/calendar.php";
}

else if ($page == "bukti_pembayaran") {
  include "pages/template/bukti_pembayaran.php";
}

else if ($page == "setting") {
  include "pages/template/setting.php";
}

else if ($page == "ubahPassword") {
  include "pages/template/ubahPassword.php";
}

else if ($page == "Invoice") {
  include "pages/template/invoice.php";
}

else if ($page == "support") {
  include "pages/template/support.php";
}


else if ($page == "tambahKoreksi") {
  include "pages/template/tambahKoreksi.php";
}




elseif ($page == "") {
    include "pages/template/dashboard.php";
}else{
echo " 404 ! halaman tidak di temukan ";
}

?>

</div>


</div>

<div class=" container-fluid  container-fixed-lg footer">
<div class="copyright sm-text-center">
<p class="small no-margin pull-left sm-pull-reset">
<span class="hint-text">2017 </span>
<span class="font-montserrat"> PT PILAR WAHANA ARTHA</span>
</p>
<p class="small no-margin pull-right sm-pull-reset"><span class="hint-text">MEMBER AREA</span>
</p>
<div class="clearfix"></div>
</div>
</div>

</div>

</div>







<script src="assets/plugins/modernizr.custom.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.5/sweetalert2.js" type="text/javascript"></script>
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
<script src="assets/plugins/nvd3/lib/d3.v3.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/nv.d3.min.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/src/utils.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/src/tooltip.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/src/interactiveLayer.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/src/models/axis.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/src/models/line.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/src/models/lineWithFocusChart.js" type="text/javascript"></script>
<script src="assets/plugins/mapplic/js/hammer.js"></script>
<script src="assets/plugins/mapplic/js/jquery.mousewheel.js"></script>
<script src="assets/plugins/mapplic/js/mapplic.js"></script>
<script src="assets/plugins/rickshaw/rickshaw.min.js"></script>
<script src="assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/plugins/skycons/skycons.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="assets/plugins/ion-slider/js/ion.rangeSlider.min.js" type="text/javascript"></script>

<script src="pages/js/pages.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.js"></script>
<script src="assets/js/slider.js" type="text/javascript"></script>
<script src="assets/js/dashboard.js" type="text/javascript"></script>


<script src="assets/js/form_elements.js" type="text/javascript"></script>

<script src="assets/js/scripts.js" type="text/javascript"></script>

<script src="assets/js/demo.js" type="text/javascript"></script>


<script src="assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
 <script src="assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="assets/js/datatables.js" type="text/javascript"></script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWzO08UA98rIkVoMPtWNqPx_DmgSq9Dhg&callback=initMap">
    </script>
<script>
     window.intercomSettings = {
       app_id: "xt5z6ibr"
     };
    </script>
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/xt5z6ibr';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>
</body>

</html>

<?php 

}else{
  header("location:login.php");
}

 ?>