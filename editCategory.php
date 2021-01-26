<?php 



include "header.php";//require header.php


  $pdo=new PDO('mysql:dbname=assignment;host=localhost', 'root', '');//create database with localhost
    $stmt= $pdo->prepare('SELECT * FROM tb_category WHERE id= :id ');//select from table category with username = :username
    $criteria= [
        'id'=>$_GET['did']//get did 

    ];

     $stmt->execute($criteria);/*execute criteria */
    if($stmt-> rowCount() > 0){/* if condition is used*/
      $row= $stmt->fetch(); ?><!-- fetch individual element from statement-->

<main>
  <form method= "POST"><!-- using post method-->
<label>Name:</label><!-- Name-->
 <input type="text" name="name" style="width:100%;height:50px;"   required /><!-- input with type text which is mandatory field -->
<br><br>

<input type="submit" name="edit" value="Edit" id="Edit"><!--submit type to make an edit -->
</main>
</form>
<?php
}

if(isset($_POST['edit'])){// if is used to POST method
$pdo=new PDO('mysql:dbname=assignment;host=localhost', 'root', '');//create database
$sql = "UPDATE tb_category SET name = :name /*updateing table category */
            WHERE id = :id";
$stmt = $pdo->prepare($sql);                                  
$stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);       
$stmt->bindParam(':id', $_GET['did'], PDO::PARAM_INT);  

if($stmt->execute()){ /*executing statement */

  header('Location:index.php');} /* location is index.php*/



}

?>




<style type="text/css">/* CSS is added*/
  

  #Edit{ /* ID name is Edit*/
    padding:10px;/* padding is 10 px*/
    text-align:center;/* text align is center*/


  }
</style>
