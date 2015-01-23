<?php
include_once "connect.php";
if($_SESSION['start']){
	switch ($process){
		case "register":
		//registration
			include_once "proregistration.php";
		break;
		case "verifyemail":
		//login
			include_once "proverifyemail.php";
		break;
		case "login":
		//login
			include_once "prologin.php";
		break;
		case "forgotpassword":
		//forgotpassword
			include_once "proforgotpassword.php";
		break;
		case "selectlocation":
		//changemobile
			include_once "proselectlocation.php";
		break;
		case "changelocation":
		//changemobile
			if(@$_SESSION['userid']){include_once "prochangelocation.php";}
		break;
		case "changeemail":
		//changeemail
			if(@$_SESSION['userid']){include_once "prochangeemail.php";}
		break;
		case "changepassword":
		//changepassword
			if(@$_SESSION['userid']){include_once "prochangepassword.php";}
		break;
		case "copy":
		//copy a post
			if(@$_SESSION['userid']){include_once "procopy.php";}
		break;
		case "cut":
		//cut a post
			if(@$_SESSION['userid']){include_once "procut.php";}
		break;

		case "post":
		//post
			if(@$_SESSION['userid']){include_once "propost.php";}
		break;
	}
}
include_once 'close.php';
?>

		