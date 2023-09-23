<?php
include 'config.php';
if (isset($_POST["filesave"])) {
        $boardname=$_POST['examName'];
		
        $fileName = $_FILES["file"]["tmp_name"];
    
       if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
          $deleteQuery = 'Delete from tbl_question_master where exam_id ="'.$boardname.'" ;';
            $result      = mysqli_query($con, $deleteQuery);
        $i=1;
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            if($i>1){
                
    if(!empty($column[0])){
        
   
          
            
            $sqlInsert = "INSERT INTO `tbl_question_master`(`exam_id`,`mcq_sno`,`question_name`,
			`option1`,`option2`,`option3`,`option4`,`correct_ans`) 
		            VALUES ('$boardname','" . $column[0] . "',
					'" . $column[1] . "','" . $column[2] . "','" . $column[3] . "',
					'" . $column[4] . "','" . $column[5] . "','" . $column[6] . "')";
					
				
            $result = mysqli_query($con, $sqlInsert);
            
       
    }
            }
            $i++;
        }
                        $type = "success";
                header('Location:questionBulkUpload.php?success=1');
    }
}
