<!DOCTYPE html>
<!-- this is my error page -->
<!-- just another comment -->
<html lang="en">
<?php include_once 'f/head.php'; ?>
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
	<div id='bc'>
<section>
<h2>Sorry for the inconvenience:</h2>
<article>
<p>We are working hard to clear this problem</p>
<p>We value your time:</p>
<p>Please visit our official pages:</p>

<nav><ul>
<li>
<div id="fb-root"></div> <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-post" data-href="https://www.facebook.com/827475697309364/photos/a.827476790642588.1073741825.827475697309364/827476830642584/?type=1" data-width="466"><div class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/827475697309364/photos/a.827476790642588.1073741825.827475697309364/827476830642584/?type=1">Post</a> by <a href="https://www.facebook.com/pages/Copacu/827475697309364">Copacu</a>.</div></div>

</li>

<!-- Place this tag where you want the widget to render. -->
<li><div class="g-page" data-href="//plus.google.com/u/0/108747003102884686282" data-rel="publisher"></div></li>
</ul></nav>
</article>
</section>

</div>
	<div id='br'>&nbsp;</div>
</div>
<div id='f'>
	<footer>
	<nav>
		<ul>
			<li><a href="help">Help</a></li>
			<li><a href="privacy">Privacy</a></li>
		</ul>
	</nav>	
	<p>&copy; 2014 Copacu.Com. All rights reserved.</p>
	
	</footer>
</div>
</body>






<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer></script>


</html>