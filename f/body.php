<body>
<div id='h'>
	<header>
	<a href="<?php echo $do;?>"><img src="f/image/icon/copacu.ico" alt="copacu.com"/></a>
	</header>	
	<nav>
		<ul>
		<?php if(@$_SESSION['userid']){?>
			<li><a href="<?php echo $do;?>copies"><?php echo $_SESSION['username'];?></a></li>
			<li><a href="<?php echo $do;?>post">New</a></li>					
			<li><?php if(($sessioncountry=$_SESSION['usercountry'])&&($sessionstate=$_SESSION['userstate'])){ echo "<li><a href='$do.\changelocation'>$sessionstate,$sessioncountry</a></li>";}else{echo "<li><a href='$do.\setlocation'>Set Location</a></li>";}?></li>
                        <li><a href="<?php echo $do;?>index.php?sign_out=1">Sign Out</a></li>
		<?php }else {?>
			<li><a href="<?php echo $do;?>login">Login</a></li>
			<li><a href="<?php echo $do;?>register">Register</a></li>
			<?php if((@$cookiecountry=$_COOKIE['cookie_country'])){echo "<li><a href='$do.\login'>$cookiecountry</a></li>";}else{echo "<li><a href='$do.\setlocation'>Set Location</a></li>";}?>
			
		<?php }?>
		</ul>
	</nav>
</div>
<div id='b'>
	<div id='bl'>&nbsp;</div>
	<div id='bc'><?php include 'f/php/main.php';?></div>
	<div id='br'>&nbsp;</div>
</div>
<div id='f'>
	<footer>
	<nav>
		<ul>
			<li><a href="<?php echo $do;?>help">Help</a></li>
			<li><a href="<?php echo $do;?>privacy">Privacy</a></li>
			<li><a href="<?php echo $do;?>mobile.php">Mobile</a></li>
		</ul>
	</nav>	
	<p>&copy; 2014 Copacu.Com. All rights reserved.</p>
	
	</footer>
</div>
</body>
<script src="/f/js/gtrack.js"></script>