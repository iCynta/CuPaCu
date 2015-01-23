<form class='form'id='cutconfirm' name="form" method="post" action="p/cut?cutconfirm=<?php echo $postid; ?>">
<div >Please Provide Reason</div><br/>
<input id='reason' type="radio" name="reason" value="1" checked >You Dont Want To See This<br/>
<input id='reason' type="radio" name="reason" value="2" >Copy righted Content<br/>
<input id='reason' type="radio" name="reason" value="3" >Personal Content <br/>
<input id='reason' type="radio" name="reason" value="4" >Violence<br/>
<input id='reason' type="radio" name="reason" value="5" >Adult Content<br/><br/>
<span id='error'><?php echo @$cuterror; ?></span>
<input type="hidden" name="id" value="<?php echo $postid; ?>" />
<textarea id='text' name='text'placeholder='Please Provide More Details'autofocus required></textarea><br/><br/>
<input id="sub" type="submit" name="Submit" value="Confirm" /><br/><br/>
</form>	
