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



if(isset($_POST["login"])){
	$username=$_POST["username"];
	$filter=array("'","\"","%","-","=","==","!=","\\","--","\\\\",";","(",")");
	$username = str_replace($filter,"",$username);
	$username=htmlentities($username);
	$username=mysql_real_escape_string($username);
	$password=md5($_POST["password"]);
	include("connect.php");
	
	$actor=str_replace($filter,"",$_POST["actor"]);
	$actor=mysql_real_escape_string($actor);
	$actor=htmlentities($actor);
	
	if($actor=="admin"){
	
	$query=mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password'");
	$row=mysql_fetch_array($query);
	$username=$row["username"];
	if(mysql_num_rows($query) == 1){
		if($_SESSION["aalogin"]="logged" ){
			$_SESSION["username"]=$username;
			header("location:http://localhost/mobilestore/admin.php");
		}
	}
	else{
	echo "Incorrect user name and password";
	
	
}
	}
else if($actor=="shop"){
	
	$query=mysql_query("SELECT * FROM shop WHERE username='$username' AND password='$password'");
	$row=mysql_fetch_array($query);
	$username=$row["shop"];
	if(mysql_num_rows($query) == 1){
		if($_SESSION["shoplogin"]="logged" ){
			$_SESSION["username"]=$username;
			header("location:http://localhost/mobilestore/shop.php");
		}
	}
	else{
	echo "Incorrect user name and password";
	
	
}
	
	
	
}
else{
echo "You have to Choose either Admin or Shop";
}	
}

if(isset($_GET["out"])){
	$_SESSION["aalogin"]=null;
	$_SESSION["shoplogin"]=null;
	$_SESSION["username"]=NULL;
	session_destroy();
	session_unset();
	
	
	header("location:index.php");
	
}




?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Mobilestore Website Template | About :: W3layouts</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<link href='http://fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		  <link rel="stylesheet" href="button/css/style.css"> 
	</head>
	<body>
		<!-- start header -->
	<?php include("header.php");?>
	
</div>	
<br><br>
	<div id="loginform" style="margin:0 auto;width:300px;height:80px;">
	<center>
	<form action="login.php" method="post">
	User name :<br>
	<input type="text" name="username"  /> <br><br>
	
	<div class="form-group">
	Password:<br>
	<input type="password" class="form-control" id="inputPassword1" name="password" />
	<br><br>
	User :
	<input type="radio" name="actor" value="shop"/> 	Shop 
	<input type="radio" name="actor" value="admin"/> 	Admin 
	
	<br><br></div>
		 
	
	<input type="submit" name="login" value="Login" /> 
	
	
	</form>
	</center>
	
	</div>
	
	
	
 </body>
 </html>