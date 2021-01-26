<main>

<div  id="form" >
 <img src="admin.png" alt="regsiter.jpg" width="100%" height="500px">  <!-- added image--> 
<form method="POST" ><!-- method POST-->

   
 <input type="text" name="fullname" style="width:100%" placeholder="Enter fullname" required /><!--input fullname -->
<br><br>
<input type="text" name="email" style="width:100% " placeholder="Enter email" required/><br><br><!--input email -->
<input type="text" name="username" style="width:100% " placeholder="Enter username" required/><br><br><!-- input username-->
<input type="password" name="password" style="width:100% " placeholder="Enter Password" required/><br><br><!-- input password-->

 <input type="submit" name="register" value="Register" /><!--input type submit -->

        
</form>

 </div>  

</main>
<?php

require "./header.php";//include header.php

$pdo = new PDO('mysql:dbname=assignment;host=localhost','root','');//creating database
if (isset($_POST['register'])) {/*if condition */
$stmt = $pdo->prepare("INSERT INTO tb_admin(fullname,email,username,password)/* insert into table admin*/
VALUES(:fullname, :email, :username, :password)");
$criteria =[
'fullname'=>$_POST['fullname'],
'email'=>$_POST['email'],
'username'=>$_POST['username'],
'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT)
];
$hashpass=$row['password'];//taken from db
$password="admin123";//user keyed in password

if (password_verify($password, $hashpass)) {/* veri*/
    echo"verified";//message
}
else
{
    echo"Not verified"; //message
}



if($stmt->execute($criteria)){/*execute criteria */
header('location:addAdmin.php');/* location addAdmin.php */
}
else {
	echo 'Not Inserted';//message
}
}


?>

<style type="text/css">/* style CSS*/
    
#form{/*id form*/ 
    background-color: #fff;/* black color*/border-radius:10px;/* border radius to 10px*/padding:30px;/*padding 30px*/
}

</style>