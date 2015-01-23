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
$visitid=$_SESSION['visitid'];
if(!$error &&$country && $state && !$userid && $visitid ){
	setcookie("cookie_country", $country, time() + (86400 * 30), "/");
	setcookie("cookie_state", $state, time() + (86400 * 30), "/");
	// 86400 = 1 day
	//86400 * 30 One Month
	//updating current session
	include 'connect.php';
	$sql = "UPDATE $table1 SET country='$country',state='$state' WHERE id='$visitid'";
	mysqli_query($conn, $sql);
	include 'close.php';
}
else
{
$_SESSION['ferror']=$error;
}
header("Location:$do");
?>

		
		