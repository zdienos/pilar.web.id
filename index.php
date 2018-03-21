<!doctype html>
<html lang="id">
<?php
  include 'config/config.php';
  include 'view/template/head.php';

?>

<style type="text/css">
  a:hover {
    color: #1D549C;
}
</style>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  <style>
       #map {
        height: 200px;
        width: 100%;
       }
.panel{
    margin-bottom: 0px;
}
.chat-window{
    bottom:0;
    position:fixed;
    float:right;
    right: 0;
}
.chat-window > div > .panel{
    border-radius: 5px 5px 0 0;
}
.icon_minim{
    padding:2px 10px;
}
.msg_container_base{
  background: #fff;
  margin: 0;
  padding: 0 10px 10px;
  max-height:300px;
  overflow-x:hidden;
}
.top-bar {
  background: #666;
  color: white;
  padding: 10px;
  position: relative;
  overflow: hidden;
}
.msg_receive{
    padding-left:0;
    margin-left:0;
}
.msg_sent{
    padding-bottom:20px !important;
    margin-right:0;
}
.messages {
  background: white;
  padding: 10px;
  border-radius: 2px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  max-width:100%;
}
.messages > p {
    font-size: 13px;
    margin: 0 0 0.2rem 0;
  }
.messages > time {
    font-size: 11px;
    color: #ccc;
}
.msg_container {
    padding: 10px;
    overflow: hidden;
    display: flex;
}
img {
    display: block;
    width: 100%;
}
.avatar {
    position: relative;
}
.base_receive > .avatar:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border: 5px solid #FFF;
    border-left-color: rgba(0, 0, 0, 0);
    border-bottom-color: rgba(0, 0, 0, 0);
}

.base_sent {
  justify-content: flex-end;
  align-items: flex-end;
}
.base_sent > .avatar:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 0;
    border: 5px solid white;
    border-right-color: transparent;
    border-top-color: transparent;
    box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
}

.msg_sent > time{
    float: right;
}



.msg_container_base::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

.btn-group.dropup{
    position:fixed;
    left:0px;
    bottom:0;
}

    </style>

<body class="index-page" style="background: #fff;">

<?php
  include 'view/template/navbar.php';
?>

<?php
$page = @$_GET['page'];
$action = @$_GET['action'];
if ($page == "informasi") {
  include "view/pages/informasi.php";
  } 
else if ($page == "informasis") {
  include "view/pages/informasis.php";
  }

else if ($page == "acara") {
  include "view/pages/acara.php";
}
else if ($page == "viewAcara") {
  include "view/pages/viewAcara.php";
}

else if ($page == "contact") {
  include "view/pages/contact.php";
}

else if ($page == "lowonganKerja") {
  include "view/pages/lowonganKerja.php";
}

else if ($page == "lowonganKerjas") {
  include "view/pages/lowonganKerjas.php";
}

else if ($page == "tentang") {
  include "view/pages/tentang.php";
}

else if ($page == "produks") {
  include "view/pages/produks.php";
}
else if ($page == "produk") {
  include "view/pages/produk.php";
}

else if ($page == "Prosess") {
  if ($action == "Acara") {
    include "controllers/AngotaAcara.php";
  }
  else if ($action == "Kontak") {
    include "controllers/KontakController.php";
  }
}
elseif ($page == "") {
    include "view/template/home.php";
}else{
echo " 404 ! halaman tidak di temukan ";
}



$dataKontak = mysql_fetch_array(mysql_query("SELECT * from kontak_web"));


                        $array = array();
                        $sql = mysql_query("SELECT * FROM kontak_web");
     $row = mysql_fetch_array($sql);

                        $array = json_decode($row['media_sosial']) ;
?>

<?php 
  $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


if ($url == "http://pilar.web.id/index.php?page=contact" || $url == "http://pilar.web.id/?page=contact") {
  ?>


<div class="container">
    <div class="row chat-window col-xs-12 ol-sm-10 col-md-3" id="chat_window_1" style="z-index:  99;">
        <div class="col-xs-12 col-md-12">
          <div class="panel panel-default" style="border: 1px solid #b5adad;">
                <div class="panel-heading top-bar" style=" background: #00b8ff;">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Customer Service</h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                    </div>
                </div>
                <script src="ajax/chat.js" type="text/javascript"></script>
                <div class="panel-body msg_container_base" style="padding: 5%; background: white; display: none;">
          <div class="input-group">

                    <?php
                      if ($_SESSION['session'] == "") {
                   
                    ?>
                        <input name="username" id="username" type="text" class="form-control input-sm chat_input" placeholder="Nama Lengkap" style="width: 175%;"/>
                        <input name="email" id="emails" type="text" class="form-control input-sm chat_input" placeholder="Alamat Email" style="width: 175%;"/>
                        <input name="pertanyaan" id="pertanyaan" type="text" class="form-control input-sm chat_input" placeholder="Pertanyaan, Contoh(Hello)" style="width: 175%;"/>
                        <button type="button" onclick="Kontak();" name="login-submit" id="login-submit" class="btn btn-info btn-sm">
                         Kirim
                         </button> 
                    <?php 
                       }else{


                     ?>
                        <span class="input-group-btn">
                         <button type="submit" name="login-submit" id="login-submit" class="btn btn-info btn-sm">
                         Kembali Ke Chating 
                         </button> 
                         <a href="keluar.php" name="login-submit" id="login-submit" class="btn btn-info btn-sm">
                         Keluar
                         </a> 
                        </span>
                        <?php 
                        }
                         ?>
                    </div>
          

        
                </div>
                
        </div>
        </div>
    </div>
    
</div>

  <?php
}else{

}
?>


