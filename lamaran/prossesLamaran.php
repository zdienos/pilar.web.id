<?php
  include '../config/config.php';
  require '../maillgun/vendor/autoload.php';
  use Mailgun\Mailgun;
$namaDepan= @$_POST['namaDepan'];
$namaBelakang= @$_POST['namaBelakang'];
$email= @$_POST['email'];
$nomer= @$_POST['nomer'];
$posisi= @$_POST['posisi'];
$alamat= @$_POST['alamat'];
$pendidikan= @$_POST['pendidikan'];
$tentang= @$_POST['tentang'];
$id = @$_POST['id'];

$cv = @$_POST['cv'];

function baseToImage($base64_string, $output_file) {

    $ifp = fopen( $output_file, 'wb' );
    $data = explode( ',', $base64_string );

    fwrite( $ifp, base64_decode( $data[ 1 ] ) );

    fclose( $ifp );

    return str_replace("../",$output_file);
}

function sendMail($emailPengirim,$emailTujuan,$subjectEmail,$isiEmail){
  $arrayData = array(
              'emailPengirim' => $emailPengirim,
              'emailTujuan' => $emailTujuan,
              'subjectEmail' => $subjectEmail,
              'isiEmail' => $isiEmail,
  );
  $curl = curl_init();
  curl_setopt($curl,CURLOPT_URL, "http://cs.pilar.web.id/maillgun/mail.php");
  curl_setopt($curl,CURLOPT_POST, sizeof($arrayData));
  curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36");
  curl_setopt($curl,CURLOPT_POSTFIELDS, $arrayData);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_exec($curl);
}


$target = '../cv/';
$namaEncrpy= $namaDepan.$namaBelakang.md5(date('Y-m-d')).md5(date('H:i:s')).md5($nama_cv).'.pdf';
baseToImage($cv,$target.$namaEncrpy);


mysql_query("INSERT into lamaran values ('','".$namaDepan." ".$namaBelakang."','$email','$nomer','$tentang','$namaEncrpy','$pendidikan','$id')");
$getDataLowongan = mysql_fetch_array(mysql_query("select * from lowongan_kerja where id = '$id'"));
$getDataPendidikan = mysql_fetch_array(mysql_query("select * from ref_pendidikan where id ='$pendidikan'"));
$getDataPosisi = mysql_fetch_array(mysql_query("select * from ref_posisi where id = '".$getDataLowongan['posisi']."'"));
$getEmailWeb = mysql_fetch_array(mysql_query("select * from kontak_web"));
$mgClient = new Mailgun('key-8a14df0c7f3b08f3d96693a347e78454');
$domain = "nini-sia-punk.rocks";
$result = $mgClient->sendMessage("$domain",
  array('from'    => $email,
        'to'      => $getEmailWeb['email'],
        'subject' => 'Lamaran Kerja '.$getDataPosisi['posisi'],
        'html'    => "<p>Dengan hormat,</p>
<p>Berdasarkan pada informasi di website, bahwa &ldquo;PT PILAR WAHANA ARTHA&rdquo; membutuhkan seorang ".$getDataPosisi['posisi'].", maka saya :</p>
<p>Nama &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: ".$namaDepan." ".$namaBelakang."<br />Alamat &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: ".$alamat."<br />Pendidikan Terakhir&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : ".$getDataPendidikan['tingkat']."</p>
<p>Tentang saya :</p>
<p>$tentang</p>
<p>&nbsp;</p>
<p>Demikian surat lamaran ini saya sampaikan. Atas perhatian Bapak/Ibu saya ucapkan banyak terima kasih.</p>
<p>Hormat saya,</p>
<p>(".$namaDepan." ".$namaBelakang.")</p>
<p>&nbsp;</p>"
      ), array(
            'attachment' => array($target.$namaEncrpy)
        )
      );

sendMail("hrd@pilar.web.id",$email,"Lamaran ".$getDataPosisi['posisi'],"
<p>Halo $namaDepan,</p>
<p>Terimakasih telah berpartisipasi dalam recruitmen di PT Pilar Wahana Artha, lamaran anda telah kami terima anda akan dapat balasan dalam 7 hari</p>
<p><br /></p>
<p>Terima Kasih&nbsp;</p>
<p><br /></p>
<p><br /></p>
<p>HRD PT Pilar&nbsp;Wahana Artha</p>
");
?>
