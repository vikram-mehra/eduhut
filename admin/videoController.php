<?php
    session_start();
	include 'config.php';
    date_default_timezone_set("Asia/Calcutta");
	//var_dump($_POST); die;
	
	if(isset($_POST['video_add']))
	{
	    addVideo($con);
	}
	if(isset($_POST['video_update']))
	{
	    updateVideo($con);
	}

	if(isset($_POST['delete_video_id']))
	{
	    deleteVideo($con);
	}
	
	function addVideo($con)
	{
		$title             =$_POST['title'];
		$description       =$_POST['description'];
		$category_id       =$_POST['category_id'];
		$create_at		   =date("Y-m-d h:i:s");
	
		$blogCategory = "INSERT INTO `tbl_videos`(`course`,`video_url`,`description`,`thumbnail_img`,`created_at`,`deleted_at`) 
		VALUES ('$category_id','$title','$description','$create_at','$create_at')";
		mysqli_query($con, $blogCategory);
						
		header('Location:video-list.php?success');
	}

	function deleteVideo($con)
	{
		$id=$_POST['delete_video_id'];
	
		$sql = "DELETE FROM `tbl_videos` WHERE id=$id";
		
		if (mysqli_query($con, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($con);
	}

	function updateVideo($con)
	{
		$title             =$_POST['title'];
		$description       =$_POST['description'];
		$category_id       =$_POST['category_id'];
		$id                =$_POST['id'];

		$student = "UPDATE `tbl_videos` SET `description`='$description',`course`='$category_id' ,`video_url`='$title' WHERE id=$id "; 
		mysqli_query($con, $student);
		header('Location:video-list.php?success');
	}
