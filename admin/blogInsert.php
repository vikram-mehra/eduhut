<?php
    session_start();
	include 'config.php';
    date_default_timezone_set("Asia/Calcutta");
	
	if(isset($_POST['blog_add']))
	{
	    $title                 	=$_POST['title'];
		$description           =$_POST['description'];		
		$category_id          =$_POST['category_id'];		
		$image               =$_FILES["image"]["name"];
		$create_at			=date("Y-m-d h:i:s");
	
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
			
		$blogCategory = "INSERT INTO `blogs`(`category_id`,`title`,`description`,`image`,`created_at`,`updated_at`) 
		VALUES ('$category_id','$title','$description','$image','$create_at','$create_at')";
		mysqli_query($con, $blogCategory);
						
		header('Location:blog-lists.php?success');
		
	}
	
	if(isset($_POST['blog_update']))
	{
	    $title                 	=$_POST['title'];
		$description           =$_POST['description'];		
		$image               			=$_FILES["image"]["name"];
		$update_at						=date("Y-m-d h:i:s");
		$id							=$_POST['id'];
		$category_id							=$_POST['category_id'];
		
        
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
	
				
			$student = "UPDATE `blogs` SET  `category_id`='$category_id', `title`='$title',`description`='$description',`image`='$image',`updated_at`='$update_at' WHERE id=$id ";
			
			
			mysqli_query($con, $student);

			header('Location:blog-lists.php?success');
        }
        else
        {
			$student = "UPDATE `blogs` SET `category_id`='$category_id',`title`='$title',`description`='$description',`updated_at`='$update_at' WHERE id=$id "; 
			mysqli_query($con, $student);

			header('Location:blog-lists.php?success');
        }
        
		//exit();
		
		
	}
?>