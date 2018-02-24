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

if(isset($_POST["product_submit"])){
	
	$title=str_replace($filter,"",$_POST["title"]);
	$title=mysql_real_escape_string($title);
	echo $title=htmlentities($title);
	$features=str_replace($filter,"",$_POST["features"]);
	$features=mysql_real_escape_string($features);
	echo $features=htmlentities($features);
	$image_tmp=$_FILES["image"]["tmp_name"];
	$image_name=$_FILES["image"]["name"];
	$image_size=$_FILES["image"]["size"];
	$error=$_FILES["image"]["error"];
	$image_type=$_FILES["image"]["type"];
	$ext=explode(".",$image_name);
	$ext=end($ext);
	$query=mysql_query("SELECT id FROM rssfeed WHERE title='$title'  ");
	if($query=mysql_num_rows($query)){
		//echo "   recor exist alredy";
		$comment="Already exist this one";
	}
	if($error < 1 && ($ext== "jpg" || $ext=="jpeg" || $ext=="png" || $ext=="PNG" ) && $query < 1 && $title!="" &&  $features!="" && $image_size < 300000 ){
	echo "2nd if conditions fullfilled";
	
	$image_name= $image_name."".rand().".".$ext;
	$query=mysql_query("INSERT INTO rssfeed(title,details,image) VALUES('$title','$features','$image_name') ");
	if($query){
		//echo "3rd if conditions fullfilled";
		if(move_uploaded_file($image_tmp,"rssimage/$image_name")){
			//echo "file moved";
			unlink($image_tmp);
			$comment= "successfully added one product";
		}
		else{
			//echo "file not moved";
			$comment=$comment."not added";
			unlink($image_tmp);
		}
		
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
						<form action="adminrss.php" method="post" enctype="multipart/form-data" >
						
						<input type="text" name="title" placeholder="Enter Title here "/> <br><br>
					
						<textarea  name="features"  style="width:270px;height:150px;"/> 

						</textarea><br><br>
						
						<input type="file" name="image" /> <br><br>
						
					
						
						<input type="submit" name="product_submit" value="Add Product" /><br><br>
						
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
