<form class='form'id='changeemail' name="form" method="post" action="p/changeemail" align="center">
<h2>Change Your Email</h2>
<span id='error'><?php echo @$_SESSION['ferror'] ?></span>
<input id='email' type="email" name="email"  required  placeholder="Email Address" /><br/><br/>
<input id="sub" type="submit" name="Submit" value="Change Email" /><br/><br/>
</form>	