<main>
	<form action="upload.php" method="POST" enctype="multipart/form-data">
	    Select image to upload:
    <input type="file" name="file" id="file">
	 <input type="submit" value="Upload Image" name="submit">
	</form>
</main>

<?php

	require "header.php";
	$target_dir = "newassignment/";
	$target_file = $target_dir . basename($_POST["file"]["name"]);
	$upload = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if(isset($_POST["submit"])) {
 	   $check = getimagesize($_POST["file"]["tmp_name"]);
 	   if($check !== false) {
 	       echo "File is an image - " . $check["html_entity_decode(string)"] . ".";
 	       $upload = 1;
 	   }
 	  
 	    else {
     	   echo "File is not an image.";
     	   $upload = 0;
  	  }
	}
	?>
