<html>
<head><title>Welcome to SSH Web</title></head>
<body>
	<H1> SSH Web Login page. Log in Carefully!</H1>
<p>
<form id="login" action="functions/dashboard.php" method="POST" accept-charset="UTF-8">
<fieldset>
<legend><h2>Login</h2></legend>
	<input type='hidden' name='submitted' id='submitted' value='1'/>
	<h3><label>Name</label></h3>
		<input type="text" name="uname">
	<h3><label>Password</label></h3>
		<input type="password" name="passwd" method=POST> <br>

	<br><input type="submit" name="btn_login" value="Log In"><br>
</fieldset>
</form>



</body>
</html>