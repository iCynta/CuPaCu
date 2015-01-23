<form class='form' id='selectlocation' name="form" method="post" action="p/selectlocation">
<h2>Your Country and State</h2>
<span id='error'><?php echo @$_SESSION['ferror'] ?></span>
<input id='country' list= "countries" name="country" required placeholder="Your Home Country" /><br/><br/>
<input id='state' list= "states" name="state" required placeholder="Your state" /><br/><br/>
<input id="sub" type="submit" name="Submit" value="Set" /><br/><br/>
</form>	
	