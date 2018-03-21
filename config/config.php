<?php
@error_reporting(0);
include 'function.php';
@session_start();

$db_host='localhost';
$db_user='root';
$db_password='Adminpwa51';
$db_name='pilar_web';

mysql_connect($db_host,$db_user,$db_password);
mysql_select_db($db_name);

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
