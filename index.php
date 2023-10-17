<?php include 'include/header2.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Project Management Professional certification is the most distinguished professional qualification for project managers offered by Project Management Institute ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Edhut - Professional Certification Provider | Home</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon-2.png" alt="edhut-PMP-logo">


    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <style>
   
        #message {  padding: 0px 40px 0px 0px; }
		#mail-status {
			padding: 12px 20px;
			width: 100%;
			display:none; 
			font-size: 1em;
			font-family: "Georgia", Times, serif;
			color: rgb(40, 40, 40);
		}
	  .error{background-color: #F7902D;  margin-bottom: 20px;}
	  .success{background-color: #48e0a4; }
		.g-recaptcha {margin: 0 0 25px 0;}
		
        .single-upcoming-events .events-thumb::after {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: #fff0;
    content: '';
    z-index: 2;
}



li.zee {
  display: inline-block;
  font-size: 1.0em;
  list-style-type: none;
  padding: 1em;
  text-transform: uppercase;
}

li.zee span {
  display: block;
  font-size: 4.5rem;
}

.message {
  font-size: 4rem;
}

#content {
  display: none;
  padding: 1rem;
}

.emoji {
  padding: 0 0.25rem;
}

@media all and (max-width: 768px) {
  li.zee {
    font-size: 1.125rem;
    padding: 0.75rem;
  }

  li.zee span {
    font-size: 3.375rem;
  }
}

    </style>
   <!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->


</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DS1L5LFXP4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DS1L5LFXP4');
</script>


<body>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
<style type="text/css">
#overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: #000;
filter:alpha(opacity=70);
-moz-opacity:0.7;
-khtml-opacity: 0.7;
opacity: 0.7;
z-index: 100;
display: none;
}
</style>

    
    <!-- Preloader -->
    <!--<div id="preloader">
        <div class="spinner"></div>
    </div>-->

    <!-- ##### Header Area Start ##### -->
    <?php include 'include/header.php'; ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(img/bg-img/bg1.jpg);"alt="training-institute">
        <div class="container h-100">
            
            
            
            <div class="row h-100 align-items-center">
                <div class="container-fluid">
  
  <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-8" style="">
        
    
    </div>
    
    
    <div class="col-sm-12 col-md-6 col-lg-4" style="padding-top:80px;">
        <div class="contact-form"style="background-color: #ffffff5c" >
                        <h4>Get In Touch</h4>
                        
                        <form id="contactform" action="" method="POST" novalidate="novalidate">
                            <div class="row">
                                
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name *" aria-required="true" required="">
                                    </div>
                                </div>
                                
                                
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email *" aria-required="true" required="">
                                    </div>
                                </div>
                                
                                
                                 <div class="col-12 col-lg-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number *" aria-required="true" required="">
                                    </div>
                                </div>
                                
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="comment-content" name="content" rows="10" cols="30" placeholder="Message *"></textarea>
                                    </div>
                                </div>
                                <div id="mail-status"></div>	
                                <div class="col-12">
                                    <button class="btn clever-btn w-100" id="send-message" type="submit" name="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        <div id="loader-icon" style="display:none;"><img src="img/loader.gif" alt="edhut-loader"></div>
                    </div>
    </div>
  </div>
