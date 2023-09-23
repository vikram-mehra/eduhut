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

    <!-- ##### Header Area Start ##### -->
    <?php include 'include/header.php'; ?>
    <!-- ##### Header Area End ##### -->

    
	 <!-- ##### Blog Area Start ##### -->    
	 <section class="blog-area blog-page section-padding-100">       
		<div class="container-fluid">            
			<div class="row">                
				<div class="col-12">                   
					<div class="blog-catagories mb-70 d-flex flex-wrap justify-content-between">					
						<?php 
						$cat_id=$_GET['category-id'];
						$i = 0;
							$sql = "select * from blog_categories where id !=$cat_id ORDER BY id DESC";
							if ($result = mysqli_query($con, $sql))
							{
								while ($row = mysqli_fetch_array($result))
								{
									
									$slug2 = $row['category_name'];
									$divider = '-';
									$slug2 = preg_replace('~[^\pL\d]+~u', $divider, $slug2); // transliterate					  
									$slug2 = iconv('utf-8', 'us-ascii//TRANSLIT', $slug2);					  
									// remove unwanted characters					 
									$slug2 = preg_replace('~[^-\w]+~', '', $slug2);					  // trim					  
									$slug2 = trim($slug2, $divider);					 
									// remove duplicate divider					  
									$slug2 = preg_replace('~-+~', $divider, $slug2);					  // lowercase					  
									$slug2 = strtolower($slug2);		
									$i++; 
									?>                        <!-- Single Catagories -->                       
			<div class="single-catagories bg-img" style="background-image: url(img/bg-img/bc1.jpg);">                            <a href="category.php?category-name=<?php echo $slug2.'&category-id='.$row['id']; ?>">                                
				<h6><?php echo $row['category_name']; ?></h6>                           
				</a>                       
			</div>           							
			<?php
    }
} ?>                    </div>                </div>            </div>            <div class="row">                <!-- Single Blog Area -->				<?php $i = 0;
$sql = "select blog.*,cat.category_name from blogs as blog INNER JOIN blog_categories as cat					ON blog.category_id=cat.id	where cat.id=$cat_id
				ORDER BY blog.created_at DESC";
			$result = mysqli_query($con, $sql);
			
if (mysqli_num_rows($result)>0)
{
    while ($row = mysqli_fetch_array($result))
    {
        $i++;
        $slug = $row['title'];
        $divider = '-';
        $slug = preg_replace('~[^\pL\d]+~u', $divider, $slug); // transliterate					  
		$slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);					  
		// remove unwanted characters					 
		$slug = preg_replace('~[^-\w]+~', '', $slug);					  // trim					  
		$slug = trim($slug, $divider);					 
		// remove duplicate divider					  
		$slug = preg_replace('~-+~', $divider, $slug);					  // lowercase					  
		$slug = strtolower($slug);
         ?>                <div class="col-12 col-lg-6">                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">						<?php if (!empty($row['image']))
        { ?>							<img style="object-fit: cover;height: 210px;" src="/admin/uploads/blogs/<?php echo $row['image'] ?>" alt="">						<?php
        }
        else
        { ?>									<img src="img/blog-img/1.jpg" alt="">						<?php
        } ?>                        <!-- Blog Content -->                        <div class="blog-content">                            <a href="blog-details.php?title=<?php echo $slug . '&id=' . $row['id']; ?>" class="blog-headline">                                <h4><?php echo $row['title']; ?></h4>                            </a>                            <div class="meta d-flex align-items-center">                                <a href="blog-details.php?title=<?php echo $slug . '&id=' . $row['id']; ?>">Admin</a>                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>                                <a href="<?php ?>"><?php echo $row['category_name']; ?></a>                            </div>                            <p><?php echo substr($row['description'], 0, 150); ?></p>                        </div>                    </div>                </div>					<?php
    }
}else{ echo "No blog Found"; } ?>                        </div>            <div class="row">                <div class="col-12">                    <div class="load-more text-center mt-100 wow fadeInUp" data-wow-delay="1000ms">                                        </div>                </div>            </div>        </div>    </section>    <!-- ##### Blog Area End ##### -->

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
