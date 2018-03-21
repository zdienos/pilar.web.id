
  <?php
    @session_start();
    include "../config/config.php";
    include "../../mailgun/vendor/autoload.php";
    use Mailgun\Mailgun;
    $textbox=  base64_encode(@$_POST['textbox']);
    $aplikasi= @$_POST['aplikasi'];

    $dataUser = mysql_fetch_array(mysql_query("SELECT * FROM users where username = '".$_SESSION['username']."'"));


    	if( $textbox =="" || $aplikasi == "" ){
    	$arr = array('response' => 'kosong');
   		echo json_encode($arr);

    	}else{

      mysql_query("INSERT INTO koreksi_aplikasi (id_pemda, description, id_aplikasi,status) VALUES ('".$dataUser['instansi']."', '$textbox', '$aplikasi','0')");
      $maxId = mysql_fetch_array(mysql_query("SELECT max(id) as max_id from koreksi_aplikasi"));

      mkdir("../upload/laporan/".$maxId['max_id']."");

      copyDir("../upload/temp/".$dataUser['username']."","../upload/laporan/".$maxId['max_id']."");

      unlinkDir("../upload/temp/".$dataUser['username']."");

      $mgClient = new Mailgun('key-8a14df0c7f3b08f3d96693a347e78454');
      $domain = "nini-sia-punk.rocks";
      $result = $mgClient->sendMessage("$domain",
        array('from'    => "",
              'to'      => "support@pilar.web.id",
              'subject' => "Laporan Bug",
              'html'    => @$_POST['textbox']
            ), array(
                  'attachment' => array($target.$namaEncrpy)
              )
            );



    ?>
