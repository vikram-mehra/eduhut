<?php
    session_start();
	include 'config.php';
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
	
		$insData = "INSERT INTO `tbl_study_material` (`type`,`file`,`description`,`created_at`,`deleted_at`)
		VALUES ('$category_id','test','$description','$create_at','$create_at')";
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

		$student = "UPDATE `tbl_study_material` SET `description`='$description',`type`='$category_id' WHERE id=$id "; 
		mysqli_query($con, $student);
		header('Location:study-material-list.php?success');
	}
	