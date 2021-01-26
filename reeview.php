<?php 
include "header.php";

$pdo =new PDO ('mysql:dbname=assignment;host=localhost','root','');//create database with localhost, with username and password
	

if(isset($_POST['insertReview'])){

		$stmt = $pdo->prepare("INSERT INTO tb_review(u_id,p_id,review) /* insert into table user*/
		VALUES(:u_id, :p_id, :review)");/* values*/
		$cri=[//criteria array
		'u_id'=>$_SESSION['sessUID'],
		'p_id'=>$_GET['pid'],
		'review'=>$_POST['comment'],
		];

		if($stmt->execute($cri)){/*statement execute criteria  */
		header('location:index.php');
		}

}
	
	$subashPro =$pdo->prepare("SELECT * FROM tb_review r JOIN tb_product  p ON r.p_id=p.p_id 
	HAVING r.p_id=:pid");//delete from table admin whenever the id equals to did
	$criteria=['pid'=>$_GET['pid']];//get id
	$subashPro->execute($criteria);//execute criteria
//if condition
?>
<main>


<table style=" width:100%;text-align: center;" border="2"><!-- CSS set, and table border set to 2-->
	<tr>
		<th>User-id</th><!-- SN-->
		<th>Product</th>
		<th>Review</th><!--Description -->
	</tr>

<?php

	foreach ($subashPro as $bis ) {?><!--for each  -->
		<tr>
		<td><?php echo $bis['u_id'];?> </td><!--print name -->
			<td><?php echo '<img src="' ."./images/". $bis['image'] . '" width="150" height="150" />' ?></td><!-- print Sn -->
		<td><?php echo $bis['review'];?> </td><!-- print rate-->
	</tr>
	<?php

	}?>

</table><!-- table closed-->
<br><br><br>


<?php 

if(!empty($_SESSION['sessUID'])){?>

<form method="POST"> 
	<h1>Write a comment:</h1>
<input type="text" name="comment">
<input type="submit" name="insertReview">
</form>


<?php }

?>



</main>
