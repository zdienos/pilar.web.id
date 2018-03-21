
<!DOCTYPE html>
<html>

<!-- Mirrored from pages.revox.io/dashboard/3.0.0/html/condensed/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Jan 2018 17:15:54 GMT -->
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Member | Pilar Wahana Artha</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
<script src="../../../../cdn-cgi/apps/head/vAzQ3pO_LVF9Y_-CSxLP87NslSA.js"></script><link rel="apple-touch-icon" href="pages/ico/60.png">
<link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
<link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
<link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
<link rel="icon" type="image/x-icon" href="favicon.ico" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="description" />
<meta content="" name="author" />
<link href="../../assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
<link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="../../assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
<link href="../../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
<link href="../../assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
<link href="../../pages/css/pages-icons.css" rel="stylesheet" type="text/css">
<link class="main-stylesheet" href="../../pages/css/pages.css" rel="stylesheet" type="text/css" />
</head>
<body class="fixed-header ">
<?php 
include '../../config/config.php';
$get = @$_GET['id'];
$data = mysql_fetch_array(mysql_query("SELECT * FROM koreksi_aplikasi where id='$get'"));

$isi = base64_decode($data['description']);
 ?>
<div class=" container-fluid   container-fixed-lg">

<div class="card card-default m-t-20">
<div class="card-block">
<div class="invoice padding-50 sm-padding-10">
<?php echo $isi; ?>
</div>
</div>
</div>

</div>

<script data-cfasync="false" src="../../../../cdn-cgi/scripts/af2821b0/cloudflare-static/email-decode.min.js"></script><script src="../../assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/modernizr.custom.js" type="text/javascript"></script>
<script src="../../assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/tether/js/tether.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
<script src="../../assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/jquery-actual/jquery.actual.min.js"></script>
<script src="../../assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script type="text/javascript" src="../../assets/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript" src="../../assets/plugins/classie/classie.js"></script>
<script src="../../assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>


<script src="pages/js/pages.min.js"></script>


<script src="assets/js/scripts.js" type="text/javascript"></script>

<script src="assets/js/demo.js" type="text/javascript"></script>
<script>
     window.intercomSettings = {
       app_id: "xt5z6ibr"
     };
    </script>
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/xt5z6ibr';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>
</body>

<!-- Mirrored from pages.revox.io/dashboard/3.0.0/html/condensed/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Jan 2018 17:15:57 GMT -->
</html>