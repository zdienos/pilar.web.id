
<div class="team-3">

    <div class="container">

          <h3 class="title"  style="margin-bottom: -15px;">Produk</h3>
            <hr>
               <h5 class="description" style="margin-bottom: 4%;">Produk yang telah kami buat.</h5>


        <div class="row">



    <?php
$query = mysql_query("SELECT * from produk where status='1' order by id desc");
          while ($data = mysql_fetch_array($query)) {
                        $array = json_decode($data['screen_shot']) ;

                                $isi = strip_tags(base64_decode($data['deskripsi']));

      if (strlen($isi) > 100) {

          $stringCut = substr($isi, 0, 100);

          $isi = substr($stringCut, 0, strrpos($stringCut, ' ')); 
      }
    ?>

          <div class="col-md-4">
          <div class="card card-blog">
                    <div class="card-image">
                      <a href="#" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>">
                        <img class="img"  src="http://cs.pilar.web.id/<?php echo $data['image_title']; ?>">
                      </a>
                    <div class="colored-shadow" style="background-image: url('http://cs.pilar.web.id/<?php echo $data['image_title']; ?>'); opacity: 1;"></div><div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 84.5px; top: 36px; background-color: rgba(0, 0, 0, 0.87); transform: scale(41.25);"></div></div></div>

                    <div class="card-content" >

                      <h4 class="card-title">
                        <a href="?page=produk&id=<?php echo$data['id'];?>"><?php echo $data['nama_produk']; ?></a>
                      </h4>
                      <p class="card-description" style="height: 100px;">
                             <?php echo $isi;
                 ?>
                      </p>
                      <div class="footer">
                                        <div class="author">
                  <button class="btn btn-rose btn-raised btn-round btn-block" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>">
                 <i class="material-icons">camera_enhance</i>
                          ScreenShot
                      <div class="ripple-container"></div></button>
                                        </div>
                                    </div>
                    </div>
                  </div>
</div>



<div class="modal fade" id="myModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width: 96%;">
        <div class="modal-content" >
           
            <div class="modal-body" style="padding:  1%;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons" style="background:  red;color: white;">clear</i>
                </button>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                                 <div class="card card-raised card-carousel" style='margin-bottom: 0px;'>
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <div class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                    <?php 

          for ($i = 0; $i < count($array); $i++) {
            if ($no =="") {
                 echo '<div class="item active">
                                 <img src="http://cs.pilar.web.id/'.$array[$i]->fileName.'" alt="Awesome Image" >
                                 <div class="carousel-caption" style="padding-bottom: 0%;">
                                     <h4 >'.$array[$i]->desc.' </h4>
                                 </div>
                             </div>';
            }else{
                   echo '<div class="item">
                                 <img src="http://cs.pilar.web.id/'.$array[$i]->fileName.'" alt="Awesome Image" >
                                 <div class="carousel-caption" style="padding-bottom: 0%;">
                                     <h4 >'.$array[$i]->desc.'</h4>
                                 </div>
                             </div>';
            }

            $no = "monyet";
           
?>
           
        
         <?php
         
            }
$no ="";
            ?>
                         
                                    </div>

                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                        <i class="material-icons">keyboard_arrow_left</i>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
  
            </div>
        </div>
    </div>
</div>

<?php
}
?>

        </div>

        </div>
        </div>



