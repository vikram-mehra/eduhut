<?php include 'include/header2.php';
// configuration


$row = $_POST['row'];
$rowperpage = 4;

// selecting posts
$query = 'select blog.*,cat.category_name,cat.id as cat_id from blogs as blog INNER JOIN blog_categories as cat					ON blog.category_id=cat.id					ORDER BY blog.created_at DESC limit '.$row.','.$rowperpage;
$result = mysqli_query($con,$query);

$html = '';

while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $title = $row['title'];
    $content = $row['description'];
    $shortcontent = substr($content, 0, 160)."...";
	if(!empty($row['image'])){
		$img='/admin/uploads/blogs/'.$row['image'];
	}else{
		$img='img/blog-img/1.jpg';
	}
  
   
			$html .= '<div class="col-12 col-lg-6 blog_data">';
			$html .= '<div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">';						
							$html .='<img style="object-fit: cover;height: 210px;" src="'.$img.'" alt="">';						
								                     
							                     
						$html .='<div class="blog-content">';                        
							$html .='<a href="blog-details.php?id='.$row["id"].'" class="blog-headline">';                               
								$html .='<h4>'.$row['title'].'</h4>';                      
								$html .='</a>';                          
								$html .='<div class="meta d-flex align-items-center">';                
								$html .='<a href="#">Admin</a>';
                               $html .='<span><i class="fa fa-circle" aria-hidden="true"></i></span>';    
								$html .='<a href="category.php?category-id='.$row['cat_id'].'">'.$row['category_name'].'</a>'; 
								$html .='</div>';                          
								$html .='<p>'.substr($row['description'],0,150).'</p>';                   
								$html .='</div>';         
								$html .='</div>';          
								$html .='</div>';

		

}
echo $html;    


 ?>
