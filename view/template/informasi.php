<?php

$general_setting = mysql_fetch_array(mysql_query("SELECT * FROM general_setting where id='4'"));
?>
<style type="text/css" media="screen">
  a:hover{
    color: #3770bb !important;
  } 
</style>
<div class="team-3" style="padding-top: 1%; background: <?php echo $general_setting['option_value']; ?>;">

		<div class="container">

		

				
			<h3 class="title" style="margin-bottom: -14px;">INFORMASI

			<span style="float: right;">
         <a data-toggle="tooltip" data-placement="left" data-original-title="Lihat Selanjutnya" href="?page=informasis" style="font-size:  15px;color: #3c4858;text-decoration: none;" ><i class="material-icons">queue_play_next</i></a>
      </span>

    	</h3>
			<hr style="border: 1px solid #56606d;">

<br />
<div class="row">

<?php

$sql = "select * from informasi where status='1' order by id desc limit 2";
$rows2 = mysql_query($sql);?>
<?php while ($rows = mysql_fetch_assoc($rows2)) {
    $src = "images/default.jpg";
    $string = html_entity_decode(base64_decode($rows['isi_informasi']));
    if( strpos( $string, 'img' ) !== false ) {
       $doc = new DOMDocument();
       libxml_use_internal_errors(true);
       $doc->loadHTML( $string );
       $xpath = new DOMXPath($doc);
       $imgs = $xpath->query("//img");
       $img = $imgs->item(0);
       $src = $img->getAttribute("src");
     }


     $isi = strip_tags(base64_decode($rows['isi_informasi']));

      if (strlen($isi) > 250) {

          $stringCut = substr($isi, 0, 250);

          $isi = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
      }
$penulis = mysql_fetch_array(mysql_query("SELECT * FROM users where id='$rows[penulis]'"));
  ?>
<div class="col-md-6" >
<div class="card card-blog" style="min-height: 620px;">
                    <div class="card-image">
                      <a href="#pablo">
                        <img class="img" width="90%" style="height: 374px;" src="<?php echo $src; ?>">
                      </a>
                    <div class="colored-shadow" style="background-image: url('<?php echo $src; ?>'); opacity: 1;"></div><div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 84.5px; top: 36px; background-color: rgba(0, 0, 0, 0.87); transform: scale(41.25);"></div></div></div>

                    <div class="card-content">
                      <h6 class="category text-success">Terbaru 
                        <span style="float: right;color: #1585d2;"><i class="material-icons">schedule</i> <?php echo date("d M, Y", strtotime($rows['tanggal_create'])); ?> | <?php echo $rows['jam_create']; ?></span>
                      </h6>
                      
                      <h4 class="card-title">
                        <a href="?page=informasi&id=<?php echo$rows['id'];?>"><?php echo $rows['judul']; ?></a>
                      </h4>
                      <p class="card-description" style="min-height:  132px; max-height:  132px;">
                             <?php echo $isi;
                 ?>
                      </p>
                    </div>
                  </div>

     






						</div>
						<?php }?>
					</div>
				</div>
			</div>



		</div>
		</div>