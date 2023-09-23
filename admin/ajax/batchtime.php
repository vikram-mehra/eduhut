<?php

include("../config.php");
$qd = str_replace('_','&',$_GET['q_course']);
$query="SELECT class_name,batch_titming FROM `batch_timing` WHERE `class_name`='$qd' ";
$sql_res=mysqli_query($con, $query);

?>
 
<select class="form-control mb-10" id="batch_time"  name="batch_time">								
<option value="">Select Btach Time</option>		
<?php
while($row_department=mysqli_fetch_assoc($sql_res))
{
?>		
<option value="<?php echo $row_department['batch_titming'];?>"><?php echo $row_department['batch_titming'];?></option>									
<?php }?>			
</select>

