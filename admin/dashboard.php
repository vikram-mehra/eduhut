<?php 
session_start(); 
include("config.php");
if(!(isset($_SESSION['user_spritEducation']) && $_SESSION['user_spritEducation'] != '')){
	header ("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
	<title>Edhut Education Solution :: Dashboard</title>
	<meta content="Admin Dashboard" name="description">
	<meta content="Themesbrand" name="author">
	<link rel="shortcut icon" href="http://edhutsolutions.com/img/core-img/favicon-2.png">
	<!--Chartist Chart CSS -->
	<link rel="stylesheet" href="../plugins/chartist/css/chartist.min.css">
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
								<h4 class="page-title">Dashboard</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item active">Welcome to AdminPanel</li>
								</ol>
							</div>
							
						</div>
					</div>
					<!-- end row -->
					<div class="row">
						<!--<div class="col-xl-4 col-md-6">
							<div class="card mini-stat bg-primary text-white">
								<div class="card-body">
									<div class="mb-4">
										<div class="float-left mini-stat-img mr-4">
											<img src="assets/images/services-icon/01.png" alt="">
										</div>
										<h5 class="font-16 text-uppercase mt-0 text-white-50">Total Users</h5>
										<h4 class="font-500"></h4>
										
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6">
							<div class="card mini-stat bg-primary text-white">
								<div class="card-body">
									<div class="mb-4">
										<div class="float-left mini-stat-img mr-4">
											<img src="assets/images/services-icon/02.png" alt="">
										</div>
										<h5 class="font-16 text-uppercase mt-0 text-white-50">Total Videos</h5>
										<h4 class="font-500"></h4>
										
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6">
							<div class="card mini-stat bg-primary text-white">
								<div class="card-body">
									<div class="mb-4">
										<div class="float-left mini-stat-img mr-4">
											<img src="assets/images/services-icon/03.png" alt="">
										</div>
										<h5 class="font-16 text-uppercase mt-0 text-white-50">New Requirement</h5>
										<h4 class="font-500"></h4>
										
									</div>
									
								</div>
							</div>
						</div>-->
					
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
	<script src="../plugins/chartist/js/chartist.min.js"></script>
	<script src="../plugins/chartist/js/chartist-plugin-tooltip.min.js"></script>
	<!-- peity JS -->
	<script src="../plugins/peity-chart/jquery.peity.min.js"></script>
	<script src="assets/pages/dashboard.js"></script>
	<!-- App js -->
	<script src="assets/js/app.js"></script>
</body>


</html>