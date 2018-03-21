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
<?php while ($rows = mysql_fetch_assoc($rows2)) {
    $src = "images/default.jpg";
    $string = html_entity_decode($rows['isi_informasi']);
    if( strpos( $string, 'img' ) !== false ) {
       $doc = new DOMDocument();
       libxml_use_internal_errors(true);
       $doc->loadHTML( $string );
       $xpath = new DOMXPath($doc);
       $imgs = $xpath->query("//img");
       $img = $imgs->item(0);
       $src = $img->getAttribute("src");
     }


     $isi = strip_tags($rows['isi_informasi']);

      if (strlen($isi) > 250) {

          $stringCut = substr($isi, 0, 250);

          $isi = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
      }

  ?>

          <div class="card card-plain card-blog" style="margin-top: -5px;">
            <div class="row">

              <div class="col-md-5">
                <div class="card-image">
                  <img class="img img-raised" src="<?php echo $src; ?>" />
                </div>
              </div>
              <div class="col-md-7">
                <p class="author">
                  DiTulis Oleh <a href="#pablo"><b><?php echo $rows['penulis']; ?></b></a>,
                  <?php echo $rows['tanggal_create'].", ".$rows['jam_create']; ?>   
                </a>
                </p>

                <h4 class="card-title text-info">
                  <a href="?page=informasi&id=<?php echo$rows['id'];?>" style="color: #4cc7d2;"><?php echo $rows['judul']; ?></a>
                </h4>
                <p class="card-description">
                 <?php echo $isi;
                 ?>
                </p>
                <div class="row">
                  <div class="col-md-12">
                    <a href="?page=informasi&id=<?php echo$rows['id'];?>" class="btn btn-rose">Baca Selengkapnya</a>
                  </div>
                </div>

              </div>
            </div>
          </div>



<?php }?>
