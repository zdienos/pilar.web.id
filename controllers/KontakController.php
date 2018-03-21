<?php
require 'maillgun/vendor/autoload.php';
use Mailgun\Mailgun;


$nama= @$_POST['nama'];
$email= @$_POST['email'];
$phone= @$_POST['phone'];
$pesan= @$_POST['pesan'];

$query = mysql_query("INSERT into pesan_kontak(nama, email, no_telepon, pesan) values ('$nama', '$email', '$phone','$pesan')");

$mgClient = new Mailgun('key-8a14df0c7f3b08f3d96693a347e78454');
$domain = "nini-sia-punk.rocks";
$getEmailWeb = mysql_fetch_array(mysql_query("select * from kontak_web"));
  $result = $mgClient->sendMessage("$domain",
  array('from'    => $email,
        'to'      => $getEmailWeb['email'],
        'subject' => 'Pertanyaan',
        'html'    => $pesan));

?>
