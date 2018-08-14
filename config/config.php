<?php
@error_reporting(0);
include 'function.php';
@session_start();

$db_host='localhost';
$db_user='root';
$db_password='12345';
$db_name='pilar_web';

mysql_connect($db_host,$db_user,$db_password);
mysql_select_db($db_name);
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

if(!isset($_SESSION['log_visitor'])){
  $_SESSION['log_visitor'] = "hadir";
  $dataLogVisitor = array(
    "tanggal" => date("Y-m-d"),
    "jam" => date("H").":".date("i"),
    "ip" => getUserIP(),
    "user_agent" => $_SERVER['HTTP_USER_AGENT']
  );
  $queryLogVisitor = sqlInsert("log_visitor",$dataLogVisitor);
  mysql_query($queryLogVisitor);
}

// class Config
// {

//  function readDirectory()
//    {
//      return scandir('controllers');
//    }

// }

// $Config = new Config();
// $functionName = $Config->readDirectory();
// for ($i=0; $i < sizeof($functionName); $i++) {
//   if ($i != 0 && $i != 1) {
//     include 'controllers/'.$functionName[$i];
//   }

//   }


?>
