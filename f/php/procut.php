<?php
//  validation
if (empty($_POST["text"])) {
$cuterror= "* Please Provide More Details.. <br/>";
} else {
$text =$_POST["text"];
// Strip HTML Tags
$clear = strip_tags($text);
// Clean up things like &amp;
$clear = html_entity_decode($clear);
// Strip out any url-encoded stuff
$clear = urldecode($clear);
// Replace non-AlNum characters with space
$clear = preg_replace('/[^A-Za-z0-9]/', ' ', $clear);
// Replace Multiple spaces with single space
$clear = preg_replace('/ +/', ' ', $clear);
// Trim the string of leading/trailing space
$detail = trim($clear);
}
$postid=$_POST["id"];
$reason=$_POST["reason"];
$userid=$_SESSION['userid'];
$visitid=$_SESSION['visitid'];
if(!$cuterror && $detail&&$postid&&$reason&&$userid&&$visitid){
		include "connect.php";
		$cutsql = "SELECT * FROM $table7 WHERE userid='$userid' AND postid='$postid'";
		$cutre=mysqli_query($conn, $cutsql);
		if (mysqli_num_rows($cutre) ==0) {
			$sql = "INSERT INTO $table7 (userid,postid,visitid,reason,detail) VALUES ('$userid','$postid','$visitid','$reason','$detail')";
			mysqli_query($conn, $sql);
			if($reason!= 1){
			$sql = "UPDATE $table2 SET status='2' WHERE postid='$postid'";
			mysqli_query($conn, $sql);
			}
			header("Location:$do");
		}
}
?>