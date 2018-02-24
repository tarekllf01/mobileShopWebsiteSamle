<?php
error_reporting(0);
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
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
					<br><br>
		   
			
		<?php	$query=mysql_query("SELECT id,title FROM mobile ORDER BY title");
				$query1=mysql_query("SELECT id,title FROM mobile ORDER BY title");

		?>
		
<div class="col-md-12 col-sm-12 col-lg-12" style="margin-bottom:50px;">
<center> Compare Your Coices </center><br><br>
<!--
first choice for comparing
-->
<div  class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="margin-bottom:20px;">
<form action="" method="post" >
<select class="first" id="">
<?php
while($row=mysql_fetch_array($query)){
	echo "<option value=\"" . $row["id"]."\">". $row["title"] ."</option>";
}
?>

</select>
</form>
</div>
	



<!--
second choice for comparing
-->
<div  class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="margin-bottom:20px;">
<form action="" method="post" >
<select class="second" id="">
<?php
while($row=mysql_fetch_array($query1)){
	echo "<option value=\"" . $row["id"]."\">". $row["title"] ."</option>";
}
?>

</select>
</form>
</div>

<div id="compare1"  class="col-md-6 col-sm-6 col-lg-6 col-xs-6">

</div>
<div id="compare2" class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
</div>



</div>
<script type="text/javascript">
	$(".first").change(function(){
		var str= $("select.first option:selected").val();
		
	$.post("get.php",{id:str},function( data ) {
  $("#compare1").html( data );
});
		
	});

</script>
	<script type="text/javascript">
	$(".second").change(function(){
		var str1= $("select.second option:selected").val();
			$.post( "get.php",{id:str1},function( data ) {
  $("#compare2").html( data );
});
		
		
	});
	
	
	
	</script>	   
		   
		   
	 <div class="clear"> </div>	

	
<?php
 require("footer.php");
 ?>