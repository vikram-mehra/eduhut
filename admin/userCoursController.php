<?php
    session_start();
	include 'config.php';
    date_default_timezone_set("Asia/Calcutta");
	
	if(isset($_POST['uc_add']))
	{
	    addUserCourse($con);
	}
	if(isset($_POST['uc_update']))
	{
	    updateUserCourse($con);
	}

	if(isset($_POST['delete_uc_id']))
	{
	    deleteUserCourse($con);
	}
	
	function addUserCourse($con)
	{
		$cid               =$_POST['cid'];
		$uid               =$_POST['uid'];
		$status       	   =$_POST['status'];
		$create_at		   =date("Y-m-d h:i:s");
	
		$blogCategory = "INSERT INTO `user_courses`(`course_id`,`uid`,`status`,`created`) 
		VALUES ('$cid','$uid','$status','$create_at')";
		mysqli_query($con, $blogCategory);
						
		header('Location:usercourse-list.php?success');
	}

	function deleteUserCourse($con)
	{
		$id=$_POST['delete_uc_id'];
	
		$sql = "DELETE FROM `user_courses` WHERE id=$id";
		
		if (mysqli_query($con, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($con);
	}

	function updateUserCourse($con)
	{
		$title             =$_POST['title'];
		$description       =$_POST['description'];
		$category_id       =$_POST['category_id'];
		$status       	   =$_POST['status'];
		$id                =$_POST['id'];
		$student = "UPDATE `tbl_videos` SET `description`='$description',`course`='$category_id' ,`video_url`='$title',`status`='$status' WHERE id=$id "; 
		mysqli_query($con, $student);
		header('Location:video-list.php?success');
	}
