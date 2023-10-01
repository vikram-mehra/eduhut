<?php
    session_start();
	include 'config.php';
    date_default_timezone_set("Asia/Calcutta");
	//var_dump($_POST); die;
	
	if(isset($_POST['course_add']))
	{
	    addCourse($con);
	}

	if(isset($_POST['course_update']))
	{
	    updateCourse($con);
	}

	if(isset($_POST['delete_course_id']))
	{
	    deleteCourse($con);
	}
	
	function addCourse($con)
	{
		$name             =$_POST['name'];
		$title            =$_POST['title'];
		$overview         =$_POST['overview'];
		$status           =$_POST['status'];
		$create_at        =date("Y-m-d h:i:s");
	
		
		$insData = "INSERT INTO `courses`(`name`,`title`,`overview`,`status`,`created`) 
		VALUES ('$name','$title','$overview','$status','$create_at')";
		mysqli_query($con, $insData);
						
		header('Location:course-list.php?success');
	}

	function deleteCourse($con)
	{
		$id=$_POST['delete_course_id'];
	
		$sql = "DELETE FROM `courses` WHERE id=$id";
		
		if (mysqli_query($con, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($con);
	}


	function updateCourse($con)
	{
		$name             =$_POST['name'];
		$title            =$_POST['title'];
		$overview         =$_POST['overview'];
		$status           =$_POST['status'];
		$id               =$_POST['id'];
		
		$student = "UPDATE `courses` SET `name`='$name',`title`='$title',`overview`='$overview',`status`='$status' WHERE id=$id "; 
		mysqli_query($con, $student);
		header('Location:course-list.php?success');
	}

