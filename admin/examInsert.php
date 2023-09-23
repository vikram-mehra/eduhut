<?php
    session_start();
	include 'config.php';
    date_default_timezone_set("Asia/Calcutta");
	
	if(isset($_POST['examsave']))
	{
	    $examName                 =$_POST['examName'];
		$examDuration             =$_POST['examDuration'];		
		$examnoofQuestion         =$_POST["examnoofQuestion"];
		$examType                 =$_POST["examType"];
		$examStatus               =$_POST["examStatus"];
		$examkeyPDF               =$_FILES["examkeyPDF"]["name"];

		    $target_dir = "uploads/"; 
			$target_file = $target_dir . basename($_FILES["examkeyPDF"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["examkeyPDF"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["examkeyPDF"]["name"]). " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
			
		$student = "INSERT INTO `tbl_exam_master`(`examName`,`examDuration`,`examnoofQuestion`,`examType`,`examStatus`,`examkeyPDF`) 
		VALUES ('$examName','$examDuration','$examnoofQuestion','$examType','$examStatus','$examkeyPDF')";
		
		mysqli_query($con, $student);
						
		header('Location:examCreate.php?success');
		
	}
	
	if(isset($_POST['examupdate']))
	{
	    $examName                 =$_POST['examName'];
		$examDuration             =$_POST['examDuration'];		
		$examnoofQuestion         =$_POST["examnoofQuestion"];
		$examType                 =$_POST["examType"];
		$examStatus               =$_POST["examStatus"];
		$examkeyPDF               =$_FILES["examkeyPDF"]["name"];
        $examkeyPDFs              =$_POST["examkeyPDFs"];
        $examkeyID                =$_POST["examkeyID"];
        
        if($examkeyPDF !='')
        {
		    $target_dir = "uploads/"; 
			$target_file = $target_dir . basename($_FILES["examkeyPDF"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["examkeyPDF"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["examkeyPDF"]["name"]). " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
	

				
		$student = "UPDATE `tbl_exam_master` SET `examName`='$examName',`examDuration`='$examDuration',`examnoofQuestion`='$examnoofQuestion',`examType`='$examType',`examStatus`='$examStatus',`examkeyPDF`='$examkeyPDF',`updated_at`=now() WHERE id=$examkeyID ";
		mysqli_query($con, $student);

		header('Location:examCreate.php?success');
        }
        else
        {
        $student = "UPDATE `tbl_exam_master` SET `examName`='$examName',`examDuration`='$examDuration',`examnoofQuestion`='$examnoofQuestion',`examType`='$examType',`examStatus`='$examStatus',`examkeyPDF`='$examkeyPDFs',`updated_at`=now() WHERE id=$examkeyID "; 
        mysqli_query($con, $student);

		header('Location:examCreate.php?success');
        }
        
		//exit();
		
		
	}
?>