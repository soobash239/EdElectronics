<?php
require "./header.php";//include header.php

$pdo = new PDO('mysql:dbname=assignment;host=localhost','root','', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);//creating database 

// Reference=>https://www.tutorialspoint.com/php/php_file_uploading.htm

if(isset($_FILES['image'])){
      $errors= array();
      $f_name = $_FILES['image']['name'];
      $f_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $f_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $exp= array("jpeg","jpg","png");
      
      if(in_array($f_ext,$exp)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if(empty($errors)==true){
         move_uploaded_file($f_tmp,"./images/".$f_name);
         $stmt = $pdo->prepare("INSERT INTO tb_product(name,cat_id, price, description,image)/*insert into table product  */
			VALUES(:name, :cat_id,:price, :description,:image)");/*values for insert */
			$criteria =[/* criteria array*/
			'name'=>$_POST['name'],
			'cat_id'=>$_POST['category'],
			'description'=>$_POST['description'],
			'price'=>$_POST['rate'],
			'image'=>$_FILES['image']['name']
			];
			if($stmt->execute($criteria)){ 
			header('location:addProduct.php');
			}
       
      }else{
         print_r($errors);
      }
   }


?>
	
<main>
	<form method="POST" enctype="multipart/form-data"><!-- POST method-->
	<input type="text" name="name" placeholder="Eg: television" style="width:100%"><br><!--input name  -->
	<input type="text" name="rate" placeholder="$$$" style="width:100%"><br><!--input rate -->
	<select name="category" style="width:100%; height:50px"><!--select category -->
		<?php
			$stmt = $pdo->prepare('SELECT * FROM tb_category');//select from category
			$stmt->execute();

			foreach ($stmt as $row) {//for each
				echo '<option value="' . $row['id'] . '">' . $row['name'] . ' </option>';
			}
		?>

	</select><br><br>
	<input type="text" name="description" placeholder="Description" style="width:100%"><!--input description -->
		<input type="file" name="image" />
	<input type="submit" name="upload" value="submit"><!--input submit -->

</form>
</main>
