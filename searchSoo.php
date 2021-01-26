<?php
require 'header.php';//include header.php

?>


<main>
<form action="" method="POST" style=" background-color: #fff; padding:1px; margin: 5px; text-align: center;"><!--POST method and CSS is added -->
	<input type="text" name="key" placeholder="Search.... " style="margin-left: 15vw;"><br><br><!--input to search -->
	<input type="submit" name="find" value="search" style="margin-left: 15vw;" " ><!--submit  -->

	<?php


if(isset($_POST['find']))//find 
{
	 $pdo = new PDO('mysql:dbname=assignment;host=localhost', 'root', '');//creating database
	 $key = $_POST['key'];//key 
	 $result = $pdo->query("SELECT * FROM tb_user WHERE fullname LIKE '%$key%' or username LIKE '%$key%' or email LIKE '%$key%' ");//select from table user where fullname LIKE or username LIKE or email LIKE

	?>

	<table border="2" style="padding: 10vh; text-align:center; margin-left: 15vw;"><!--table border 2 -->
		<tr>
			<th>Fullname</th><br><br><!--Fullname -->
			<th>Username<br><br><!-- Username-->
			<th>Email<br><br><!-- Email-->
		</tr>

		<?php
		foreach ($result as $row){//foreach started
			echo'<tr>';
				echo '<td>' . $row['fullname'] . '</td>';//print fullname
				echo '<td>' . $row['username'] . '</td>';//print username
				echo '<td>' . $row['email'] . '</td>';//print email
			echo '</tr>';
		}
		?>
	</table>
<?php
 }?>



</form>
</main>










<!-- or surname LIKE '%key%'  -->