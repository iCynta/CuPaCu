<?php

//  validation
if (empty($_POST["name"])) {
	$error= "* Name is Required <br/>$error";
} else {
	$name = test_input($_POST["name"]);
	// check name only contains letters and whitespace
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	$error .= "* Please Enter Your Correct Name<br/>";
	}
}
if (empty($_POST["email"])) {
	$error = "$error* Email is required  <br/>";
} else {
	$email = test_input($_POST["email"]);
	// check if e-mail address syntax is valid or not
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
	$error = "$error* Invalid Email Format <br/>";
	}
}

//password validation
$dummy = array();
function valid_pass($pass) {
    if (preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $pass,$dummy))
        return TRUE;
}
/*
    Explaining $\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$
    $ = beginning of string
    \S* = any set of characters
    (?=\S{8,}) = of at least length 8
    (?=\S*[a-z]) = containing at least one lowercase letter
    (?=\S*[A-Z]) = and at least one uppercase letter
    (?=\S*[\d]) = and at least one number
    (?=\S*[\W]) = and at least a special character (non-word characters)
    $ = end of the string

 */
 if (empty($_POST["password"])) {
	 $error = "$error* Password is required  <br/>";
 } 
$passw=$_POST['password'];
if(valid_pass($passw)){$password=$passw;}
else {
	$error = "$error* Password is Not valid  <br/>* Minimum <br/>---Length 8 <br/>---One lowercase letter<br/>---One uppercase letter<br/>---One Number<br/>---One special character<br/>";
}
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
$_SESSION['foname']=$name;
$_SESSION['foemail']=$email;
if(!$error && $name && $email && $country && $state && $password){
	$visitid=$_SESSION['visitid'];
	include "connect.php";
	//check email already exist or not
	$regemailcheck="SELECT * FROM $table5 WHERE email ='$email' ";
	$rec = mysqli_query($conn,$regemailcheck);
	while($regrow = mysqli_fetch_array($rec)) {
		if($regrow['status']=='1'){
			header("Location:$do/verifyemail");
		}
		if($regrow['status']=='8'){
			//registration page this email address is blocked contact copacu team
			header("Location:$do/register");
		}
		if($regrow['status']=='2'){
			//login page
			header("Location:$do/login");
		}
	}
	if (mysqli_num_rows($rec) ==0) {
		$sqlreg = "INSERT INTO $table5 (name,email,country,state,password,visitid,status) VALUES ('$name','$email','$country','$state','$password','$visitid','1')";
		mysqli_query($conn, $sqlreg);
		//Sending Email
		$mail='VerifyEmail';
		include 'mailer.php';
		header("Location:$do/verifyemail");
	}
}
else if($error){
	$_SESSION['foerror']=$error;
	header("Location:$do/register");
}else{
	header("Location:$do");
}
?>	