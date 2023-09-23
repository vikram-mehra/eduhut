<?php
 include 'include/header2.php'; 
 if (!$_SESSION['userid']) { 
   
   header("Location:login.php");
}
 $id=$_GET['examid'];
 $fetchqry = "SELECT * FROM `tbl_question_master` where exam_id=$id"; 
 $result=mysqli_query($con,$fetchqry);
 
 $fetchqrys = "SELECT * FROM `tbl_exam_master` where id=$id"; 
 $resultq=mysqli_query($con,$fetchqrys);
 $qrows=mysqli_fetch_assoc($resultq);
 $duration=$qrows['examDuration'];
 $NoOfQuestion=$qrows['examnoofQuestion'];
 $examType=$qrows['examType'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *Must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Edhut - Professional Certification Provider | Quiz</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon-2.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script type="text/javascript" src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=MML_HTMLorMML"></script>


</head>

<body>

    <!-- ##### Header Area Start ##### -->
      <?php include 'include/header.php'; ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Regular Page Area Start ##### -->
    <div class="regular-page-area " style="padding-top:30px;padding-bottom:30px;">
        <div class="container">
            <div class="row">
		 <div class="col-12 text-center mt-4">
          <?php 
          $sqlss='select * from tbl_exam_master where id='.$id;
          $resultss=mysqli_query($con,$sqlss);
          while($rowsss=mysqli_fetch_assoc($resultss))
          {
          ?>	
          <h4 class=""><?php //echo $rowsss['examName']; ?> <?php if($examType == 'Simulator'){echo 'PMP Simulator';} else {echo 'PMP PDUs';} ?></h4>
		  <?php 
           }
          ?>
          
		 </div>
  </div>

  <div class="row">
     <div class="col-md-12">
          <div class="card bg-default" >
            <div class="card-header bg-primary">
			    <span>Questions <span style="color:red;" id="mcqno" class=""></span> of <?php echo $NoOfQuestion; ?></span>
			    <span id="iTimeShow" style="color:black;float:right;">Time Remaining: </span><br/><span id='timer' style="font-size:18px;color:black;float:right;"></span>
	        </div>
			<div class="card-body">
			  <div class="row">

				<div class="quizContainer col-md-12">
				    
                    <div class="quizMessage" style="color:red;font-size:18px;"></div>
                    <input type="hidden" placeholder="Type something..." id="myInput" value="" >
                    <input type="hidden" placeholder="Type something..." id="myInput2" value="<?php echo $id; ?>" >
                    <input type="hidden" placeholder="Type something..." id="myInput4" value="<?php echo $userid; ?>" >
                    <input type="hidden" placeholder="Type something..." id="myInput5" value="" >

    				 <div class="question"></div>
                    <ul class="choiceList"></ul>
                    
                    <div class="result"></div>
    				<div class="" style="margin-top:50px;">
    				   <button   class="btn btn-primary btn-sm float-left preButton" >Previous</button>
    				   <button  style="margin-left:20px;"  class="btn btn-primary btn-sm float-left nextButton"  onclick="getInputValue();">Next</button>
    				</div>
				
				</div>
    
				
			</div>
	        </div>
	   </div>
	  
     </div>

					
  </div>
        </div>
    </div>
    <!-- ##### Regular Page Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include 'include/footer.php'; ?>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <!--<script src="js/jquery/jquery-2.2.4.min.js"></script>-->
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
  


</script>

   <script>
    var questions = [
    <?php
    $i=1;
    while($row=mysqli_fetch_assoc($result)) 
	{
	?>
	    {mcqno:"<?php echo $row['mcq_sno']; ?>",questionno:"<?php echo $row['id']; ?>",question:"<?php echo  'Q:-'.$i++.' '.$row['question_name']; ?>",choices: ["<?php echo  $row['option1']; ?>", "<?php echo  $row['option2']; ?>", "<?php echo  $row['option3']; ?>", "<?php echo  $row['option4']; ?>"],correctAnswer:"<?php  if($row['correct_ans'] == 'A'){echo '0';}elseif($row['correct_ans'] == 'B'){echo '1';}elseif($row['correct_ans'] == 'C'){echo '2';}elseif($row['correct_ans'] == 'D'){echo '3';} ?>"},
	<?php
	}
    ?>
    ];


var currentQuestion = 0;
var viewingAns = 0;
var correctAnswers = 0;
var quizOver = false;
var iSelectedAnswer = [];
	var c=<?php echo $duration;  ?>;
	var t;
$(document).ready(function () 
{
    // Display the first question
    displayCurrentQuestion();
    $(this).find(".quizMessage").hide();
    $(this).find(".preButton").attr('disabled', 'disabled');
	
	timedCount();
	
	$(this).find(".preButton").on("click", function () 
	{		
		
        if (!quizOver) 
		{
			if(currentQuestion == 0) { return false; }
			
			
	
			if(currentQuestion == 1) {
			  $(".preButton").attr('disabled', 'disabled');
			}
			
				currentQuestion--; // Since we have already displayed the first question on DOM ready
				if (currentQuestion < questions.length) 
				{
					displayCurrentQuestion();
					
				} 					
		} else {
			if(viewingAns == 3) { return false; }
			currentQuestion = 0; viewingAns = 3;
			viewResults();		
		} 
    });

	
	// On clicking next, display the next question
    $(this).find(".nextButton").on("click", function () 
	{
	        
            
        if (!quizOver) 
		{
			
            var val = $("input[type='radio']:checked").val();


            //if (val == undefined) 
			//{
                $(document).find(".quizMessage").text("Please select an answer");
                $(document).find(".quizMessage").show();
            //} 
			//else 
			//{
                // TODO: Remove any message -> not sure if this is efficient to call this each time....
                $(document).find(".quizMessage").hide();
				if (val == questions[currentQuestion].correctAnswer) 
				{
					correctAnswers++;
				}
				iSelectedAnswer[currentQuestion] = val;
				
				currentQuestion++; // Since we have already displayed the first question on DOM ready
				
				if(currentQuestion >= 1) {
					  $('.preButton').prop("disabled", false);
				}
				if (currentQuestion < questions.length) 
				{
					displayCurrentQuestion();
					
				} 
				
				else 
				{
					displayScore();
					$('#iTimeShow').html('Quiz Time Completed!');
					$('#timer').html("You scored: " + correctAnswers + " out of: " + questions.length);
				// 	window.location.href="https://www.edhutsolutions.com/quizResult.php?id=<?php echo $id; ?>";
						window.location.href="quizResult.php?id=<?php echo $id; ?>";
					c=<?php echo $duration;  ?>;
					$(document).find(".preButton").text("View Answer");
					$(document).find(".nextButton").text("Play Again?");
					quizOver = true;
					return false;
					
				}
			//}
					
		}	
		else 
		{ // quiz is over and clicked the next button (which now displays 'Play Again?'
			quizOver = false; $('#iTimeShow').html('Time Remaining:'); iSelectedAnswer = [];
			$(document).find(".nextButton").text("Next Question");
			$(document).find(".preButton").text("Previous Question");
			 $(".preButton").attr('disabled', 'disabled');
			resetQuiz();
			viewingAns = 1;
			displayCurrentQuestion();
			hideScore();
		}
    });
});



function timedCount()
	{
		if(c == 1805) 
		{ 
			return false; 
		}
		
		var hours = parseInt( c / 3600 ) % 24;
		var minutes = parseInt( c / 60 ) % 60;
		var seconds = c % 60;
		var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);            
		$('#timer').html(result);
		
		if(hours==0 && minutes == 0 && seconds==0){
		    	window.location.href="https://edhutsolutions.com/quizResult.php?id=<?php echo $id; ?>";
		}
	
		
		if(c == 0 )
		{
					displayScore();
					$('#iTimeShow').html('Quiz Time Completed!');
					$('#timer').html("You scored: " + correctAnswers + " out of: " + questions.length);
					window.location.href="https://edhutsolutions.com/quizResult.php?id=<?php echo $id; ?>";
					c=1805;
					$(document).find(".preButton").text("View Answer");
					$(document).find(".nextButton").text("Play Again?");
					quizOver = true;
					return false;
					
		}
		
		/*if(c == 0 )
		{	
			if (!quizOver) 
			{
				var val = $("input[type='radio']:checked").val();
            	if (val == questions[currentQuestion].correctAnswer) 
				{
					correctAnswers++;
				}
				currentQuestion++; // Since we have already displayed the first question on DOM ready
				
				if (currentQuestion < questions.length) 
				{
					displayCurrentQuestion();
					c=15;
				} 
				else 
				{
					displayScore();
					$('#timer').html('');
					c=16;
					$(document).find(".nextButton").text("Play Again?");
					quizOver = true;
					return false;
				}
			}
			else 
			{ // quiz is over and clicked the next button (which now displays 'Play Again?'
				quizOver = false;
				$(document).find(".nextButton").text("Next Question");
				resetQuiz();
				displayCurrentQuestion();
				hideScore();
			}		
		}	*/
		c = c - 1;
		t = setTimeout(function()
		{
			timedCount()
		},1000);
	}
	
	
