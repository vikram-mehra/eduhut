<?php
session_start();
error_reporting(0);
include("config.php"); 
if(isset($_POST['login'])){
$username = $_POST['username']; 
$password = $_POST['password'];
// To protect MySQL injection
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$sql="SELECT * FROM login_admin WHERE username='$username' and password='$password'";
$result=mysqli_query($con,$sql);$count=mysqli_num_rows($result);
if($count==1)
  {
  $user_data=mysqli_fetch_array($result);
  $email=$user_data['username'];  
  $_SESSION['user_spritEducation']= $email; // storing username in session  
  header("location: dashboard.php");
  }  else
  {
  $msg = "User Name or Password doesn`t match";
  //header("Location:index.php?$msg");
  }
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
      <title>Edhut Education Solution</title>
      <meta content="Admin Dashboard" name="description">
      <meta content="Themesbrand" name="author">
      <link rel="shortcut icon" href="http://edhutsolutions.com/img/core-img/favicon-2.png">
      <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
      <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
      <link href="assets/css/style.css" rel="stylesheet" type="text/css">
	  <style>
	body{    background: #025cab !important;
	
	}
	.custum-page {
     margin: 4.5% auto;
    }
	.custom-bor{
	border-bottom:1px dashed #fff}
	 .card-back {
   
	background-color: #c5cbd0!important;
     }
	 .card-back label{
		 color:#fff;
	 }
	.custom {
    
    background-color: transparent !important;
	padding: 20px 15px !important;
	color:black !important;
   
}
.custom-check::before{
	background:rgba(0,0,0,0.7) !important;
}
.custom::placeholder {
    color: black;
    opacity: 1;
	font-size:14px;
}
	</style>
    </head>
   <body>
      <div class="wrapper-page custum-page">
         <div class="card overflow-hidden account-card mx-3 card-back ">
            <div class="p-4 text-white text-center position-relative custom-bor">
               <h4 class="font-20 m-b-5">Welcome to Edhut</h4>
               <p class="text-white-50 mb-4">Sign in.</p>
               <a href="#" class="logo logo-admin"><img src="http://edhutsolutions.com/img/core-img/favicon-2.png" height="24" alt="logo"></a>
            </div>
			
            <div class="account-card-content">
			   <p class="text-danger text-center"><?php echo $msg;?></p>
               <form class="form-horizontal m-t-30" action="" method="post">
                  <div class="form-group"><label for="username">Username</label> <input type="text" class="form-control custom" name="username" placeholder="Enter username"></div>
                  <div class="form-group"><label for="userpassword">Password</label> <input type="password" class="form-control custom" name="password" placeholder="Enter password"></div>
                  <div class="form-group row m-t-20">
                     <!--<div class="col-sm-6">
                        <div class="custom-control custom-checkbox "><input type="checkbox" class="custom-control-input" id="customControlInline"> <label class="custom-control-label custom-check" for="customControlInline">Remember me</label></div>
                     </div>-->
                     <div class="col-sm-6 text-right"><button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="login">Log In</button></div>
                  </div>
                  <!--<div class="form-group m-t-10 mb-0 row">
                     <div class="col-12 m-t-20"><a href="#"><i class="mdi mdi-lock"></i> Forgot your password?</a></div>
                  </div>-->
               </form>
            </div>
         </div>
         <!--<div class="m-t-40 text-center">
            <p>Don't have an account ? <a href="#" class="font-500 text-primary">Signup now</a></p>
            <p>© 2019 Design by Creativeinfozone</p>
         </div>-->
      </div>
      <!-- end wrapper-page --><!-- jQuery  -->
	  <script src="assets/js/jquery.min.js"></script>
	  <script src="assets/js/bootstrap.bundle.min.js"></script>
	  <script src="assets/js/metisMenu.min.js"></script>
	  <script src="assets/js/jquery.slimscroll.js">
	  </script><script src="assets/js/waves.min.js"></script>
	  <!-- App js -->
	  <script src="assets/js/app.js"></script>
   </body>
   