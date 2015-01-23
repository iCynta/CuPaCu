
<form class='form'id='changepass' name="form" method="post" action="p/changepassword" align="center">
<h2>Change Your Password</h2>
<span id='error'><?php echo @$_SESSION['ferror'] ?></span>
<input id='password' type="password" name="password" required  placeholder="New Password"/><br/><br/>
<input id="sub" type="submit" name="Submit" value="Change Password" /><br/><br/>
</form>	