</div>
                <div class="col-6">
                    <!-- Hero Content -->
                    
                   
                </div>
                <div class="col-12 col-lg-6" style="padding-top: 50px;">
                
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->
    
        <!-- ##### Upcoming Events Start ##### -->
    <section class="upcoming-events section-padding-20-0" style="padding-top:40px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Upcoming Online Training </h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Upcoming Events -->
                <?php
                $sql="select * from trainingInformation order by position asc";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($result))
                {
                ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-deck-wrapper" style="margin-bottom: 10px;">
                        <div class="card-deck">
                          <div class="card">
                            <!--<center><img class="card-img-top" src="img/bg-img/PMP1S.png" alt="Card image cap" style="height: 174px;width: 60%;text-align: center;"></center>-->
                            <div class="card-block" style="background: #d7e0fc;">
                              <h4 class="card-title text-center" style="background: #095796;color:#fff;">PMP Certification Training</h4>
                               <p class="card-text text-center"  style="font-size: 16px;font-weight: 700;"><b><?php echo $row['months']; ?></b></p>
                               <p class="card-text text-center" style="font-size: 16px;font-weight: 700;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $row['dates']; ?></p>
                               
                              <p class="card-text text-center" style="font-size: 16px;font-weight: 700;"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;09:30 AM to 06:30 PM</p>
                            </div>
                          </div>
                        </div>
                    </div>
                    
                </div>
                <?php
                }
                ?>
                <!--<div class="col-12 col-md-6 col-lg-4">
                    <div class="card-deck-wrapper" style="margin-bottom: 10px;">
                        <div class="card-deck">
                          <div class="card">
                            <center><img class="card-img-top" src="img/bg-img/PMP1S.png" alt="Card image cap" style="height: 174px;width: 60%;text-align: center;"></center>
                            <div class="card-block" style="background: #d7e0fc;">
                              <h4 class="card-title text-center" style="background: #eae39ac9;">PMP Certification Training</h4>
                               <p class="card-text text-center"><b>May 2021</b></p>
                               <p class="card-text text-center"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;22,23 & 29,30</p>
                               
                              <p class="card-text text-center"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;09:30 AM to 06:30 PM</p>
                            </div>
                          </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-deck-wrapper" style="margin-bottom: 10px;">
                        <div class="card-deck">
                          <div class="card">
                            <center><img class="card-img-top" src="img/bg-img/PMP1S.png" alt="Card image cap" style="height: 174px;width: 60%;text-align: center;"></center>
                            <div class="card-block" style="background: #d7e0fc;">
                              <h4 class="card-title text-center" style="background: #eae39ac9;">PMP Certification Training</h4>
                               <p class="card-text text-center"><b>June 2021</b></p>
                               <p class="card-text text-center"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;19,20 & 26,27</p>
                               
                              <p class="card-text text-center"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;09:30 AM to 06:30 PM</p>
                            </div>
                          </div>
                        </div>
                    </div>
                    
                </div>-->
                <!-- Single Upcoming Events 
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="750ms">
                        
                        <div class="events-thumb">
                            <img src="img/bg-img/Asset 4-8.png" alt="">
                        </div>

                    </div>
                </div>
                
                
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        
                        <div class="events-thumb">
                            <img src="img/bg-img/Asset 6-8.png" alt="">
                        </div>

                    </div>
                </div>
                Single Upcoming Events -->
            </div>
        </div>
    </section>
    <!-- ##### Upcoming Events End ##### -->
    
    <!-- ##### Popular Courses Start ##### -->
    <section class="popular-courses-area" style="background-image: url(img/core-img/texture.png);padding-top:20px; alt="edhut-PMP";>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>WHY EDHUT SERVICES</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="img/bg-img/Learn-from-Subject-Matter-Experts (1).png" alt="Subject-Matter">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h6>Learn from Subject Matter Experts</h6>
                            <p class="text-justify" style="color:#766d6d;">We are the One of the world's leading certification training provider, with the finest real-time experts working with us. All our trainers/Consultants are seasoned professional has many years of industry experience.</p>
                        </div>
                    </div>
                </div>

                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <img src="img/bg-img/Globally-Accredited.png" alt="Globally-Accredited">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h6>Globally Accredited</h6>
                            <p class="text-justify" style="color:#766d6d;">All course content are accredited by International bodies and have been independently assessed to ensure the trainings are on par with the current industry needs. Our program curriculums are designed keeping in line with the Certification requirements.</p>
                        </div>

                    </div>
                </div>

                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="750ms">
                        <img src="img/bg-img/Competitive-Pricing.png" alt="Competitive-Pricing">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h6>Competitive Pricing</h6>
                            <p class="text-justify" style="color:#766d6d;">Our training programs are designed keeping students, Professionals and their needs in mind. We plan our programs to make it affordable to all strata of the society. Be assured of your success on certification exam. You are covered with 100% money back guarantee otherwise</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Popular Courses End ##### -->

    <!-- ##### Best Tutors Start ##### -->
    <section class="best-tutors-area" style="padding-top:20px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>OUR HAPPY CUSTOMERS</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tutors-slide owl-carousel wow fadeInUp" data-wow-delay="250ms">

                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/hement.jpg" alt="pmp-edhut">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Hemant Surve <a href="#" class="pull-right"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:18px;color:#5474db"></i></a></h5>
                                <span>Manager - IT, Certified Information Security Manager</span>
                                <p>“The trainer has immense teaching experience in this field and his study material is excellent and easy to understand. The arrangements made by Edhut for this training was excellent and surpassed my expectations. I highly recommend Edhut “.</p>
                            </div>
                        </div>

                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/sudhir.jpg" alt="pmp-online">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Thazhathe Kalathil Sudhir,PMP,BE(Civil) <a href="https://www.linkedin.com/in/thazhathe-kalathil-sudhir-pmp-be-civil-160a2467/" class="pull-right"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:18px;color:#5474db"></i></a></h5>
                                <span> Resident Engineer at AECOM</span>
                                <p>"I feel I have taken the right decision to enroll at EdHut for this certification. The session was very interactive and the instructor was willing to answer all the queries."</p>
                               
                            </div>
                        </div>

                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/praveen.jpg" alt="praveen">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Praveen Kumar <a href="https://www.linkedin.com/in/praveen-kumar-11755828/" class="pull-right"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:18px;color:#5474db"></i></a></h5>
                                <span>Project Engineer at Almoayyed Computers</span>
                                <p>"The trainer was extremely well organized. He shared his knowledge and through various skills by providing examples, suggestions, and guidance."</p>
                            
                            </div>
                        </div>

                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/abdurrehman.jpg" alt="abdurrehman">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Abdulrahman Khalid AlSindi <a href="https://www.linkedin.com/in/abdulrahman-khalid-alsindi-02660754/" class="pull-right"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:18px;color:#5474db"></i></a></h5>
                                <span>PMP, CCNP, Network Engineer at Batelco</span>
                                <p>"The Training Materials were comprehensive, and the interactive sessions and role plays helped us understand the topic in depth."</p>
                                
                            </div>
                        </div>

                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/raghuram.jpg" alt="raghuram-pmp">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Raghuram P <a href="https://www.linkedin.com/in/raghuram-p-b750a36b/" class="pull-right"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:18px;color:#5474db"></i></a></h5>
                                <span>Quantity Surveyor &amp; Contracts Engineer at Aradous Construction &amp; Maintenance Co. W.L.L</span>
                                <p>"The trainer was extremely well organized. He shared his knowledge and through various skills by providing examples, suggestions, and guidance."</p>
                               
                            </div>
                        </div>
                        
                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/srijith.jpg" alt="srijith-PMP">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Sreejith Gopinathan, PMP® <a href="https://www.linkedin.com/in/isreejith/" class="pull-right"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:18px;color:#5474db"></i></a></h5>
                                <span style="color:black">Manager - Information Technology | Core Banking | IT Project Management | Systems &amp; Processes</span>
                                <p class="text-justify">"The training session was very informative.Mock session were quite helpful.it was an over all good experience."</p>
                               
                            </div>
                        </div>
                        
                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/krishna.jpg" alt="krishna-PMP">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>krishna Pravin Nuguri, CCP, PMP, M. Tech <a href="https://www.linkedin.com/in/krishna-pravin-nuguri-ccp-pmp-m-tech-31806a108/" class="pull-right"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:18px;color:#5474db"></i></a></h5>
                                <span>Senior Quantity Surveyor at Almoayyed Contracting Group</span>
                                <p>"Brilliant Training and Coordination" Quality training and excellent customer service. Done PMP Training&amp; passed in my first attempt.</p>
                                
                            </div>
                        </div>
                        
                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/parag.jpg" alt="parag-PMP">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Parag Joshi, M.Tech, PMP  <a href="https://www.linkedin.com/in/parag-joshi-m-tech-pmp-5b117829/" class="pull-right"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:18px;color:#5474db"></i></a></h5>
                                <span>Assistant Project Manager</span>
                                <p>"It would be great if the training duration for program is increased 4 days spanning over 2 weekends. This would give enough time to the participants to gain a better understanding after the first weekend as they prepare and read through the content in the gap of 4-5 days.
