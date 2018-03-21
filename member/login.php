<?php
include 'config/config.php';

if ($_SESSION['username'] == "") {

$id = $_GET['id'];
$kategori = $_GET['kategori'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Member | Pilar Wahana Artha</title>
  <meta charset="UTF-8">

  <link rel="apple-touch-icon" sizes="76x76" href="img/logoP.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/logoP.png">
<link rel="apple-touch-icon" sizes="152x152" href="img/logoP.png">
  <link rel="icon" type="image/png" href="img/logoP.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.5/sweetalert2.css" rel="stylesheet" type="text/css" />
<!--===============================================================================================-->
</head>
<body style="background: linear-gradient(to top left, #33ccff 0%, #0095b7 100%);">
  
  <div class="limiter">
    <div class="container-login100" style="background: transparent;">
      <div class="wrap-login100">
        <form class="login100-form validate-form">

          <span class="login100-form-title p-b-26" style="margin-top: -9%;padding-bottom: 20%;font-size: 21px;color: #7d7d7d;">
            Member Area 
          </span>
    
<script src="js/login.js" type="text/javascript"></script>
    <input type="hidden" name="idAcara" id="idAcara" value="<?php echo $id; ?>">
            <input type="hidden" name="kategori" id="kategori" value="<?php echo $kategori; ?>">

          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="username" id="username">
        
            <span class="focus-input100" data-placeholder="Username"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password" id="password">
            <span class="focus-input100" data-placeholder="Password"></span>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" onclick="Login()" id="button" type="button">
                Login
              </button>
            </div>
          </div>


        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.5/sweetalert2.js" type="text/javascript"></script>
</body>

</html>

<?php 

}else{
  header("location:index.php");
}

 ?>