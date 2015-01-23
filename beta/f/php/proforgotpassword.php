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
if(!$error &&$email){
$visitid=$_SESSION['visitid'];
include "connect.php";
//check email already exist or not
$forgotcheck="SELECT * FROM $table5 WHERE email ='$email' ";
$fc = mysqli_query($conn,$forgotcheck);
if (mysqli_num_rows($fc) ==1) {
	while($frow = mysqli_fetch_array($fc)) {
		if($frow['status']=='1')
		{
		//Sending Email
		$mail='VerifyEmail';
		include 'mailer.php';
		header("Location:$do/verifyemail");	
		}
		else if($frow['status']=='8')
		{
		//registration page this email address is blocked contact copacu team
		header("Location:$do/register");
		}
		else if($frow['status']=='2')
		{
		$mail='ForgotPassword';
			$name=$frow['name'];
			$email=$frow['email'];
			$state=$frow['state'];
			$country=$frow['country'];
			$password=$frow['password'];
		include 'mailer.php';
		header("Location:$do/login");		
		}else{
		header("Location:$do/register");
		}
	}
}else{header("Location:$do/register");}
}
else
{
$_SESSION['ferror']=$error;
}
?>

		