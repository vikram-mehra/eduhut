<?php
    session_start();
	include 'config.php';
	ini_set('display_errors',1);
	error_reporting(E_ALL);
    date_default_timezone_set("Asia/Calcutta");
	//var_dump($_POST); die;
	
	if(isset($_POST['add']))
	{
	    addSM($con);
	}

	if(isset($_POST['update']))
	{
	    updateSM($con);
	}


	if(isset($_POST['delete_sm_id']))
	{
	    deleteSM($con);
	}

	function addSM($con)
	{
		$description       =$_POST['description'];
		$category_id       =$_POST['category_id'];
		$create_at		   =date("Y-m-d h:i:s");
		$image             =$_FILES["image"]["name"];

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
		$insData = "INSERT INTO `tbl_study_material` (`type`,`file`,`description`,`created_at`,`deleted_at`)
		VALUES ('$category_id','$fileName','$description','$create_at','$create_at')";
		mysqli_query($con, $insData);
						
		header('Location:study-material-list.php?success');
	}

	function deleteSM($con)
	{
		$id=$_POST['delete_sm_id'];
	
		$sql = "DELETE FROM `tbl_study_material` WHERE id=$id";
		
		if (mysqli_query($con, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($con);
	}

	function updateSM($con)
	{
		$description       =$_POST['description'];
		$category_id       =$_POST['category_id'];
		$id              =$_POST['id'];
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
			$student = "UPDATE `tbl_study_material` SET `description`='$description',`type`='$category_id',`file`='$fileName' WHERE id=$id "; 
			mysqli_query($con, $student);
		}
		else{
			$student = "UPDATE `tbl_study_material` SET `description`='$description',`type`='$category_id' WHERE id=$id "; 
			mysqli_query($con, $student);
			
		}
		header('Location:study-material-list.php?success');
	}
	