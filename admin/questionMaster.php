<?php 
session_start(); 
include("config.php");
if(!(isset($_SESSION['user_spritEducation']) && $_SESSION['user_spritEducation'] != '')){
	header ("Location:login.php");
}

if(isset($_GET['id']))
{
                     $student_id=$_GET['id'];
					 $sql="select * from tbl_question_master where id=$student_id";
					 $resultquery=mysqli_query($con,$sql);
					 $heading=mysqli_fetch_array($resultquery,MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
	<title>Edhut Education Solution :: Question Master</title>
	<meta content="Admin Dashboard" name="description">
	<meta content="Themesbrand" name="author">
	<link rel="shortcut icon" href="http://edhutsolutions.com/img/core-img/favicon-2.png">
	<!--Chartist Chart CSS -->
	<link rel="stylesheet" href="plugins/chartist/css/chartist.min.css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Begin page -->
	<div id="wrapper">
		<!-- Top Bar Start -->
		<?php include("include/top_header.php");?>
		<!-- Top Bar End -->
		<!-- ========== Left Sidebar Start ========== -->
		<?php include("include/side_menu.php");?>
		<!-- Left Sidebar End -->
		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<!-- ============================================================== -->
		<div class="content-page">
			<!-- Start content -->
			<div class="content">
				<div class="container-fluid">
					<div class="page-title-box">
						<div class="row align-items-center">
							<div class="col-sm-6">
								<h4 class="page-title">Question Master</h4>
							</div>
						</div>
					</div>
					<!-- end row -->
					<div class="row">
			           <div class="col-12">
			                <?php
        					if(isset($_GET['msg']))
        					{						
        						echo '<div class="alert alert-warning">
        						  <strong>Mobile No Or Email Already Exit!</strong>
        						</div>';
        					}
        					elseif(isset($_GET['success']))
        					{
        						echo '<div class="alert alert-success">
        						  <strong>User Added Successfully!</strong>
        						</div>';
        					}
        					?>
							<div class="card">
								<div class="card-body">

									 <form class="repeater" enctype="multipart/form-data"  name="form1" method="post" action="questionInsert.php">
									 <div>
											<div class="row">
											    <input type="hidden" name="questionID" value="<?php if(isset($_GET['id'])){echo $heading['id'];} ?>" />
											    <div class="form-group col-lg-4">
												<label for="example-text-input" class="col-sm-6 col-form-label">Exam Type<span style="color:red;">*</span></label>
												<select class="form-control" name="examName" id="boardname" required>
													<option value="">Select Exam Type</option>
													<?php
													$sql="select * from tbl_exam_master ";
													$result=mysqli_query($con, $sql);
													while($row=mysqli_fetch_array($result))
													{
													?>
													<option value="<?php echo $row['id']; ?>" <?php if(isset($_GET['id']) && $heading['exam_id'] == $row['id']){ echo 'selected';} ?>><?php echo $row['examName']; ?></option>
													<?php
													}
													?>
												</select>
												</div>
												<div class="form-group col-lg-8">
													<label for="name">Question Name<span style="color:red;">*</span></label>
													<textarea rows="6" col="6" name="question_name" class="form-control" required ><?php if(isset($_GET['id'])){echo $heading['question_name'];} ?></textarea>
												</div>
                                                <div class="form-group col-lg-3">
													<label for="name">Option A<span style="color:red;">*</span></label>
													<textarea rows="6" col="6" name="option1" class="form-control" required ><?php if(isset($_GET['id'])){echo $heading['option1'];} ?></textarea>
												</div>
                                                <div class="form-group col-lg-3">
													<label for="name">Option B<span style="color:red;">*</span></label>
													<textarea rows="6" col="6" name="option2" class="form-control" required ><?php if(isset($_GET['id'])){echo $heading['option2'];} ?></textarea>
												</div>
                                                <div class="form-group col-lg-3">
													<label for="name">Option C<span style="color:red;">*</span></label>
													<textarea rows="6" col="6" name="option3" class="form-control" required ><?php if(isset($_GET['id'])){echo $heading['option3'];} ?></textarea>
												</div>
                                                <div class="form-group col-lg-3">
													<label for="name">Option D<span style="color:red;">*</span></label>
													<textarea rows="6" col="6" name="option4" class="form-control" required ><?php if(isset($_GET['id'])){echo $heading['option4'];} ?></textarea>
												</div>
                                                <div class="form-group col-lg-6">
													<label for="name">Correct Ans<span style="color:red;">*</span></label>
													<select class="form-control" name="correct_ans" required>
													<option value="A" <?php if(isset($_GET['id']) && $heading['correct_ans'] == 'A'){ echo 'selected';} ?>>A</option>
													<option value="B" <?php if(isset($_GET['id']) && $heading['correct_ans'] == 'B'){ echo 'selected';} ?>>B</option>
													<option value="C" <?php if(isset($_GET['id']) && $heading['correct_ans'] == 'C'){ echo 'selected';} ?>>C</option>
													<option value="D" <?php if(isset($_GET['id']) && $heading['correct_ans'] == 'D'){ echo 'selected';} ?>>D</option>
													</select>
												</div>
												
												
												<div class="col-lg-2 align-self-center">
												    <?php
												    if(isset($_GET['id']))
                                                    {
												    ?>
												    <input data-repeater-delete type="submit" class="btn btn-primary btn-block" name="questionupdate" value="Add">
												    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
													<input data-repeater-delete type="submit" class="btn btn-primary btn-block" name="questionave" value="Add">
													<?php
                                                    }
                                                    ?>
												</div>
											</div>
									</div>
									
									</form>
									
								</div>
							</div>
						</div>
					
					</div>
					
				</div>
				<!-- container-fluid -->
			</div>
			<!-- content -->
			<?php include("include/footer.php");?>
		</div>
		<!-- ============================================================== -->
		<!-- End Right content here -->
		<!-- ============================================================== -->
	</div>
	<!-- END wrapper -->
	<!-- jQuery  -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/metisMenu.min.js"></script>
	<script src="assets/js/jquery.slimscroll.js"></script>
	<script src="assets/js/waves.min.js"></script>
	<!--Chartist Chart-->
	<script src="plugins/chartist/js/chartist.min.js"></script>
	<script src="plugins/chartist/js/chartist-plugin-tooltip.min.js"></script>
	<!-- peity JS -->
	<script src="plugins/peity-chart/jquery.peity.min.js"></script>
	<script src="assets/pages/dashboard.js"></script>
	<!-- App js -->
	<script src="assets/js/app.js"></script>

</body>


</html>