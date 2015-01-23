<?php
if($_SESSION['start']){
	switch ($page){
		case "register":
		//registration
			include 'register.php';
		break;
		case "verifyemail":
		//changemobile
			include 'verifyemail.php';
		break;
		case "login":
		//login
			include 'login.php';
		break;
		case "privacy":
		//privacy
			include 'privacy.php';
		break;
		case "feedback":
		//feedback
			include 'feedback.php';
		break;
		case "help":
		//help
			include 'help.php';
		break;
		case "setlocation":
		//help
			include 'setlocation.php';
		break;
		case "forgotpassword":
		//forgotpassword
			include 'forgotpassword.php';
		break;
		case "changelocation":
		//changemobile
			if(@$_SESSION['userid']){include 'changelocation.php';}
		break;
		case "copies":
		//changemobile
			if(@$_SESSION['userid']){include 'copies.php';}
		break;
		case "changeemail":
		//changeemail
			if(@$_SESSION['userid']){include 'changeemail.php';}
		break;
		case "changepassword":
		//changepassword
			if(@$_SESSION['userid']){include 'changepassword.php';}
		break;
		case "view":
		//view individual post
			include 'view.php';
		break;
		default:
			if(@$_SESSION['userid']){include 'post.php';}
			include 'viewer.php';
		
	}
}

?>

		