<?php 
if ( session_status() == PHP_SESSION_NONE ) {
    session_start();
	$name="seen";

if(!isset($_COOKIE[$name])){
	//echo $_COOKIE[$name];
	//echo "not set";
	$value=0;
	setcookie($name,$value,time()+ (3600 * 24 ),"/" );
	
}
include("connect.php");


}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Mobilestore Website Template | About :: W3layouts</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<link href='http://fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<!-- start header -->
	<?php include("header.php");?>
	
		<!----End-Header---->
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    	<div class="about">
		    		<h4>About Us</h4>
		    		<div class="section group">
					<div class="col_1_of_3 span_1_of_3 about-frist">
						<h3>Did You Know?</h3>
						<h5>THIS IS THE FIRST IN BAGLADESH </h5>
						<p>We deside to help them out who are felling bored or hard to deside what is to bye which brand is good.
						so we give you the proper review to make it easy to you.
						We are supporting customer assisting and showing features ,price and stores for a successfull shopping .
					We wants to help them out before buying mobile phones </p>
					more specific we present you seperate links of each brands
				<ul>
							<li><a href="http://www.nokia.com">Nokia Mobile phone</a></li>
							<li><a href="http://www.lg.com">LG korean Brand</a></li>
							<li><a href="http://www.samsung.com">Samsung Smart phones </a></li>
							<li><a href="http://www.micromaxinfo.com">Micromax mobile phones</a></li>
							<li><a href="http://htc.com">HTC BRAND</a></li>
							<li><a href="http://blackberry.com">Blackberry mobile</a></li>
							<li><a href="http://dell.com">Dell mobile </a></li>
						
						</ul>
					</div>
					<div class="col_1_of_3 span_1_of_3 about-centre">
						<h3>Our Mission</h3>
						<a href="#"><img src="images/grid-img2.jpg"></a>
						<h5>Support at Shopping and choice  </h5>
						<p>We deside to help them out who are felling bored or hard to deside what is to bye which brand is good.
						so we give you the proper review to make it easy to you.
						We are supporting customer assisting and showing features ,price and stores for a successfull shopping .
					We wants to help them out before buying mobile phones </p></div>
					<div class="col_1_of_3 span_1_of_3 quites">
						<h3>Testimonials</h3>
						<blockquote><p><img src="images/quotes_alt.png"> &nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p></blockquote>
						<a href="#">- Lorem ipsum.<span>Usa</span></a><br /><br />
						<blockquote><p><img src="images/quotes_alt.png"> &nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p></blockquote>
						<a href="#">- Lorem ipsum.<span>Usa</span></a>
					</div>
					<div class="clear"> </div>
					<div class="section group">
						<div class="cont span_2_of_3">
						       <h3>Mobile-store General Information</h3>
							   	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>				    
						</div>
						<div class="rsidebar span_1_of_3 about-frist">
						      <h3>Fresh-links</h3>
						   <ul>
							<li><a href="http://www.nokia.com">Nokia Mobile phone</a></li>
							<li><a href="http://www.lg.com">LG korean Brand</a></li>
							<li><a href="http://www.samsung.com">Samsung Smart phones </a></li>
							<li><a href="http://www.micromaxinfo.com">Micromax mobile phones</a></li>
							<li><a href="http://htc.com">HTC BRAND</a></li>
							<li><a href="http://blackberry.com">Blackberry mobile</a></li>
							<li><a href="http://dell.com">Dell mobile </a></li>
						
						</ul>
						      
						</div>
		    </div>
				</div>
				
		    	</div>
		    	</div>
		    	
		    </div>
		    <div class="clear"> </div>
		<?php include("footer.php");?>
