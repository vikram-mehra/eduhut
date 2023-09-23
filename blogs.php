<?php include 'include/header2.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="PMI-RMP certification is the most prestigious certification for professionals involved with risk management activities. This certification is offered by the Project Management Institute (PMI).">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *Must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>PMP Online Classes | Blog</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon-2.png" alt="pmp-certification">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
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
						$i=0;							
						$sql="select * from blog_categories ORDER BY id DESC";							
						if ($result=mysqli_query($con, $sql)) {							
						while($row=mysqli_fetch_array($result))							
						{ $i++;						
					?>                      
					<!-- Single Catagories -->                       
					<div class="single-catagories bg-img" style="background-image: url(img/bg-img/bc1.jpg);" alt="How to Conduct a Feasibility Study">                           
					<a href="category.php?category-id=<?php echo $row['id']; ?>">                                
						<h6><?php echo $row['category_name']; ?></h6>                           
							</a>                        
						</div>           							
					<?php } } ?>                   
					</div>               
					</div>           
					</div>           
					<div class="row">               
					<!-- Single Blog Area -->				
					<?php				
						$i=0;	
							
							 $rowperpage = 4;
							$sql="select blog.*,cat.category_name,cat.id as cat_id from blogs as blog INNER JOIN blog_categories as cat					ON blog.category_id=cat.id					ORDER BY blog.created_at DESC limit 0,$rowperpage";		
							

							// counting total number of posts
							$allcount_query = "SELECT count(*) as allcount FROM blogs";
							$allcount_result = mysqli_query($con,$allcount_query);
							$allcount_fetch = mysqli_fetch_array($allcount_result);
							$allcount = $allcount_fetch['allcount'];
			
							if ($result=mysqli_query($con, $sql)) {					
								while($row=mysqli_fetch_array($result))					
								{ $i++;									
								$slug=$row['title'];					
								$divider = '-';					 
								$slug = preg_replace('~[^\pL\d]+~u', $divider, $slug);				
								// transliterate					 
								$slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);				
								// remove unwanted characters					
								$slug = preg_replace('~[^-\w]+~', '', $slug);				
								// trim					
								$slug = trim($slug, $divider);					  
								// remove duplicate divider					
								$slug = preg_replace('~-+~', $divider, $slug);				
								// lowercase					 
								$slug = strtolower($slug);			
								?>               
								<div class="col-12 col-lg-6 blog_data">                   
								<div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">						<?php if(!empty($row['image'])){ ?>							
								<img style="object-fit: cover;height: 210px;" src="/admin/uploads/blogs/<?php echo $row['image'] ?>" alt="pmi-certification">						
								<?php }else{ ?>								
								<img src="img/blog-img/1.jpg" alt="pmp-online certification">				
								<?php } ?>                       
								<!-- Blog Content -->                       
								<div class="blog-content">                         
								<a href="blog-details.php?title=<?php echo $slug.'&id='.$row['id'];  ?>" class="blog-headline">                               
								<h4><?php echo $row['title']; ?></h4>                       
								</a>                          
								<div class="meta d-flex align-items-center">                
								<a href="#">Admin</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>    
								<a href="category.php?category-id=<?php echo $row['cat_id'].'&category-name='.slug($row['category_name']); ?>"><?php echo $row['category_name']; ?></a>  
								</div>                          
								<p><?php echo substr($row['description'],0,150); ?></p>                   
								</div>         
								</div>          
								</div>				
								<?php } } ?>                     
								</div>        
								<div class="row">             
								<div class="col-12">              
								<div class="load-more text-center mt-100 wow fadeInUp" data-wow-delay="1000ms">                     
								<a href="#" class="btn clever-btn btn-2 load-more">Load More</a>
<input type="hidden" id="row" value="0">
            <input type="hidden" id="all" value="<?php echo $allcount; ?>">
								
								</div>                </div>         
								</div>      
								</div>  
								</section>    <!-- ##### Blog Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include 'include/footer.php'; ?>
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
  $(document).ready(function(){

    // Load more data
    $('.load-more').click(function(){
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        var rowperpage = 4;
        row = row + rowperpage;
		//console.log(row);
		//console.log(allcount);
        if(row <= allcount){
            $("#row").val(row);

            $.ajax({
                url: 'getData.php',
                type: 'post',
                data: {row:row},
                beforeSend:function(){
                    $(".load-more").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
                        $(".blog_data:last").after(response).show().fadeIn("slow");

                        var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more').text(" ");
                            
                        }else{
                            $(".load-more").text("Load more");
                        }
                    }, 2000);

                }
            });
        }else{
            $('.load-more').text("Loading...");

            // Setting little delay while removing contents
            setTimeout(function() {

                // When row is greater than allcount then remove all class='post' element after 3 element
                $('.post:nth-child(3)').nextAll('.post').remove();

                // Reset the value of row
                $("#row").val(0);

                // Change the text and background
                $('.load-more').text("Load more");
                $('.load-more').css("background","#15a9ce");
                
            }, 2000);


        }

    });

});
</script>

    
</body>
</html>