

<link href="assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css" />

         <script src="dropzone.js" type="text/javascript"></script>

    <script type='text/javascript' src='textboxio/textboxio.js'></script>
    <script type="text/javascript" src="assets/plugins/dropzone/dropzone.min.js"></script>
    <style>
.page-container .page-content-wrapper .content {
    z-index: 10;
    padding-top: 11px;
    padding-bottom: 69px;
    min-height: 100%;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
}


.dropzone a.dz-remove, .dropzone-previews a.dz-remove {
    background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0,#fafafa),color-stop(1,#dc1d1d));
    background-image: -webkit-linear-gradient(top,#f71635 0,#cc2c93 100%);
    color: white !important;
    background-image: -moz-linear-gradient(top,#fafafa 0,#eee 100%);
    background-image: -o-linear-gradient(top,#fafafa 0,#eee 100%);
    background-image: -ms-linear-gradient(top,#fafafa 0,#eee 100%);
    background-image: linear-gradient(top,#fafafa 0,#eee 100%);
    -webkit-border-radius: 2px;
    border-radius: 2px;
    border: 1px solid #eee;
    text-decoration: none;
    display: block;
    padding: 4px 5px;
    text-align: center;
    margin-top: 26px;
}

.ephox-polish-editor-container.ephox-polish-editor-main, .ephox-polish-source-container {
    border: 1px solid #29292959;
}

.dropzone {
    border: 1px solid rgba(0, 0, 0, 0.37);
    min-height: 360px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    background: rgba(0, 0, 0, 0.03);
    padding: 23px;
}

	.dz-message{
	    text-align: center;
	    font-size: 28px;
	}
      body {
        font-family: sans-serif;
        overflow-y: scroll;
      }
      a.mono {
        font-family: monospace;
      }
      span.code {
        font: normal 1.1em monospace;
        background-color: rgba(0,0,0,0.1);
        border: 1px solid rgba(0,0,0,0.2);
      }
      span.status {
        padding: 1em;
        color: white;
        position: fixed;
        right:2%;
        top:2em;
      }
      span.status-off {
        background: red;
      }
      span.status-off::after {
        content: 'Off';
      }
      span.status-off {
        background: red;
      }
      span.status-on::after {
        content: 'On';
      }
      span.status-on {
        background: green;
      }
      .accordion {
        padding: 0.5em;
        background-color: rgba(0, 0, 0, 0.2);
        border: 1px solid transparent;
      }
      .accordion:hover {
        cursor: pointer;
        border-color: black;
        background-color: rgba(0, 0, 0, 0.1);
      }
      .accordion:before {
        content: '\025B6';
        font-size: 12px;
        margin: 5px;
        display: inline-block;
        transition: transform 0.1s linear 0.2s;
        transform: rotate(0deg);
      }
      .accordion.active:before {
        transition: transform 0.1s linear;
        transform: rotate(90deg);
      }
      .panel {
        transition: opacity 0.3s ease, max-height 0.2s linear 0.1s;
        max-height: 0px;
        opacity: 0;
        overflow: hidden;
      }
      .panel.show {
        max-height: 37469px;
        opacity: 1;
      }
    </style>

  <script>
      var instantiateTextbox = function () {

        // listen for clicks on accordion elements
        document.body.addEventListener('click', function (event) {
          if (event.target.classList.contains('accordion')) {
            var header = event.target;
            var panel = header.nextElementSibling;
            header.classList.toggle('active');
            panel.classList.toggle('show');
          }
        });

        // load textbox.io with default settings twice, so one of them is in the more drawer
        textboxio.replaceAll('textarea', {
          ui: {
            toolbar: {
              items: [
                'undo', 'insert', 'style', 'emphasis', 'align', 'listindent', 'format', 'tools',
                'undo', 'insert', 'style', 'emphasis', 'align', 'listindent', 'format', 'tools'
              ]
            }
          }
        });
      };
    </script>

<div class=" container-fluid   container-fixed-lg">

<div class="card card-transparent">
<div class="card-header ">
<div class="card-title">
</div>
</div>
<div class="card-block">
<div class="row">
<div class="col-md-12">
<h3 style="margin-top: 3%;">Tambah Koreksi Aplikasi</h3>
<p>Tambahkan keluhan aplikasi kami dibawah ini dengan cepat kami akan memprosessnya.
</p>
<br>
<div id="form-work" class="form-horizontal" role="form" autocomplete="off">
<?php 

     $dataPemda = mysql_fetch_array(mysql_query("SELECT * FROM ref_pemda where id='".$dataUser['instansi']."'"));

 ?>
<div class="form-group row">
<label class="col-md-3 ">PEMDA </label>
<div class="col-md-9">
<div class="row">
<div class="col-md-12">
<input type="text"  class="form-control" style='color: rgb(98, 98, 98);' readonly value="<?php echo $dataPemda['nama']; ?>">
</div>
</div>
</div>
</div>


<div class="form-group row">
<label for="aplikasi" class="col-md-3 ">KOREKSI APLIKASI</label>
<div class="col-md-9">
	<div class="row">
	<div class="col-md-12">


<select name='aplikasi' class="form-control" id="aplikasi" ng-model="aplikasi">
  <option value=""> -- Pilih Aplikasi -- </option>
<?php 
    $queryAplikasi = mysql_query("SELECT * FROM produk");

    while ($data = mysql_fetch_array($queryAplikasi)) {
?>

  <option value="<?php echo $data['id']; ?>"><?php echo $data['nama_produk']; ?></option>
<?php
    }
?>

</select>
</div>
</div>
</div>
</div>
<div class="form-group row">
<label for="name" class="col-md-3 ">DESKRIPSI UNTUK KOREKSI</label>
<div class="col-md-9">
    <div class="row">
	<div class="col-md-12">
        <textarea id="textbox" style="width: auto; height: 400px;">
   

        </textarea>
        
</div>
</div>
</div>
</div>

<div class="form-group row">
<label for="name" class="col-md-3 ">Upload File</label>
<div class="col-md-9">
    <div class="row">
	<div class="col-md-12">
            <div class='content'>
            <form action="upload.php" class="dropzone" id="myAwesomeDropzone"> 
            </form>  
            </div> 
</div>
</div>
</div>
</div>


<br>
<div class="row">
<div class="col-md-3">
<p>I hereby certify that the information above is true and accurate. </p>
</div>
<div class="col-md-9">
<button class="btn btn-success" type="button" id="button" onclick="Koreksi();"><i class="fa fa-save"></i> Submit</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>






        <script type='text/javascript'>
        Dropzone.autoDiscover = false;
        $(".dropzone").dropzone({
            addRemoveLinks: true,
            removedfile: function(file) {
                var name = file.name;    
                
                $.ajax({
                    type: 'POST',
                    url: 'upload.php',
                    data: {name: name,request: 2},
                    sucess: function(data){
                        console.log('success: ' + data);
                    }
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        });
        </script>