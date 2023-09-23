<?php
require_once('include/connection.php');

if(isset($_GET['inputVal'])){
    
$id=$_GET['inputVal'];
$id2=$_GET['inputVal2'];
$id4=$_GET['inputVal4'];
$id5s=$_GET['inputVal6'];



$fetchqryre = "select correct_ans from `tbl_question_master` where `id`=$id" ;
$result=mysqli_query($con,$fetchqryre);
$row = mysqli_fetch_row($result);

$correct_ans=$row[0];

$sqlquery=mysqli_query($con,"SELECT  count(*) as count FROM `tbl_user_scores` WHERE mcq_id='$id' and user_id='$id4' and exam_id='$id2' ");
$rowcount=mysqli_fetch_assoc($sqlquery);
$count=$rowcount['count'];


if($count > 0)
{
    if($correct_ans == $id5s)
    {
      
      
      $sql = mysqli_query($con,"update  tbl_user_scores set user_id='$id4',mcq_id='$id',exam_id='$id2',right_answer='$id5s',wrong_answer='' where 
      user_id='$id4' and mcq_id='$id'and exam_id='$id2' ");   
      
    }
    elseif($id5s == 'Not Answered')
    {
        $sql = mysqli_query($con,"update  tbl_user_scores set user_id='$id4',mcq_id='$id',exam_id='$id2',unanswered='$id5s',right_answer='',wrong_answer='' where 
      user_id='$id4' and mcq_id='$id'and exam_id='$id2'"); 
    }
    else
    {
      
      $sql = mysqli_query($con,"update  tbl_user_scores set user_id='$id4',mcq_id='$id',exam_id='$id2',wrong_answer='$id5s',right_answer='' where 
      user_id='$id4' and mcq_id='$id'and exam_id='$id2'");
    }

}

else
{
   if($correct_ans == $id5s)
    {
      $sql = mysqli_query($con,"insert into tbl_user_scores (user_id,mcq_id,exam_id,right_answer) values ('$id4','$id','$id2','$id5s')");   
    }
    elseif($id5s == 'Not Answered')
    {
        $sql = mysqli_query($con,"insert into tbl_user_scores (user_id,mcq_id,exam_id,unanswered) values ('$id4','$id','$id2','$id5s')"); 
    }
    else
    {
      $sql = mysqli_query($con,"insert into tbl_user_scores (user_id,mcq_id,exam_id,wrong_answer) values ('$id4','$id','$id2','$id5s')");
    }
   
}

}

?>