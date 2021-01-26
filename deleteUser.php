<?php 
	
	$pdo =new PDO ('mysql:dbname=assignment;host=localhost','root','');//create database with localhost, with username and password
	
	if (isset($_GET['did'])) {//did is get from the id
		$stmt =$pdo->prepare("DELETE  FROM tb_user where id=:did");//delete from table admin whenever the id equals to did

		if($stmt->execute($_GET)){//execution GET method did
			header('Location:addUser.php');//location goes to addAdmin.php after execution
		}


	}
	
 ?>