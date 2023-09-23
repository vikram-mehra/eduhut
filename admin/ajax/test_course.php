<?php

include("../config.php");
$qd = str_replace('_','&',$_GET['q_dclass']);
$query="SELECT * FROM `result_test` WHERE `student_class`='$qd' AND status= '1' GROUP BY  student_testname";
$sql_res=mysqli_query($con, $query);

?>
 <div class="col-sm-6">	
<div class="form-group">
<label for="inputPassword3" class="col-sm-5 control-label">Course Name <span style="color:red"> &nbsp;*</span></label>
<div class="col-sm-7">	
								
<option value="">Select Course</option>		
<?php
while($row_department=mysqli_fetch_assoc($sql_res))
{
?>		
<option value="<?php echo $row_department['student_testname'];?>"><?php echo $row_department['student_testname'];?></option>									
<?php }?>			

</div>
                      </div>
                    </div>

