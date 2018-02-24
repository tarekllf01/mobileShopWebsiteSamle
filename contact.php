<?php 
session_start();
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


if(isset($_POST["submit_message"])){
	include("connect.php");
	$name=str_replace($filter,"",$_POST["name"]);
	$name=mysql_real_escape_string($name);
	$name=htmlentities($name);
	
	$email=str_replace($filter,"",$_POST["email"]);
	$email=mysql_real_escape_string($email);
	$email=htmlentities($email);
	
	$message=str_replace($filter,"",$_POST["message"]);
	$message=mysql_real_escape_string($message);
	$message=htmlentities($message);
	
	$mobile=str_replace($filter,"",$_POST["mobile"]);
	$mobile=mysql_real_escape_string($mobile);
	$mobile=htmlentities($mobile);
	
	$query=mysql_query("SELECT * FROM message WHERE name='$name' AND message='$message' AND email='$email' ");
	
	if($name=="" || $email=="" || $mobile=="" || $message==""){
		$notification="ERROR :  Message NOT SENT !!    Input all field correctly";
		
	}
	else if(mysql_num_rows($query)){
		$notification="ERROR :  Message NOT SENT! Same message already exist";
		
	}
	else if(filter_var($email,FILTER_VALIDATE_EMAIL) != TRUE){
		$notification=" ERROR :  Message NOT SENT!  email not valid";
		
	}
	else{
	$query=mysql_query("INSERT INTO message(name,email,message,mobile) VALUES('$name','$email','$message','$mobile') ");
	if($query){
	$notification= "message sent";
		
			  }
	else{
		$notification= "message not sent";
		}
	}
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Mobilestore Website Template | Contact :: W3layouts</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<link href='css/font.css' rel='stylesheet' type='text/css'>
		
	</head>
	<body>
		<div class="wrap">
		<!-- start header -->
	<?php include("header.php");?>
	
		<!----End-Header---->
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    	<div class="section group">				
				<div class="col span_1_of_3">
					<div class="contact_info">
			    	 	<h2>Find Us Here</h2>
			    	 		<div class="map" >
							<iframe width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJKRFwQovEVTcRo2VMOh4VJuk&key=AIzaSyAxHiWqGMZlYGK3HqW4Hu1CeYT_5BhYFwg" allowfullscreen></iframe> 
					   			</div>
      				</div>
      			<div class="company_address">
				     	<h2>Company Information :</h2>
						    	<p>Auchpara,tongi,Gazipur</p>
						   		<p>+880-1684093813</p>
								<p>+8801674709922</p>
						   		<p> Bangladesh </p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>info@mycompany.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form action="contact.php" method="post">
						<span><?php echo $notification; ?></span>
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" name="name" value=""></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" name="email" value=""></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" name="mobile" value=""></span>
						    </div>
						    <div>
						    	<span><label>MESSAGE</label></span>
						    	<span><textarea name="message" >LESS THAN 100 WORD </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit_message" value="Submit"></span>
						  </div>
					    </form>
				    </div>
  				</div>				
			  </div>
			  	 <div class="clear"> </div>
	</div>
	<div class="clear"> </div>
		    </div>
		    </div>
	<?php include("footer.php");?>
