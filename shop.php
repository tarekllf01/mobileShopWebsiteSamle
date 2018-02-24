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
// filter quetes update fro here 
$filter=array("'","\"","%","-","=","==","!=","\\","--","\\\\",";","(",")");


if($_SESSION["shoplogin"]=="logged"){

include("connect.php");

if(isset($_POST["product_submit"])){
	//echo "first if conditions fullfilled";
	
	$title=str_replace($filter,"",$_POST["title"]);
	$title=mysql_real_escape_string($title);
	$title=htmlentities($title);
	
	$brand=str_replace($filter,"",$_POST["brand"]);
	$brand=mysql_real_escape_string($brand);
	$brand=htmlentities($brand);
	
	$price=str_replace($filter,"",$_POST["price"]);
	$price=mysql_real_escape_string($price);
	$price=htmlentities($price); 
	
	$published=str_replace($filter,"",$_POST["published"]);
	$published=mysql_real_escape_string($published);
	$published=htmlentities($published);
	
	$camera=str_replace($filter,"",$_POST["camera"]);
	$camera=mysql_real_escape_string($camera);
	$camera=htmlentities($camera);
	
	$ram=str_replace($filter,"",$_POST["ram"]);
	$ram=mysql_real_escape_string($ram);
	$ram=htmlentities($ram);
	
	$display=str_replace($filter,"",$_POST["display"]);
	$display=mysql_real_escape_string($display);
	$display=htmlentities($display);
	
	$storage=str_replace($filter,"",$_POST["storage"]);
	$storage=mysql_real_escape_string($storage);
	$storage=htmlentities($storage);
	
	$cpu=str_replace($filter,"",$_POST["cpu"]);
	$cpu=mysql_real_escape_string($cpu);
	$cpu=htmlentities($cpu);
	
	$battery=str_replace($filter,"",$_POST["battery"]);
	$battery=mysql_real_escape_string($battery);
	$battery=htmlentities($battery);
	
	$store=$_SESSION["username"];
	//$store=mysql_real_escape_string($store);
	//$store=htmlentities($store);
	
	$image_tmp=$_FILES["image"]["tmp_name"];
	$image_name=$_FILES["image"]["name"];
	$image_size=$_FILES["image"]["size"];
	$error=$_FILES["image"]["error"];
	$image_type=$_FILES["image"]["type"];
	$ext=explode(".",$image_name);
	$ext=end($ext);
	$query=mysql_query("SELECT id FROM mobile WHERE title='$title' AND brand='$brand' ");
	if($query=mysql_num_rows($query)){
		//echo "   recor exist alredy";
		$comment="Already exist this one";
	}
	if($error < 1 && ($ext== "jpg" || $ext=="jpeg" || $ext=="png" || $ext=="PNG") && $query < 1 && $title!="" && $brand!="" && $price!="" && $store!=""  && $ram!="" && $published!=""  && $camera!=""  && $display!=""  && $storage!=""  && $battery!=""  && $cpu!=""  && $image_size < 300000 ){
	//echo "2nd if conditions fullfilled";
	$image_name=(int)$price;
	$image_name= $image_name."".rand().".".$ext;
	$query=mysql_query("INSERT INTO mobile(title,brand,price,image,store,published,camera,ram,display,storage,cpu,battery) VALUES('$title','$brand','$price','$image_name','$store','$published','$camera','$ram','$display','$storage','$cpu','$battery') ");
	if($query){
		//echo "3rd if conditions fullfilled";
		if(move_uploaded_file($image_tmp,"images/$image_name")){
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
		    				<li style="display:inline;">Manage Product <img src="images/arrow.png" alt=""></li>
		    			</ul>
		    	<br>
					<div class="clear"> </div>
					
					
					<div class="section group">
					<h5><?php echo $comment;?></h5>
						<form action="shop.php" method="post" enctype="multipart/form-data" >
						
						<input type="text" name="title" placeholder="Enter model no "/> <br><br>
						<input type="text" name="brand" placeholder="Enter Brand " /> <br><br>
						 
							<input type="text" name="published" placeholder="Published date" /><br /><br />
							<input type="text" name="camera" placeholder="camera : back,front" /><br /><br />
							<input type="text" name="ram" placeholder="Enter Ram size" /><br /><br />
							<input type="text" name="storage" placeholder="Enter Phone  Storage " /><br /><br />
							<input type="text" name="display" placeholder="Display size & type " /><br /><br />
							<input type="text" name="cpu" placeholder=" CPU details " /><br /><br />
							<input type="text" name="battery" placeholder="Batery Details " /><br /><br />
						

						</textarea><br><br>
						
						<input type="text" name="price" placeholder="price "/> <br><br>
						
						<input type="file" name="image" /> <br><br>
						<h5>Shope name will be use as available stores </h5>
						
						
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
