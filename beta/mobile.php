<?php include_once "f/php/session.php";include_once "f/php/process.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="google-site-verification" content="1jrYFT9EBKPccsM96zwguPU7sGiDv96psU8qfGWAwYM" />
<meta name=viewport content="width=device-width, initial-scale=1"/>
<meta name="keywords" content="copacu,copy,paste,cut" />
<meta name="description" content="A new way of sharing to the world and with your friends.Copying will save your contents,Cutting will filter and Pasting will pass the content to desired peoples" />
<title>Copacu</title>
<link rel="shortcut icon" href="f/image/icon/copacu.ico" type="image/x-icon" />
<link rel="stylesheet" href="f/css/ms.css" />  
</head>
<body>
<div id='h'>
	<header>
	<a href="<?php echo $do;?>/mobile.php"><img src="f/image/icon/copacu.ico" alt="copacu.com"/></a>
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
	
	<div id='bc'><?php include 'f/php/main.php';?></div>

</div>
<div id='f'>
	<footer>
	<nav>
		<ul>
			<li><a href="help">Help</a></li>
			<li><a href="privacy">Privacy</a></li>
			<li><a href="<?php echo $do;?> ">Desktop</a></li>
		</ul>
	</nav>	
	<p>&copy; 2014 Copacu.Com. All rights reserved.</p>
	
	</footer>
</div>
</body>
</html>	