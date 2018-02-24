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

if($_SESSION["aalogin"]=="logged"){

include("connect.php");

if(isset($_POST["addshop"])){
	
	$username=str_replace($filter,"",$_POST["username"]);
	$username=mysql_real_escape_string($username);
	$username=htmlentities($username);
	$password=$_POST["password"];
	$password=md5($password);
	$shop=str_replace($filter,"",$_POST["shop"]);
	$shop=mysql_real_escape_string($shop);
	$shop=htmlentities($shop);
	
	$query=mysql_query("SELECT id FROM shop WHERE username='$username' OR shop='$shop' ");
	if($query=mysql_num_rows($query)){
		//echo "   recor exist alredy";
		$comment="Already exist this one";
	}
	if($query < 1 && $username!="" &&  $password!="" && $shop!="" ){
	
	
	$query=mysql_query("INSERT INTO shop(username,password,shop) VALUES('$username','$password','$shop') ");
	if($query){
		//echo "3rd if conditions fullfilled";
			$comment= "successfully added one product";
		
	}	
		
	} // end of if comparing image type, error, brand title etc
	else{
		
	$comment=$comment ."Input all form correctly ";
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
		  <link rel="stylesheet" href="button/css/style.css"> 
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
		    				<li style="display:inline;">Add RSS <img src="images/arrow.png" alt=""></li>
		    			</ul>
		    	<br>
					<div class="clear"> </div>
					
					
					<div class="section group">
					<h5><?php echo $comment;?></h5>
					
						<form action="add_shop.php" method="post" >
						Shop Name :<input type="shop" name="shop" placeholder=" "/> <br><br>
						UserName :<input type="text" name="username" placeholder=" "/> <br><br>
						Password :<input type="password" name="password" placeholder=" "/> <br><br>
					
						<br><br>
	
						
					
						
						<input type="submit" name="addshop" value="Create Account " /><br><br>
						
						</form>
						
			
		    </div>
			
			
				</div>
				
		    	</div>
		    	</div>
		    	
		
		
		
<?php
include("footer.php");
}
else{
		header("location:login.php");
	die("You must log in");
	
}