Overall experience was excellent"</p>
                              
                            </div>
                        </div>
                        
                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/raunaq.jpg" alt="raunaqpmp-edhut">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>RAUNAQUE ANJUM <a href="https://www.linkedin.com/in/raunaque-anjum-a3942a1a/" class="pull-right"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:18px;color:#5474db"></i></a></h5>
                                <span>PMP;LEED AP (BD+C); SR.MECHANICAL ENGINEER</span>
                                <p>"I have done PMP training from Edhut. This institute stands apart in the industry as one of the best to my knowledge. The training methodology and good set of examples are easy to understand, yet has lot of practical orientation. One of the best institutes in the region for Professional Training"</p>
                              
                            </div>
                        </div>
                        
                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/henry.jpg" alt="henry-edhut">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Henry Lee, CCM, PMP, CPE, FAAPM <a href="https://www.linkedin.com/in/henry-lee-ccm-pmp-cpe-faapm-bb533b103/" class="pull-right"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:18px;color:#5474db"></i></a></h5>
                                <span>Construction Manager at Planate Management Group LLC</span>
                                <p>"The training material is really good, and the trainer encourages the trainees to participate. Quizzes and exercises are good which give a feeling being in the classroom."</p>
                                
                            </div>
                        </div>
                        
                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/Chetan-D_Gulf-Finance-House.jpg" alt="chetanpmp-edhut">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Chetan Dongra <a href="" class="pull-right"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:18px;color:#5474db"></i></a></h5>
                                <span> Senior Director / GFH Financial Group - Infrastructure Development Investment</span>
                                <p>"I find the training very informative and effective. Trainer made such to make the session interactive and provided more emphasis on the important topics. Very Knowledgeable trainer, nice way of presenting and explaining. overall it was very good."</p>
                               
                            </div>
                        </div>
                        
                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/vikash.jpg" alt="vikashonlinecsmtraining-institute">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Vikas Chaudhary <a href="https://www.linkedin.com/in/vikaschuadhary/" class="pull-right"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:18px;color:#5474db"></i></a></h5>
                                <span>Project Lead at Nokia</span>
                                <p>"I just wanted to jot you a note of thanks to say how much I enjoyed your workshop on PMP. It was certainly more lively and engaging than I had hoped for. Thank you for taking your time to teach me the ropes of the profession. It really motivated me to change my approach towards my work. I can honestly say that putting your tips and tools into practice made me feel more confident. Indeed a very interesting and informative course. Thank you for your intense energy, support, challenging workouts, and being a remarkable trainer!! I’m fortunate to have found a trainer who is friendly and always willing to help.I would even like to thank you to EdHut team for all the arrangements, care you took, regarding the detail notes and other supportive test throughout the sessions, and that even with a nominal cost.Thank you so much for the training session...I really enjoyed and learnt lots from it." </p>
                              
                            </div>
                        </div>
                        
                        <!-- Single Tutors Slide -->
                        <!--<div class="single-tutors-slides">
                            <div class="tutor-thumbnail">
                                <img src="img/bg-img/t5.png" alt="csmtraininginstitute-edhut">
                            </div>
                            <div class="tutor-information text-center">
                                <h5>Alex Parker</h5>
                                <span>Teacher</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit, sit amet tincidunt mauris ultrices vitae.</p>
                                <div class="social-info">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>-->
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Best Tutors End ##### -->

    <!-- ##### Register Now Start ##### -->
   <!-- <section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);"alt="edhutonline-classes">
    
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="forms">
                            <h4>Quick Enquiry</h4>
                            <form id="contactform" action="" method="POST" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" aria-required="true" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-required="true" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" aria-required="true" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <div class="form-group">
                                            <select name="course" id="course" class="form-control contact-select" style="color:black">
                                                  <option value="0" style="color:black" selected>Select course</option>
                                                  <option style="color:black" value="Certified Scrum Master®️ (CSM)">Certified Scrum Master®️ (CSM)</option>
                                                  <option style="color:black" value="Project Management Professional">Project Management Professional</option>
                                                  <option style="color:black" value="PMI-ACP®️ CERTIFICATION">PMI-ACP®️ CERTIFICATION</option>
                                                  <option style="color:black" value="PMI-RMP®️ CERTIFICATION">PMI-RMP®️ CERTIFICATION</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="course" name="course" placeholder="Course" aria-required="true" required>
                                        </div>
                                    </div>
                                    <div id="mail-status"></div>	
                                    <div class="col-12">
                                        <button class="btn clever-btn w-100" type="submit" id="send-message">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <div id="loader-icon" style="display:none;"><img src="img/loader.gif" /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
        <div class="register-now-countdown mb-100 wow fadeInUp" data-wow-delay="500ms">
            <h3>Enroll Now</h3>
            <p style="font-size:20px;">Limited seat available - Book your slot now<!--<br> <span style="color:red;">10% Flat discount</span></p>
           
            <div class="register-countdown">
               
                  <div id="countdown">
                    <ul>
                      <li class="zee"><span id="days"></span>days</li>
                      <li class="zee"><span id="hours"></span>Hours</li>
                      <li class="zee"><span id="minutes"></span>Minutes</li>
                      <li class="zee"><span id="seconds"></span>Seconds</li>
                    </ul>
                  </div>
            </div>
        </div>
    </section> -->
    <!-- ##### Register Now End ##### -->



    <!-- ##### Blog Area Start ##### -->
    <section class="blog-area" style="padding-top:40px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h1 style="font-size: 30px;">ON-DEMAND ONLINE LIVE INSTRUCTOR LED TRAININGS</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6">
                    
            <a href="online-PMP-Training.php" class="blog-headline">
                                <h4>Online PMP Training</h4>
                    
                    <p class="text-justify"><img style="float: left; margin: 0px 15px 15px 0px;" src="img/bg-img/PMP1S.png" alt="online-pmp" width="100" />Online PMP Training</b> The certification is relevant for professionals who are seeking 
                            to advance their career by completing the PMP® certification exam that is based on PMBOK® Guide. Our learning program equips you 
                            with the right information required to ace the PMP certification.<br> Comprehensive, Customized Study plan, High quality interactive
                            session with SME, Discuss Real-world Context with SME<br style="clear: both;" /></p>
                            
                    <!-- <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <div class="row">
                        <div class="col-12 col-md-4 col-lg-4"> 
                        <img src="img/bg-img/CSM 1.png"  alt="onlinepmp-classes" style="width: 70%;
    height: auto;
    padding-top: 10px;
    padding-left: 30px;
    padding-bottom: 10px;">
                        </div>
                        
                        <div class="col-12 col-md-8 col-lg-8"> 
                        
                        <div class="blog-content">
                            <a href="online-CSM-Training.php" class="blog-headline">
                                <h4>Online CSM Training CSM Certification</h4>
                            </a>
                            <p class="text-justify"><b>Online CSM Training CSM Certification</b> training offers Scrum framework and its application in the complex
                            environment for product development. We cover Agile values, principles, rules, practices that help Scrum Masters become effective and 
                            help the teams benefit from Scrum. CSM Certification Workshop participants become eligible to appear for the Scrum Alliance‘s CSM® 
                            certification exam and immediately receive the CSM® certification.</p>
                        </div>
                        </div>
                        </div>
                        
                        
                    </div>-->
                </div>
                
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6">
                    
                    <a href="online-RMP-Training.php" class="blog-headline">
                                <h4>Online RMP Training</h4>
                            </a>
                    
                    <p class="text-justify"><img style="float: left; margin: 0px 15px 15px 0px;" src="img/bg-img/RMPS.png" alt="RMPS-PMP" width="100" /><b>Online RMP Training</b> Project Risk Manager is a role that has been created to fill the real need for a professional
                            who can assess, analyze and mitigate risks while still maintaining a basic level of competence in project management.<br> EdHut training will
                            hand hold you through Project Risk Management concepts.<br> It will also prepare you to sit for the PMI-RMP® Exam .<br style="clear: both;" /></p>
                    
                     <!--<div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <div class="row">
                        <div class="col-12 col-md-4 col-lg-4"> 
                        <img src="img/bg-img/PMP1S.png" alt="onlineacp-training" style="width: 70%;
    height: auto;
    padding-top: 10px;
    padding-left: 30px;
    padding-bottom: 10px;">
                        </div>
                        <div class="col-12 col-md-8 col-lg-8"> 
                        
                        <div class="blog-content">
                            <a href="online-PMP-Training.php" class="blog-headline">
                                <h4>Online PMP Training</h4>
                            </a>
                            <p class="text-justify"><b>Online PMP Training</b> The certification is relevant for professionals who are seeking 
                            to advance their career by completing the PMP® certification exam that is based on PMBOK® Guide. Our learning program equips you 
                            with the right information required to ace the PMP certification.<br> Comprehensive, Customized Study plan, High quality interactive
                            session with SME, Discuss Real-world Context with SME</p>
                        </div>
                        </div>
                        </div>
                        
                        
                    </div>-->
                </div>

                <!-- Single Blog Area -->
                <div class="col-12 col-md-6">
                    
                    
                    
                   <a href="online-ACP-Training.php" class="blog-headline">
                                <h4>Online ACP Training</h4>
                            </a>
                    
                    <p class="text-justify"><img style="float: left; margin: 0px 15px 15px 0px;" src="img/bg-img/ACP.png" alt="pmp-cource"   width="100" /><b>Online ACP Training</b> Our PMI® Agile Certified Practitioner training program is aligned to the PMI® guidelines
                            and is designed to help you clear your PMI-ACP® exam. This course will empower you to learn how best to implement Agile practices appropriate
                            for your teams, through group interaction, case studies and real-world focused workshops & become a versatile agile professional with the
                            knowledge of Scrum, Kanban, XP and TDD etc.<br style="clear: both;" /></p>
                            
                            
                    <!--<div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <div class="row">
                        <div class="col-12 col-md-4 col-lg-4"> 
                        <img src="img/bg-img/ACP.png" alt="" style="width: 70%;
    height: auto;
    padding-top: 10px;
    padding-left: 30px;
    padding-bottom: 10px;">
                        </div>
                        <div class="col-12 col-md-8 col-lg-8"> 
                       
                        <div class="blog-content">
                            <a href="online-ACP-Training.php" class="blog-headline">
                                <h4>Online ACP Training</h4>
                            </a>
                            <p class="text-justify"><b>Online ACP Training</b> Our PMI® Agile Certified Practitioner training program is aligned to the PMI® guidelines
                            and is designed to help you clear your PMI-ACP® exam. This course will empower you to learn how best to implement Agile practices appropriate
                            for your teams, through group interaction, case studies and real-world focused workshops & become a versatile agile professional with the
                            knowledge of Scrum, Kanban, XP and TDD etc.</p>
                        </div>
                        </div>
                        </div>
                        
                        
                    </div>-->
                </div>

                <!-- Single Blog Area -->
                <div class="col-12 col-md-6">
                   <a href="renew-certification.php" target="_blank" class="blog-headline">
                                <h4>Renew Certification</h4>
                            </a>
                    
                    <a href="renew-certification.php" target="_blank"> <p class="text-justify"><img style="float: left; margin: 0px 15px 15px 0px;" src="img/renew-certification.jpeg" alt="RMPS-PMP" width="100" />
                  Renew Your Professional Certification- The Easy Way  
 <br style="clear: both;" /></p> </a>
                            
                    
                    <!-- <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <div class="row">
                        <div class="col-12 col-md-4 col-lg-4"> 
                        <img src="img/bg-img/RMPS.png" alt="RMP-traininginstitute-edhut" style="width: 70%;
    height: auto;
    padding-top: 10px;
    padding-left: 30px;
    padding-bottom: 10px;">
                        </div>
                        <div class="col-12 col-md-8 col-lg-8"> 
                       
                        <div class="blog-content">
                            <a href="online-RMP-Training.php" class="blog-headline">
                                <h4>Online RMP Training</h4>
                            </a>
                            <p class="text-justify"><b>Online RMP Training</b> Project Risk Manager is a role that has been created to fill the real need for a professional
                            who can assess, analyze and mitigate risks while still maintaining a basic level of competence in project management.<br> EdHut training will
                            hand hold you through Project Risk Management concepts.<br> It will also prepare you to sit for the PMI-RMP® Exam .</p>
                        </div>
                        </div>
                        </div>
                        
                        
                    </div>-->
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->
    <!-- ##### Our Client Start ##### -->
    <section class="upcoming-events" style="padding-top:40px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Our Client</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/Adrian.jpg" alt="Adrian">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/webuild.png" alt="edhutonline-classes" style="height: 90px;">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/hsbc.jpg" alt="hsbc">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/veripark.png" alt="veripark" style="height: 90px;">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/Nokia-Logo.png" alt="Nokia">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/STC.jpg" alt="STC" style="height: 90px;">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/VIVA.jpg" alt="VIVA">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/accenture.png" alt="PMP-accenture" style="height: 90px;">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/msceb.jpg" alt="RMP-msceb">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/huawai.jpg" alt="PMP-huawai">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/ewa.png" alt="CSM-ewa">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/dgj.png" alt="PMP-dgj">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/client_8.png" alt="PMP-onlineclasses">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/client_7.png" alt="edhut-PMP-client">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/client_6.png" alt="edhut-acp-client">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/client_5.png" alt="edhut-pmi-client">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/client_4.png" alt="CSM-client">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/client_3.png" alt="edhut-RMP-client">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/client_2.png" alt="PMP-client">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/client_1.png" alt="edhut-ACP-client">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/batelco.png" alt="PMI-client">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/almoyyed.png" alt="edhut-almoyyed">
                        </div>
                    </div>
                </div>
                
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/client-logo/aecom.jpg" alt="edhut-csm-client">
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </section>
    


    <!-- ##### Our Client End ##### -->
    <!-- ##### Footer Area Start ##### -->
   <?php include 'include/footer.php'; ?>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
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
        	$(document).ready(function (e){
        		$("#contactform").on('submit',(function(e){
        			e.preventDefault();
        			$("#mail-status").hide();
        			$('#send-message').hide();
        			$('#loader-icon').show();
        			$.ajax({
        				url: "submit.php",
        				type: "POST",
        				dataType:'json',
        				data: {
        				"name":$('input[name="name"]').val(),
        				"email":$('input[name="email"]').val(),
        				"phone":$('input[name="phone"]').val(),
        				"content":$('textarea[name="content"]').val()},				
        				success: function(response){
        				$("#mail-status").show();
        				$('#loader-icon').hide();
        				if(response.type == "error") {
        					$('#send-message').show();
        					$("#mail-status").attr("class","error");				
        				} else if(response.type == "message"){
        					$('#send-message').hide();
        					$("#mail-status").attr("class","success");							
        				}
        				$("#mail-status").html(response.text);	
        				},
        				error: function(){} 
        			});
        		}));
        	});
        	</script>

 <script>
        	$(document).ready(function (e){
        		$("#contactform").on('submit',(function(e){
        			e.preventDefault();
        			$("#mail-status").hide();
        			$('#send-message').hide();
        			$('#loader-icon').show();
        			$.ajax({
        				url: "submits.php",
        				type: "POST",
        				dataType:'json',
        				data: {
        				"name":$('input[name="name"]').val(),
        				"email":$('input[name="email"]').val(),
        				"phone":$('input[name="phone"]').val(),
        				"course":$('select[name="course"]').val()},				
        				success: function(response){
        				$("#mail-status").show();
        				$('#loader-icon').hide();
        				if(response.type == "error") {
        					$('#send-message').show();
        					$("#mail-status").attr("class","error");				
        				} else if(response.type == "message"){
        					$('#send-message').hide();
        					$("#mail-status").attr("class","success");							
        				}
        				$("#mail-status").html(response.text);	
        				},
        				error: function(){} 
        			});
        		}));
        	});
        	</script>
        	
</body>
</html>