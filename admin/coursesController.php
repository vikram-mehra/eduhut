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
		$image             =$_FILES["image"]["name"];
		$create_at        =date("Y-m-d h:i:s");
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
		
		$insData = "INSERT INTO `courses`(`name`,`title`,`overview`,`file`,`status`,`created`) 
		VALUES ('$name','$title','$overview','$fileName','$status','$create_at')";
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
			$student = "UPDATE `courses` SET `name`='$name',`title`='$title',`overview`='$overview',`file`='$fileName',`status`='$status' WHERE id=$id "; 
			mysqli_query($con, $student);
		
		} else {
			$student = "UPDATE `courses` SET `name`='$name',`title`='$title',`overview`='$overview',`status`='$status' WHERE id=$id "; 
			mysqli_query($con, $student);
		}
		header('Location:course-list.php?success');
	}

