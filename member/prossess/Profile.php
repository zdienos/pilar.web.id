
  <?php 
@session_start();
include "../config/config.php";

  $id= @$_POST['id'];
    $nama= @$_POST['nama'];
    $instansi= @$_POST['instansi'];
    $email= @$_POST['email'];
    $nomor= @$_POST['nomor'];
    $alamat= @$_POST['alamat'];



      if( $nama =="" || $instansi == ""){
      $arr = array('response' => 'kosong');
      echo json_encode($arr);

      }else{
          
          mysql_query("UPDATE users set nama='$nama',email='$email',telepon='$nomor',alamat='$alamat' where id='$id'");

           $arr = array('response' => 'ok');
           echo json_encode($arr);
      }
    
 
    
    ?>