// This displays the current question AND the choices
function displayCurrentQuestion() 
{

	if(c == 1805) { c = <?php echo $duration; ?>; timedCount(); }
    //console.log("In display current Question");
    var question = questions[currentQuestion].question;
    var questionno = questions[currentQuestion].questionno;
    var mcqno = questions[currentQuestion].mcqno;
    var questionClass = $(document).find(".quizContainer > .question");
    var choiceList = $(document).find(".quizContainer > .choiceList");
    var numChoices = questions[currentQuestion].choices.length;
    // Set the questionClass text to the current question
    $('#mcqno').html(mcqno);
    $(questionClass).html(question);
    var divobjss = document.getElementById('myInput');
    divobjss.value =questionno ;
    
    // Remove all current <li> elements (if any)
    $(choiceList).find("li").remove();
    var choice;
	
	
    for (i = 0; i < numChoices; i++) 
	{
        choice = questions[currentQuestion].choices[i];
       
		 

		if(iSelectedAnswer[currentQuestion] == i) {
			$('<li><input type="radio" class="radio-inline" checked="checked"  value=' + i + ' name="dynradio"  />' +  ' ' + choice  + '</li>').appendTo(choiceList);
		} else {
			$('<li><input type="radio" class="radio-inline" value=' + i + ' name="dynradio" />' +  ' ' + choice  + '</li>').appendTo(choiceList);
		}
    }
}

