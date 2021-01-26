<?php

include "header.php";//require header.php with session start


?>



		<main>
		
			<div class="contents" style="background-color: #fff; padding:20px; margin: 10px; display: flex; transition: 2s; font-family: ubuntu; font-size: 20px; animation: mymove 5s infinite;border: 5px solid black;box-shadow: 5px 10px; display: block;"><!--div is made with class contents and using CSS -->
			<?php 
				if(!empty($_SESSION['sessType'])){//type is checked
						if($_SESSION['sessType']=="admin"){ //admin type checked
							echo "<a href='addCategory.php'>Manage Category</a><br><br>";//manage category linking
							echo "<a href='addProduct.php'>Manage Product</a><br><br>";//linking manage products
							echo "<a href='addAdmin.php'>Manage Admin</a><br><br>";//link manage admin
							echo "<a href='addUser.php'>Manage User</a><br><br>";//link manage user
							echo "<a href='searchSoo.php'>Search User</a><br><br>";//link search user
							echo "<a href='searchProduct.php'>Search Product</a><br><br>";//link search product

							
						}
						else if($_SESSION['sessType']=="user")//user type checked
							echo "<a href='searchProduct.php'>Search Product</a><br><br>";//link search product while user login

						}
						else
							echo "<a href='searchProduct.php'>Search Product</a><br><br>";//link search product in not logged in to search product

			?>
		

				</div>
				
			
				
			<h1>Welcome to Ed's Electronics</h1>

			<p>We stock a large variety of electrical goods including phones, tvs, computers and games. Everything comes with at least a one year guarantee and free next day delivery.</p>
				<hr><hr><hr>

				<h1>Search these products:</h1>

				<a href="http://localhost/newAssignment/newassignment/displayProduct.php?id=18">TVS</a><br><br>
				<a href="http://localhost/newAssignment/newassignment/displayProduct.php?id=5">Computer</a><br><br>
				<a href="http://localhost/newAssignment/newassignment/displayProduct.php?id=14">Phones</a><br><br>
				........

			
			
		</main>