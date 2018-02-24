<?php
error_reporting(0);
$id=(int)$_POST["id"];
require("connect.php");
$query=mysql_query("SELECT * FROM mobile WHERE id='$id' "); 
$row=mysql_fetch_array($query);

?>
<center>
<div class="brand-value" style="width:100%;">


<center><img src="images/<?php echo $row["image"];?>" alt="" width="150px;" height="200px"/></center>
					<h3>Published : <i style="color:red;"><?php echo $row["published"];?> </h3></i>
						
						<h3>Camera : <i style="color:red;"><?php echo $row["camera"];?></i> </h3>
						<h3>Display : <i style="color:red;"><?php echo $row["display"];?></i> </h3>
						<h3>Ram : <i style="color:red;"><?php echo $row["ram"];?></i></h3>
						
						<h3>Storage : <i style="color:red;"><?php echo $row["storage"];?></i> </h3>
						
						<h3>CPU : <i style="color:red;"><?php echo $row["cpu"];?></i></h3>
						
						<h3>Battery : <i style="color:red;"><?php echo $row["battery"];?></i></h3>
						
						<h3>Price:  <i style="color:red;"><?php echo $row["price"];?></i></h3>
						
		    			<h3>Available stores:  	<i style="color:red;"><?php echo $row["store"];?></i> </h3>
					

</div>
</center>
