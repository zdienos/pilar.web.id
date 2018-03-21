<style type="text/css">
  .navbar.navbar-primary .dropdown-menu li > a:hover, .navbar.navbar-primary .dropdown-menu li > a:focus {
    color: #016080;
    background-color: #6be4f4;
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
}
.dropdown-menu>li>a {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #f1efef;
    white-space: nowrap;
}
@media  (max-width: 768px){
.navbar .navbar-collapse .open .dropdown-menu > li > a{
    color: #ffffff;
    margin: 0;
    padding-left: 46px;
}
}
</style>

<nav class="navbar navbar-primary navbar-fixed-top" id="sectionsNav" style="background-color:  #fff; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 12px -5px rgba(18, 132, 214, 0.4); color: #737171;">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar" style="color: #737171;"></span>
                <span class="icon-bar" style="color: #737171;"></span>
                <span class="icon-bar" style="color: #737171;"></span>
            </button>
            <a class="navbar-brand" href="index.php" style="padding: 2px 15px;"><img src="images/Logo/logo.png"></a>
          </div>

          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right" >

            <li>
            <a href="index.php">
              <i class="material-icons">home</i> HOME
            </a>
          </li>


          <li>
            <a href="?page=informasis">
            <i class="material-icons">chrome_reader_mode</i>Informasi
            </a>
          </li>
          
          <li>
            <a href="?page=acara">
           <i class="material-icons">event</i>Acara
            </a>
          </li>
          
          <li>
            <a href="?page=produks">
            <i class="material-icons">important_devices</i>Produk
            </a>
          </li>

         <li>
            <a href="?page=lowonganKerjas">
            <i class="material-icons">business_center</i>Loker
            </a>
          </li>



         <li>
         	<a href="/member/login.php?kategori=support">
         		<i class="material-icons">bug_report</i> SUPPORT
         	</a>
         </li>

            <li class="dropdown" >
              <a href="/" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">account_box</i>PROFILE <b class="caret"></b></a>
              <ul class="dropdown-menu" style="background: #058188;margin-top: 8%;">
                <li><a href="?page=tentang"><i class="material-icons">business</i> TENTANG KAMI </a></li>
                <li><a href="?page=contact"><i class="material-icons">account_box</i> KONTAK KAMI </a></li>
              
              </ul>
            </li>
    
<?php

        if ($_SESSION['username'] == "") {

?>
          <li>
            <a href="/member/login.php">
              <i class="material-icons">launch</i>Login
            </a>
          </li>

<?php
}else{
?>

          <li>
            <a href="/member/logout.php">
             <i class="material-icons">power_settings_new</i>Logout
            </a>
          </li>


<?php
}
?>
<!--                    <li class="dropdown" id="headerNavigationItems">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="material-icons">view_day</i> #Contoh Dropdown
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-with-icons" style="background-color: #016080;">
              <li>
                <a href="#">
                  <i class="material-icons">dns</i> Headers
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="material-icons">build</i> Features
                </a>
              </li>
                            <li>
                <a href="#">
                  <i class="material-icons">dns</i> Headers
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="material-icons">build</i> Features
                </a>
              </li>
                            <li>
                <a href="#">
                  <i class="material-icons">dns</i> Headers
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="material-icons">build</i> Features
                </a>
              </li>

            </ul>
          </li> -->


            </ul>
          </div>
      </div>
    </nav>