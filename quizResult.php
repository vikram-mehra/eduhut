<?php require_once 'include/header2.php';


if (!empty($_SESSION['userid'])) { 
   
  // header("Location:login.php");
}



$id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *Must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Edhut - Professional Certification Provider | QuizResult</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon-2.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

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

    <!-- ##### Header Area Start ##### -->
      <?php include 'include/header.php'; ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Regular Page Area Start ##### -->
    <div class="regular-page-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                      <div class="card shadow-sm quiz">
	    <div class="card-body">
		<center><img class="img responsive" src="imageedit_5_9719181650.png" style="height:100px;" /></center>
		<h4 class="text-center">Your Score:-&nbsp;&nbsp;<span class="text-success"><?php 
					$sqlquery=mysqli_query($con,"SELECT  count(right_answer) as count FROM `tbl_user_scores` WHERE user_id='$userid' and exam_id='$id' and  right_answer!=''");
					$rowcount=mysqli_fetch_assoc($sqlquery);
					echo $count=$rowcount['count']; 
					?></span></h4>
		 <table class="table table-bordered"> 
			<tbody>
			  <tr>      
				<th >Correct Answer</th>
				<td class="text-success"><b ><?php 
					$sqlquery=mysqli_query($con,"SELECT  count(right_answer) as count FROM `tbl_user_scores` WHERE user_id='$userid' and exam_id='$id' and  right_answer!=''");
					$rowcount=mysqli_fetch_assoc($sqlquery);
					echo $count=$rowcount['count']; 
					?></b></td>
			  </tr>
			  <tr>
				<th>Not Attend Answer</th>
				<td class="text-warning"><b><?php 
					$sqlquery=mysqli_query($con,"SELECT  count(unanswered) as count FROM `tbl_user_scores` WHERE user_id='$userid' and exam_id='$id'  and right_answer='' and wrong_answer='' ");
					$rowcount=mysqli_fetch_assoc($sqlquery);
					echo $count=$rowcount['count']; 
					?></b></td>
			  </tr>
			  <tr>
				<th>Wrong Answer</th>
				<td class="text-danger"><b><?php 
					$sqlquery=mysqli_query($con,"SELECT  count(wrong_answer) as count FROM `tbl_user_scores` WHERE user_id='$userid' and exam_id='$id' and wrong_answer!='' ");
					$rowcount=mysqli_fetch_assoc($sqlquery);
					echo $count=$rowcount['count']; 
					?></b></td>
			  </tr>
			  <tr>
			  <th>Download Answer Key</th>			    <?php 			 		$exam_master_id=@$_GET['id'];					$examMaster=mysqli_query($con,"SELECT * FROM `tbl_exam_master` WHERE id='$exam_master_id'");					$examMasterData=mysqli_fetch_assoc($examMaster);				?>
			  <td><a href="admin/uploads/<?php echo $examMasterData['examkeyPDF']; ?>" class="btn btn-warning btn-sm text-center" style="color:white" download>Download</a></td>
			  </tr>
			</tbody>
		  </table>
		<center> <a href="dashboard.php" class="btn btn-danger btn-sm text-center"
                    id="right" style="color:white"> 
                Back
         </a></center>
		 
		</div>
		
		
	    </div>
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
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script type='text/javascript'>

$(function() {
$('.jj').on('click',function() {   
var x = $(this).data('file');
//alert(x);
$('#myhidden').val(x);
var fileid = x;
var userid = $('#userid').val();
//debugger;
$.ajax({
				url: "ajax-insert.php",
				type: "POST",
				data: {
					fileid: fileid,
					userid: userid			
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);					
				}
			});
			window.location.href = "dashboard.php";
});
}); 


</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');

</script>
<script>
  $(document).ready(function() {
    $('#datatable').dataTable();
 } );
   $(document).ready(function() {
    $('#datatables').dataTable();
 } );
   $(document).ready(function() {
    $('#datatabless').dataTable();
 } );
</script>

</body>

</html>