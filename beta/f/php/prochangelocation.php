<?php
if (empty($_POST["country"])) {
$error = "* Country is Required <br/>";
} else {
$country = test_input($_POST["country"]);
if (!preg_match("/^[a-zA-Z ]*$/",$country)) {
$error = "$error* Invalid Country <br/>";
}
}
if (empty($_POST["state"])) {
$error = "$error* State is Required <br/>";
} else {
$state = test_input($_POST["state"]);
if (!preg_match("/^[a-zA-Z ]*$/",$state)) {
$error = "$error* Invalid State <br/>";
}
}


//function to check text state country and name
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$userid=$_SESSION['userid'];
if(!$error &&$country && $state && $userid ){
$visitid=$_SESSION['visitid'];
include "connect.php";
//check email already exist or not
$loccheck="SELECT * FROM $table5 WHERE userid ='$userid' ";
$lc = mysqli_query($conn,$loccheck);
if (mysqli_num_rows($lc) ==1) {
	while($lrow = mysqli_fetch_array($lc)) {
		if($lrow['status']=='1')
		{
		}
		else if($lrow['status']=='8')
		{
		//registration page this email address is blocked contact copacu team
		header("Location:$do/register");
		}
		else if($lrow['status']=='2')
		{	
		 $esql = "UPDATE $table5 SET country='$country',state='$state' WHERE userid='$userid'";
			mysqli_query($conn, $esql);
			//Logged in
			$_SESSION['usercountry']=$country;
			$_SESSION['userstate']=$state;
			
			header("Location:$do");
			}else{
				$error = "$error* Country or State is Incorrect <br/>";
			}

		}}else{
		header("Location:$do/register");
		}
	}
else{
$_SESSION['ferror']=$error;
header("Location:$do/register");

}
?>

		