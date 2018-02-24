<?php
if ( session_status() == PHP_SESSION_NONE ) {
    session_start();
}
include("connect.php");
	
$name="seen";
if(isset($_COOKIE[$name])){
	
$query=mysql_query("SELECT * FROM rssfeed");
$value=mysql_num_rows($query);
			setcookie($name,$value,time()+ (3600 * 24 ),"/" );
			$_COOKIE[$name]=$value;
			
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Mobilestore  site Template | Home :: W3layouts</title>
		<link href="css/newstyle.css" rel="stylesheet" type="text/css"  media="all" />
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone   template, Andriod   template, Smartphone   template, free  designs for Nokia, Samsung, LG, SonyErricsson, Motorola   design" />
		<link href='http://fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
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
			
			<?php 
			
			$query=mysql_query("SELECT * FROM rssfeed ORDER BY 1 DESC");
		
			
			while($row=mysql_fetch_array($query))
			
			{


			?>
		    <div id="rss-container">
			<div id="rss">
			<div id="rss-title"> <?php echo $row["title"];?>  </div>
			
			<div id="rss-details">
			<br>
			<img src="rssimage/<?php echo $row["image"]; ?>" alt="" style="height:120px"/>
					<br><br>
				<?php
			
			echo $row["details"];?> </div>
			</div>
		
			</div>	
		    	
		   <?php 
		   
			}
			?>
		    	
		    </div>
		    <div class="clear"> </div>
		    </div>

<?php

 require("footer.php");
 ?>