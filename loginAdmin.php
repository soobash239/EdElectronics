

<link rel="stylesheet" href="electronics.css" />


<style type="text/css">
    
#form{/*id */
    background-color: #fff;
    border-radius:10px;
    padding:30px;
}

</style>


<main>

<div  id="form" ><!-- id form-->

<form action="loginAdmin.php" method="POST" ><!-- POST method-->

        <img src="admin.png" alt="admin.png" width="100%">   <!--image added --> 
        
        <input type="text" name="username" style="width:100%" placeholder="Enter username" /><!--username -->
        <br><br>


        <input type="password" name="password" style="width:100% " placeholder="Enter password"/><!--password -->

        <input type="submit" name="sooLogin" value="Log In" /><!-- login-->

 
        
</form>

<br>
<div style="text-align: center;"><!--CSS done-->
    
 <a href="registerAdmin.php" >Create an admin account?</a><!-- link to create an admin account-->

</div>
   </div>      

</main>
</html>



<?php


require "./header.php";//include header.php





if(isset($_POST['sooLogin'])){//if conditon
    $pdo=new PDO('mysql:dbname=assignment;host=localhost', 'root', '');//creating database
    $stmt= $pdo->prepare('SELECT * FROM tb_admin WHERE username= :username and password= :password');//select form table admin
    $criteria= [//criteria array
        'username'=> $_POST['username'],
        'password'=>$_POST['password']
    ];

    $stmt->execute($criteria);//execute criteria
    if($stmt-> rowCount() > 0){
        $row= $stmt->fetch();//fetch statement
        $_SESSION['sessUID']= $row. "Welcome".['id'];
        $_SESSION['sessUname']= $row['username'];
        $_SESSION['sessType'] = $row['type'];
        header('Location:index.php');//location index.php
    }

    else{
        echo "<h5>Username or password wrong. Please try again. </h5>";

    }


}


    
?>

<?php if(empty($_SESSION))?><!-- if condition to empty session-->

                       



                    
