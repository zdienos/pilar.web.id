<style type="text/css">
	#paging_button ul{width: 100%; padding:0px; margin:8px;}
#paging_button ul li { font-family:Arial, Helvetica, sans-serif;text-align:center; padding:10px 15px 10px 15px;background:#0099FF;color:#ffffff; float:left; list-style:none;cursor:pointer}
#paging_button ul li:hover{ color: #fff; cursor: pointer;background:#333333;}
.title {
    margin-top: -36px;
    margin-bottom: 25px;
    min-height: 32px;
}
</style>
<script type="text/javascript" src="jquery-1.3.2.js"></script>
<script>
$(document).ready(function(){
	//show loading bar
	function showLoader(){
		$('.loading').fadeIn(500);
	}
	//hide loading bar
	function hideLoader(){
		$('.loading').fadeOut(500);
	};
	
	$("#paging_button li").click(function(){
		//show the loading bar
		showLoader();
		
		$("#paging_button li").css({'background-color' : ''});
		$(this).css({'background-color' : '#333333'});

		$("#content").load("dataInformasi.php?page=" + this.id, hideLoader);
	});
	
	// by default first time this will execute
	$("#1").css({'background-color' : '#333333'});
	showLoader();
	$("#content").load("dataInformasi.php?page=1", hideLoader);
});
</script>
<!-- start:SCRIPT PHP -->
<?php 
$db_host='localhost';
$db_user='root';
$db_password='since1945';
$db_name='pilar_web';

mysql_connect($db_host,$db_user,$db_password);
mysql_select_db($db_name);

$per_page = 2;
$sql = "select * from informasi";
$rows2= mysql_query($sql);
$count = mysql_num_rows($rows2);
$pages = ceil($count/$per_page);
 ?>
<div class="loading"><label><img src="loader.gif" alt=""  width="30" height="15"/></label></div>



<div class="team-3" style="background: #fff;">

		<div class="container">

			<div class="row">

				<div class="col-md-10 col-md-offset-1">
					<h3 class="title"><img src="images/judul/informasi.png" style="width: 34%;"></h3>
						<hr>
					<br />

<div id="content">
	
</div>
<hr>
<div id="paging_button">
		        						<ul class="pagination">
		        							<?php for($i=1; $i<=$pages; $i++) { echo '<li id="'.$i.'">'.$i.'</li>'; }?>
		        						 </ul>
		        					</div>

						</div>
					</div>
				</div>
			</div>



		</div>
		</div>