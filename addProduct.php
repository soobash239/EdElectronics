<?php

require "./header.php";//require header.php

	$pdo= new PDO('mysql:dbname=assignment;host=localhost', 'root', '');//create db with localhost, with username and password
	$products=$pdo->prepare("SELECT * FROM tb_product");//selecting from table product
	$products->execute();//products execution
//for each is started

?>	

<main>
<a href="registerProduct.php">Add new product</a><!-- link registerProduct.php to add new product-->

<table border="2"><!-- table border set to 2-->
	<tr>
		<th>Product</th><!-- SN-->
		<th>Name</th><!--Name -->
		<th>Description</th><!-- Description-->
		<th>Money</th><!--Rate -->
	</tr>

<?php


	foreach ($products as $product) {?><!-- for each is started-->
		<tr>
		<td><?php echo '<img src="' ."./images/". $product['image'] . '" width="150" height="150" />' ?></td><!-- print Sn -->
		<td><?php echo $product['name'];?></td><!-- print name-->
		<td><?php echo $product['description'];?> </td><!-- print description-->
		<td><?php echo $product['price'];?> </td><!--print rate -->
			

		<td><a href="editProduct.php?did=<?php echo $product['p_id']?>">Edit Product</a></td><br><br> <!--link editProduct.php -->
		<td><a href="deleteProduct.php?did=<?php echo $product['p_id']?>">Delete Product</a></td> <!--link deleteProduct.php -->

	</tr>


<?php }?>

</table><!-- table close-->
</main><!--main close -->