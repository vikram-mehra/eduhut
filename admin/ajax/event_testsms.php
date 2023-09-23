<?php
include("../config.php");
 $qd=str_replace('_','&',$_GET['q_department']);
 $course=$_GET['course'];
 
 


?> 
	
<div class="col-12">
							<div class="card">
								<div class="card-body">

                                       <?php
 $qry_stuid = "SELECT * FROM `result_test`   WHERE  `student_class` = '$qd' AND `student_testname` ='$course'  AND status ='1'";
 
 //die();
 $qry_stu_list = mysqli_query($con, $qry_stuid);
while($data_stu_list = mysqli_fetch_array($qry_stu_list))
{
 $stu_dataid = $data_stu_list['id'];
?>

			<div class="col-sm-6">
			<input type="checkbox" value="<?php echo $data_stu_list['Mobile_no']; ?>#<?php echo $data_stu_list['obtained_marks'];?>#<?php echo $data_stu_list['student_name'];?>#<?php echo $data_stu_list['total_marks'];?>" name="check_no[]" checked="checked">&nbsp;&nbsp;
			<input name="mobile_no[]"  value="<?php echo $data_stu_list['Mobile_no'];?>" type="hidden" />
			<input name="student_id[]"  value="<?php echo $data_stu_list['student_id'];?>" type="hidden" />
			<input name="student_name[]"  value="<?php echo $data_stu_list['student_name'];?>" type="hidden" />
			<input name="total_marks[]"  value="<?php echo $data_stu_list['total_marks'];?>" type="hidden" />
			<input name="obtained_marks[]"  value="<?php echo $data_stu_list['obtained_marks'];?>" type="hidden" />
			<input name="class[]"  value="<?php echo $data_stu_list['student_class'];?>" type="hidden" />
			<input name="courses[]"  value="<?php echo $data_stu_list['student_id'];?>" type="hidden" />
			<input name="student_testname[]"  value="<?php echo $data_stu_list['student_testname'];?>" type="hidden" />
			<input name="student_courses[]"  value="<?php echo $data_stu_list['student_courses'];?>" type="hidden" />
			<input name="session_year[]"  value="<?php echo $data_stu_list['session'];?>" type="hidden" />
			<?php echo $data_stu_list['Mobile_no']; ?>&nbsp;&nbsp;
			[<?php  echo $data_stu_list['student_name'];?>]&nbsp;&nbsp;	
			 
			[<?php  echo $data_stu_list['obtained_marks'];?>]/
			[<?php  echo $data_stu_list['total_marks'];?>]
			</div>
		
			
<?php }?>    
                                        </div>
                                        

                                    </div> 
                                 <!-- tile footer -->
                               <div class="tile-footer text-right bg-tr-black lter dvd dvd-top">
                                  
                                    <button type="submit" class="btn btn-success" id="" name="send_sms">Submit</button>
                                </div>
                                <!-- /tile footer -->
                                </div>
                                <!-- /tile body -->

                              
   
                    
			
			
			
	
		
		
		
		
