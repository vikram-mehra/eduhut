<?php
include("../config.php");
 $qd=str_replace('_','&',$_GET['q_department']);
 $course=$_GET['course'];
 $cat_associate=$_GET['cat_associate'];
 $type_all=$_GET['type_all'];
?> 
	
<div class="col-12">
							<div class="card">
								<div class="card-body">
								<h3>Student List</h3>
<?php									   
$qry_stuid = "SELECT * FROM `student_record` where student_id  in (SELECT student_id FROM `student_record_option` WHERE `courses` = '$course' AND `batch_titming` ='$cat_associate') AND class='$qd' AND status ='1'";
 $qry_stu_list = mysqli_query($con, $qry_stuid);
while($data_stu_list = mysqli_fetch_array($qry_stu_list))
{
$stu_dataid = $data_stu_list['id'];
if($type_all == 'Parent')
{
?>

			<div class="form-group col-sm-6">
			<input type="checkbox" value="<?php echo $data_stu_list['parent_mobile']; ?>" name="mobile_no[]" checked="checked">&nbsp;&nbsp;
			<input name="student_name[]"  value="<?php echo $data_stu_list['student_name'];?>" type="hidden"  />
			<input name="class[]"  value="<?php echo $data_stu_list['class'];?>" type="hidden"  />
			<input name="courses[]"  value="<?php echo $data_stu_list['student_id'];?>" type="hidden"  />
			<input name="session_year[]"  value="<?php echo $data_stu_list['session'];;?>" type="hidden"  />			
			<?php echo $data_stu_list['parent_mobile']; ?>&nbsp;&nbsp;
			[<?php  echo $data_stu_list['student_name'];?>]
			</div>			
				<?php
} else 
{?>

	<div class="form-group col-sm-6">
			<input type="checkbox" value="<?php echo $data_stu_list['mobile_no']; ?>" name="mobile_no[]" checked="checked">&nbsp;&nbsp;
			<input name="student_name[]"  value="<?php echo $data_stu_list['student_name'];?>" type="hidden"  />
			<input name="class[]"  value="<?php echo $data_stu_list['class'];?>" type="hidden"  />
			<input name="courses[]"  value="<?php echo $data_stu_list['student_id'];?>" type="hidden"  />
			<input name="session_year[]"  value="<?php echo $data_stu_list['session'];;?>" type="hidden"  />			
			<?php echo $data_stu_list['mobile_no']; ?>&nbsp;&nbsp;
			[<?php  echo $data_stu_list['student_name'];?>]
			</div>
	
<?php }
				}
				?>    

<div class="col-lg-4 align-self-center">
												    <center><input data-repeater-delete type="submit" class="btn btn-primary btn-block" name="send_sms"  value="Submit"></center>
												</div>
                                        </div>
								
                                        </div>

                                        
                               
                                </div>
			
			
			
	
		
		
		
		
