<?php
  include 'config/config.php';

$idSession = session_id();
$username= @$_POST['username'];
$email= @$_POST['email'];
$pertanyaan= @$_POST['pertanyaan'];
$tanggal = date('Y-m-d');
$jam = date("h:i:s");

$_SESSION["username"] = $username;
$_SESSION["email"] = $email;

$_SESSION["session"] = $idSession;

mysql_query("INSERT into chat(nama, email,tanggal,jam,session_id) values ('$username', '$email','$tanggal','$jam','$idSession')");

echo "INSERT into chat(nama, email,tanggal,jam,session_id) values ('$username', '$email','$tanggal','$jam','$idSession')";

?>
