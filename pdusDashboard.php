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

    <!-- ##### Regular Page Area Start ##### -->
    <div class="regular-page-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="course--content">

                        <div class="clever-tabs-content">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Study Material</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab--2" data-toggle="tab" href="<?php $sql="SELECT count(*) as counts from tbl_user_pdfstatus where userid=$userid";
														$runs=mysqli_query($con,$sql); $row=mysqli_fetch_assoc($runs);
	$count=$row['counts']; if($count > 0){echo '#tab2';} else {echo '#';}?>" role="tab" aria-controls="tab2" aria-selected="true">Videos</a>
                                </li>
								<li class="nav-item">
                                    <a class="nav-link" id="tab--3" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="true">Assessment</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <!-- Tab Text -->
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                                    <div class="clever-description">

                                        <!-- About Course -->
                                        <div class="about-course mb-30">
										     <input type='hidden' id='myhidden' value='' name="file_id">
                                             <input type='hidden'  value='<?php echo $userid;   ?>' name="userid" id="userid">	
                                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
												<thead>
													  <tr>
														<th>Description</th>
														<th>Type</th>
														<th>Action</th>
													  </tr>
												</thead>
												<tbody>
                                                      												  
												      <?php
												        $count="select count(*) as pds from tbl_user_pdfstatus where userid=$userid";
												        $counts=mysqli_query($con,$count);
												        $counts_result=mysqli_fetch_assoc($counts);
												        $pdcounts=$counts_result['pds'];
													    $sql="SELECT * from tbl_study_material order by id asc";
														$run=mysqli_query($con,$sql);
														while($row=mysqli_fetch_array($run))
														{
													  ?>
														  <tr>
															<td><?php echo $row['description'];   ?></td>
															<td><?php echo $row['type'];   ?></td>
															<?php 
															if($pdcounts >= 20)
															{
															?>
															<td><a href="admin/uploads/<?php echo $row['file'];   ?>" class="btn btn-warning"  onclick="return false;" >Download</a></td>
															<?php
														    }
														    else
														    {
														    ?>
														    <td><a href="admin/uploads/<?php echo $row['file'];   ?>" class="btn btn-warning jj" data-file="<?php echo $row['id']; ?>"  download>Download</a></td>
														    <?php
														    }
														    ?>
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
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab--2">
                                    <div class="clever-curriculum">
                                    
                                        <!-- All Instructors -->
                                        <div class="about-curriculum mb-30">
                                            <table id="datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
												<thead>
													  <tr>
													    <th>#</th>
														<th>Description</th>
														<th>Type</th>
														<th>Action</th>
													  </tr>
												</thead>
												<tbody>
												      <?php
													    $sql="SELECT * from tbl_videos";
														$run=mysqli_query($con,$sql);
														while($row=mysqli_fetch_array($run))
														{
													  ?>
														  <tr>
														    <td><img src="img/<?php echo $row['thumbnail_img'];   ?>" class="thumbnail" style="width:60px;height:60px;"></td>
															<td><?php echo $row['description'];   ?></td>
															<td><?php echo $row['type'];   ?></td>
															<td><a href="videos-view.php?video=<?php echo $row['id'];   ?>" class="btn btn-warning" target="_blank">View</a></td>
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
													    $sql="SELECT * from tbl_exam_master where examType='PDUs'";
														$run=mysqli_query($con,$sql);
														while($row=mysqli_fetch_array($run))
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