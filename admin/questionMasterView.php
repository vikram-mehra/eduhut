<?php 
session_start(); 
include("config.php");
if(!(isset($_SESSION['user_spritEducation']) && $_SESSION['user_spritEducation'] != '')){
	header ("Location:login.php");
}

if(isset($_GET['id']))
{
                     $student_id=$_GET['id'];
					 $sql="select * from pdu_user where id=$student_id";
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
	<title>Edhut Education Solution :: Question Master View</title>
	<meta content="Admin Dashboard" name="description">
	<meta content="Themesbrand" name="author">
	<link rel="shortcut icon" href="http://edhutsolutions.com/img/core-img/favicon-2.png">
	<!--Chartist Chart CSS -->
	<link href="plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css" rel="stylesheet" type="text/css" media="screen">
		<!-- DataTables -->
	<link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<!-- Responsive datatable examples -->
	<link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
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
								<h4 class="page-title">Question Master View</h4>
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
								    <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
									<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
										<thead>
											<tr>
											    
												<th>Exam Name</th>
                        						<th>Question</th>
                        						<th>Option A</th>
                        						<th>Option B</th>
                        						<th>Option C</th>
                        						<th>Option D</th>
                        						<th>Correct Answer</th>
                        						<th>Action</th>
											</tr>
										</thead>
										<tbody>
										    <?php					
											$sql="select tbl_question_master.*,tbl_exam_master.examName from tbl_question_master inner join tbl_exam_master on tbl_question_master.exam_id=tbl_exam_master.id  ORDER BY tbl_question_master.id DESC";
											if ($result=mysqli_query($con, $sql)) {
											while($row=mysqli_fetch_array($result))
											{
											?>
											<tr class="show">
											    
						                        <td><?php echo $row['examName'];   ?></td>
                        						<td><?php echo $row['question_name'];   ?></td>
                        						<td><?php echo $row['option1'];  ?></td>
                        						<td><?php echo $row['option2']; ?></td>
                        						<td><?php echo $row['option3'];   ?></td>
                        						<td><?php echo $row['option4'];?></td>
                        						<td><?php echo $row['correct_ans'];?></td>
                        						<td>
                        						<a href="questionMaster.php?id=<?php echo $row['id'];?>"  class="btn btn-outline-success btn-sm"><i class="fas fa-user-edit"></i></a>
                        						<!--<a href="#" id="<?php echo $row['id'];?>" class="btn btn-outline-danger btn-sm delete"><i class="fas fa-trash-alt"></i></a>-->
                        						</td>
                        					</tr>
											<?php
											}
											}
											else
											{
											?>
											<p>no data found</p>
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
	<script src="plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js"></script>
		<!-- Required datatable js -->
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
	
	
	<!-- Datatable init js -->
	<script src="assets/pages/datatables.init.js"></script>
	<!--Chartist Chart-->
	<script src="plugins/chartist/js/chartist.min.js"></script>
	<script src="plugins/chartist/js/chartist-plugin-tooltip.min.js"></script>
	<!-- peity JS -->
	<script src="plugins/peity-chart/jquery.peity.min.js"></script>
	<script src="assets/pages/dashboard.js"></script>
	<!-- App js -->
	<script src="assets/js/app.js"></script>
	<script type="text/javascript">
    $(function() {
    $(".delete").click(function(){
    var element = $(this);
    var del_id = element.attr("id");
    var info = 'student_ids=' + del_id;
    if(confirm("Are you sure you want to delete this?"))
    {
     $.ajax({
       type: "POST",
       url: "delete_ajax.php",
       data: info,
       success: function(){
     }
    });
      $(this).parents(".show").animate({ backgroundColor: "#003" }, "slow")
      .animate({ opacity: "hide" }, "slow");
     }
    return false;
    });
    });
    </script>
</body>


</html>