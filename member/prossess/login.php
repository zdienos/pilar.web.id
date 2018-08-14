
  <?php 
@session_start();
include "../config/config.php";

  
    $username= @$_POST['username'];
    $password= @$_POST['password'];
    $passwordBaru= @$_POST['passwordBaru'];
    $konfirmasiPassword= @$_POST['konfirmasiPassword'];

$sql = mysql_query("select * from users where username='$username' and password='".sha1(md5($password))."'") or die (mysql_error());
$data =mysql_fetch_array($sql);
$cek = mysql_num_rows($sql);

      if( $password == "" || $username==""){
      $arr = array('response' => 'kosong');
      echo json_encode($arr);

      }else if($cek == 1){
           $arr = array('response' => 'ok',
            );
           $_SESSION['username'] = $data['username'];
           echo json_encode($arr);
      }
      else{

      $arr = array('response' => 'tidak');
      echo json_encode($arr);
      
      }
    
 
    
    ?>