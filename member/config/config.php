<?php
@error_reporting(0);
@session_start();

$db_host='localhost';
$db_user='root';
$db_password='12345';
$db_name='pilar_web';

mysql_connect($db_host,$db_user,$db_password);
mysql_select_db($db_name);

function sqlInsert($table, $data){
	    if (is_array($data)) {
	        $key   = array_keys($data);
	        $kolom = implode(',', $key);
	        $v     = array();
	        for ($i = 0; $i < count($data); $i++) {
	            array_push($v, "'" . $data[$key[$i]] . "'");
	        }
	        $values = implode(',', $v);
	        $query  = "INSERT INTO $table ($kolom) VALUES ($values)";
	    } else {
	        $query = "INSERT INTO $table $data";
	    }
		  return $query;

	}
function sqlUpdate($table, $data, $where){
    if (is_array($data)) {
        // ini buat array
        $key   = array_keys($data);
        $kolom = implode(',', $key);
        $v     = array();
        for ($i = 0; $i < count($data); $i++) {
            array_push($v, $key[$i] . " = '" . $data[$key[$i]] . "'");
        }
        $values = implode(',', $v);
        $query  = "UPDATE $table SET $values WHERE $where";
    } else {
        $query = "UPDATE $table SET $data WHERE $where";
    }

   return $query;
}

function sqlQuery($query){
		return mysql_query($query);
}

function sqlArray($sqlQuery){
	return mysql_fetch_array($sqlQuery);
}

function sqlNumRow($sqlQuery){
	return mysql_num_rows($sqlQuery);
}


function removeExtJam($jam){
    $jam = str_replace('J',"",$jam);
    $jam = str_replace('M',"",$jam);

    return $jam;
}
function removeExtHarga($harga){
    $harga = str_replace('.',"",$harga);
    $harga = str_replace(' ',"",$harga);
    $harga = str_replace('Rp',"",$harga);
    $harga = str_replace('_',"",$harga);

    return $harga;
}

function numberFormat($angka){
  return number_format($angka,2,',','.');
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

function generateAPI($cek,$err,$content){
		$api = array('cek'=>$cek, 'err'=>$err, 'content'=>$content);
		return json_encode($api);
}

function generateDate($tanggal){
		$tanggal = explode("-",$tanggal);
		return $tanggal[2]."-".$tanggal[1]."-".$tanggal[0];
}

function copyDir( $source, $target ) {
        if ( is_dir( $source ) ) {
            // @mkdir( $target );
            $d = dir( $source );
            while ( FALSE !== ( $entry = $d->read() ) ) {
                if ( $entry == '.' || $entry == '..' ) {
                    continue;
                }
                $Entry = $source . '/' . $entry;
                if ( is_dir( $Entry ) ) {
                    $this->copyDir( $Entry, $target . '/' . $entry );
                    continue;
                }
                copy( $Entry, $target . '/' . $entry );
            }
 
            $d->close();
        }else {
            copy( $source, $target );
        }
    }



function unlinkDir($dir)
{
    $dirs = array($dir);
    $files = array() ;
    for($i=0;;$i++)
    {
        if(isset($dirs[$i]))
            $dir =  $dirs[$i];
        else
            break ;
        if($openDir = opendir($dir))
        {
            while($readDir = @readdir($openDir))
            {
                if($readDir != "." && $readDir != "..")
                {
                    if(is_dir($dir."/".$readDir))
                    {
                        $dirs[] = $dir."/".$readDir ;
                    }
                    else
                    {
                        $files[] = $dir."/".$readDir ;
                    }
                }
            }
        }
    }
    foreach($files as $file)
    {
        unlink($file) ;
    }
    $dirs = array_reverse($dirs) ;
    foreach($dirs as $dir)
    {
/*        rmdir($dir) ;*/
    }
}

?>
