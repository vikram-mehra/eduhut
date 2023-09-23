<?php
    session_start();
	include 'config.php';
    date_default_timezone_set("Asia/Calcutta");
	
	if(isset($_POST['studentsave']))
	{
	    $userType      =$_POST['userType'];
		$course_id      =$_POST['c_status'];		
		$s_name         =$_POST["s_name"];
		$email          =$_POST["email"];
		$mobile         =$_POST["mobile"];
		$gender         =$_POST["gender"];
		$city           =$_POST['city'];		
		$country        =$_POST["country"];
		$status_date    =$_POST["status_date"];
        $pwd            =$mobile;
		$salt           = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        $password       = hash('sha256', $pwd . $salt);
	
		
		$check_student="select id from pdu_user where mobile='$mobile' or email='$email'";
		$rows=mysqli_query($con, $check_student);
		$result=mysqli_fetch_array($rows);
		$count=count($result);
		if($count > 0)
		{
		header('Location:userCreate.php?msg');
		}
		else{
				
		echo $student = "INSERT INTO `pdu_user`(`name`,`email`,`mobile`,`course`,`gender`,`city`,`country`,`certificate_valid_date`,`salt`,`password`,`userType`,`created_at`) 
		VALUES ('$s_name','$email','$mobile','$course_id','$gender','$city','$country','$status_date','$salt','$password','$userType',now())";
		//exit();
		mysqli_query($con, $student);
						
		}
		header('Location:userCreate.php?success');
		
	}
	
	if(isset($_POST['studentupdate']))
	{
	    $userType      =$_POST['userType'];
		$course_id      =$_POST['c_status'];		
		$s_name         =$_POST["s_name"];
		$email          =$_POST["email"];
		$mobile         =$_POST["mobile"];
		$gender         =$_POST["gender"];
		$city           =$_POST['city'];		
		$country        =$_POST["country"];
		$status_date    =$_POST["status_date"];
		$id             =$_POST["student_idd"];
        //$pwd            =$mobile;
		//$salt           = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        //$password       = hash('sha256', $pwd . $salt);
	

				
		$student = "UPDATE `pdu_user` SET `name`='$s_name',`email`='$email',`mobile`='$mobile',`course`='$course_id',`gender`='$gender',`city`='$city',
		`country`='$country',`certificate_valid_date`='$status_date',`userType`='$userType',`updated_at`=now() WHERE id=$id ";
		//exit();
		mysqli_query($con, $student);

		header('Location:userCreate.php?success');
		
	}
?>