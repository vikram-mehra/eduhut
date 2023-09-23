<?php
session_start();
error_reporting(0);
require_once('config.php');
header( 'Content-Type: text/html; charset=utf-8' ); 
if(!(isset($_SESSION['MyRoboQuiz']) && $_SESSION['MyRoboQuiz']!= '')) 
{
header ("Location: register");
}
$id=$_GET['id'];
$cid=$_GET['cid'];
$sid=$_GET['sid'];
$userid=$_SESSION['MyRoboQuiz'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Test Series</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=MML_HTMLorMML"></script>
  <!-- Custom css -->
   <link rel="stylesheet" href="../FreeDownload/style.css">
    <!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">

  	<style>
	#pag_num {
    margin: -213px 0px 0px 660px;
    padding: 10px;
    width: 240px;
    height: 233px;
    float: left;
    border: solid 1px #c8c8c8;
	}
	#pag_num {
		margin: -213px 0px 0px 660px;
		padding: 10px;
		width: 240px;
		height: 233px;
		float: left;
		border: solid 1px #c8c8c8;
	}
	#container .pagination {
		width: auto;
		height: auto;
	}

	.pagination {
	  display: inline-block;
	}

	.pagination a {
	  color: black;
	  float: left;
	  padding: 8px 16px;
	  text-decoration: none;
	  transition: background-color .3s;
	  border: 1px solid #ddd;
	  margin: 0 4px;
	  font-size: 10px;
	}

	.pagination a.active {
	  background-color: #4CAF50;
	  color: white;
	  border: 1px solid #4CAF50;
	}

	.pagination a:hover:not(.active) {background-color: #ddd;}

	.anchor {
	  color: black;
	  float: left;
	  padding: 8px 16px;
	  text-decoration: none;
	  transition: background-color .3s;
	  border: 1px solid #ddd;
	  margin: 0 4px;
	  font-size: 10px;
	}
	ul {
    list-style: none;
}
li {
    font-family:'Cambria', serif;
    font-size: 20px;
}
input[type=radio] {
    border: 0px;
    width: 20px;
    height: 2em;
}
.checkbox-inline, .radio-inline {
    position: relative;
    display: inline-block;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    vertical-align: middle;
    cursor: pointer;
}
	</style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-sm bg-white sticky-top shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="https://myteachingrobot.in/">
      <img src="../img/logo.png" alt="" width="125" height="45">
    </a>

	  <a href="logout" class="btn btn-outline-primary ">Logout</a>
    </div>
	 
  </div>
</nav>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item ml-2"><a href="https://myteachingrobot.in/" style="color:#333">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a class="active" href="#" onclick="history.go(-1)">Back</a></li>
  </ol>
</nav>

<div class="container">
  <div class="row">
		 <div class="col-12 text-center mt-4">
		  <h1 class="about-title">Welcome To <span>My Digital Library</span></h1>
          <p class="about-sub-title">A one place solution for selection in AMU/ JMI Entrance Exam. </p>
		 </div>
  </div>
  <div class="row">
     <div class="col-md-12">
     
	    <div class="card shadow-sm quiz">
	    <div class="card-body">
		<center><img class="img responsive" src="imageedit_5_9719181650.png" style="height:100px;" /></center>
		<h4 class="text-center">Result:</h4>
		 <p class="card-text text-center" style="margin-bottom:0.2rem;">
			Your Score:&nbsp;
			<?php 
			$sqlquery=mysqli_query($con,"SELECT  count(right_answer) as count FROM `tbl_user_scores` WHERE user_id='$userid' and exam_id='$cid' and set_id='$id' and subject_id='$sid' and  right_answer!=''");
            $rowcount=mysqli_fetch_assoc($sqlquery);
            echo $count=$rowcount['count']; 
            ?>
		 </p>		 
		 <p class="card-text text-center" style="margin-bottom:0.2rem;">
			No. of Wrong Answer:&nbsp;
			<?php 
			$sqlquery=mysqli_query($con,"SELECT  count(wrong_answer) as count FROM `tbl_user_scores` WHERE user_id='$userid' and exam_id='$cid' and set_id='$id' and subject_id='$sid' and wrong_answer!='' ");
            $rowcount=mysqli_fetch_assoc($sqlquery);
            echo $count=$rowcount['count']; 
            ?>
		 </p>
		 <p class="card-text text-center" style="margin-bottom:0.2rem;">
			No. of Not Answered:&nbsp;
			<?php 
			$sqlquery=mysqli_query($con,"SELECT  count(unanswered) as count FROM `tbl_user_scores` WHERE user_id='$userid' and exam_id='$cid' and set_id='$id' and subject_id='$sid' and right_answer='' and wrong_answer='' ");
            $rowcount=mysqli_fetch_assoc($sqlquery);
            echo $count=$rowcount['count']; 
            ?>
		 </p>
		 <a href="Category.php" class="btn btn-danger btn-sm text-center"
                    id="right" style="color:white"> 
                Back
         </a>
		</div>
		
		
	    </div>
	 
     </div>
    
   <div class="col-12 text-center footer-text mt-4">
    <p>&copy; 2019 myteachingrobot.in </p>
   </div>
					
  </div>
  
</div>


</body>
</html>