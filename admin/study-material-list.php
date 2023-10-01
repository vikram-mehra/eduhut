<?php
session_start();
include("config.php");
if (!(isset($_SESSION['user_spritEducation']) && $_SESSION['user_spritEducation'] != '')) {
	header("Location:login.php");
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
		<?php include("include/top_header.php"); ?>
		<!-- Top Bar End -->
		<!-- ========== Left Sidebar Start ========== -->
		<?php include("include/side_menu.php"); ?>
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

							<div class="col-sm-12">
								<h4 class="page-title">Study Material List</h4>

							</div>
						</div>
					</div>
					<!-- end row -->
					<div class="row">

						<div class="col-12">
							<?php
							if (isset($_GET['msg'])) {
								echo '<div class="alert alert-warning">
        						  <strong>Study Material Already Exists!</strong>
        						</div>';
							} elseif (isset($_GET['success'])) {
								echo '<div class="alert alert-success">
        						  <strong>Study Material Added Successfully!</strong>
        						</div>';
							}
							?>
							<div class="card">
								<div class="card-body">
									<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
										<thead>
											<tr>
												<th>SN</th>
												<th>Course</th>
												<th>File</th>
												<th>Description</th>
												<th>Date</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 0;
											$sql = "select sm.*,cat.name from tbl_study_material as sm LEFT JOIN courses as cat
											ON sm.type=cat.id
											ORDER BY sm.created_at DESC";
											if ($result = mysqli_query($con, $sql)) {
												while ($row = mysqli_fetch_array($result)) {
													$i++;
													$file = $row['file'];
													$view = '<a href="'.$file. '" target="_blank"> view </a>';
											?>
													<tr class="show">
														<td> <?php echo $i; ?></td>
														<td><?php echo $row['name'];   ?></td>
														<td><?php echo (!empty($row['file']))?$view:'';   ?></td>
														<td><?php echo substr($row['description'], 0, 120);  ?></td>
														<td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
														<td>
															<a href="study-material-create.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i></a>
															<a href="#" id="<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-sm delete"><i class="fas fa-trash-alt"></i></a>
														</td>
													</tr>
												<?php
												}
											} else {
												?>
												<p>No data found</p>
											<?php
											}
											?>

										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>

				</div>
				<!-- container-fluid -->
			</div>
			<!-- content -->
			<?php include("include/footer.php"); ?>
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
	<script type="text/javascript">
		$(function() {
			$(".delete").click(function() {
				var element = $(this);
				var del_id = element.attr("id");
				var info = 'delete_sm_id=' + del_id;
				if (confirm("Are you sure you want to delete this?")) {
					$.ajax({
						type: "POST",
						url: "studyMaterialController.php",
						data: info,
						success: function() {}
					});
					$(this).parents(".show").animate({
							backgroundColor: "#003"
						}, "slow")
						.animate({
							opacity: "hide"
						}, "slow");
				}
				return false;
			});
		});
	</script>
</body>


</html>