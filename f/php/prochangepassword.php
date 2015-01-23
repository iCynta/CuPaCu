<?php
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
if(valid_pass($passw))
{$password=$passw;}
else {
$error = "$error* Password is Not valid  <br/>* Minimum <br/>---Length 8 <br/>---One lowercase letter<br/>---One uppercase letter<br/>---One Number<br/>---One special character<br/>";
}

$userid=$_SESSION['userid'];
if(!$error && $password&&$userid){
$visitid=$_SESSION['visitid'];
include "connect.php";
//check email already exist or not
$changepasscheck="SELECT * FROM $table5 WHERE userid ='$userid' ";
$cpc = mysqli_query($conn,$changepasscheck);
	if (mysqli_num_rows($cpc) ==1) {
		while($cpcrow = mysqli_fetch_array($cpc)) {
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
				$sql = "UPDATE $table5 SET password='$password' WHERE userid='$userid'";
				mysqli_query($conn, $sql);
				header("Location:$do/login");

				}else{
					$error = "$error* You are not authorised to change your Password<br/>";
				}
	
			}}else{
			header("Location:$do/register");
			}
	
}
else
{
$_SESSION['ferror']=$error;
header("Location:$do/register");
}

?>

			