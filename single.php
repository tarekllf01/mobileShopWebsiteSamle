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
include("connect.php");


if(isset($_GET["id"])){
	$id=(int) ($_GET["id"]);
include("connect.php");
$query=mysql_query("SELECT * FROM mobile WHERE id='$id'");
$row=mysql_fetch_array($query);
	
	
}
else{
	echo "NO Product Found";
	exit();
}
////

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Mobilestore Website Template | single :: W3layouts</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<link href='http://fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<script src="js/<jquery-1 class="3 2"></jquery-1>.min.js" type="text/javascript"></script>
		<script src="js/jqzoom.pack.1.0.1.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/jqzoom.css" type="text/css">
		<script type="text/javascript">
			$(function() {
				$(".jqzoom").jqzoom();
			});
		</script>
		<script>
		$(document).ready(function(){
			$(".menu_body").hide();
			//toggle the componenet with class menu_body
			$(".menu_head").click(function(){
				$(this).next(".menu_body").slideToggle(600); 
				var plusmin;
				plusmin = $(this).children(".plusminus").text();
				
				if( plusmin == '+')
				$(this).children(".plusminus").text('-');
				else
				$(this).children(".plusminus").text('+');
			});
		});
		</script>
	</head>
	<body>
		<!-- start header -->
	<?php include("header.php");?>
	
		<!----End-Header---->
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    <div class="content-grids">
		    	<div class="details-page">
		    		<div class="back-links">
		    			<ul>
		    				<li><a href="#">Home</a><img src=" images/arrow.png" alt=""></li>
		    				<li><a href="#">Product</a><img src=" images/arrow.png" alt=""></li>
		    				<li><a href="#">Product-Details</a><img src=" images/arrow.png" alt=""></li>
		    			</ul>
		    		</div>
		    	</div>
		    	<div class="detalis-image">
				<?php echo $row["title"];?>
		    		<div id="content"> <a href=" images/<?php echo $row["image"];?>" class="jqzoom" style="" title="Product-Name"> <img src=" images/<?php echo $row["image"];?>"  title="Product-Name" style="border: 1px solid #e5e5e5;"> </a>
					</div>
		    	</div>
		    	<div class="detalis-image-details">
		    		<div class="details-categories">
		    			<ul>
		    				<li><h3>Brand:</h3></li>
		    				<li class="active1"><a href="index.php?brand=<?php echo $row["brand"];?>"><span></span><?php echo $row["brand"];?></a></li>
		    				
		    			</ul>
		    		</div><br />
		    		<div class="brand-value">
					<h3>Published : <i style="color:red;"><?php echo $row["published"];?> </h3></i>
						
						<h3>Camera : <i style="color:red;"><?php echo $row["camera"];?></i> </h3>
						<h3>Display : <i style="color:red;"><?php echo $row["display"];?></i> </h3>
						<h3>Ram : <i style="color:red;"><?php echo $row["ram"];?></i></h3>
						
						<h3>Storage : <i style="color:red;"><?php echo $row["storage"];?></i> </h3>
						
						<h3>CPU : <i style="color:red;"><?php echo $row["cpu"];?></i></h3>
						
						<h3>Battery : <i style="color:red;"><?php echo $row["battery"];?></i></h3>
						
						<h3>Price:  <i style="color:red;"><?php echo $row["price"];?></i></h3>
						
		    			<h3>Available stores:  	<i style="color:red;"><?php echo $row["store"];?></i> </h3>
					

					</div>
		    		<div class="share">
		    			<ul>
		    				<li> <a href="#"><img src="images/facebook.png" title="facebook" /> FaceBook</a></li>
		    				<li> <a href="#"><img src="images/twitter.png" title="Twiiter" />Twiiter</a></li>
		    				<li> <a href="#"><img src="images/rss.png" title="Rss" />Rss</a></li>
		    			</ul>
		    		</div>
		    		<div class="clear"> </div>
		    		
		    		</div>
		    		<div class="clear"> </div>
		    	<div class="menu_container">
						<p class="menu_head">Store <span class="plusminus">+</span></p>
							<div class="menu_body" style="display: none;">
							<p><?php echo $row["store"];?></p>
							</div>
						<p class="menu_head">About Product<span class="plusminus">+</span></p>
							<div class="menu_body" style="display: none;">
							<p>Published : <?php echo $row["published"];?></p>
							<p> Camera: <?php echo $row["camera"];?></p>
							<p>Ram: <?php echo $row["ram"];?></p>
							</div>
					</div>
			</div>
			
		    	</div>
		    	<div class="content-sidebar">
		    		<h4>Categories</h4>
						<ul>
							<li><a href="index.php?brand=apple">Apple</a></li>
							<li><a href="index.php?brand=blackberry">Blackberry</a></li>						
							<li><a href="dell">Dell Mobile Phones </a></li>
							
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
<?php include("footer.php");?>