<?php

include("../config.php");
$qd = str_replace('_','&',$_GET['q_dclass']);
$query="SELECT class_name FROM `student_class` WHERE `class`='$qd' GROUP BY  class_name";
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
<option value="<?php echo $row_department['class_name'];?>"><?php echo $row_department['class_name'];?></option>									
<?php }?>			
<?php 
//$query="SELECT * FROM `student_fee_mapping` WHERE `class`='$qd' AND course_name =''";
//$sql_res=mysqli_query($con, $query);
?>

</div>
                      </div>
                    </div>

