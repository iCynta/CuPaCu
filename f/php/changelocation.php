
<form class='form' id='changelocation' name="form" method="post" action="p/changelocation">
<h2>Change Your Location</h2>
<span id='error'><?php echo @$_SESSION['ferror'] ?></span>
<input id='country' list= "countries" name="country" required placeholder="Your Home Country" /><br/><br/>
<input id='state' list= "states" name="state" required placeholder="Your state" /><br/><br/>
<input id="sub" type="submit" name="Submit" value="Change Location" /><br/><br/>
</form>	