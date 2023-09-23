<?php
	include 'include/connection.php';
	$fileid=$_POST['fileid'];
	$userid=$_POST['userid'];
	$status='Enable';
	$sqlcheck="select count(*) as counts from tbl_user_pdfstatus where userid=$userid AND material_id=$fileid";
	$result=mysqli_query($con,$sqlcheck);
	$row=mysqli_fetch_assoc($result);
	$count=$row['counts'];
	if($count > 0)
	{
		$sql = "UPDATE  `tbl_user_pdfstatus` SET `userid`='$userid', `material_id`='$fileid', `status`='$status' WHERE `material_id`=$fileid AND `userid`='$userid'";
		if (mysqli_query($con, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}
	}
	else{
		$sql = "INSERT INTO `tbl_user_pdfstatus`( `userid`, `material_id`, `status`) 
		VALUES ('$userid','$fileid','$status')";
		if (mysqli_query($con, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}
	}
	mysqli_close($con);
?>