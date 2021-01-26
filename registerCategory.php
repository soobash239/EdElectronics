<?php

require "./header.php";//include header.php

$pdo = new PDO('mysql:dbname=assignment;host=localhost','root','', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);/*creating database*/
if (isset($_POST['upload'])) {/* if condition to upload*/
$stmt = $pdo->prepare("INSERT INTO tb_category (name) /* insert into table category*/
VALUES(:name)");//values 
$criteria =[/* criteria array*/
'name'=>$_POST['category']
// 'price'=>$_POST['price']
];
if($stmt->execute($criteria)){//execute statement
header('location:addCategory.php');//location is addCategory.php
}
else {
	echo 'Not Inserted';/* Message*/
}
}
?>

<main>
	<form method="POST" ><!-- method is post -->
	<input type="text" name="category" placeholder="Eg: television" style="width:100%"><br><!-- input category, CSS is set-->

	<input type="submit" name="upload" value="submit"><!--input upload -->

</form>
</main>






<!-- <?php
//	require "./header.php";

//	$pdo = new PDO("mysql:dbname=assignment; host=localhost", 'root', '');
//	if (isset($_POST['Upload'])) {
	
//	$description= $_POST['description'];
//	$name= $_POST['product'];
	// $category=$_POST['category'];
//	$price= $_POST['price']; 



//	$stmt = "INSERT INTO tb_product (description, name, price) VALUES (?,?,?)";
//	$pdo->prepare($stmt)->execute([$description, $name, $price]);


//use foreign key



?> -->