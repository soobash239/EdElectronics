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
	 $key = $_POST['key'];
	 $result = $pdo->query("SELECT * FROM tb_product WHERE name LIKE '%$key%' ");//select from table product where name LIKE or category LIKE 

	?>

	<table border="2" style="width:60%; text-align:center; margin-left: 15vw;"><!--table border set 2 -->
		<tr><th>Product</th>
			<th>Name</th><br><br><!--Name -->
			<th>Category<br><br><!--Category -->
			<th>Money<br><br><!-- Money-->
		</tr>

		<?php
		foreach ($result as $row){//foreach started
			echo'<tr>'; ?>

					<td><?php echo '<img src="' ."./images/". $row['image'] . '" width="150" height="150" />' ?></td><!-- print Sn -->
<?php
				echo '<td>' . $row['name'] . '</td>';//print name
				echo '<td>' . $row['cat_id'] . '</td>';//print category
				echo '<td>' . $row['price'] . '</td>';//print rate
			echo '</tr>';
		}
		?>
	</table>
<?php
 }?>



</form>
</main>










