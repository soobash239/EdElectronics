<?php

require "./header.php";//require header.php

	$pdo= new PDO('mysql:dbname=assignment;host=localhost', 'root', '');//creating db with name, and localhost, with certain username and password
	$users=$pdo->prepare("SELECT * FROM tb_user");//selecting from table user
	$users->execute();//users execution
foreach ($users as $user) {//for each started

?>	

<main><!-- main started-->
<a href="registerUser.php">Add new user</a><!-- link  register user to add new user-->

<table border="2"><!-- table border is set to 2-->
	<tr>
		<th>S.N.</th><!-- SN-->
		<th>Full Name</th><!-- Full name-->
		<th>Email</th><!--Email -->
		<th>Username</th><!--Username -->
		<th>Action</th><!-- Action-->
	</tr>

<?php
	$sn=1;//initialize variable

	foreach ($users as $user) {?><!-- for each started-->
		<tr>
		<td><?php echo $sn++;?> </td><!--print SN -->
		<td><?php echo $user['fullname'];?> </td><!-- print full name-->
		<td><?php echo $user['email'];?> </td><!-- print email-->
		<td><?php echo $user['username'];?> </td><!--print username -->
		
<!-- 		<td><a href="editinfo.php?did=<?php //echo $user['id']?>">Edit User</a></td> 
 -->		<td><a href="deleteUser.php?did=<?php echo $user['id']?>">Delete User</a></td> <!-- link deleteUser.php to delete user-->

	</tr>
	<?php

	}?>

</table>
</main>
<?php }?>