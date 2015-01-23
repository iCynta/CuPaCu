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
//function to check email
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

 if (empty($_POST["password"])) {
 $error = "$error* Password is required  <br/>";
 } 
$passw=$_POST['password'];
if(valid_pass($passw))
{$password=$passw;}
else {
$error = "$error* Invalid Password Format  <br/>";
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
if(!$error && $email && $password){
$visitid=$_SESSION['visitid'];
include "connect.php";
//check email already exist or not
$logemailcheck="SELECT * FROM $table5 WHERE email ='$email' ";
$lec = mysqli_query($conn,$logemailcheck);
if (mysqli_num_rows($lec) ==1) {
	while($logrow = mysqli_fetch_array($lec)) {
		if($logrow['status']=='1')
		{
		header("Location:$do/verifyemail");
		}
		else if($logrow['status']=='8')
		{
		//registration page this email address is blocked contact copacu team
		header("Location:$do/register");
		}
		else if($logrow['status']=='2')
		{
			if($logrow['password']===$password){
			//Logged in
				$_SESSION['userid']=$userid= $logrow['userid'];
				$_SESSION['useremail']= $logrow['email'];
				$_SESSION['usercountry']=$country= $logrow['country'];
				$_SESSION['userstate']=$state= $logrow['state'];
				$_SESSION['username']= $logrow['name'];
			    	//updating current session
			    	$sql = "UPDATE $table1 SET userid='$userid',country='$country' AND state='$state' WHERE id='$visitid'";
			    	mysqli_query($conn, $sql);
			header("Location:$do");
			}else{
			$error = "$error* Email or Password is Incorrect <br/>";
			}
		}else{
	//	header('Location:/register');
		}
	}
}else{//header('Location:/register');
}}
else if($error)
{
$_SESSION['ferror']=$error;
header("Location:$do/login");
}
else
{
header("Location:$do");
}

?>	