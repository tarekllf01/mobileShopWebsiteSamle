<form action="md5.php" method="post">

<input type="text" name="input" placeholder="enter string" />
<input type="submit" name="submit" value=" Convert TO MD5" />


</form>

<br><br>

<?php
//echo rand();

if(isset($_POST["submit"])){
	echo "<br> <br> input: ".$_POST["input"]."<br><br>";
	echo md5($_POST["input"]);
	
	
}



?>

