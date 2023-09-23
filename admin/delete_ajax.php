<?php
	include 'config.php';
	
	if($_POST['id'])
	{
	$id=$_POST['id'];
	$sql = "DELETE FROM `tbl_course_batch` WHERE id=$id";
	if (mysqli_query($con, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($con);
	}		/* Delete Exam master */	if($_POST['master_exam_ids'])	{	$master_exam_ids=$_POST['master_exam_ids'];	$sql = "DELETE FROM `tbl_exam_master` WHERE id=$master_exam_ids";	if (mysqli_query($con, $sql)) {		echo json_encode(array("statusCode"=>200));	} 	else {		echo json_encode(array("statusCode"=>201));	}	mysqli_close($con);	}	/* Delete Exam master */
	
	if($_POST['student_id'])
	{
	$id=$_POST['student_id'];
	
	$sql = "DELETE FROM `tbl_student` WHERE id=$id";
	
	$sql1 = "DELETE FROM `tbl_student_batchmap` WHERE student_id=$id";
	mysqli_query($con, $sql1);
	
	$sql2 = "DELETE FROM `tbl_batchmap_status` WHERE student_id=$id";
	mysqli_query($con, $sql2);
	
	if (mysqli_query($con, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($con);
	}
	
	
	
	if($_POST['student_ids'])
	{
	$id=$_POST['student_ids'];
	
	$sql = "DELETE FROM `pdu_user` WHERE id=$id";
	
	if (mysqli_query($con, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($con);
	}
?>
