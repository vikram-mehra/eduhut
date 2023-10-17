<?php include 'include/header2.php';


if (!$_SESSION['userid']) {
   
   header("Location:login.php");
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
    
    <!-- Title -->
    <title>Edhut - Professional Certification Provider | Dashboard</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon-2.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
</head>

<body>

    <!-- ##### Header Area Start ##### -->
      <?php include 'include/header.php'; ?>
    <!-- ##### Header Area End ##### -->
	<?php
		$courseId = $_GET['cid'];
		$showOverviewtab = true;
		# overview section
		$sql="SELECT * from courses where id= $courseId and status=1";
		$res=mysqli_query($con,$sql);
		$overviewData   = mysqli_fetch_row($res);

		# study materials
		$sql1="SELECT * from tbl_study_material where type = $courseId and status=1 ";
		$studyM=mysqli_query($con,$sql1);

		# video materials
		$sql2="SELECT * from tbl_videos where course = $courseId and status=1";
		$videosM=mysqli_query($con,$sql2);

		# exam tab
		$sql3="SELECT * from tbl_exam_master where examType=$courseId and examStatus='Yes'";
		$exam=mysqli_query($con,$sql3);

	?>
    <!-- ##### Regular Page Area Start ##### -->
    <div class="regular-page-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="course--content">

                        <div class="clever-tabs-content">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
								<?php if(!empty($overviewData[2])) {
									$showsmtab = false;
								?>
									<li class="nav-item">
										<a class="nav-link active" id="tab--0" data-toggle="tab" href="#tab0" role="tab" aria-controls="tab0" aria-selected="false">Overview</a>
									</li>
								<?php } else {
									$showOverviewtab = false;
									$showsmtab = true;
								} ?>
								<?php if($studyM->num_rows>0) { ?>
									<li class="nav-item">
										<a class="nav-link <?php echo ($showsmtab)?'active':'' ?>" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Study Material</a>
									</li>
								<?php } else {
									$showsmtab = false;
								} ?>
								<?php if($videosM->num_rows>0) { ?>
									<li class="nav-item">
										<a class="nav-link" id="tab--2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="true">Videos</a>
									</li>
								<?php } ?>
								<?php if($exam->num_rows>0) { ?>
									<li class="nav-item">
										<a class="nav-link" id="tab--3" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="true">Assessment</a>
									</li>
								<?php } ?>
                            </ul>

                            <div class="tab-content" id="myTabContent">
								  <!-- Tab Text overview -->
								  <div class="tab-pane fade <?php echo ($showOverviewtab)?'show active':'' ?>" id="tab0" role="tabpanel" aria-labelledby="tab--0">
                                    <div class="clever-description">

                                        <!-- About Course -->
                                        <div class="about-course mb-30">
										     
                                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">

												<thead>
													 <p> <?php echo $overviewData[2]; ?> </p>
												</thead>
												<tbody>
													<?php echo $overviewData[3]; ?>
												</tbody>
										    </table>
                                        </div>

                                        

                                    </div>
                                </div>
                                <!-- Tab Text study metarial-->
                                <div class="tab-pane fade <?php echo ($showsmtab)?'show active':'' ?>" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                                    <div class="clever-description">

                                        <!-- About Course -->
                                        <div class="about-course mb-30">
										     <input type='hidden' id='myhidden' value='' name="file_id">
                                             <input type='hidden'  value='<?php echo $userid;   ?>' name="userid" id="userid">	
                                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
												<thead>
													  <tr>
														<th>#</th>
														<th>Title</th>
														<th>Description</th>
														<th>Action</th>
													  </tr>
												</thead>
												<tbody>
                                                      												  
												    <?php
												       
														$i=0;
														if($studyM->num_rows>0) {
															while($row=mysqli_fetch_array($studyM))
															{
																$i++;
																$file = $row['file'];
																$view = '<a href="admin/'.$file. '" target="_blank"> view </a>';
													?>
														  <tr>
															<td><?php echo $i;   ?></td>
															<td><?php echo $row['title'];   ?></td>
															<td><?php echo $row['description'];   ?></td>
															<td><?php echo (!empty($row['file']))?$view:'';   ?></td>
													<?php
															}
														} else {
															echo "<p> No Records Found</p>";
														}
													?>
														  </tr>
													  
												</tbody>
										    </table>
                                        </div>

                                        

                                    </div>
                                </div>
								
								
                                <!-- Tab Text  video-->
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab--2">
                                    <div class="clever-curriculum">
                                    
                                        <!-- All Instructors -->
                                        <div class="about-curriculum mb-30">
                                            <table id="datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
												<thead>
													  <tr>
													    <th>#</th>
														<th>Description</th>
														<th>Action</th>
													  </tr>
												</thead>
												<tbody>
												      <?php
													    
														while($row=mysqli_fetch_array($videosM))
														{
													  ?>
														  <tr>
														    <td><img src="admin/<?php echo $row['thumbnail_img'];   ?>" class="thumbnail" style="width:60px;height:60px;"></td>
															<td><?php echo substr($row['description'], 0, 120);   ?></td>
															<td><a href="<?php echo $row['video_url'];   ?>" class="btn btn-warning" target="_blank">View</a></td>
														  </tr>
													  <?php
														}
														?>
												</tbody>
										    </table>
                                        </div>

                                    </div>
                                </div>
								
								 <!-- Tab Text -->
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab--3">
                                    <div class="clever-curriculum">
                                    
                                        <!-- All Instructors -->
                                        <div class="about-curriculum mb-30">
                                            <table id="datatabless" class="table table-striped table-bordered" cellspacing="0" width="100%">
												<thead>
													  <tr>
													    <th>Test Name</th>
														<th>Duration(in Min.)</th>
														<th>No Of Question</th>
														<th>Action</th>
													  </tr>
												</thead>
												<tbody>
												       <?php
													    
														while($row=mysqli_fetch_array($exam))
														{
													  ?>
												      <tr>
													    <td><?php echo $row['examName'];   ?></td>
														<td><?php echo ($row['examDuration']/60);   ?></td>
														<td><?php echo $row['examnoofQuestion'];   ?></td>
                                                        <td><a href="quizStart.php?examid=<?php echo $row['id']; ?>" class="btn btn-warning" target="_blank">Start</a></td>
													  </tr>
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
// 			window.location.href = "pdusDashboard.php";
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
	$(document).ready(function () {
    $('.nav-link').on('click', function (e) {
        e.preventDefault(); // Prevent the default behavior of the link
        $(this).tab('show'); // Show the clicked tab
    });
});
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