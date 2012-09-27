<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
			"http://www.w3.org/TR/html4/loose.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
   			<head>
   			<title>My Hood</title>
   			<link rel="shortcut icon" href="images/favicon.ico" />
<?php
	include 'Header.php';

	?>
	
	<form id='login' action='login.php' method='post' accept-charset='UTF-8' style="float:left;padding: 100px 100px 100px 100px;">
	<fieldset >
	<legend>Login</legend>
	<input type='hidden' name='submitted' id='submitted' value='1'/>
	<label for='username' >UserName*:</label>
	<input type='text' name='username' id='username'  maxlength="50" />
	<label for='password' >Password*:</label>
	<input type='password' name='password' id='password' maxlength="50" />
	<input type='submit' name='Submit' value='Submit' />
	</fieldset>
	</form>

	<?php
	include 'Footer.php';
?>