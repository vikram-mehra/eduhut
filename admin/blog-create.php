<?php 
session_start(); 
include("config.php");
if(!(isset($_SESSION['user_spritEducation']) && $_SESSION['user_spritEducation'] != '')){
	header ("Location:login.php");
}

if(isset($_GET['id']))
{
	 $id=$_GET['id'];
	
	 $sql="select blog.*,cat.category_name from blogs as blog INNER JOIN blog_categories as cat
		ON blog.category_id=cat.id where blog.id=$id";
	 $resultquery=mysqli_query($con,$sql);
	 $heading=mysqli_fetch_array($resultquery,MYSQLI_ASSOC);
					 
					 //print_r($heading);
					 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
	<title>Edhut Education Solution :: Category</title>
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
								<h4 class="page-title">Category</h4>
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
        						  <strong>Blog Already Exists!</strong>
        						</div>';
        					}
        					elseif(isset($_GET['success']))
        					{
        						echo '<div class="alert alert-success">
        						  <strong>Blog Added Successfully!</strong>
        						</div>';
        					}
        					?>
							<div class="card">
								<div class="card-body">

									 <form class="repeater" enctype="multipart/form-data"  name="form1" method="post" action="blogInsert.php">
									 <div>
											<div class="row">
											    <input type="hidden" name="id" value="<?php if(isset($_GET['id'])){echo $heading['id'];} ?>" />
												
												<div class="form-group col-12">
													<label for="name">Category</label>
													
													<select name="category_id" class="form-control" required>
														<option value="">Select</option>
														<?php
														$sql="select * from blog_categories ORDER BY id DESC";
														if ($result=mysqli_query($con, $sql)) {
														while($row=mysqli_fetch_array($result))
														{ 
															?>
														<option <?php echo ($heading['category_id']==$row['id'])?'selected':''; ?> value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
														<?php } } ?>
													</select>
													
												</div>
												
												<div class="form-group col-12">
													<label for="name">Title</label>
													<input type="text" class="form-control" name="title" value="<?php if(isset($_GET['id'])){echo $heading['title'];} ?>" required />
												</div>
												
												<div class="form-group col-12">
													<label for="name">Description</label>
													<textarea id="editor" class="form-control" name="description"required> <?php if(isset($_GET['id'])){echo $heading['description'];} ?> </textarea>
												</div>
												
												<div class="form-group col-12">
													<label for="name">Image</label>
													<input type="file" name="image" />
													<?php if(!empty($heading['image'])){ ?>
													<img style="width:100px;" src="uploads/blogs/<?php echo $heading['image']; ?>" >
													<?php } ?>
													
												</div>
												
												<div class="col-lg-2 align-self-center">
												    <?php
												    if(isset($_GET['id']))
                                                    {
												    ?>
												    <input data-repeater-delete type="submit" class="btn btn-primary btn-block" name="blog_update" value="Update">
												    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
													<input data-repeater-delete type="submit" class="btn btn-primary btn-block" name="blog_add" value="Add">
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
	<script src="../plugins/chartist/js/chartist.min.js"></script>
	<script src="../plugins/chartist/js/chartist-plugin-tooltip.min.js"></script>
	<!-- peity JS -->
	<script src="../plugins/peity-chart/jquery.peity.min.js"></script>
	<script src="assets/pages/dashboard.js"></script>
	<!-- App js -->
	<script src="assets/js/app.js"></script>
	<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'editor' );
	</script>
</body>


</html>