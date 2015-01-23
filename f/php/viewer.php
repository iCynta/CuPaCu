<div id='viewer'>


</div>
<section>

<?php
include 'connect.php'; 
//user not logged in
		if ($_SESSION['start'] && !$_SESSION['userid'] &&@$_COOKIE['cookie_country']  && @$_COOKIE['cookie_state']){
		
			$cookiecountry=$_COOKIE['cookie_country'];
			$cookiestate=$_COOKIE['cookie_state'];
			$feed = "SELECT * FROM $table2 WHERE status='1' AND country='$cookiecountry' AND state='$cookiestate' ORDER BY time DESC LIMIT 0,50";
			$feedre= mysqli_query($conn, $feed);
			if (mysqli_num_rows($feedre) > 0) {
			// output data of each row
				while($feedrow = mysqli_fetch_assoc($feedre)) {
				$postid=$feedrow["postid"];
				$country=$feedrow["country"];
				$state=$feedrow["state"];
				$copiessql = "SELECT * FROM $table3 WHERE status='0' AND postid='$postid'";
				$copiesresult = mysqli_query($conn, $copiessql);
				$copies=mysqli_num_rows($copiesresult);
				$cut = "SELECT * FROM $table7 WHERE status='0' AND postid='$postid'";
				$cutre = mysqli_query($conn, $cut);
				if(mysqli_num_rows($cutre)==0)
					{	
		?>
		
			<article>
			<p><?php 
			
			$string=$feedrow["posttext"];
			//$string = strip_tags($string);
						
						if (strlen($string) > 500) {
						
						    // truncate string
						    $stringCut = substr($string, 0, 500);
						
						    // make sure it ends in a word so assassinate doesn't become ass...
						    $string = substr($stringCut, 0, strrpos($stringCut, ' '))."... <a href='view/$country/$state/$postid'>Read More</a>"; 
						}
						echo htmlspecialchars_decode($string, ENT_NOQUOTES);
			?></p>

			<nav>
			<ul >
				<li><?php echo " Copies   :  " .$copies;?></li>
				<li><?php echo " Posted On   :  " .$feedrow["time"];?></li>
				</ul>
			</nav>
			</article>
		<?php
			    	}}
			}else {
			    echo "No Posts,Start Posting Now";
			}
		}
		else
		{
	if(@!$_COOKIE['cookie_country'] && @!$_COOKIE['cookie_state']&& !$_SESSION['userid']) {include 'setlocation.php';}
		}
	
//user logged in
		if ($_SESSION['start'] && $_SESSION['userid']){
			$country=$_SESSION['usercountry'];
			$state=$_SESSION['userstate'];
			$userid=$_SESSION['userid'];
			$feed = "SELECT postid,posttext,time FROM $table2 WHERE status='1' AND country='$country' AND state='$state' ORDER BY time DESC ";
			$feedre = mysqli_query($conn, $feed);
			if (mysqli_num_rows($feedre) > 0) {
			// output data of each row
				while($feedrow = mysqli_fetch_assoc($feedre)) {
				$postid=$feedrow["postid"];
				$copiessql = "SELECT * FROM $table3 WHERE status='0' AND postid='$postid'";
				$copiesresult = mysqli_query($conn, $copiessql);
				$copies=mysqli_num_rows($copiesresult);
				$copied = "SELECT * FROM $table3 WHERE status='0' AND postid='$postid' AND userid='$userid'";
				$copiedresult = mysqli_query($conn, $copied);
				if(mysqli_num_rows($copiedresult)==0)
					{
						$cut = "SELECT * FROM $table7 WHERE status='0' AND userid='$userid' AND postid='$postid'";
						$cutre = mysqli_query($conn, $cut);
						if(mysqli_num_rows($cutre)==0){
		?>
		
			<article>
			<p><?php 
			$string=$feedrow["posttext"];
			//$string = strip_tags($string);
						
						if (strlen($string) > 500) {
						
						    // truncate string
						    $stringCut = substr($string, 0, 500);
						
						    // make sure it ends in a word so assassinate doesn't become ass...
						    $string = substr($stringCut, 0, strrpos($stringCut, ' '))."... <a href='view/$country/$state/$postid'>Read More</a>"; 
						}
						echo htmlspecialchars_decode($string, ENT_NOQUOTES);
			?></p>
			<nav >			
			<ul id='cpc'>
				<li><a href="?process=copy&i=<?php echo $postid;?>">Copy</a></li>
				<li><a href=""></a></li>
				<li><a href="?cutconfirm=<?php echo $postid; ?>">Cut</a></li>
			</ul>
			</nav>
			<?php if(@$_GET['cutconfirm']==$postid){include 'cutconfirmform.php';}?>
			<nav>
			<ul>
				<li><?php echo " Copies   :  " .$copies;?></li>
				<li><?php echo " Posted On   :  " .$feedrow["time"];?></li>
			</ul>
			</nav>
			</article>	
	
		<?php
			    	}}}
			}else {
			    echo "No Posts,Start Posting Now";
			}
		}

?>
</section>