<?php 



include "header.php";//require header.php


  $pdo=new PDO('mysql:dbname=assignment;host=localhost', 'root', '');//create database with localhost
    $stmt= $pdo->prepare('SELECT * FROM tb_admin WHERE username= :username ');//select from table admin with username = :username
    $criteria= [
        'username'=>$_SESSION['sessUname']//username is equal to sessUName with session [sessiion is already started in header.php]

    ];

     $stmt->execute($criteria);//criteria execution
    if($stmt-> rowCount() > 0){//if statement
    	$row= $stmt->fetch(); ?>

<main>
	<form method= "POST"><!-- Using post method-->
<label>Full name:</label><!-- Full Name-->
 <input type="text" name="fullname" style="width:100%;height:50px;" value="<?php echo $row['fullname']; ?>"  required /><!-- input need to be added and if not added then required make it mandatory-->
<br><br>
<label>Email:</label><!-- Email-->
<input type="text" name="email" style="width:100%;height:50px;" value="<?php echo $row['email']; ?>"  required/><br><br><!-- input need to be added and if not added then required make it mandatory-->
<label>username:</label><!--Username -->
<input type="text" name="username" style="width:100%;height:50px;" value="<?php echo $row['username']; ?>"  required/><br><br><!-- input need to be added and if not added then required make it mandatory-->

<label>Password:</label><!-- Password-->
<input type="password" name="password" style="width:100%;height:50px;"  required/><br><br><!-- input need to be added and if not added then required make it mandatory-->
<input type="submit" name="edit" value="Edit" id="Edit"><!--inout of type submit for an edit -->
</main>
</form>
<?php
}

if(isset($_POST['edit'])){//if is user
$pdo=new PDO('mysql:dbname=assignment;host=localhost', 'root', '');//creating db
$sql = "UPDATE tb_admin SET fullname = :fullname, /* updating the table admin*/
            username = :username, 
            email = :email,  
            password = :password 
            WHERE id = :id";
$stmt = $pdo->prepare($sql);         // preparing the db                         
$stmt->bindParam(':fullname', $_POST['fullname'], PDO::PARAM_STR);       
$stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);    
$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);  
$stmt->bindParam(':id', $_SESSION['sessUID'], PDO::PARAM_INT);  

if($stmt->execute()){//statement is execute

	header('Location:index.php');} //location is index.php



}

?>




<style type="text/css">/*CSS added */
	

	#Edit{ /* div with id edit*/
		padding:10px; /* padding with 10 px */
		text-align:center; /*text align is center */


	}
</style>
