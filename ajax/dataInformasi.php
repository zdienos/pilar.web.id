<?php
 include 'config/config.php';
$per_page = 2;
$sqlc = "show columns from informasi ";
$rowsc = mysql_query($sqlc);
$cols = mysql_num_rows($rowsc);
$page = $_REQUEST['page'];

$start = ($page-1)*2;
$sql = "select * from informasi order by id limit $start,2";
$rows2 = mysql_query($sql);?>
<?php while ($rows = mysql_fetch_assoc($rows2)) {?>

<div class="isi">
<span class="kode"><?PHP echo $rows ['id'];?></span>
<?php echo $rows['isi_informasi'];?></div>
<?php }?>
