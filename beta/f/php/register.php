<?php
//getting a suggestion country data list
include "connect.php";
$countrysql="SELECT * FROM $table1 ";
$countryresult = mysqli_query($conn, $countrysql);
	// output data of each row
	echo "<datalist id= 'countries'>";
	while($row = mysqli_fetch_assoc($countryresult)) {
	$countryid=$row['id'];
	$countryname=$row['nicename'];	
	 echo "<option value= '$countryname' ></option>";
	}
	echo "</datalist>";
	include "close.php";

?>

<form class='form' id='register' autocomplete="on" name="form" method="post" action="p/register" >
<h2>Registration Page:</h2>
<span id='error'><?php echo @$_SESSION['foerror'] ?></span>
<?php $_SESSION['foerror']='';$error='';?>
<input id='name' type="text" name="name" placeholder="Name" required   maxlength="20" autofocus value="<?php echo @$_SESSION['foname'] ; ?>" /><br/><br/>
<input id='country' list= "countries" name="country" required placeholder="Your Home Country" value="<?php echo @$_COOKIE['cookie_country'] ; ?>" /><br/><br/>
<input id='state' list= "states" name="state" required placeholder="Your state" value="<?php echo @$_COOKIE['cookie_state'] ; ?>"/><br/><br/>
<input id='email'  type="email" name="email" placeholder="Email Address" required value="<?php echo @$_SESSION['foemail'] ; ?>"/><br/><br/>
<input id='password' type="password" name="password" placeholder="Password" required /><br/><br/>
<input id="sub" type="submit" name="submit" value="Register" /><br/><br/>
</form>	