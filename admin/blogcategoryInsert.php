<?php
    session_start();
	include 'config.php';
    date_default_timezone_set("Asia/Calcutta");
	
	if(isset($_POST['category_add']))
	{
	    $category_name                 	=$_POST['category_name'];
		$category_description           =$_POST['category_description'];		
		$image               			=$_FILES["image"]["name"];
		$create_at						=date("Y-m-d h:i:s");
	
		$target_dir = "uploads/blogs/"; 
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
			
		$blogCategory = "INSERT INTO `blog_categories`(`category_name`,`category_description`,`image`,`created_at`,`updated_at`) 
		VALUES ('$category_name','$category_description','$image','$create_at','$create_at')";
		mysqli_query($con, $blogCategory);
						
		header('Location:category-lists.php?success');
		
	}
	
	if(isset($_POST['category_update']))
	{
	    $category_name                 	=$_POST['category_name'];
		$category_description           =$_POST['category_description'];		
		$image               			=$_FILES["image"]["name"];
		$update_at						=date("Y-m-d h:i:s");
		$cat_id							=$_POST['cat_id'];
		
        
        if($image !='')
        {
		    $target_dir = "uploads/blogs/"; 
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
	
				
			$student = "UPDATE `blog_categories` SET `category_name`='$category_name',`category_description`='$category_description',`image`='$image',`updated_at`='$update_at' WHERE id=$cat_id ";
			echo $student; 
			
			mysqli_query($con, $student);

			header('Location:category-lists.php?success');
        }
        else
        {
			$student = "UPDATE `blog_categories` SET `category_name`='$category_name',`category_description`='$category_description',`updated_at`='$update_at' WHERE id=$cat_id "; 
			mysqli_query($con, $student);

			header('Location:category-lists.php?success');
        }
        
		//exit();
		
		
	}
?>