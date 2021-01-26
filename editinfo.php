<?php 



include "header.php";/* require header file */


  $pdo=new PDO('mysql:dbname=assignment;host=localhost', 'root', '');// creating database
    $stmt= $pdo->prepare('SELECT * FROM tb_user WHERE username= :username ');//selecting from table user
    $criteria= [//criteria started
        'username'=>$_SESSION['sessUname']/* username is set to sess User name*/

    ];

     $stmt->execute($criteria);/* execute criteria*/
    if($stmt-> rowCount() > 0){/* if statement*/ 
    	$row= $stmt->fetch(); ?>

<main>
	<form method= "POST"> <!-- POST method is used-->
<label>Full name:</label><!-- Full Name-->
 <input type="text" name="fullname" style="width:100%;height:50px;" value="<?php echo $row['fullname']; ?>"  required /><!--input is mandatory of type text -->
<br><br>
<label>Email:</label><!-- Email-->
<input type="text" name="email" style="width:100%;height:50px;" value="<?php echo $row['email']; ?>"  required/><br><br><!--input of type text mandatory -->
<label>username:</label><!--Username -->
<input type="text" name="username" style="width:100%;height:50px;" value="<?php echo $row['username']; ?>"  required/><br><br><!-- input is mandatory-->

<label>Password:</label><!-- Password-->
<input type="password" name="password" style="width:100%;height:50px;"  required/><br><br><!--mandatory input -->
<input type="submit" name="edit" value="Edit" id="Edit"><!-- inout of type submit to edit-->
</main>
</form>
<?php
}

if(isset($_POST['edit'])){//if condition
$pdo=new PDO('mysql:dbname=assignment;host=localhost', 'root', '');//create database
$sql = "UPDATE tb_user SET fullname = :fullname, /* updating table user*/ 
            username = :username, 
            email = :email,  
            password = :password 
            WHERE id = :id";
$stmt = $pdo->prepare($sql);   // prepare the statement                                
$stmt->bindParam(':fullname', $_POST['fullname'], PDO::PARAM_STR);       
$stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);    
$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);  
$stmt->bindParam(':id', $_SESSION['sessUID'], PDO::PARAM_INT);  

if($stmt->execute()){//executing statement 

	header('Location:index.php');} //header.php location



}

?>




<style type="text/css">/*CSS set */ 
	

	#Edit{/*div id name edit */
		padding:10px; /* padding 10 px*/
		text-align:center; /* text align center*/ 


	}
</style>
