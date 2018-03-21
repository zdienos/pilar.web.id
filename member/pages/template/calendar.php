
<div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-xs-12">
                <div id="bootstrapModalFullCalendar"></div>
            </div>
        </div>
    </div>

    <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>
                <div id="modalBody" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" id="btn" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <a class="btn btn-primary" id="eventUrl" target="_blank">Lihat Acara</a>
                </div>
            </div>
        </div>
    </div>

   

    <script>
        $(document).ready(function() {
            $('#bootstrapModalFullCalendar').fullCalendar({
                header: {
                    left: '',
                    center: 'prev title next',
                    right: '',
                    color: '#777777',
					backgroundColor: '#000'
                },
                eventClick:  function(event, jsEvent, view) {
                    $('#modalTitle').html(event.title);
                    $('#modalBody').html(event.description);
                    $('#eventUrl').attr('href',event.url);
                    $('#fullCalModal').modal();
                    return false;
                },
                events:
                [

                <?php

                session_start();
                   $dataUsers = mysql_fetch_array(mysql_query("SELECT * FROM users where username='".$_SESSION['username']."'"));
                   $sql = mysql_query("SELECT * from  reservasi_acara where id_user = '".$dataUsers['id']."'");
                  while ($data = mysql_fetch_array($sql)) {
                  $dataAcara = mysql_fetch_array(mysql_query("SELECT * from acara where id = '$data[id_acara]'"));
                  $lama = $dataAcara['lama_acara'];
				 $daterange = date_create( $dataAcara['tanggal'] . ' + '.$lama.' day' )->format( 'Y-m-d' );

				      $isi = strip_tags($dataAcara['deskripsi']);

      if (strlen($isi) > 150) {

          $stringCut = substr($isi, 0,200);

          $isi = substr($stringCut, 0, strrpos($stringCut, ' ')); 
      }

                  $json =  '            {
                      "title":"'.$dataAcara['nama_acara'].'",
                      "allday":"false",
                      "description":"'.$isi.'<br> <br>'.date("d M, Y", strtotime($dataAcara['tanggal']))."<span> - </span>".$dataAcara['jam'].'",
                      "start": "'.$dataAcara['tanggal'].'",
       				  "end": "'. $daterange.'",
                      "url":"http://pilar.web.id/?page=viewAcara&id='.$dataAcara['id'].'&koordinat='.$dataAcara['koordinat'].'"
                   },';

                 echo  $json;
                ?>
      
                   <?php
                    	}
                   ?>
                   
                ]
            });
        });
    </script>
</body>
</html>