<?php
error_reporting(0);
require("include/config.php");

if ($_SESSION['userid']) { 
   
   header("Location:dashboard.php");
}

$submitted_username = '';

if (isset($_POST['login'])) {

    // This query retreives the user's information from the database using
    // their username.
    $query = "
        SELECT * FROM pdu_user WHERE email = :username
    ";
    // The parameter values
    $query_params = array(
        ':username' => $_POST['username']
    );
	
    try { 
        // Execute the query against the database
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex) { 
        die("Failed to run query: " . $ex->getMessage());
    }

    $login_ok = false;
    	
    $row = $stmt->fetch();
    

    if ($row) { 
         $check_password = hash('sha256', $_POST['password'] . $row['salt']);
        

	
	
        if ($check_password === $row['password']) { 
            // If they do, then we flip this to true 
            $login_ok = true;	
           
        }
    }
 
    if ($login_ok) { 
		
        unset($row['salt']);
        unset($row['password']);
         $_SESSION['userid']=[];
         $_SESSION['userid'] = $row;
        // Redirect the user to the private members-only page.
		
        header("Location: dashboard.php");
        die("Redirecting to: dashboard.php");
    }
    else {
        // Tell the user they failed
        $msgs="Login failed, Wrong user credentials.!!";

        $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
    }
	
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *Must* come first in the head; any other head content must come *after* these tags -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Title -->
    <title>Edhut - Education &amp; Courses | Login</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon-2.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
<style>

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #7890e1;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>

<body>

    <!-- ##### Header Area Start ##### -->
    <?php include 'include/header.php'; ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Regular Page Area Start ##### -->
    <div class="regular-page-area section-padding-60" style="padding-top:50px;padding-bottom:20px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-3">
                          <h4 class="text-center">Login</h4>
                          <form class="modal-content animate" action="" method="post">
							<div class="container">
							  <label for="uname"><b>Username</b></label>
							  <input type="text" placeholder="Enter Username" name="username" required>

							  <label for="psw"><b>Password</b></label>
							  <input type="password" placeholder="Enter Password" name="password" required>
								
							  <button type="submit" name="login">Login</button>
							  <!--<label>
								<input type="checkbox" checked="checked" name="remember"> Remember me
							  </label>-->
							</div>

							<!--<div class="container" style="background-color:#f1f1f1">
							  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
							  <span class="psw">Forgot <a href="#">password?</a></span>
							</div>-->
						  </form>

                </div>
            </div>
        </div>
    </div>
    <!-- ##### Regular Page Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
   <?php include 'include/footer.php'; ?>
    
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>


</body>

</html>