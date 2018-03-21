<?php
  @session_start();
  include "../config/config.php";
  $err = "";
  $cek = "";
  $content = "";
  foreach ($_POST as $key => $value) {
      $$key = $value;
  }
  $type = $_GET['tipe'];
  if($type == 'submit'){
    $getDataAcara = sqlArray(sqlQuery("select * from acara where id='$idAcara'"));
    $getJumlahPendaftar = sqlArray(sqlQuery("select sum(jumlah_orang) from reservasi_acara where id_acara = '$idAcara' and status = '2' "));
    $sisaKuota = $getDataAcara['kuota'] - $getJumlahPendaftar['sum(jumlah)'];
    if(empty($jumlahOrang)){
        $err = "Isi jumlah perserta";
    }elseif($sisaKuota < $jumlahOrang ){
        $err = "Jumlah perserta tidak dapat melebihi sisa kuota, kuota tersisa ".$sisaKuota. " Perserta";
    }elseif(sqlNumRow(sqlQuery("select * from reservasi_acara where id_user = '$idUser' and id_acara = '$idAcara'"))){
        $err = "Anda sudah mendaftar di acara ini !";
    }

    $hariIni = date("Ymd");

    $query1 = "SELECT max(nomor_invoice) as maxID FROM reservasi_acara WHERE nomor_invoice LIKE '$hariIni%'";
    $hasil = mysql_query($query1);
    $data = mysql_fetch_array($hasil);
    $idMax = $data['maxID'];

    $NoUrut = (int) substr($idMax, 8, 4);
    $NoUrut++; 

    $NewID = $hariIni .sprintf('%04s', $NoUrut);

    if(empty($err)){
          $dataReservasi = array(
                                  'tanggal_daftar' => date("Y-m-d"),
                                  'id_user' => $idUser,
                                  'jumlah_orang' => $jumlahOrang,
                                  'id_acara' => $idAcara,
                                  'status' => 0,
                                  'tanggal_acara' => $getDataAcara['tanggal'],
                                  'jam_acara' => $getDataAcara['jam'],
                                  'nomor_invoice' => $NewID,
                                );
            $query = sqlInsert("reservasi_acara",$dataReservasi);
            sqlQuery($query);
            // sqlQuery("update acara set reversed = reversed + $jumlahOrang where id = '$idAcara'");
            $getDataUser = sqlArray(sqlQuery("select * from users where id = '$idUser'"));
            $namaAcara = $getDataAcara['nama_acara'];
            $tanggalAcara = generateDate($getDataAcara['tanggal']);
            if(!empty($jumlahKamar)){
               $detailInvoice.= "
               <tr>
                 <td style='width: 43.0463%;'>Kamar</td>
                 <td style='width: 12.9184%; text-align:right;'>".$jumlahKamar."</td>
                 <td style='width: 25.0000%; text-align:right;'>".numberFormat($getDataAcara['harga_kamar'])."</td>
                 <td style='width: 18.9897%; text-align:right;'>".numberFormat($jumlahKamar * $getDataAcara['harga_kamar'] * $getDataAcara['lama_acara'])."</td>
               </tr>";
               $totalKamar = $jumlahKamar * $getDataAcara['harga_kamar'] * $getDataAcara['lama_acara'];
            }
            if(!empty($jumlahExtraBed)){
               $detailInvoice.= "
               <tr>
                 <td style='width: 43.0463%;'>Extra Bed</td>
                 <td style='width: 12.9184%; text-align:right;'>".$jumlahExtraBed."</td>
                 <td style='width: 25.0000%; text-align:right;'>".numberFormat($getDataAcara['extra_bed'])."</td>
                 <td style='width: 18.9897%; text-align:right;'>".numberFormat($jumlahExtraBed * $getDataAcara['extra_bed'] * $getDataAcara['lama_acara'])."</td>
               </tr>";
               $totalExtraBed = $jumlahExtraBed * $getDataAcara['extra_bed'] * $getDataAcara['lama_acara'];

            }
            $isiEmail = "

            												<p>Pendaftaran anda dalam acara $namaAcara yang di laksanakan pada $tanggalAcara berhasil silakan lakukan pembayaran ke nomor rekening BJB XXXXXXXX a/n PT Pilar Wahana Artha, dengan rincian sebagai berikut :</p>

                                    <p>Nomor Invoice Anda: <b>$NewID</b></p>
  ";
    sendMail("Event Pilar <event@pilar.web.id>",$getDataUser['email'],"Invoice $namaAcara",$isiEmail);
            $cek = $query;
    }
  }elseif($type == 'hitung'){
    $getDataAcara = sqlArray(sqlQuery("select * from acara where id='$idAcara'"));
    $totalKamar = $jumlahKamar * $getDataAcara['harga_kamar'] * $getDataAcara['lama_acara'];
    $totalExtraBed = $jumlahExtraBed * $getDataAcara['extra_bed'] * $getDataAcara['lama_acara'];
    $totalTiket = $jumlahOrang * $getDataAcara['harga_tiket'];
    $total = $totalTiket + $totalExtraBed + $totalKamar;
    $content = array('total' => numberFormat($total));
  }elseif($type == 'buktiTransfer'){
    $getDataReservasi = sqlArray(sqlQuery("select * from reservasi_acara where id = '$idReservasi'"));
    $getDataUser = sqlArray(sqlQuery("select * from users where id = '".$getDataReservasi['id_user']."'"));

    if ($nomor_invoice == $getDataReservasi['nomor_invoice']) {
          $dataUpdate = array(
                        'status'=>'1',
                        'bukti_transfer'=>$baseImage,
                        );
     sqlQuery(sqlUpdate("reservasi_acara",$dataUpdate,"id = '$idReservasi'"));
     sendMail($getDataUser['email'],"event@pilar.web.id","Bukti Transfer","<img src = '".$baseImage."' ></img>");
    }else{
      $err="Maaf Nomor Invoice Tidak Sama / Bukti Transfer Belum TerUpload";
    }

  }

  echo generateAPI($cek,$err,$content);



?>
