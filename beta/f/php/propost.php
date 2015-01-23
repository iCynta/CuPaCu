<?php
//  validation
if (empty($_POST["text"])) {
$error= "$error* Your Post Is Empty <br/>";
} else {
$posttext =$_POST["text"];
$posttext=nl2br(str_replace('  ', ' &nbsp;', htmlspecialchars($posttext, ENT_QUOTES)));
}
$userid=$_SESSION['userid'];
if(!$error && $posttext&&$userid){
include "connect.php";
$visitid=$_SESSION['visitid'];
$country=$_SESSION['usercountry'];
$state=$_SESSION['userstate'];
$postingtext = "INSERT INTO $table2 (posttext,userid,visitid,country,state,status) VALUES ('$posttext','$userid','$visitid','$country','$state','1')";
$postingtextq=mysqli_query($conn,$postingtext);
header("Location:$do");
}
else
{
$_SESSION['ferror']=$error;
}
?>

		