function resetQuiz()
{
    currentQuestion = 0;
    correctAnswers = 0;
    hideScore();
}

function displayScore()
{
    $(document).find(".quizContainer > .result").text("You scored: " + correctAnswers + " out of: " + questions.length);
    $(document).find(".quizContainer > .result").show();
}

function hideScore() 
{
    $(document).find(".result").hide();
}

// This displays the current question AND the choices
function viewResults() 
{

	if(currentQuestion == 10) { currentQuestion = 0;return false; }
	if(viewingAns == 1) { return false; }

	hideScore();
    var question = questions[currentQuestion].question;
    var questionClass = $(document).find(".quizContainer > .question");
    var choiceList = $(document).find(".quizContainer > .choiceList");
    var numChoices = questions[currentQuestion].choices.length;
    // Set the questionClass text to the current question
    $(questionClass).html(question);
    
    // Remove all current <li> elements (if any)
    $(choiceList).find("li").remove();
    var choice;
	
	
	for (i = 0; i < numChoices; i++) 
	{
        choice = questions[currentQuestion].choices[i];
		
		if(iSelectedAnswer[currentQuestion] == i) {
			if(questions[currentQuestion].correctAnswer == i) {
				$('<li style="border:2px solid green;margin-top:10px;"><input type="radio" class="radio-inline" checked="checked"  value=' + i + ' name="dynradio" />' +  ' ' + choice  + '</li>').appendTo(choiceList);
			} else {
				$('<li style="border:2px solid red;margin-top:10px;"><input type="radio" class="radio-inline" checked="checked"  value=' + i + ' name="dynradio" />' +  ' ' + choice  + '</li>').appendTo(choiceList);
			}
		} else {
			if(questions[currentQuestion].correctAnswer == i) {
				$('<li style="border:2px solid green;margin-top:10px;"><input type="radio" class="radio-inline" value=' + i + ' name="dynradio" />' +  ' ' + choice  + '</li>').appendTo(choiceList);
			} else {
				$('<li><input type="radio" class="radio-inline" value=' + i + ' name="dynradio" />' +  ' ' + choice  + '</li>').appendTo(choiceList);
			}
		}
    }
	
	currentQuestion++;
	
	setTimeout(function()
		{
			viewResults();
		},3000);
}

 function getInputValue(){
     var testval=$("input[type='radio']:checked").val();
     if(testval != undefined)
	 {
	    //var vals = $("input[type='radio']:checked").val();
        //alert(testval);
        var divobjsss = document.getElementById('myInput5');
        divobjsss.value =testval;
	 }
	 else if(testval == undefined)
	 {
	     var divobjsss = document.getElementById('myInput5');
         divobjsss.value =4;
         //alert(divobjsss);
	 }
	 //debugger;
            // Selecting the input element and get its value 
            var inputVal = document.getElementById("myInput").value;
            var inputVal2 = document.getElementById("myInput2").value;
            var inputVal4 = document.getElementById("myInput4").value;
            var inputVal5 = document.getElementById("myInput5").value;
            
            if(inputVal5 == 0)
            {
                inputVal6='A';
            }
            else if(inputVal5 == 1)
            {
                inputVal6='B';
            }
            else if(inputVal5 == 2)
            {
                inputVal6='C';
            }
            else if(inputVal5 == 3)
            {
                inputVal6='D';
            }
            else if(inputVal5 == 4)
            {
                inputVal6='Not Answered';
            }
            // Displaying the value
            //alert(inputVal6);
            $.ajax({
							url: "ajax_file.php",
							type: "GET",
							cache: false,
							data:{
								inputVal: inputVal,inputVal2: inputVal2,inputVal4: inputVal4,inputVal6:inputVal6
							},
							success: function(dataResult){
							
					         }
            });
        }
        
  </script>

</body>

</html>