
<?php
        $title = "LeaseHood - MyHood";
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