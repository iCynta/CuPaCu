<form class='form'id='login' name="form" method="post" action="p/login">
<h2>Login:</h2>
<span id='error'><?php echo @$_SESSION['ferror'] ?></span>
<input id='email' type="email" name="email" required  placeholder="Email Address" value="<?php echo @$_SESSION['foemail'] ; ?>" /><br/><br/>
<input id='password' type="password" name="password" required placeholder="Password"/><br/><br/>
<input id="sub" type="submit" name="Submit" value="Login" /><br/><br/>
<ul><li><a href="<?php echo $do;?>forgotpassword">Forgot password</a></li></ul>
</form>	