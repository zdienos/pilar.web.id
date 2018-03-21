<?php
include 'config/config.php';
$dataUser = mysql_fetch_array(mysql_query("SELECT * FROM users where username = '".$_SESSION['username']."'"));


mkdir("upload/temp/".$dataUser['username']."");


$target_dir = "upload/temp/".$dataUser['username']."/"; // Upload directory

$request = 1;
if(isset($_POST['request'])){
	$request = $_POST['request'];
}

// Upload file
if($request == 1){
	$target_file = $target_dir . basename($_FILES["file"]["name"]);

	$msg = "";
	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
	    $msg = "Successfully uploaded";
	}else{
	    $msg = "Error while uploading";
	}
	echo $msg;
}

// Remove file
if($request == 2){
	$filename = $target_dir.$_POST['name']; 
	unlink($filename); exit;
}
