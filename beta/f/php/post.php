
<form class="form"id='post' name="form" method="post" action="p/post">
<span id='error'><?php echo $error; echo "* All Posts Visible To Public " ;?></span><br/>
<textarea id='text' name='text'placeholder='start typing here' required></textarea><br/>
<span id='error'><?php echo "This Post Visible to:". $_SESSION['userstate'] .",". $_SESSION['usercountry'];?></span><br/>
<input id="sub" type="submit" name="Submit" value="Post" /><br/><br/>
</form>	