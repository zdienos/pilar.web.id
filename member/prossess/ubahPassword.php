
  <?php 
@session_start();
include "../config/config.php";

  
    $username= @$_POST['id'];
    $passwordLama= @$_POST['passwordLama'];
    $passwordBaru= @$_POST['passwordBaru'];
    $konfirmasiPassword= @$_POST['konfirmasiPassword'];

$sql = mysql_query("select * from users where username='$username'") or die (mysql_error());
$data =mysql_fetch_array($sql);
$cek = mysql_num_rows($sql);

      if( $passwordBaru =="" || $passwordLama == "" || $konfirmasiPassword==""){
      $arr = array('response' => 'kosong');
      echo json_encode($arr);

      }else if(sha1(md5($passwordLama)) != $data['password']){
           $arr = array('response' => 'tidakBenar',
            );
           echo json_encode($arr);
      }elseif ($konfirmasiPassword != $passwordBaru) {
           $arr = array('response' => 'tidakSama',
            );
           echo json_encode($arr);
      }
      else{
      $arr = array('response' => 'ok');
      echo json_encode($arr);

      mysql_query("UPDATE users set password='$konfirmasiPassword' where username='$username'");
      }
    
 
    
    ?>