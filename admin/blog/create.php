<?php 
session_start(); 
include("config.php");
if(!(isset($_SESSION['user_spritEducation']) && $_SESSION['user_spritEducation'] != '')){
	header ("Location:login.php");
}

if(isset($_GET['id']))
{
	 $student_id=$_GET['id'];
	 $sql="select * from tbl_exam_master where id=$student_id";
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
	<title>Edhut Education Solution :: Exam Master</title>
	<meta content="Admin Dashboard" name="description">
	<meta content="Themesbrand" name="author">
	<link rel="shortcut icon" href="http://edhutsolutions.com/img/core-img/favicon-2.png">
	<!--Chartist Chart CSS -->
	<link rel="stylesheet" href="../plugins/chartist/css/chartist.min.css">
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Begin page -->
	<div id="wrapper">
		<!-- Top Bar Start -->
		<?php include("../include/top_header.php");?>
		<!-- Top Bar End -->
		<!-- ========== Left Sidebar Start ========== -->
		<?php include("../include/side_menu.php");?>
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
								<h4 class="page-title">Exam Master</h4>
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

									 <form class="repeater" enctype="multipart/form-data"  name="form1" method="post" action="examInsert.php">
									 <div>
											<div class="row">
											    <input type="hidden" name="examkeyID" value="<?php if(isset($_GET['id'])){echo $heading['id'];} ?>" />
												<div class="form-group col-lg-4">
													<label for="name">Exam Name</label>
													<input type="text" class="form-control" name="examName" value="<?php if(isset($_GET['id'])){echo $heading['examName'];} ?>" required />
												</div>
												<div class="form-group col-lg-4">
													<label for="name">Exam Duration(In Second)</label>
													<input type="text" class="form-control" name="examDuration" value="<?php if(isset($_GET['id'])){echo $heading['examDuration'];} ?>" required />
												</div>
												<div class="form-group col-lg-4">
													<label for="name">No Of Question</label>
													<input type="text" class="form-control" name="examnoofQuestion" value="<?php if(isset($_GET['id'])){echo $heading['examnoofQuestion'];} ?>"  maxlength="10" required />
												</div>
												<div class="form-group col-lg-4">
													<label for="name">Exam Type</label>
													<select class="form-control"  name="examType" style="color:#a1b1be;" required>
                									    <option>Select  Type</option>
                										<option value="PDUs" <?php if(isset($_GET['id']) && $heading['examType'] == 'PDUs'){ echo 'selected';} ?>>PDUs</option>
                										<option value="Simulator" <?php if(isset($_GET['id']) && $heading['examType'] == 'Simulator'){ echo 'selected';} ?>>Simulator</option>
                									</select>
												</div>
												<div class="form-group col-lg-4">
													<label for="name">Exam Status</label>
													<select class="form-control" name="examStatus" style="color:#a1b1be;" required>
                										<option value="Yes" <?php if(isset($_GET['id']) && $heading['examStatus'] == 'Yes'){ echo 'selected';} ?>>Yes</option>
                										<option value="No" <?php if(isset($_GET['id']) && $heading['examStatus'] == 'No'){ echo 'selected';} ?>>No</option>
                									</select>
												</div>
												<div class="form-group col-lg-4">
													<label for="name">Exam Answer Key</label>
													<input type="file" class="form-control" name="examkeyPDF"   />
													<input type="hidden" class="form-control" name="examkeyPDFs" value="<?php if(isset($_GET['id'])){echo $heading['examkeyPDF'];} ?>"  />
												</div>
												
												<div class="col-lg-2 align-self-center">
												    <?php
												    if(isset($_GET['id']))
                                                    {
												    ?>
												    <input data-repeater-delete type="submit" class="btn btn-primary btn-block" name="examupdate" value="Add">
												    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
													<input data-repeater-delete type="submit" class="btn btn-primary btn-block" name="examsave" value="Add">
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
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/metisMenu.min.js"></script>
	<script src="../assets/js/jquery.slimscroll.js"></script>
	<script src="../assets/js/waves.min.js"></script>
	<!--Chartist Chart-->
	<script src="../plugins/chartist/js/chartist.min.js"></script>
	<script src="../plugins/chartist/js/chartist-plugin-tooltip.min.js"></script>
	<!-- peity JS -->
	<script src="../plugins/peity-chart/jquery.peity.min.js"></script>
	<script src="../assets/pages/dashboard.js"></script>
	<!-- App js -->
	<script src="../assets/js/app.js"></script>
</body>


</html>