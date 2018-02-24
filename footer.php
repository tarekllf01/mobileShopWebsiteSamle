<div class="footer">
			<div class="wrap">
			<div class="section group">
				<div class="col_1_of_4 span_1_of_4">
				
				
					<h3>Our Info</h3>
					<p>We are supporting customer assisting and showing features ,price and stores for a successfull shopping .
					We wants to help them out before buying mobile phones </p>
				
				</div>
				
				<div class="col_1_of_4 span_1_of_4">
				
					<h3>Our Location</h3>
					<p>Auchpara,Tongi ,GAzipur </p>
					<p>01684093813</p>
					
					
				</div>
				<div class="col_1_of_4 span_1_of_4 footer-lastgrid">
					
					<h3>Fallow Us:</h3>
					
					 <ul>
					 
					 	<li><a href="#"><img src="images/twitter.png" title="twitter" />Twitter</a></li>
					 	<li><a href="#"><img src="images/facebook.png" title="Facebook" />Facebook</a></li>
						<?php
						error_reporting(0);
						$query=mysql_query("SELECT * FROM rssfeed");
						$row=mysql_num_rows($query);
						//echo $_COOKIE[$name];
						$rss=$row - $_COOKIE[$name];
						?>
					 	<li><a href="rss.php"><img src="images/rss.png" title="Rss" />Rss <button><?php echo $rss; ?></button></div></a></li>
					 </ul>
				</div>
			</div>
		</div>
		</div>
	</body>
</html>
