<?php
		include "connect.php";
		$copypostid=$_GET['i'];
		$copyuserid=$_SESSION['userid'];
		$copysql = "SELECT * FROM $table3 WHERE userid='$copyuserid' AND postid='$copypostid'";
		$copy=mysqli_query($conn, $copysql);
		if (mysqli_num_rows($copy) ==0) {
			$sql = "INSERT INTO $table3 (userid,postid) VALUES ('$copyuserid','$copypostid')";
			mysqli_query($conn, $sql);
		}
		header("Location:$do");
?>

		