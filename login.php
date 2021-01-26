

<link rel="stylesheet" href="electronics.css" /><!-- linking CSS-->


<style type="text/css">
    
#form{/* id name*/
    background-color: #fff;/* background color set to white*/
    border-radius:10px;/*border radius to 10 px */
    padding:30px;/* padding to 30 px*/
}
#loginAdmin{/* id name*/
    background-color: #000;/*background color to black*/
    text-decoration-color: #fff; /* text color to white*/
    padding: 5px;/* padding 5px*/
    margin:0px;/*0px*/

}
</style>


<main>
    <ul>
    <li><a href="loginAdmin.php" id="loginAdmin">Login-Admin</a><!-- link to login admin-->

</li>
    </ul>
<div  id="form" ><!--id name form -->

<form action="login.php" method="POST" ><!-- POST method-->

            <img src="loginSubash.jpg" alt="download.jpg" width="100%"><!--adding image -->

      
        
        <input type="text" name="username" style="width:100%" placeholder="Enter username" /><!-- input type text for username with placeholder-->
        <br><br>


        <input type="password" name="password" style="width:100% " placeholder="Enter password"/><!--password input type with placeholder -->

        <input type="submit" name="sooLogin" value="Log In" /><!-- submit to login-->

 
        
</form>

<br>
<div style="text-align: center;"> <!-- CSS added-->
    
 <a href="registerUser.php" >Create an account?</a><!-- link to create an account-->

</div>
   </div>      

</main>
</html>


<?php


require "./header.php"; //include header.php



if(isset($_POST['sooLogin'])){//if condition
    $pdo=new PDO('mysql:dbname=assignment;host=localhost', 'root', '');//creating database
    $stmt= $pdo->prepare('SELECT * FROM tb_user WHERE username= :username and password= :password');//select from table user
    $criteria= [//criteria array
        'username'=> $_POST['username'],
        'password'=>$_POST['password']
    ];

    $stmt->execute($criteria);//execute criteria
    if($stmt-> rowCount() > 0){
        $row= $stmt->fetch();//fetch statement
        $_SESSION['sessUID']= $row['id'];
        $_SESSION['sessUname']= $row['username'];
        $_SESSION['sessType'] = $row['type'];

        header('Location:index.php');//locatiion is index.php
    }

    else{
        echo "<h5>Username or password wrong. Please try again. </h5>";

    }
}


    
?>
