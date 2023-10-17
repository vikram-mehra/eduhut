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
		$status       	   =$_POST['status'];
		$image             =$_FILES["image"]["name"];
		$create_at		   =date("Y-m-d h:i:s");
		
		// upload file
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$fileName = '';
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			$fileName = $target_dir.$image ;
		} else {
			echo "Sorry, there was an error uploading your file.";
		}

		
		// end upload file
		$blogCategory = "INSERT INTO `tbl_videos`(`course`,`video_url`,`description`,`thumbnail_img`,`status`,`created_at`,`deleted_at`) 
		VALUES ('$category_id','$title','$description','$fileName','$status','$create_at','$create_at')";
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
		$status       	   =$_POST['status'];
		$id                =$_POST['id'];
		$image             =$_FILES["image"]["name"];

		if($image !='') {
			// upload file
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			$fileName = '';
			if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
				$fileName = $target_dir.$image ;
			} else {
				echo "Sorry, there was an error uploading your file.";
			}

			// end upload file
			$student = "UPDATE `tbl_videos` SET `description`='$description',`course`='$category_id' ,`video_url`='$title',`thumbnail_img`='$fileName',`status`='$status' WHERE id=$id "; 
			mysqli_query($con, $student);
		
		} else {
			$student = "UPDATE `tbl_videos` SET `description`='$description',`course`='$category_id' ,`video_url`='$title',`status`='$status' WHERE id=$id "; 
			mysqli_query($con, $student);
		}
		
		header('Location:video-list.php?success');
	}
