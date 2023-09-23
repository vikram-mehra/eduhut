<?php
	include 'config.php';
	
	if($_POST['cat_id'])
	{
	$cat_id=$_POST['cat_id'];
	$sql = "DELETE FROM `blog_categories` WHERE id=$cat_id";
	if (mysqli_query($con, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($con);
	}		
	
	
	if($_POST['blog_id'])
	{
	$id=$_POST['blog_id'];
	
	$sql = "DELETE FROM `blogs` WHERE id=$id";
	
	if (mysqli_query($con, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($con);
	}
?>
