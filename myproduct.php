<?php
if ( session_status() == PHP_SESSION_NONE ) {
    session_start();
}
error_reporting(0);
$name="seen";

if(!isset($_COOKIE[$name])){
	//echo $_COOKIE[$name];
	//echo "not set";
	$value=0;
	setcookie($name,$value,time()+ (3600 * 24 ),"/" );
	
}
include("connect.php");
// filter quetes
$filter=array("'","\"","%","-","=","==","!=","\\","--","\\\\",";","(",")");

if($_SESSION["shoplogin"]=="logged"){
$username=$_SESSION["username"];
include("connect.php");


if(isset($_GET["del"])){
	$id=$_GET["del"];
	$id=(int)$id;
	$del=mysql_query("SELECT image FROM mobile WHERE id='$id' AND store='$username'");
		$row=mysql_fetch_array($del);
		$image=$row["image"];
	$delete=mysql_query("DELETE  FROM mobile WHERE id='$id' AND store='$username'");
	if($delete){
		
		if(unlink("images/$image")){
			echo " 1 Record delete";
			
		}
		else{
			echo "image cannot be deleted";
		}
		
	}
	else{
		echo "not deleted";
		
	}
	
	
	
}
?>





<!DOCTYPE HTML>
<html>
	<head>
		<title>Mobilestore Website Template | About :: W3layouts</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<link href='http://fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/jqzoom.css" type="text/css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		  
       <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'> 

       <link rel="stylesheet" href="button/css/style.css"> 
	

    
	</head>
	<body>
		<!-- start header -->
	<div class="wrap">
		<!----start-Header---->
		<div class="header">
			<div class="search-bar">
				<form action="myproduct.php" method="post">
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
				<a href="index.html"><img src="images/logo.png" title="logo" /></a>
			</div>
		<!----end-logo---->
		<!----start-top-nav---->
		<div class="top-nav">
<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
			
				<li><a href="contact.php">Contact</a></li>
					<?php if(isset($_SESSION["shoplogin"])){
					echo "<li><a href=\"shop.php\">Add Product</a></li>";
					echo "<li><a href=\"myproduct.php\"> MY  Products </a></li>";
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
	
		<!----End-Header---->
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
			<div id="panal">
			<ul >
		    				<li style="display:inline;"> Shop  <img src=" images/arrow.png" alt=""></li>
		    				<li style="display:inline;"> <?php echo $_SESSION["username"];?> <img src="images/arrow.png" alt=""></li>
		    				<li style="display:inline;"> Manage Product <img src="images/arrow.png" alt=""></li>
		    			</ul>
						<br>
						</div>
		    	<div class="about">
		    		
		    	
					<div class="clear"> </div>
					
					
					<div class="section group">
					<div class="col-md-12 col-sm-12 col-xm-12" >
					<?php
					include("connect.php");
					$limit=30;  // change limit of number of product show per page   
					if(isset($_POST["submit"])){
						$product=str_replace($filter,"",$_POST["product"]);
					
					$product=mysql_real_escape_string($product);
					$product=htmlentities($product);
						$title="%".$title."%";
					$query=mysql_query("SELECT * FROM mobile WHERE store='$username' AND title LIKE '$title' LIMIT 0,$limit ");
						
					}	
					else{
						if(isset($_GET["next"])){
							$next=(int)($_GET["next"]);
							$start= $next * $limit;
						}
						else{
							$start=0;
						}
					$query=mysql_query("SELECT * FROM mobile WHERE store='$username' ORDER BY id DESC LIMIT $start,$limit ");
					$query1=mysql_query("SELECT * FROM mobile WHERE store='$username' ");
					$total=mysql_num_rows($query1);
					}
					while($row=mysql_fetch_array($query)){
					?>
						<a href="single.php?id=<?php echo $row["id"];?>" > 
						<div class="col-md-2 col-sm-4 colxs-6 col-lg-2">
						<center><img src="images/<?php echo $row["image"];?>" alt="" width="200px" height="230px" />
						<h5><?php echo $row["title"];?></h5>
						<h5><?php echo $row["price"];?></h5>
						<!-- start of delete button -->
	<div id="delete_button" >
    <a class="button" href="myproduct.php?del=<?php echo $row["id"]; ?>" role="button">
	<span>remove</span>
	<div class="icon">
		<i class="fa fa-remove"></i>
		<i class="fa fa-check"></i>
	</div>
</a>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="button/js/index.js"></script>

    
    
   </div> 
						<!-- end of delete button -->

						</center>
						
						</div> </a>
					<?php
					}
					?><br>
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
					<?php
					if(($next-1) >0){
						echo "<a href=\"myproduct.php?next=".($next-1) . "\" > PREV </a> ";
					}
					if($total > (($next+1)*$limit )){
						echo "<a href=\"myproduct.php?next=" .($next+1 ). "\" > NEXT </a> ";
						
						
					}
					
					?>
					</div>
					</div>
						
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		    </div>
			
			
				</div>
				
		    	</div>
		    	</div>
		 
<?php 
include("footer.php");
}
else{
	header("location:login.php");
	
	exit();
	//die();
	
}