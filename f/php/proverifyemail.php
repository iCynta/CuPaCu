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
$number=$_POST["number"];
//function to check text state country and name
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
if(!$error &&$email && $number){
	//check email already exist or not
	$veremailcheck="SELECT * FROM $table5 WHERE email ='$email' ";
	$vec = mysqli_query($conn,$veremailcheck);
	if (mysqli_num_rows($vec) ==1) {
		while($verrow = mysqli_fetch_array($vec)) {
			if($verrow['status']=='1')
			{
				if($verrow['visitid']===$number){
					$sql = "UPDATE $table5 SET status='2' WHERE email='$email'";
					mysqli_query($conn, $sql);
					//Logged in
					header("Location:$do/login");
				}else{
					$error = "$error* Email or Verification Code is Incorrect <br/>";
				}
			}
			else if($verrow['status']=='8')
			{
				//registration page this email address is blocked contact copacu team
				header("Location:$do/register");
			}
			else if($verrow['status']=='2')
			{
				header("Location:$do/login");
			}else{
				header("Location:$do/register");
			}
		}
	}
	else{header("Location:$do/register");}
}
else
{
$_SESSION['ferror']=$error;
}
?>

		