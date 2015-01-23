<body>
<div id='h'>
	<header>
	<a href="<?php echo $do;?>"><img src="f/image/icon/copacu.ico" alt="copacu.com"/></a>
	</header>	
	<nav>
		<ul>
		<?php if(@$_SESSION['userid']){?>
			<li><a href="copies"><?php echo $_SESSION['username'];?></a></li>
			<li><a href="post">New</a></li>					
			<li><?php if(($sessioncountry=$_SESSION['usercountry'])&&($sessionstate=$_SESSION['userstate'])){echo "<li><a href='changelocation'>$sessionstate,$sessioncountry</a></li>";}else{echo "<li><a href='setlocation'>Set Location</a></li>";}?></li>
		<?php }else {?>
			<li><a href="login">Login</a></li>
			<li><a href="register">Register</a></li>
			<?php if((@$cookiecountry=$_COOKIE['cookie_country'])&&(@$cookiestate=$_COOKIE['cookie_state'])){echo "<li><a href='setlocation'>$cookiestate,$cookiecountry</a></li>";}else{echo "<li><a href='setlocation'>Set Location</a></li>";}?>
			
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
			<li><a href="help">Help</a></li>
			<li><a href="privacy">Privacy</a></li>
			<li><a href="mobile.php">Mobile</a></li>
		</ul>
	</nav>	
	<p>&copy; 2014 Copacu.Com. All rights reserved.</p>
	
	</footer>
</div>
</body>
		