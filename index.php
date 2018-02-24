<?php
if ( session_status() == PHP_SESSION_NONE ) {
    session_start();
}
$name="seen";

if(!isset($_COOKIE[$name])){
	//echo $_COOKIE[$name];
	//echo "not set";
	$value=0;
	setcookie($name,$value,time()+ (3600 * 24 ),"/" );
	
}
error_reporting(0);
include("connect.php");
$filter=array("'","\"","%","-","=","==","!=","\\","--","\\\\",";","(",")");

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Mobilestore  site Template | Home :: W3layouts</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone   template, Andriod   template, Smartphone   template, free  designs for Nokia, Samsung, LG, SonyErricsson, Motorola   design" />
		<link href='http://fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/responsiveslides.css">
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
	</head>
	<body>
	<!-- start header -->
	<?php include("header.php");?>
	

		<!----End-Header---->
	<!--start-image-slider---->
					<div class="wrap">
					<div class="image-slider">
						<!-- Slideshow 1 -->
					    <ul class="rslides" id="slider1">
					      <li><img src="images/1.png" alt=""></li>
					      <li><img src="images/2.png" alt=""></li>
					      <li><img src="images/1.png" alt=""></li>
					    </ul>
						 <!-- Slideshow 2 -->
					</div>
					<!--End-image-slider---->
					</div>
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    	
		    	
		    <div class="content-grids">
		    	<h4>Deals of the day</h4>
		    	<div class="section group">
				<?php  
				if(isset($_GET["brand"])){
					if(isset($_GET["next"])){
						$next=(int)($_GET["next"]);
					}
					else{
						$next=0;
					}
					$start=$next * 16;
					$continue=16;
					$brand=str_replace($filter,"",$_GET["brand"]);
					$brand=mysql_real_escape_string($brand);
					$brand=htmlentities($brand);
					$query1=mysql_query("SELECT * FROM mobile WHERE act=1 AND brand='$brand' ORDER BY id DESC");
					$total=mysql_num_rows($query1);
				
					$query=mysql_query("SELECT * FROM mobile WHERE act=1 AND brand='$brand'  ORDER BY id DESC LIMIT $start ,$continue ");
				}
				else if(isset($_POST["submit"])){
					
					$product=str_replace($filter,"",$_POST["product"]);
					
					$product=mysql_real_escape_string($product);
					$product=htmlentities($product);
					$product='%'.$product.'%';
					$query=mysql_query("SELECT * FROM mobile WHERE act=1 AND title LIKE '$product' ORDER BY id DESC LIMIT 0,20");
					
				}
				else{
				$query=mysql_query("SELECT * FROM mobile WHERE act=1 ORDER BY id DESC LIMIT 0,12");
				
				}
				while($row=mysql_fetch_array($query)) {
				
				?>
				
				<div class="grid_1_of_4 images_1_of_4 products-info">
					 <img src="images/<?php echo $row["image"];?>" style="max-height:280px;" >
					 <a href="single.php?id=<?php echo $row["id"];?>"><?php echo $row["title"];?></a>
					 <h3><?php echo $row["price"];?></h3>
					 
				</div>
			
			<?php
				}
				
				?>

				
			</div>
			<div class="section group">
			<center>
			
			<?php 
			if(isset($_GET["brand"])){
			if(($next-1) > 0  ){ ?>
				<div id="next"> <a href="index.php?brand=<?php echo $brand;?>&&next=<?php echo $next-1; ?> "> prev </a></div>
				
			<?php } 

			
				if($total > (($next+1) * 16 )){
			?>
				<div id="next"><a href="index.php?brand=<?php echo $brand;?>&&next=<?php echo $next+1; ?> "> NEXT </a></div>
				
			<?php
				}
			}
			?>
				</center>
				
			</div>
		    
		    	</div>
		    	<div class="content-sidebar">
		    		<h4>Categories</h4>
						<ul>
							
						
							
							<li><a href="index.php?brand=apple">Apple</a></li>
							<li><a href="index.php?brand=blackberry">Blackberry</a></li>						
							<li><a href="index.php?brand=dell">Dell Mobile Phones </a></li>
							
							<li><a href="index.php?brand=htc">HTC</a></li>
							<li><a href="index.php?brand=lg">LG Mobiles</a></li>
							
							<li><a href="index.php?brand=micromax">Micromax Mobiles </a></li>
							<li><a href="index.php?brand=samsung">Samsung Mobiles</a></li>
							<li><a href="index.php?brand=sony erricsson">Sony Ericsson Mobiles</a></li>
							<li><a href="index.php?brand=sony">Sony</a></li>
							<li><a href="index.php?brand=huawei">huawei</a></li>
							
						</ul>
		    	</div>
		    </div>
		    <div class="clear"> </div>
		    </div>

<?php require("footer.php");?>