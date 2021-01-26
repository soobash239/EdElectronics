<?php 



include "header.php"; // header.php include


  $pdo=new PDO('mysql:dbname=assignment;host=localhost', 'root', '');/* creating database*/
    $stmt= $pdo->prepare('SELECT * FROM tb_product WHERE p_id= :id ');//select from table product with id
    $criteria= [//criteria array started
        'id'=>$_GET['did']// id is get from the did with GET method here

    ];

     $stmt->execute($criteria);//exedcute criteria
    if($stmt-> rowCount() > 0){
    	$row= $stmt->fetch(); ?>

<main>
	<form method= "POST"><!-- using POST method-->
<label>Name:</label><!--Name -->
 <input type="text" name="name" style="width:100%;height:50px;"   required /><!-- input mandatory-->
<br><br>
<label>Description:</label><!-- Description-->
<input type="text" name="description" style="width:100%;height:50px;"   required/><br><br><!-- mandatory input-->


<label>Rate:</label><!-- Rate-->
<input type="price" name="rate" style="width:100%;height:50px;"  required/><br><br><!--mandatory input -->
<input type="submit" name="edit" value="Edit" id="Edit"><!-- input with submit to edit type-->
</main>
</form>
<?php
}

if(isset($_POST['edit'])){//if condition
$pdo=new PDO('mysql:dbname=assignment;host=localhost', 'root', '');//creating database
$sql = "UPDATE tb_product SET name = :name, /* updating table product*/
            description = :description, 
            price =:price
            WHERE p_id = :id";
$stmt = $pdo->prepare($sql);                                  
$stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);       
$stmt->bindParam(':description', $_POST['description'], PDO::PARAM_STR);    
$stmt->bindParam(':price', $_POST['rate'], PDO::PARAM_STR);  
$stmt->bindParam(':id', $_GET['did'], PDO::PARAM_INT);  

if($stmt->execute()){//execute statement

	header('Location:index.php');} //location is index.php



}

?>




<style type="text/css">
	

	#Edit{
		padding:10px;
		text-align:center;


	}
</style>
