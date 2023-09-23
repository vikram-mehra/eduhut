<?php
    session_start();
	include 'config.php';
    date_default_timezone_set("Asia/Calcutta");
	
	if(isset($_POST['examsave']))
	{
	    $examName                 =$_POST['examName'];
		$examDuration             =$_POST['examDuration'];		
		$examnoofQuestion         =$_POST["examnoofQuestion"];


		$student = "INSERT INTO `trainingInformation`(`months`,`dates`,`position`) 
		VALUES ('$examName','$examDuration','$examnoofQuestion')";
		
		mysqli_query($con, $student);
						
		header('Location:traininfInfoCreate.php?success');
		
	}
	
	if(isset($_POST['examupdate']))
	{
	    $examName                 =$_POST['examName'];
		$examDuration             =$_POST['examDuration'];		
		$examnoofQuestion         =$_POST["examnoofQuestion"];
        $examkeyID                = $_POST['examkeyID'];
        $student = "UPDATE `trainingInformation` SET `months`='$examName',`dates`='$examDuration',`position`='$examnoofQuestion' WHERE id=$examkeyID "; 
        
        mysqli_query($con, $student);

		header('Location:traininfInfoCreate.php?success');
        
		//exit();
		
		
	}
?>