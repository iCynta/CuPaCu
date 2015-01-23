<div id='view'>
<header></header>
<section>

<?php
$postid=$_GET['p'];
include 'connect.php'; 
//user not logged in
		if ($_SESSION['start'] && !$_SESSION['userid'] &&@$_COOKIE['cookie_country']  && @$_COOKIE['cookie_state']){
		
			$cookiecountry=$_COOKIE['cookie_country'];
			$cookiestate=$_COOKIE['cookie_state'];
			$feed = "SELECT posttext,time FROM $table2 WHERE status='1' AND postid='$postid' ";
			$feedre= mysqli_query($conn, $feed);
			if (mysqli_num_rows($feedre) > 0) {
			// output data of each row
				while($feedrow = mysqli_fetch_assoc($feedre)) {
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
			    	}}
			}else {
			    $PostMessage= "No Posts,Start Posting Now";
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
			$feed = "SELECT posttext,time FROM $table2 WHERE status='1' AND postid='$postid' ";
			$feedre = mysqli_query($conn, $feed);
			if (mysqli_num_rows($feedre) > 0) {
			// output data of each row
				while($feedrow = mysqli_fetch_assoc($feedre)) {
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
				$postview=$feedrow["posttext"];
				echo htmlspecialchars_decode($postview, ENT_NOQUOTES);
			?></p>
			<nav>
			<ul>
				<li><a href="p/copy?i=<?php echo $postid;?>">Copy</a></li>
				<li><a href=""></a></li>
				<li><a href="p/cutconfirm=<?php echo $postid; ?>">Cut</a></li>
			</ul>
			</nav>
			<?php if(@$_GET['cutconfirm']==$postid){include 'cutconfirmform.php';}?>
			<nav>
			<ul id='de'>
				<li><?php echo " Copies   :  " .$copies;?></li>
				<li><?php echo " Posted On   :  " .$feedrow["time"];?></li>
			</ul>
			</nav>
			</article>	
	
		<?php
			    	}}}
			}else {
			    $PostMessage= "No Posts,Start Posting Now";
			}
		}

?>
</section>
</div>
		