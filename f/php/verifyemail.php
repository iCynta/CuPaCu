<form class='form'id='verifyemail' name="form" method="post" action="p/verifyemail">
<h2>Verify Your Email Address</h2>
<span id='error'><?php echo $error; ?></span><br/>
<input id='email' type="email" name="email"  required  placeholder="Email Address" value="<?php echo @$_SESSION['foemail'] ; ?>"value="<?php echo $_GET['email']; ?>"/><br/><br/>
<input id='number' type="number" name="number"  required  placeholder="Verification Code" /><br/><br/>
<input id="sub" type="submit" name="Submit" value="Verify Email" /><br/><br/>
</form>	
		