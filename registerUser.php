<main>

<div  id="form" ><!-- id is form-->
 <img src="regsiter.png" alt="regsiter.jpg" width="100%" height="500px">   <!-- image added-->
<form method="POST" ><!-- POST method-->

   
 <input type="text" name="fullname" style="width:100%" placeholder="Enter fullname" required /><!--Fullname -->
<br><br>
<input type="text" name="email" style="width:100% " placeholder="Enter email" required/><br><br><!--Email -->
<input type="text" name="username" style="width:100% " placeholder="Enter username" required/><br><br><!--Username -->
<input type="password" name="password" style="width:100% " placeholder="Enter Password" required/><br><br><!--input password -->

 <input type="submit" name="register" value="Register" /><!--input register -->

        
</form>

 </div>  

</main>
<?php

require "./header.php";//include header.php

$pdo = new PDO('mysql:dbname=assignment;host=localhost','root','');//creating database
if (isset($_POST['register'])) {//to register 
$stmt = $pdo->prepare("INSERT INTO tb_user(fullname,email,username,password) /* insert into table user*/
VALUES(:fullname, :email, :username, :password)");/* values*/
$criteria =[//criteria array
'fullname'=>$_POST['fullname'],
'email'=>$_POST['email'],
'username'=>$_POST['username'],
'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT)
];
if($stmt->execute($criteria)){/*statement execute criteria  */
header('location:addUser.php');// location addUser.php
}
else {
	echo 'Not Inserted'; /*Message*/
}
}


?>

<style type="text/css">/* CSS style*/
    
#form{
    background-color: #fff;/*white color*/ border-radius:10px;/*10px border radius*/ padding:30px;/*padidng 30 px*/
}

</style>