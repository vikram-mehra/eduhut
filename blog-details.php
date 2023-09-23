<?php include 'include/header2.php'; ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- The above 4 meta tags *Must* come first in the head; any other head content must come *after* these tags -->



    <!-- Title -->

    <title>Edhut - Education &amp; Courses | Blog</title>



    <!-- Favicon -->

    <link rel="icon" href="img/core-img/favicon-2.png">



    <!-- Stylesheet -->

    <link rel="stylesheet" href="style.css">

<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '2b48a2dd-8a1c-4f88-a5a4-f4d3cd914c92', f: true }); done = true; } }; })();</script>

</head>



<body>


<?php
if(isset($_GET['id']))
{
	 $id=$_GET['id'];
	
	 $sql="select blog.*,cat.category_name from blogs as blog INNER JOIN blog_categories as cat
											ON blog.category_id=cat.id
											where blog.id=$id";
	 $resultquery=mysqli_query($con,$sql);
	 $heading=mysqli_fetch_array($resultquery,MYSQLI_ASSOC);
	 
	 //print_r($heading);
					 
}
?>

    <!-- ##### Header Area Start ##### -->

    <?php include 'include/header.php'; ?>
	
	

    <!-- ##### Header Area End ##### -->

<!-- ##### Breadcumb Area Start ##### -->

    <div class="breadcumb-area">

        <!-- Breadcumb -->

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="#">Home</a></li>

                <li class="breadcrumb-item"><a href="#">Courses</a></li>

                <li class="breadcrumb-item active" aria-current="page"><?php echo $heading['title']; ?></li>

            </ol>

        </nav>

    </div>

    <!-- ##### Breadcumb Area End ##### -->



    <!-- ##### Catagory Area Start ##### -->
	
	<?php 
		if(!empty($heading['image'])){
			$img='admin/uploads/blogs/'.$heading['image'];
		}else{
			$img='img/blog-img/7.jpg';
		}
	?>

    <div class="clever-catagory blog-details bg-img d-flex align-items-center justify-content-center p-3 height-400" style="background-image: url(<?php echo $img; ?>);">

        <div class="blog-details-headline">

            <h3><?php echo $heading['title']; ?></h3>

            <div class="meta d-flex align-items-center justify-content-center">

                <a href="#">Admin</a>

                <span><i class="fa fa-circle" aria-hidden="true"></i></span>

                <a href="#"><?php echo $heading['category_name']; ?></a>

            </div>

        </div>

    </div>

    <!-- ##### Catagory Area End ##### -->



    <!-- ##### Blog Details Content ##### -->

    <div class="blog-details-content section-padding-100">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-12 col-lg-8">

                    <!-- Blog Details Text -->

                    <div class="blog-details-text">

                        <?php echo $heading['description']; ?>

                        <!-- Tags -->

                        <!--div class="post-tags">

                            <ul>

                                <li><a href="#">Manual</a></li>

                                <li><a href="#">Liberty</a></li>

                                <li><a href="#">Interpritation</a></li>

                            </ul>

                        </div-->

                    </div>

                </div>

            </div>

        </div>



        <div class="related-posts section-padding-100-0">

            <div class="container-fluid">

                <div class="row">

                    <!-- Single Blog Area -->
					<?php
					if(isset($_GET['id']))
					{
						 $id=$_GET['id'];
						
						 $sql="select blog.*,cat.category_name from blogs as blog INNER JOIN blog_categories as cat
																ON blog.category_id=cat.id
																where blog.id !=$id";
						 $resultquery=mysqli_query($con,$sql);
						 $related=mysqli_fetch_array($resultquery,MYSQLI_ASSOC);
						 
						 //print_r($heading);
										 
					}
					?>
					<?php 
						if(!empty($related['image'])){
							$img='admin/uploads/blogs/'.$related['image'];
						}else{
							$img='img/blog-img/3.jpg';
						}
					?>
                    <div class="col-12 col-lg-6">

                        <div class="single-blog-area mb-100">

                            <img style="height: 120px;object-fit: cover;" src="<?php echo $img; ?>" alt="">

                            <!-- Blog Content -->

                            <div class="blog-content">

                                <a href="blog-details.php?id=<?php echo $related['id'].'&title='.slug($related['title']); ?>">

                                    <h4><?php echo $related['title']; ?></h4>

                                </a>

                                <div class="meta d-flex align-items-center">

                                    <a href="#">Admin</a>

                                    <span><i class="fa fa-circle" aria-hidden="true"></i></span>

                                    <a href="category.php?category-id=<?php echo $related['id'].'&category-name='.slug($related['category_name']); ?>"><?php echo $related['category_name']; ?></a>

                                </div>

                                <p><?php echo substr($related['description'],0,150); ?></p>

                            </div>

                        </div>

                    </div>



                    <!-- Single Blog Area -->

                    

                </div>

            </div>

        </div>



        <div class="container">

           <?php /*  <div class="row justify-content-center">

                <!-- Post A Comment -->

                <div class="col-12 col-lg-6">

                    <div class="post-a-comments mb-70">

                        <h4>Post a Comment</h4>



                        <form action="#" method="post">

                            <div class="row">

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="text" class="form-control" id="text" placeholder="Name">

                                    </div>

                                </div>

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="email" class="form-control" id="email" placeholder="Email">

                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="form-group">

                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>

                                    </div>

                                </div>

                                <div class="col-12">

                                    <button class="btn clever-btn w-100">Post A Comment</button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>



            <div class="row justify-content-center">

                <!-- Comments -->

                <div class="col-12 col-lg-6">

                    <div class="comments-area">

                        <h4>Comments (12)</h4>



                        <ol class="comments-list">

                            <!-- Single Comment Area -->

                            <li class="single_comment_area">

                                <!-- Single Comment -->

                                <div class="single-comment-wrap mb-30">

                                    <div class="d-flex justify-content-between mb-30">

                                        <!-- Comment Admin -->

                                        <div class="comment-admin d-flex">

                                            <div class="thumb">

                                                <img src="img/bg-img/t1.png" alt="">

                                            </div>

                                            <div class="text">

                                                <h6>Sarah Parker</h6>

                                                <span>Sep 29, 2017 at 9:48 am</span>

                                            </div>

                                        </div>

                                        <!-- Reply -->

                                        <div class="reply">

                                            <a href="#">Reply</a>

                                        </div>

                                    </div>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis.</p>

                                </div>



                                <ol class="children">

                                    <li class="single_comment_area">

                                        <!-- Single Comment -->

                                        <div class="single-comment-wrap">

                                            <div class="d-flex justify-content-between mb-30">

                                                <!-- Comment Admin -->

                                                <div class="comment-admin d-flex">

                                                    <div class="thumb">

                                                        <img src="img/bg-img/t2.png" alt="">

                                                    </div>

                                                    <div class="text">

                                                        <h6>Sarah Parker</h6>

                                                        <span>Sep 29, 2017 at 9:48 am</span>

                                                    </div>

                                                </div>

                                                <!-- Reply -->

                                                <div class="reply">

                                                    <a href="#">Reply</a>

                                                </div>

                                            </div>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis.</p>

                                        </div>

                                    </li>

                                </ol>

                            </li>



                            <li class="single_comment_area mb-30">

                                <!-- Single Comment -->

                                <div class="single-comment-wrap">

                                    <div class="d-flex justify-content-between mb-30">

                                        <!-- Comment Admin -->

                                        <div class="comment-admin d-flex">

                                            <div class="thumb">

                                                <img src="img/bg-img/t3.png" alt="">

                                            </div>

                                            <div class="text">

                                                <h6>Sarah Parker</h6>

                                                <span>Sep 29, 2017 at 9:48 am</span>

                                            </div>

                                        </div>

                                        <!-- Reply -->

                                        <div class="reply">

                                            <a href="#">Reply</a>

                                        </div>

                                    </div>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis.</p>

                                </div>

                            </li>

                        </ol>

                    </div>

                </div>



                <div class="col-12">

                    <div class="load-more text-center mt-50">

                        <a href="#" class="btn clever-btn btn-2">Load More</a>

                    </div>

                </div>

            </div>

        </div>
 */ ?>
 
 <?php
	function slug($data=null){
		$slug = $data;
        $divider = '-';
        $slug = preg_replace('~[^\pL\d]+~u', $divider, $slug); // transliterate					  
		$slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);					  
		// remove unwanted characters					 
		$slug = preg_replace('~[^-\w]+~', '', $slug);					  // trim					  
		$slug = trim($slug, $divider);					 
		// remove duplicate divider					  
		$slug = preg_replace('~-+~', $divider, $slug);					  // lowercase					  
		$slug = strtolower($slug);
		return $slug;
		
	}
 
 ?>
    </div>

    <!-- ##### Blog Details Content ##### -->

    

	



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



    

</body>

</html>