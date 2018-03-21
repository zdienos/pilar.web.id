<?php

$nama = @$_POST['nama'];
$id_acara = @$_POST['id_acara'];
$email = @$_POST['email'];
$instansi = @$_POST['instansi'];

$submit = @$_POST['submit'];

if ($submit) {
  if ($nama == "" || $email == "" || $instansi == "") {
    ?>
      <script type="text/javascript">
        alert("Lengkapi Data !");
         window.history.back();
      </script>
    <?php
  }else{
    $kapasitas = mysql_fetch_array(mysql_query("SELECT * from acara where id='$id_acara'"));

    $max_kapasitas = mysql_fetch_array(mysql_query("SELECT count(id) from reservasi_acara where id='$id_acara'"));

    if ($kapasitas['kapasitas'] == $max_kapasitas['count(id)']) {
    
         ?>
          <script type="text/javascript">
            alert("Maaf Acara Penuh!");
             window.history.back();
          </script>
        <?php

    }else{
      mysql_query("INSERT into reservasi_acara values('','$nama','$email','$instansi','$id_acara')");

      echo "<script>alert('Daftar Berhasil,Check Email!')
              window.location='?page=acara'
            </script>";
    }
    
  }
}


?>