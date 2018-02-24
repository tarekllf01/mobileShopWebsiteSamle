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


if($_SESSION["aalogin"]=="logged"){
include("connect.php");
if(isset($_GET["del"])){
	$mid=(int)$_GET["del"];
	$query=mysql_query("DELETE FROM message WHERE mid='$mid' ");
	if(!$query){
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
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
	</head>
	<body>
		<!-- start header -->
	<?php include("header.php");?>
	
		<!----End-Header---->
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    	<div class="about">
		    		<ul>
		    				<li style="display:inline;">Admin<img src=" images/arrow.png" alt=""></li>
		    				<li style="display:inline;"><?php echo $_SESSION["username"];?><img src="images/arrow.png" alt=""></li>
		    				<li style="display:inline;"> Message Review <img src="images/arrow.png" alt=""></li>
		    			</ul>
						
		    	<br>
					<div class="clear"> </div>
					
					
					<div class="section group">
					
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" >
					<?php
					$limit=5;
					$next=0;
					
					if(isset($_GET["next"])){
						$next=(int)$_GET["next"];
						$start= $next * $limit;
					}
					else{
						
						$start=0;
					}
					$query=mysql_query("SELECT * FROM message ORDER BY 1 DESC");
					
					while($row=mysql_fetch_array($query)){
						
					?>
					<div id="message" class="col-md-12 col-sm-12 col-xs-12 col-lg-12" >
						<p><?php echo "<b>Name : </b>".$row["name"]." <b> Email : </b>".$row["email"]."<b> Mobile : </b>".$row["mobile"]." ";?> 
						<a href="message.php?del=<?php echo $row["mid"];?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						
					</p>
						<p><?php echo "<b>Message : </b>". $row["message"];?></p>
					
					</div>
					<?php } ?>
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
	
}