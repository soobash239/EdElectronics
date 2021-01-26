<link rel="stylesheet" href="electronics.css" /><!--linking required CSS-->
	<section></section> 
	<?php session_start();?> <!--SESSION STARTED -->
	
<header>
			<h1>Ed's Electronics</h1><!-- header 1st-->


			<ul>
				<li><a href="index.php">Home</a></li><!--link index.php to Home -->
				<li>Products<!-- list -->
					<ul id="category"> <!-- ul id -->
						<?php
						$pdo = new PDO('mysql:dbname=assignment;host=localhost','root','', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);/*creating database */
							$categories = $pdo->prepare("SELECT name, id FROM tb_category");// select from table category
							$categories->execute();//execute cateogories
							foreach ($categories as $category) {//for each started
								echo '<li><a href=displayProduct.php?id='.$category['id'].'>'.$category['name'].'</li>';	//link display product to category id and name
								}
								
						?>
						         <li><a href="#"></a></li><!-- link #-->

					</ul>
				</li>

				<li>
						<?php if(empty($_SESSION)){?>
						<a href ='login.php' style="margin-right: 5px; padding: 1px; text-align: center; display: inline-flex;">Login <!-- link login.php to Login with some CSS use -->
						<?php }
						else{
						echo "Welcome: ".$_SESSION['sessUname'] ; // print welcome and user or admin name
									?>
					<ul>
					<li><a href="editinfo.php">Edit User</a></li><!-- link editinfo to edit User-->
					<li><a href="editAdminInfo.php">Edit Admin</a></li><!-- link editAdminInfo to edit admin details-->
					<li><a href="logout.php">Logout</a></li><!-- link logout.php to logout-->
					</ul>
					<?php } ?>
					
					</li>

			</ul>

			<address>
				<p>We are open 7-10, 6 days a week. Call us on
					<strong>Nepal Contact Number: +977-9860098221</strong>
				</p>
			</address>


		</header>
	

		<aside>

			<h1><a href="#" style="grid-area: img; height: 200px; background-position:center;
			max-height: 500px;
			background-position: center center;"><!-- CSS is used-->
					Featured Product</h1></a>
			<p><strong>Iphone XS/ Iphone XS MAX
				<img src="i.jpg" alt="j.jpg" width="100%">
			</strong></p>

			<!-- <p style=" background-image: url(images/randomFeatured.php"> -->
			<p>Display- OLED multi-touch HD display<br>
				Dual Sim Slot <br>
				Water-proof <br>
				Dual Camera <br>
				Available in 64, 128 and 256 GB <br>

				</p>

		</aside>

		<footer>
			&copy; Ed's Electronics 2018
		</footer>

