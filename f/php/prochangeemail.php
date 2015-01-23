<?php
if (empty($_POST["email"])) {
$error = "$error* Email is required  <br/>";
} else {
$email = test_input($_POST["email"]);
// check if e-mail address syntax is valid or not
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
$error = "$error* Invalid Email Format <br/>";
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
if(!$error && $email&&$userid){
$visitid=$_SESSION['visitid'];
include "connect.php";
//check email already exist or not
$changeemailcheck="SELECT * FROM $table5 WHERE email ='$email' ";
$cec = mysqli_query($conn,$changeemailcheck);
if (mysqli_num_rows($cec) ==0) {
	$changeemailusercheck="SELECT * FROM $table5 WHERE userid ='$userid' ";
	$ceuc = mysqli_query($conn,$changeemailusercheck);
	if (mysqli_num_rows($ceuc) ==1) {
		while($ceucrow = mysqli_fetch_array($ceuc)) {
			if($ceucrow['status']=='1')
			{
			header("Location:$do/verifyemail");
			}
			else if($ceucrow['status']=='8')
			{
			//registration page this email address is blocked contact copacu team
			header("Location:$do/register");
			}
			else if($ceucrow['status']=='2')
			{
				$sql = "UPDATE $table5 SET email='$email' AND status='1' AND state='$state' WHERE userid='$userid'";
				mysqli_query($conn, $sql);
				//Sending Email
				$mail='VerifyEmail';
				include 'mailer.php';
				}else{
					$error = "$error* You are not authorised to change your email<br/>";
				}
	
			}}else{
			header("Location:$do/register");
			}
	
}else{
$error = "$error* This is an Active Email <br/>";
header("Location:$do/register");}
$_SESSION['ferror']=$error;
}

?>

		