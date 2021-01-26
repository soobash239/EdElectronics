<?php

require "./header.php"; //require header.php

	$pdo= new PDO('mysql:dbname=assignment;host=localhost', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); //my sql database is created with dbname and localhost with username and password.
	$categories=$pdo->prepare("SELECT * FROM tb_category"); //select * from table category
	$categories->execute();//execute categories
foreach ($categories as $category) { //for each

?>	

<main>
<a href="registerCategory.php">Add new Category</a><br><br><!--link registerCategory.php  to add new category-->


<table border="2"><!-- table border set to 2-->
	<tr>
		<th>S.N.</th>
		<th>name</th>
		
		

		
	</tr>

<?php //php

	$sn=1;
	foreach ($categories as $category) {?> 	
		<tr>
		<td><?php echo $sn++;?> </td>
		<td><?php echo $category['name'];?> </td>
		
		<td><a href="editCategory.php?did=<?php echo $category['id']?>">Edit Category</a></td>  <!-- link editCategory.php-->
		<td><a href="deleteCategory.php?did=<?php echo $category['id']?>">Delete Category</a></td>  <!-- link deleteCategory.php-->

	</tr>
	<?php
	}?>
	
</table>
</main>
<?php }?>