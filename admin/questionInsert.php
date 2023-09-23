<?php
    session_start();
	include 'config.php';
    date_default_timezone_set("Asia/Calcutta");
	
	if(isset($_POST['questionave']))
	{
	    $examName                =$_POST['examName'];
		$question_name           =$_POST['question_name'];		
		$option1                 =$_POST["option1"];
		$option2                 =$_POST["option2"];
		$option3                 =$_POST["option3"];
		$option4                 =$_POST["option4"];
		$correct_ans             =$_POST["correct_ans"];
        
        $check_student="select count(mcq_no) as total from tbl_question_master where exam_id='$examName'";
		$rows=mysqli_query($con, $check_student);
		$result=mysqli_fetch_assoc($rows);
		$mcq = $result['total'];
		$mcq_no= ($mcq + 1);
			
		$student = "INSERT INTO `tbl_question_master`(`exam_id`,`question_name`,`option1`,`option2`,`option3`,`option4`,`correct_ans`,`mcq_sno`) 
		VALUES ('$examName','$question_name','$option1','$option2','$option3','$option4','$correct_ans','$mcq_no')";
		
		mysqli_query($con, $student);
						
		header('Location:questionMaster.php?success');
		
	}
	
	if(isset($_POST['questionupdate']))
	{
	    $examName                =$_POST['examName'];
		$question_name           =$_POST['question_name'];		
		$option1                 =$_POST["option1"];
		$option2                 =$_POST["option2"];
		$option3                 =$_POST["option3"];
		$option4                 =$_POST["option4"];
		$correct_ans             =$_POST["correct_ans"];
        $questionID             =$_POST["questionID"];

        $student = "UPDATE `tbl_question_master` SET `exam_id`='$examName',`question_name`='$question_name',`option1`='$option1',`option2`='$option2',`option3`='$option3',`option4`='$option4',`correct_ans`='$correct_ans' WHERE id=$questionID ";
        //exit();
        mysqli_query($con, $student);

		header('Location:questionMaster.php?success');
		
		
	}
?>