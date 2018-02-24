<?php

$con=mysql_connect("localhost","root","");
$dbname="mobilestore";
  $conn=mysql_select_db($dbname,$con);
	 if(!$conn){
	echo "not connected";
	
}
	





?>