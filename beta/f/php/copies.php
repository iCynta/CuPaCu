<section>
<h2>Your Copied Posts</h2>
<?php
include 'connect.php'; 
//user logged in
		if ($_SESSION['start'] && $_SESSION['userid']){
			$country=$_SESSION['usercountry'];
			$state=$_SESSION['userstate'];
			$userid=$_SESSION['userid'];
			$copied = "SELECT * FROM $table3 WHERE status='0' AND userid='$userid'";
			$copiedresult = mysqli_query($conn, $copied);
			if(mysqli_num_rows($copiedresult)>0){
				while($copyrow = mysqli_fetch_assoc($copiedresult)) {
				$postid=$copyrow['postid'];
				$copiessql = "SELECT * FROM $table3 WHERE status='0' AND postid='$postid'";
				$copiesresult = mysqli_query($conn, $copiessql);
				$copies=mysqli_num_rows($copiesresult);
				$feed = "SELECT posttext,time FROM $table2 WHERE status='1' AND postid='$postid'   ORDER BY time DESC ";
				$feedre = mysqli_query($conn, $feed);
				if (mysqli_num_rows($feedre) > 0) {
				while($feedrow = mysqli_fetch_assoc($feedre)) {
					?>
					
						<article>
						<p><?php 
							$postview=$feedrow["posttext"];
							echo htmlspecialchars_decode($postview, ENT_NOQUOTES);
						?></p>

						<nav>
						<ul id='de'>
							<li><?php echo " Copies   :  " .$copies;?></li>
							<li><?php echo " Posted On   :  " .$feedrow["time"];?></li>
						</ul>
						</nav>
						</article>	
				
					<?php
			
			}}}}}

?>
</section>