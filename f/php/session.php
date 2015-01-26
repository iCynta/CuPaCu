<?php
// Start the 1session This should be the very firt line of code
session_start();
if(isset($_GET['sign_out']))
{
    session_destroy();
    header("Location: $do login");
}
// Declaring null variables.........
$cuterror=$pro=$cookiestate=$cookiecountry=$lastvisitid=$error="";

//*****************ALL LINK MANAGEMENT HERE******************************
//get the browser link
$link=@$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
// ALL GET Operation Here
if(isset($_GET['page'])) // Checking if "Page" variable is available in URL
    $page   =  $_GET['page']; //this is only for main.php
if(isset($_GET['process'])) // Checking if "process" variable is available in URL
    $process    =   $_GET['process'];//this is for process.php


//session starting
if (!@$_SESSION['start']){
//Location Manager With IP
$user_ip = getenv('REMOTE_ADDR'); //  "127.0.0.1";
//Check IP Exists or not
	if($user_ip){
		//connecting to data base 
		require_once "connect.php";
		$sessionipcheck=mysqli_query($conn,"SELECT * FROM $table9 WHERE ip ='$user_ip' ");
		if (mysqli_num_rows($sessionipcheck) ==1) {
			$srowli = mysqli_fetch_assoc($sessionipcheck);
			$sessionlocationid= $srowli['locationid'];
			$sessioncountryname= $srowli['countryname'];
			setcookie("cookie_country",$sessioncountryname, time() + (86400 * 30), "/");		    
		}		
		if (mysqli_num_rows($sessionipcheck) ==0) {
		//getting location information from geoplugin
			$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
				$city = @$geo["geoplugin_city"];
				$region = @$geo["geoplugin_region"];
				$areacode = @$geo["geoplugin_areaCode"];
				$countrycode= @$geo["geoplugin_countryCode"];
				$countryname = @$geo["geoplugin_countryName"];
				$continentcode = @$geo["geoplugin_continentCode"];
				$latitude= @$geo["geoplugin_latitude"];
				$longitude= @$geo["geoplugin_longitude"];
				$regioncode= @$geo["geoplugin_regionCode"];
				$regionname = @$geo["geoplugin_regionName"];
				//Inserting IP Details to database
				if($user_ip&&$countryname){
					$sessionipinsert=mysqli_query($conn,"INSERT INTO $table9 (ip,city,region,areacode,countrycode,countryname,continentcode,latitude,longitude,regioncode,regionname,status) VALUES ('$user_ip','$city','$region','$areacode','$countrycode','$countryname','$ontinentcode','$latitude','$longitude','$regioncode','$regionname','1')");
					$sessionlocationid = mysqli_insert_id($conn);
					setcookie("cookie_country",$sessioncountryname, time() + (86400 * 30), "/");
				}
		}
		// Setting Cookie Location
		

	}



//*****************Timer**************************
	//get browser
	$browser=@$_SERVER['HTTP_USER_AGENT'];
	//check cookies
	$cookie_name='last_visit_id';
	if(@$_COOKIE['cookie_visit']){	$lastvisitid= $_COOKIE['cookie_visit'];	}
	if(@$_COOKIE['cookie_country']) {
		$cookiecountry=$_COOKIE['cookie_country'];
		$cookiestate=$_COOKIE['cookie_state'];
	}
	if($link&&$sessionlocationid&&$browser){
		//connecting to data base 
		include_once "connect.php";
	 	$sql = "INSERT INTO $table1 (link,locationid,browser,lastvisitid) VALUES ('$link','$sessionlocationid','$browser','$lastvisitid')";
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

		