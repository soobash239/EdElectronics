<?php

require "./header.php";//require the header file here.

	$pdo= new PDO('mysql:dbname=assignment;host=localhost', 'root', '');//getting the database name and localhost with the username root and password blank
	$admins=$pdo->prepare("SELECT * FROM tb_admin");//select * form table admin
	$admins	->execute();//executing
foreach ($admins as $admin) {//using for each

?>
<!-- ending php file -->

<main>
<a href="registerAdmin.php">Add new admin</a> <!-- addding link to registerAdmin.php page for redirecting-->

<table border="2"><!-- setting table border to 2-->
	<tr>
		<th>S.N.</th><!--serial number -->
		<th>Full Name</th><!--setting full name -->
		<th>Email</th><!-- email-->
		<th>Username</th><!--setting username -->
		<th>Action</th><!--setting action -->
	</tr>

<?php
	$sn=1;//serial number initialize with 1

	foreach ($admins as $admin) {?> <!--using for each  -->
		<tr>
		<td><?php echo $sn++;?> </td><!-- printing serial number with increment-->
		<td><?php echo $admin['fullname'];?> </td><!-- print fullname-->
		<td><?php echo $admin['email'];?> </td><!-- print email-->
		<td><?php echo $admin['username'];?> </td><!-- print username-->

		<!-- <td><a href="editAdminInfo.php?did=<?php //echo $admin['id']?>">Edit Admin</a></td> --> 
		<td><a href="deleteAdmin.php?did=<?php echo $admin['id']?>">Delete Admin</a></td> <!--linking deleteAdmin.php-->

	</tr>
	<?php

	}?>

</table><!-- table close-->
</main><!-- main close-->
<?php }?>