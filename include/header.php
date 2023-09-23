<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {margin:0;height:px;}

.icon-bar {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  z-index:100;
}

.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

.icon-bar a:hover {
  background-color: #000;
}

.facebook {
  background: #3B5998;
  color: white;
}

.instagram {
  background: #833AB4;
  color: white;
}



.linkedin {
  background: #007bb5;
  color: white;
}

.twitter {
  background: #bb0000;
  color: white;
}


</style>
 <style>
     .breakpoint-off .classynav ul li .dropdown {
    width: 280px;
    position: absolute;
    background-color: #fff;
    top: 135%;
    left: 0;
    z-index: 100;
    height: auto;
    box-shadow: 0 1px 5px rgba(0,0,0,.1);
    -webkit-transition-duration: .3s;
    transition-duration: .3s;
    opacity: 0;
    visibility: hidden;
    padding: 10px 0;
}
 </style>
 <style>
#more {display: none;}
</style>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/620950f69bd1f31184dc6a90/1frq68har';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!--End of Tawk.to Script-->
        <!-- Top Header Area -->
        <div class="top-header-area d-flex justify-content-between align-items-center">
            <!-- Contact Info -->
            <div class="contact-info">
                <a href="tel:704 2121 784" style="color:black"><span>Phone:</span> +91 704 2121 784</a>
                <a href="#" style="color:black;"><span>Email:</span>  info@edhutsolutions.com</a>
            </div>
            <!-- Follow Us -->
            <div class="follow-us">
                <span>Follow us</span>
                <a href="https://www.facebook.com/EDHUTSOLUTIONS"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://www.linkedin.com/company/edhut-knowledge-solutions-pvt-ltd/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                <a href="https://twitter.com/info_edhut"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                 <a href="https://www.youtube.com/@edhutglobal"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="cleverNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.php"><img src="img/core-img/logo.png" alt="Edhut-logo"></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <!--<li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index-2.html">Home</a></li>
                                        <li><a href="courses.html">Courses</a></li>
                                        <li><a href="single-course.html">Single Courses</a></li>
                                        <li><a href="instructors.html">Instructors</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Single Blog</a></li>
                                        <li><a href="regular-page.html">Regular Page</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </li>-->
                                <li><a href="courses.php">Courses</a>
                                    <ul class="dropdown" STYLE="width: 330px;">
                                       
                                        <li><a href="online-PMP-Training.php">Project Management Professional (PMP)</a></li>
                                         <li><a href="online-RMP-Training.php">PMI-RMP®️ CERTIFICATION</a></li>
                                         
                                        <li><a href="online-ACP-Training.php">PMI-ACP®️ CERTIFICATION</a></li>
                                        <li><a href="#online-RMP-Training.php">PMI Sheduling Professional (PMI-SP)</a></li>
                                       
                                          <li><a href="project-management -MS-project.php">Project Management – MS Project</a></li>
                                         <li><a href="prince2.php">PRINCE2®</a></li>
                                        <li><a href="primavera-p6.php">Primavera P6</a></li>
                                        
                                         
                                        
                                   </ul>
                                </li>
                                
                                
                                <!--<li><a href="instructors.html">Instructors</a></li>-->
                                <li><a href="corporate-training.php">Corporate Training</a></li>
                                  <li><a href="destination-training.php">Destination Training</a></li>
                                <li><a href="renew-certification.php"> Renew Certification</a></li>
                               
                                <li><a href="reviews.php">Reviews</a></li>
                                
                               
                                <li><a href="blogs.php">Blog</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>

                            <!-- Register / Login -->
                            <?php
							if (!$_SESSION['userid']) {
							?>
                            <!-- Register / Login -->
                            <div class="register-login-area">
                                <!--<a href="#" class="btn">Register</a>-->
                                <a href="login.php" class="btn active">Login</a>
                            </div>
                            <?php 
							}
							else
							{
							?>
							<div class="login-state d-flex align-items-center">
                                <div class="user-name mr-30">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle btn btn-primary" href="#" role="button" id="userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="color:#fff;"><?php echo $username; ?></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                                            <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                                            <a class="dropdown-item" href="#">Profile</a>
                                            <a class="dropdown-item" href="logout.php">Logout</a>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="userthumb">
                                    <img src="img/bg-img/t1.png" alt="">
                                </div>-->
                            </div>
							<?php
							}
							?>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>