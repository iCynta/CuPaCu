<?php
// Declaring null variables.........
$cuterror=$pro=$cookiestate=$cookiecountry=$lastvisitid=$error="";
// Start the session
session_start();
//*****************ALL LINK MANAGEMENT HERE******************************
//get the browser link
$link=@$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
// ALL GET Operation Here
$page=@$_GET['page']; //this is only for main.php
$process=@$_GET['process'];//this is for process.php


//*****************Timer**************************
//session starting
if (!@$_SESSION['start']){
	//get ip address
	$ip = @$_SERVER["REMOTE_ADDR"];
	//get browser
	$browser=@$_SERVER['HTTP_USER_AGENT'];
	//check cookies
	$cookie_name='last_visit_id';
	if(@$_COOKIE['cookie_visit']){	$lastvisitid= $_COOKIE['cookie_visit'];	}
	if(@$_COOKIE['cookie_country'] && @$_COOKIE['cookie_state']) {
		$cookiecountry=$_COOKIE['cookie_country'];
		$cookiestate=$_COOKIE['cookie_state'];
	}
	if($link&&$ip&&$browser){
		//connecting to data base 
		include_once "connect.php";
	 	$sql = "INSERT INTO $table1 (link,ip,browser,lastvisitid,country,state) VALUES ('$link','$ip','$browser','$lastvisitid','$cookiecountry','$cookiestate')";
	  	if (mysqli_query($conn, $sql)) {
		        $cookie_value=$visitid = mysqli_insert_id($conn);
		    	setcookie("cookie_visit", $cookie_value, time() + (86400 * 30), "/");
		    	// 86400 = 1 day
			//86400 * 30 One Month
			$_SESSION['start']='1';
			$_SESSION['visitid']=$visitid;
			$_SESSION['userid']='';	
		include_once 'close.php';
					
		}
		
	}
}
?>

		