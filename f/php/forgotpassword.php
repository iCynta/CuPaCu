
<form class='form' id='forgot' name="form" method="post" action="p/forgotpassword">
<h2>Forgot Password</h2>
<span id='error'><?php echo @$_SESSION['ferror'] ?></span>
<input id='email' type="email" name="email" required  placeholder="Email Address" /><br/><br/>
<input id="sub" type="submit" name="Submit" value="Forgot Password" /><br/><br/>
</form>	