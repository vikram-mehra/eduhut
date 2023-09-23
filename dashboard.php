<?php 
include 'include/header2.php'; 
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
                <?php
                if($usertype == 'PMP PDUs')
                {
                ?>
                <div class="col-md-10 col-md-offset-1"> 
                   <div class="course--content">
                        <section class="casestudy-list-item">
							<a href="pdusDashboard.php" class="casestudy-list-item__link">
								<img alt="IB Global" src="img/core-img/PMP-PDUs.png" class="casestudy-list-item__image">
							</a>
						</section>
                    </div>
                </div>
                <?php
                }
                else
                {
                ?>
                <div class="col-md-10 col-md-offset-1"> 
                   <div class="course--content">
						<section class="casestudy-list-item">
							<a href="simulatorDashboard.php" class="casestudy-list-item__link">
								<img alt="IB Global" src="img/core-img/PMP-Exam-Simulator.png" class="casestudy-list-item__image">
							</a>
						</section>
                    </div>
                </div>
                <?php
                }
                ?>
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