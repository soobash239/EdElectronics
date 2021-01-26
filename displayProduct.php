<?php

require "./header.php";//require header file

	$pdo= new PDO('mysql:dbname=assignment;host=localhost', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);//database create with localhost, with certain username and password
	$subashPro=$pdo->prepare("SELECT * FROM tb_product WHERE cat_id=:id");//select from table product when cat_id equals to id
	$criteria=['id'=>$_GET['id']];//get id
	$subashPro->execute($criteria);//execute criteria
if($subashPro->rowCount()>0){//if condition
?>
<main>

<table style="text-align: center;width:100%;" border="2"><!-- CSS set, and table border set to 2-->
	<tr>
		<th>S.N.</th><!-- SN-->
		<th>Product</th><!--Name -->
		<th>Description</th><!--Description -->
		<th>Price	</th><!-- Rate-->
		<th>Review</th>
	</tr>

<?php
	$sn=1;//SN

	foreach ($subashPro as $bis ) {?><!--for each  -->
		<tr>
		<td><?php echo $sn++;?> </td><!--print SN -->
			<td><?php echo '<img src="' ."./images/". $bis['image'] . '" width="150" height="150" />' ?></td><!-- print Sn -->
		<td><?php echo $bis['description'];?> </td><!-- print description-->
		<td><?php echo $bis['price'];?> </td><!-- print rate-->
		<td><a href="reeview.php?pid=<?php echo $bis['p_id']?>">Review</a></td>



	</tr>
	<?php

	}?>

</table><!-- table closed-->

</main><!-- main closed-->
	
<?php }
	
else{
	echo "There is nothing in this category.";//print else's part 
}
?>