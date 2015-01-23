<style>
#front
{
width:100%;
height:600px;

}
#frontleft
{
width:60%;
height:600px;
float:left;
background-color:#E6F2F2;
}
#frontright
{
width:40%;
height:600px;

float:right;
}
#frontrightup
{
background-color:#F2F9F9;
width:100%;
height:200px;
}
#frontrightdown
{
width:100%;
height:400px;
}
</style>

<div id='front'>
<div id='frontleft'></div>
<div id='frontright'>
<form class='form' id='selectlocation' name="form" method="post" action="/p/selectlocation" align="center">
<div id='formhead'>Set Your Home Country and State</div>
<span id='error'><?php echo $error; ?></span><br/>
<input id='country' list= "countries" name="country" required placeholder="Your Home Country" /><br/><br/>
<input id='state' list= "states" name="state" required placeholder="Your state" /><br/><br/>
<input id="sub" type="submit" name="Submit" value="Set" />
</form>	
</div>
</div>
</div>	