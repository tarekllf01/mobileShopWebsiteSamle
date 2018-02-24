		<div class="wrap">
		<!----start-Header---->
		<div class="header">
			<div class="search-bar">
				<form action="index.php" method="post">
					<input type="text" name="product"/>
					<input type="submit" value="Search" name="submit" />
				</form>
			</div>
			<div class="clear"> </div>
		
			<div class="clear"> </div>
		</div>
		</div>
		<div class="clear"> </div>
		<div class="top-header">
			<div class="wrap">
		<!----start-logo---->
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" title="logo" /></a>
			</div>
		<!----end-logo---->
		<!----start-top-nav---->
		<div class="top-nav">
<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="compare.php"> Compare </a></li>
				<li><a href="about.php">About</a></li>
			
				<li><a href="contact.php">Contact</a></li>
					<?php if(isset($_SESSION["aalogin"])){
						echo "<li><a href=\"admin.php\">Add Product</a></li>";
						echo "<li><a href=\"message.php\"> Message </a></li>";
					echo "<li><a href=\"manage_product.php\">Manage Products</a></li>";
					echo "<li><a href=\"adminrss.php\">Add RSS </a></li>";
					echo "<li><a href=\"add_shop.php\">Add Shop </a></li>";
						echo "<li><a href=\"login.php?out=1\">Log out </a></li>";
						
				}
				else if(isset($_SESSION["shoplogin"])){
					echo "<li><a href=\"shop.php\">Add Product</a></li>";
					echo "<li><a href=\"myproduct.php\">MY Products</a></li>";
					echo "<li><a href=\"login.php?out=1\">Log out </a></li>";
					
				}
				else{
				echo "<li><a href=\"login.php\">Login</a></li>";
				}
				?>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<!----End-top-nav---->