<footer class="footer footer-black footer-big">
            <div class="container">
              <ul class="pull-left">
                <li>
                    <a target="_blank" href="<?php  echo $array->facebook; ?>" class="btn btn-just-icon btn-round btn-facebook">
                            <i class="fa fa-facebook"> </i>
                        <div class="ripple-container"></div>
                        </a>
                </li>
                <li>
                        <a target="_blank" href="<?php  echo $array->twiter; ?>" class="btn btn-just-icon btn-round btn-twitter">
                            <i class="fa fa-twitter"> </i>
                        <div class="ripple-container"></div>
                        </a>
                </li>
                <li>
                        <a target="_blank" href=" <?php  echo $array->instagram; ?>" class="btn btn-just-icon btn-round btn-google" style="background-color: #ce435c;">
                            <i class="fa fa-instagram"> </i>
                        <div class="ripple-container"></div>
                        </a>
                </li>
                <li>
                        <a target="_blank" href="<?php  echo $array->gmail; ?>" class="btn btn-just-icon btn-round btn-google">
                            <i class="fa fa-google"> </i>
                        <div class="ripple-container"></div>
                        </a>
                </li>
                <li>
 <button type="button" style="background: #22a577;" class="btn btn-just-icon btn-round btn-google" data-toggle="popover" data-placement="top" title="" data-content="<?php  echo $array->whatsapp; ?>" data-container="body" data-original-title="Nomor WhatsApp" aria-describedby="popover568804">  <i class="fa  fa-whatsapp"> </i><div class="ripple-container"></div></button>
                </li>

                 <li>
                        <a target="_blank" href="<?php  echo $array->linkedin; ?>" class="btn btn-just-icon btn-round btn-linkedin">
                            <i class="fa fa-linkedin"> </i>
                        <div class="ripple-container"></div>
                        </a>
                </li>
              </ul>

              <div class="copyright pull-right"> 
        <?php echo $row['nama_perusahaan']; ?>, <?php echo $row['telepon']; ?> - <a href="mailto:<?php echo $row['email']; ?>?Subject=Hello%20Office on Pilar Wahana Artha" target="_top"> <?php echo $row['email']; ?> </a>
              </div>
            </div>
          </footer>



</div>





  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/material.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
  <script src="assets/js/moment.min.js"></script>
  <script src="assets/js/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
  <script src="assets/js/nouislider.min.js" type="text/javascript"></script>

  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
  <script src="assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
  <script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

  <!--  Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
  <script src="assets/js/bootstrap-tagsinput.js"></script>

  <!--  Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
  <script src="assets/js/jasny-bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>

  <!--    Plugin For Google Maps   -->
    <script src="assets/particles.js" type="text/javascript"></script>
<script src="assets/js/app.js"></script>

<!-- stats.js -->
<script src="assets/js/lib/stats.js"></script>
  <!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
  <script src="assets/js/material-kit23cd.js?v=1.2.1" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
    // This code is not even almost production ready. It's 2am here, and it's a cheap proof-of-concept if anything.
    $(".img-modal-btn.right").on('click', function(e){
        e.preventDefault();
        cur = $(this).parent().find('img:visible()');
        next = cur.next('img');
        par = cur.parent();
        if (!next.length) { next = $(cur.parent().find("img").get(0)) }
        cur.addClass('hidden');
        next.removeClass('hidden');
        
        return false;
    })
    
    $(".img-modal-btn.left").on('click', function(e){
        e.preventDefault();
        cur = $(this).parent().find('img:visible()');
        next = cur.prev('img');
        par = cur.parent();
        children = cur.parent().find("img");
        if (!next.length) { next = $(children.get(children.length-1)) }
        cur.addClass('hidden');
        next.removeClass('hidden');
        
        return false;
    })

});
</script>
<?php

$general_setting = mysql_fetch_array(mysql_query("SELECT * FROM general_setting where id='7'"));

if ($general_setting['option_value'] == 1) {
  echo '<script src="assets/json_effect/partickels.js"></script>';
}else if ($general_setting['option_value'] == 2) {
  echo '<script src="assets/json_effect/square.js"></script>';
}elseif ($general_setting['option_value'] == 3) {
  echo '<script src="assets/json_effect/snow.js"></script>';
}elseif ($general_setting['option_value'] == 4) {
  echo '<script src="assets/json_effect/stars.js"></script>';
}
elseif ($general_setting['option_value'] == 5) {
  echo '<script src="assets/json_effect/bokeh.js"></script>';
}else{

}
?>
  

<script type="text/javascript">
  $(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '#new_chat', function (e) {
    var size = $( ".chat-window:last-child" ).css("margin-left");
     size_total = parseInt(size) + 400;
    alert(size_total);
    var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
    clone.css("margin-left", size_total);
});
$(document).on('click', '.icon_close', function (e) {
    //$(this).parent().parent().parent().parent().remove();
    $( "#chat_window_1" ).remove();
});

</script>
<script>
  (function (w,i,d,g,e,t,s) {w[d] = w[d]||[];t= i.createElement(g);
    t.async=1;t.src=e;s=i.getElementsByTagName(g)[0];s.parentNode.insertBefore(t, s);
  })(window, document, '_gscq','script','//widgets.getsitecontrol.com/122813/script.js');
</script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWzO08UA98rIkVoMPtWNqPx_DmgSq9Dhg&callback=initMap">
    </script>
</html>
