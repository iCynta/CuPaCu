<?php
if($mail==('VerifyEmail'||'NewPassword'||'ForgotPassword')){
	switch($mail){
		case "VerifyEmail":
			$to = $email;
			$subject = "Notification From copacu.com";		          
			$message = "
				<html><body>
				<p>Hello  $name</p>
				<p>Thank You For Creating Account with CoPaCu</p>
				<p><b>Verify Your Email</b></p>
				<p>Verification Code: $visitid</p>
				<p>www.copacu.com/verifyemail?email=$email</p>
				<p>Name: $name</p>
				<p>Email: $email </p>
				<p>Your Home Location :$state , $country</p>
				<p>Password : $password</p>
				<p>Verification Code: $visitid</p>
				<p>We would like to inform you that Clicking the link will activate your profile</p>
				<p>Please Add this email address notification@copacu.com to Your Contacts to get future notifications.Please don't reply to this email. </p>
				<p>Thanking You</p>
				<p><b>CoPaCu Team</b></p>
				</body></html>
			        ";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			$headers .= 'From:notification@copacu.com' . "\r\n";
			mail($to,$subject,$message,$headers);
			$mail="";
		break;  

		case "ForgotPassword":
			$to = $email;
			$subject = "Notification From copacu.com";		          
			$message = "
				<html><body>
				<p>Hello  $name</p>
				<p>You requested for Password</p>
				<p><b>Your Password</b></p>
				<p>Password: $password</p>
				<p>www.copacu.com?s=login</p>
				<p>Name: $name</p>
				<p>Email: $email </p>
				<p>Your Home Location :$state , $country</p>
				<p>Password : $password</p>
				<p>We would like to inform you that Clicking the link will activate your profile</p>
				<p>Please Add this email address notification@copacu.com to Your Contacts to get future notifications.Please don't reply to this email. </p>
				<p>Thanking You</p>
				<p><b>CoPaCu Team</b></p>
				</body></html>
			        ";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			$headers .= 'From:notification@copacu.com' . "\r\n";
			mail($to,$subject,$message,$headers);
			$mail="";
		break;
	}
}
?>

		